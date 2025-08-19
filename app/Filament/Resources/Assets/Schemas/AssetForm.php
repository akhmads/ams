<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required()
                    ->unique(ignoreRecord: false),
                TextInput::make('name')
                    ->required(),
                Select::make('category_id')
                    ->required()
                    ->relationship('category','name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ]),
                Select::make('brand_id')
                    ->relationship('brand','name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ]),
                TextInput::make('model'),
                TextInput::make('serial_number'),
                TextInput::make('description'),
            ]);
    }
}
