<?php

namespace App\Filament\Resources\Users\Pages;

use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Users\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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
