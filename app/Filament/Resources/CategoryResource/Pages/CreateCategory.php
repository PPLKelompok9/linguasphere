<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Services\SupabaseService;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateCategory extends CreateRecord
{
  protected static string $resource = CategoryResource::class;

  protected function afterCreate(): void
  {
    $category = $this->record;
    if ($category->images) {
      $localPath = Storage::disk('public')->path($category->images);
      $file = new \Illuminate\Http\File($localPath);

      $filename = basename($localPath);
      $supabase = new SupabaseService();
      $supabasePath = $supabase->uploadImage($file, $filename);


      $category->update(['images' => $supabasePath]);
    }
  }
}
