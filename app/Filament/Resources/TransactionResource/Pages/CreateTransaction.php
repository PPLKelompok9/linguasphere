<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Models\Course;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
  protected static string $resource = TransactionResource::class;

  protected function afterCreate(): void
  {
    $transaction = $this->record;
    if ($transaction->status_payment === 'paid') {
      $course = Course::find($transaction->id_products);
      if ($course) {
        $course->increment('total_students');
      }
    }
  }
}
