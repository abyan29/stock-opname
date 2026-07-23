<?php

namespace App\Filament\Resources\MonitoringStocks\Pages;

use App\Filament\Resources\MonitoringStocks\MonitoringStockResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMonitoringStock extends EditRecord
{
    protected static string $resource = MonitoringStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
