<?php

namespace App\Filament\Resources\SchoolarshipResource\Pages;

use App\Filament\Resources\SchoolarshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchoolarships extends ListRecords
{
    protected static string $resource = SchoolarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
