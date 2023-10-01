<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                // DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),
                // Textarea::make('two_factor_secret')
                //     ->maxLength(65535)
                //     ->columnSpanFull(),
                // Textarea::make('two_factor_recovery_codes')
                //     ->maxLength(65535)
                //     ->columnSpanFull(),
                // DateTimePicker::make('two_factor_confirmed_at'),
                // FileUpload::make('profile_photo_path')
                //     ->image()
                //     ->imageEditor(),
                // TextInput::make('banned_status')
                //     ->required()
                //     ->maxLength(255)
                //     ->default('Active'),
                Select::make('banned_status')
                    ->options([
                        '1-Day' => '1-Day',
                        '1-Week' => '1-Week',
                        '1-Month' => '1-Month',
                        'Block' => 'Block',
                        'Active' => 'Active'
                    ])
                    ->default('Active')
                    ->live()
                    ->native(false)
                    ->required()
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        switch ($state) {
                            case ('Block'):
                                $set('banned_time', 'Block');
                                break;
                            case ('1-Day'):
                                $set('banned_time',  Carbon::now()->addDays(1));
                                break;
                            case ('1-Week'):
                                $set('banned_time', Carbon::now()->addDays(7));
                                break;
                            case ('1-Month'):
                                $set('banned_time', Carbon::now()->addDays(30));
                                // return  Carbon::now()->addDays(30);
                                break;
                            default:
                                $set('banned_time', NULL);
                        }
                        return;
                    }),
                // TextInput::make('banned_time'),
                // TextInput::make('wrong_attempt')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_photo_path')
                    ->label('Photo')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('banned_time')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('banned_status')
                    ->label('Status')
                    ->searchable()
                    ->color(fn (string $state): string => match ($state) {
                        'Block' => 'danger',
                        '1-Day' => 'warning',
                        '1-Week' => 'warning',
                        '1-Month' => 'warning',
                        'Active' => 'success',
                    }),
                TextColumn::make('wrong_attempt')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
