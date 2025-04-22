<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;


class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_agency')->label('Lembaga Bahasa')->relationship('agency', 'name')->searchable()->preload(),
                TextInput::make('name')->label('Nama Kursus')->required()->maxLength(255),
                FileUpload::make('cover')->label('Gambar Kursus')->required()->hint('Upload cover gambar kursus'),
                TextInput::make('price')->numeric()->inputMode('decimal')->label('Harga Kursus')->required(),
                TextInput::make('diskon_price')->numeric()->inputMode('decimal')->label('Harga Diskon')->required()->default(0),
                Select::make('level')->label('Level')->required()->options(['beginner'=>'Pemula','intermediate'=>'Menengah','advanced'=>'profesional'])->default('beginner'),
                TextInput::make('description')->label('Deskripsi Kursus')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Kursus')->searchable()->sortable(),
                TextColumn::make('agency.name')->label('Lembaga Bahasa')->searchable(),
                TextColumn::make('price')->label('Harga')->sortable(),
                TextColumn::make('level')->label('level')->sortable()

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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
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
