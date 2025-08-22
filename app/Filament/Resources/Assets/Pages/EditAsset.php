<?php

namespace App\Filament\Resources\Assets\Pages;

use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Assets\AssetResource;
use Filament\Resources\Pages\Enums\ContentTabPosition;

class EditAsset extends EditRecord
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->color('gray')
                ->icon('heroicon-c-arrow-uturn-left')
                ->url($this->getResource()::getUrl('index')),

            ViewAction::make()
                ->color('success')
                ->icon('heroicon-c-eye'),

            DeleteAction::make()
                ->icon('heroicon-o-trash'),
        ];
    }

    // public function hasCombinedRelationManagerTabsWithContent(): bool
    // {
    //     return true;
    // }
}
