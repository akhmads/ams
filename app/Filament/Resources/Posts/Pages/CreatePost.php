<?php

namespace App\Filament\Resources\Posts\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Posts\PostResource;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->color('gray')
                ->icon('heroicon-c-arrow-uturn-left')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    // protected function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    // }
}
