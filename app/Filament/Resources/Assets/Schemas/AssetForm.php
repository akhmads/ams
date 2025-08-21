<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\RichEditor;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['xl' => 3])
            ->components([

                Section::make()
                    ->columnSpan(['xl' => 2])
                    ->columns(['xl' => 2])
                    ->schema([

                        TextInput::make('code')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Select::make('category_id')
                            ->required()
                            ->relationship('category','name')
                            ->searchable()
                            ->preload()
                            ->optionsLimit(20)
                            ->createOptionForm([
                                TextInput::make('name')->required(),
                            ]),

                        Select::make('brand_id')
                            ->relationship('brand','name')
                            ->searchable()
                            ->preload()
                            ->optionsLimit(20)
                            ->createOptionForm([
                                TextInput::make('name')->required(),
                            ]),

                        TextInput::make('model'),
                        TextInput::make('serial_number'),
                        RichEditor::make('description')
                            ->columnSpan(2),

                    ]),

                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor(),
                    ])
            ]);
    }
}
