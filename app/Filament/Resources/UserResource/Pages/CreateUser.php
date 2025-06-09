<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Services\SupabaseService;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateUser extends CreateRecord
{
  protected static string $resource = UserResource::class;

  protected function afterCreate(): void
  {
    $user = $this->record;
    if ($user->photo) {
      $localPath = Storage::disk('public')->path($user->photo);
      $file = new \Illuminate\Http\File($localPath);

      $filename = basename($localPath);
      $supabase = new SupabaseService();
      $supabasePath = $supabase->uploadImage($file, $filename);

      $user->update(['photo' => $supabasePath]);
    }
  }
}
