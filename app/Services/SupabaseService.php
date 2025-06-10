<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

const SECONDS_IN_DAY = 86400;

class SupabaseService
{
  private $supabaseUrl;
  private $apiKey;
  private $bucketName;

  public function __construct()
  {
    $this->supabaseUrl = env('SUPABASE_URL');
    $this->apiKey = env('SUPABASE_KEY');
    $this->bucketName = env('SUPABASE_BUCKET');
  }

  public function uploadImage($file, $filename)
  {
    Log::info("uploading file to supabase: {$filename}");

    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . $this->apiKey,
      'apikey' => $this->apiKey,
    ])
      ->attach('file', fopen($file->getRealPath(), 'r'), $filename)
      ->post(
        "{$this->supabaseUrl}/storage/v1/object/{$this->bucketName}/{$filename}"
      );

    if ($response->successful()) {
      // Return full public URL
      return "{$this->supabaseUrl}/storage/v1/object/public/{$this->bucketName}/{$filename}";
    } else {
      throw new \Exception('Failed to upload image to Supabase: ' . $response->body());
    }
  }

  public function getSignedUrl($filename)
  {
    $response = Http::withHeaders([
      'Authorization' => 'Bearer ' . $this->apiKey,
      'apikey' => $this->apiKey,
    ])
      ->post("{$this->supabaseUrl}/storage/v1/object/sign/{$this->bucketName}/{$filename}", [
        "expiresIn" => 999 * SECONDS_IN_DAY,
        // "transform" => [
        //   "height" => 100,
        //   "width" => 100,
        //   "resize" => "cover",
        //   "format" => "origin",
        //   "quality" => 100
        // ]
      ]);

    if ($response->successful()) {
      return $this->supabaseUrl . "/storage/v1" . $response->json()['signedURL'];
    } else {
      throw new \Exception('Failed to retrieve signed URL from Supabase: ' . $response->body());
    }
  }
}