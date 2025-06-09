<?php

namespace App\Filament\Resources\AgencyResource\Pages;

use App\Filament\Resources\AgencyResource;
use App\Services\SupabaseService;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateAgency extends CreateRecord
{
  protected static string $resource = AgencyResource::class;

  protected function afterCreate(): void
  {
    $agency = $this->record;
    if ($agency->cover) {
      $localPath = Storage::disk('public')->path($agency->cover);
      $file = new \Illuminate\Http\File($localPath);

      $filename = basename($localPath);
      $supabase = new SupabaseService();
      $supabasePath = $supabase->uploadImage($file, $filename);

      $agency->update(['cover' => $supabasePath]);
    }
  }
}
