<?php

namespace App\Filament\Resources\BarangJenis\Pages;

use App\Filament\Resources\BarangJenis\BarangJenisResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBarangJenis extends EditRecord
{
    protected static string $resource = BarangJenisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
