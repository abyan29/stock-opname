<?php

namespace App\Filament\Resources\Bagians\Pages;

use App\Filament\Resources\Bagians\BagianResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBagian extends EditRecord
{
    protected static string $resource = BagianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
