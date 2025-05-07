<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use App\Models\Course;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Language Center')->schema([
                        Grid::make(2)->schema([
                            Select::make('id_agency')
                            ->relationship('agencies', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan('full')
                            ->live()
                        ]),
                    ]),

                    Step::make('Courses')->schema([
                        Select::make('id_products')
                            ->label('Course')
                            ->options(function (callable $get) {
                                $agencyId = $get('id_agency');
                                if (!$agencyId) {
                                    return [];
                                }
    
                                return Course::where('id_agency', $agencyId)
                                    ->pluck('name', 'id');
                            })
                            ->required()
                            ->reactive()
                            ->searchable()
                            ->preload()
                            ->disabled(fn (callable $get) => !$get('id_agency'))
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set){
                                $course = Course::find($state);
                                $price = $course->price;
                                $subtotal = $price * $state;
                                $totalppn = $subtotal * 0.11;
                                $totalAmount = $subtotal + $totalppn;
                                $typeProducts = 'courses';
                                $set('total_price', $totalAmount);
                                $set('sub_total_amount', $subtotal);
                                $set('total_ppn', $totalppn);
                                $set('type_products', $typeProducts);
                            }),
                        Grid::make(2)->schema([
                            TextInput::make('type_products')->required()->readOnly(),
                            TextInput::make('sub_total_amount')->required()->readOnly()->prefix('Rp.')->numeric(),
                            TextInput::make('total_ppn')->required()->readOnly()->prefix('Rp.')->numeric()->helperText('Pajak 11% dari harga barang'),
                            TextInput::make('total_price')->required()->numeric()->readOnly()->prefix('Rp.'),
                        ]),
                        
                    ]),

                    Step::make('Information')->schema([
                        Select::make('id_user')->label('Customer')->relationship(name: 'user', titleAttribute:'name', modifyQueryUsing: fn ($query) => $query->where('role', 'student'))->searchable()->preload()->required()->live()
                        ->afterStateUpdated(function($state, callable $set){
                            $user = User::find($state);
                            $name = $user->name;
                            $email = $user->email;
                            $set('name', $name);
                            $set('email', $email);
                        }),
                        Grid::make(2)->schema([
                            TextInput::make('name')->readOnly()->required()->maxLength(255),
                            TextInput::make('email')->readOnly()->required()->maxLength(255),
                        ]),
                    ]),

                    Step::make('Payment')->schema([
                        ToggleButtons::make('status_payment')->label('Apakah Sudah Membayar?')->boolean()->grouped()->required(),
                        Select::make('type_payment')->options(['Midtrans'=>'Midtrasns', 'Manual'=>'Manual',])->required(),
                    ]),
                ])->columnSpan('full')->skippable()
                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
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
