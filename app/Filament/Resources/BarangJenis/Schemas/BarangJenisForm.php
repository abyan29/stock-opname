<?php

namespace App\Filament\Resources\BarangJenis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BarangJenisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                Select::make('kategori')
                    ->required()
                    ->options([
                        'Medis' => 'Medis',
                        'Non-Medis' => 'Non-Medis',
                    ]),
            ]);
    }
}
