<?php

namespace App\Filament\Resources\Users\Schemas;

use App\UserRole;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Select::make('role')
                    ->label('Role')
                    ->options(UserRole::options())
                    ->default(UserRole::ADMIN->value)
                    ->required(fn (): bool => auth()->user()?->isSuperadmin() ?? false)
                    ->visible(fn (): bool => auth()->user()?->isSuperadmin() ?? false),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->autocomplete('new-password')
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->minLength(1),
            ])
            ->columns(2);
    }
}
