<?php

namespace App\Filament\Resources\BarangJenis\Pages;

use App\Filament\Resources\BarangJenis\BarangJenisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBarangJenis extends ListRecords
{
    protected static string $resource = BarangJenisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
