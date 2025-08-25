<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('password')
                    ->password()
                    // Only save the password if it has been filled
                    ->dehydrated(fn ($state) => filled($state))
                    // Optionally, hash the password when it's filled
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                DateTimePicker::make('email_verified_at')
                    ->readonly(),
            ]);
    }
}
