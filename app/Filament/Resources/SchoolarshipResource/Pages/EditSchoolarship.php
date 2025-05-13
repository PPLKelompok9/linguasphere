<?php

namespace App\Filament\Resources\SchoolarshipResource\Pages;

use App\Filament\Resources\SchoolarshipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchoolarship extends EditRecord
{
    protected static string $resource = SchoolarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
