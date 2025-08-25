<?php

namespace App\Filament\Resources\Posts\Pages;

use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Posts\PostResource;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->color('gray')
                ->icon('heroicon-c-arrow-uturn-left')
                ->url($this->getResource()::getUrl('index')),

            DeleteAction::make()
                ->icon('heroicon-o-trash'),
        ];
    }
}
