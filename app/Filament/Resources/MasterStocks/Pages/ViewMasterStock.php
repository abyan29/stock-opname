<?php

namespace App\Filament\Resources\MasterStocks\Pages;

use App\Filament\Resources\MasterStocks\MasterStockResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMasterStock extends ViewRecord
{
    protected static string $resource = MasterStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
