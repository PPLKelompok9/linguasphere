<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolarshipResource\Pages;
use App\Filament\Resources\SchoolarshipResource\RelationManagers;
use App\Models\Schoolarship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class SchoolarshipResource extends Resource
{
    protected static ?string $model = Schoolarship::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                FileUpload::make('cover'),
                TextInput::make('description'),
                TextInput::make('address'),
                TextInput::make('contact'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Schoolarship Name')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('cover')
                    ->label('Cover Image')
                    ->circular()
                    ->rounded()
                    ->size(50)
                    ->default('https://via.placeholder.com/150'),
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('Address')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('contact')
                    ->label('Contact')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchoolarships::route('/'),
            'create' => Pages\CreateSchoolarship::route('/create'),
            'edit' => Pages\EditSchoolarship::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
