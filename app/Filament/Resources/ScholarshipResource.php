<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScholarshipResource\Pages;
use App\Filament\Resources\ScholarshipResource\RelationManagers;
use App\Filament\Resources\ScholarshipResource\RelationManagers\ScolarshipDetailRelationManager;
use App\Models\Scholarship;
use App\Models\ScholarshipDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Tabs;

class ScholarshipResource extends Resource
{
  protected static ?string $model = Scholarship::class;

  protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
  protected static ?string $navigationGroup = 'Lembaga Bahasa';


  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Tabs::make('Scholarship Form')
          ->tabs([
            Tabs\Tab::make('Informasi')
              ->schema([
                TextInput::make('title')->required(),
                Select::make('course_id')
                  ->relationship('course', 'name')
                  ->label('Course terkait')
                  ->required(),
                DatePicker::make('deadline')->required(),
                Select::make('status')
                  ->options([
                    'open' => 'Open',
                    'closed' => 'Closed',
                  ])
                  ->default('open')
                  ->required(),
              ]),

            Tabs\Tab::make('Deskripsi')
              ->schema([
                RichEditor::make('description'),
              ]),

            Tabs\Tab::make('Kriteria')
              ->schema([
                Repeater::make('requirements')
                  ->schema([
                    TextInput::make('value')->label('Persyaratan'),
                  ])->defaultItems(1),
                Repeater::make('benefits')
                  ->schema([
                    TextInput::make('value')->label('Benefit'),
                  ])->defaultItems(1),
              ]),

            Tabs\Tab::make('Kuota')
              ->schema([
                TextInput::make('slots_available')->numeric()->minValue(1),
              ]),
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')->searchable(),
        TextColumn::make('course.name')->label('Course'),
        TextColumn::make('deadline')->date(),
        BadgeColumn::make('status')
          ->colors([
            'primary' => 'open',
            'danger' => 'closed',
          ]),
        TextColumn::make('slots_available'),
        TextColumn::make('applications_count')->label('Terisi')->counts('applications'),
      ])
      ->filters([
        Tables\Filters\TrashedFilter::make(),
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\ViewAction::make(),
        Tables\Actions\Action::make('tutupBeasiswa')
          ->label('Tutup')
          ->visible(fn(Scholarship $record) => $record->status === 'open')
          ->color('danger')
          ->requiresConfirmation()
          ->action(fn(Scholarship $record) => $record->update(['status' => 'closed'])),

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
      ScolarshipDetailRelationManager::class,
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListScholarships::route('/'),
      'create' => Pages\CreateScholarship::route('/create'),
      'edit' => Pages\EditScholarship::route('/{record}/edit'),
    ];
  }

  public static function getEloquentQuery(): Builder
  {
    return parent::getEloquentQuery()
      ->withoutGlobalScopes([
        SoftDeletingScope::class,
      ]);
  }

  public static function canAccess(): bool
  {
    return auth()->user()?->hasAnyRole(['admin', 'agency']);
  }
}