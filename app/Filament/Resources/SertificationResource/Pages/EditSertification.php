<?php

namespace App\Filament\Resources\SertificationResource\Pages;

use App\Filament\Resources\SertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSertification extends EditRecord
{
    protected static string $resource = SertificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
