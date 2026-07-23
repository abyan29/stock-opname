<?php

namespace App\Filament\Resources\MonitoringStocks\Pages;

use App\Filament\Resources\MonitoringStocks\MonitoringStockResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMonitoringStocks extends ListRecords
{
    protected static string $resource = MonitoringStockResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
