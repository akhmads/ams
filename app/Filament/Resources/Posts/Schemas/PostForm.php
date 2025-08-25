<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Post;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Set;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock;

class PostForm
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
                        TextInput::make('title')
                            ->columnSpanFull()
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->columnSpanFull()
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->customBlocks([
                                HeroBlock::class,
                            ]),

                    ]),

                Section::make()
                    ->columns(1)
                    ->schema([
                        DatePicker::make('published_at')
                            ->required(),
                    ]),
            ]);
    }
}
