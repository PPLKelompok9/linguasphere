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
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;

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
                                ->live(),
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
                            ->afterStateUpdated(function ($state, callable $set) {
                                $course = Course::find($state);
                                if (!$course) return;
    
                                $price = $course->diskon_price && $course->diskon_price > 0
                                    ? $course->diskon_price
                                    : $course->price;
    
                                $subtotal = $price;
                                $totalPpn = $subtotal * 0.11;
                                $totalAmount = $subtotal + $totalPpn;
    
                                $set('price', $price);
                                $set('total_price', $totalAmount);
                                $set('sub_total_amount', $subtotal);
                                $set('total_ppn', $totalPpn);
                                $set('type_products', 'Courses');
                            })
                            ->afterStateHydrated(function ($state, callable $set) {
                                $course = Course::find($state);
                                if (!$course) return;
    
                                $price = $course->diskon_price && $course->diskon_price > 0
                                    ? $course->diskon_price
                                    : $course->price;
    
                                $subtotal = $price;
                                $totalPpn = $subtotal * 0.11;
                                $totalAmount = $subtotal + $totalPpn;
    
                                $set('price', $price);
                                $set('total_price', $totalAmount);
                                $set('sub_total_amount', $subtotal);
                                $set('total_ppn', $totalPpn);
                                $set('type_products', 'Courses');
                            }),
    
                        Grid::make(2)->schema([
                            TextInput::make('price')
                                ->required()
                                ->readOnly()
                                ->prefix('Rp.')
                                ->numeric(),
    
                            TextInput::make('type_products')
                                ->required()
                                ->readOnly(),
    
                            TextInput::make('sub_total_amount')
                                ->required()
                                ->readOnly()
                                ->prefix('Rp.')
                                ->numeric(),
    
                            TextInput::make('total_ppn')
                                ->required()
                                ->readOnly()
                                ->prefix('Rp.')
                                ->numeric()
                                ->helperText('Pajak 11% dari harga barang'),
    
                            TextInput::make('total_price')
                                ->required()
                                ->numeric()
                                ->readOnly()
                                ->prefix('Rp.'),
                        ]),
                    ]),
    
                    Step::make('Information')->schema([
                        Select::make('id_user')
                            ->label('Customer')
                            ->relationship(
                                name: 'user',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn ($query) => $query->where('role', 'student')
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $user = User::find($state);
                                if (!$user) return;
    
                                $set('name', $user->name);
                                $set('email', $user->email);
                            })->afterStateHydrated(function ($state, callable $set) {
                                $user = User::find($state);
                                if (!$user) return;
                                $set('name', $user->name);
                                $set('email', $user->email);
                            }),
    
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->readOnly()
                                ->required()
                                ->maxLength(255),
    
                            TextInput::make('email')
                                ->readOnly()
                                ->required()
                                ->maxLength(255),
                        ]),
                    ]),
    
                    Step::make('Payment')->schema([
                        ToggleButtons::make('status_payment')
                            ->label('Apakah Sudah Membayar?')
                            ->boolean()
                            ->grouped()
                            ->required(),
    
                        Select::make('type_payment')
                            ->options([
                                'Midtrans' => 'Midtrans',
                                'Manual' => 'Manual',
                            ])
                            ->required(),
                    ]),
                ])
                    ->columnSpan('full')
                    ->skippable(),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->searchable(),
                TextColumn::make('course.name')->searchable()->label('Kursus'),
                TextColumn::make('agencies.name')->searchable()->label('Lembaga Bahasa'),
                TextColumn::make('total_price')->label('Total Bayar')->prefix('Rp.'),
                Tables\Columns\IconColumn::make('status_payment')->boolean()->trueColor('success')->falseColor('danger')->label('Terverifikasi')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('approve')->label('Approve')->action(function(Transaction $record){
                    $record->status_payment = true;
                    $record->save();
                    Notification::make()->title('Transaksi Diterima')->success()->body('Transaksi Telah Diterima')->send();
                })->color('success')->requiresConfirmation()->visible(fn (Transaction $record) => !$record->status_payment),
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

    public static function canAccess(): bool
{
    return auth()->user()?->hasAnyRole('admin');
}
}
