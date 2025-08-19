<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class AssetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                Section::make('Info')
                    ->columns(2)
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextEntry::make('code'),
                        TextEntry::make('name'),
                        TextEntry::make('category.name')
                            ->numeric(),
                        TextEntry::make('brand.name')
                            ->numeric(),
                        TextEntry::make('model'),
                        TextEntry::make('serial_number'),
                        // TextEntry::make('description'),
                        // TextEntry::make('created_at')
                        //     ->dateTime(),
                        // TextEntry::make('updated_at')
                        //     ->dateTime(),
                    ]),

                Section::make('Other')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('description')->columnSpan(2)->html(true),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ])
            ]);
    }
}
