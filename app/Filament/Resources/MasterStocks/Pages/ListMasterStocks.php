<?php

namespace App\Filament\Resources\MasterStocks\Pages;

use App\Filament\Resources\MasterStocks\MasterStockResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterStocks extends ListRecords
{
    protected static string $resource = MasterStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
