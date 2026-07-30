<?php

namespace App\Filament\Resources\LaporanStocks\Pages;

use App\Filament\Resources\LaporanStocks\LaporanStockResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditLaporanStock extends EditRecord
{
    protected static string $resource = LaporanStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
