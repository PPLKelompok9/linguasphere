<?php

namespace App\Filament\Resources\ScholarshipResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Models\ScholarshipDetail;
use Filament\Tables\Actions\Action; 
use Filament\Tables\Actions\DeleteAction; 
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class ScolarshipDetailRelationManager extends RelationManager
{
    

    protected static string $relationship = 'applications'; 

    protected static ?string $title = 'Pendaftar';
    protected static ?string $recordTitleAttribute = 'id_user';

    public function form(Form $form): Form
    {
        return $form
             ->schema([
                Select::make('id_user')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),

                DatePicker::make('date')
                    ->default(now())
                    ->label('Tanggal Daftar')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Nama User'),
                TextColumn::make('date')->label('Tanggal Daftar')->date(),
            ])
            ->headerActions([
                  Tables\Actions\CreateAction::make()
                    ->after(function (Model $record) {
                        $scholarship = $record->scholarship()->first();
                          //Log::info('Decrement slots_available for scholarship ID ' . $scholarship->id ?? 'null');
                        if ($scholarship && $scholarship->slots_available > 0) {
                            $scholarship->decrement('slots_available');
                             //Log::info('Slots available after decrement: ' . $scholarship->slots_available);
                        }
                    }),

            ])
            ->actions([
                 DeleteAction::make()
                    ->after(function (Model $record) {
                        $scholarship = $record->scholarship()->first();
                        if ($scholarship) {
                            $scholarship->increment('slots_available');
                        }
                    }),
            ]);
    }
}
