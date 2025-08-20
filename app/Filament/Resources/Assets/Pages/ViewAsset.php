<?php

namespace App\Filament\Resources\Assets\Pages;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Assets\AssetResource;

class ViewAsset extends ViewRecord
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back')
                ->color('gray')
                ->icon('heroicon-m-arrow-uturn-left')
                ->url(route('filament.admin.resources.assets.index')),

            EditAction::make()
                ->icon('heroicon-m-pencil-square'),
        ];
    }
}
