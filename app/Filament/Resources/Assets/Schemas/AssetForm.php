<?php

namespace App\Filament\Resources\Assets\Schemas;

use App\Enums\Condition;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\ToggleButtons;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater\TableColumn;

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

                        ToggleButtons::make('condition')
                            ->inline()
                            ->options(Condition::class)
                            ->required(),

                        RichEditor::make('description')
                            ->columnSpan(2),

                    ]),

                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->imageEditor(),
                            ]),

                        Section::make('Other')
                            ->hiddenOn('create')
                            ->columns(2)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->dateTime(),
                                TextEntry::make('updated_at')
                                    ->dateTime(),
                                TextEntry::make('createdBy.name')
                                    ->label('Created By'),
                                TextEntry::make('updatedBy.name')
                                    ->label('Updated By'),
                            ])
                    ]),

                Section::make()
                    ->columnSpan('full')
                    ->schema([
                        Repeater::make('accesories')
                            ->label('Accesories')
                            ->columnSpan('full')
                            ->relationship()
                            // ->hiddenLabel()
                            ->required()
                            ->defaultItems(1)
                            ->table([
                                TableColumn::make('Name')
                                    ->width('40%'),
                                TableColumn::make('Description'),
                            ])
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('description'),
                            ]),
                    ]),
            ]);
    }
}
