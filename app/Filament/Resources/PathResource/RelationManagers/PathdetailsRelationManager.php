<?php

namespace App\Filament\Resources\PathResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class PathdetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'pathdetails';

    protected static ?string $recordTitleAttribute = 'course.name';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_course')->required()->relationship('course', 'name')->label('Kursus')->hint('Pilih Kursus')->searchable()->preload(),
                TextInput::make('position')->required()->label('Urutan')->hint('Urutan Posisi Pada Path'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('course.name')
            ->columns([
               TextColumn::make('course.name')->label('Kursus')->searchable(),
               TextColumn::make('course.level')->label('Level'),
               TextColumn::make('position')->label('Urutan'),
               TextColumn::make('created_at')->label('Ditambahkan')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
