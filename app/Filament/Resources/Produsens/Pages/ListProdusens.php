<?php

namespace App\Filament\Resources\Produsens\Pages;

use App\Filament\Resources\Produsens\ProdusenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProdusens extends ListRecords
{
    protected static string $resource = ProdusenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
