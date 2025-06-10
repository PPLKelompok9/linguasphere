<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use App\Services\SupabaseService;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateCourse extends CreateRecord
{
  protected static string $resource = CourseResource::class;

  protected function afterCreate(): void
  {
    $course = $this->record;
    if ($course->cover) {
      $localPath = Storage::disk('public')->path($course->cover);
      $file = new \Illuminate\Http\File($localPath);

      $filename = basename($localPath);
      $supabase = new SupabaseService();
      $supabasePath = $supabase->uploadImage($file, $filename);

      $course->update(['cover' => $supabasePath]);
    }
  }
}
