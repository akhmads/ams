<?php

namespace App\Filament\Resources\Assets\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Assets\AssetResource;

class CreateAsset extends CreateRecord
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->color('gray')
                ->url(route('filament.admin.resources.assets.index')),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['brand_id'] = intval($data['brand_id']);
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }

    /*protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            (static::canCreateAnother() ? $this->getCreateAnotherFormAction() : null),

            // $this->getSaveFormAction()
            // $this->getCancelFormAction(),

            Action::make('cancel')
                ->label('Cancel')
                ->color('gray')
                ->url(route('filament.admin.resources.assets.index')),
        ];
    }*/
}
