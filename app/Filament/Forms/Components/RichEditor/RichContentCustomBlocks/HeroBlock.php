<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;

class HeroBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'hero';
    }

    public static function getLabel(): string
    {
        return 'Hero section block';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Configure the hero block')
            ->schema([
                TextInput::make('heading')
                    ->required(),
                TextInput::make('subheading')
                    ->required(),
            ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return "Hero section: {$config['heading']}";
    }

    public static function toPreviewHtml(array $config): string
    {
        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.hero.preview', [
            'heading' => $config['heading'],
            'subheading' => $config['subheading'],
        ])->render();
    }

    public static function toHtml(array $config, array $data): string
    {
        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.hero.index', [
            //
        ])->render();
    }
}
