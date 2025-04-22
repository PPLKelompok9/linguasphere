<?php

namespace App\Filament\Resources\SertificationResource\Pages;

use App\Filament\Resources\SertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSertifications extends ListRecords
{
    protected static string $resource = SertificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
