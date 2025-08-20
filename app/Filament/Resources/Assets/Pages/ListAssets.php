<?php

namespace App\Filament\Resources\Assets\Pages;

use Filament\Actions\CreateAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Assets\AssetResource;

class ListAssets extends ListRecords
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-m-plus')
                // ->label('Create New Asset')
                // ->mutateDataUsing(function (array $data): array {
                //     dd('tes');
                //     $data['brand_id'] = intval($data['brand_id']);
                //     return $data;
                // })
                // ->successRedirectUrl(route('filament.admin.resources.assets.index'))
                // ->successRedirectUrl(fn (Model $record): string => route('filament.admin.resources.assets.edit', [
                //     'asset' => $record,
                // ])),
        ];
    }
}
