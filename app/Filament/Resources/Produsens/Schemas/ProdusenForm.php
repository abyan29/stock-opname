<?php

namespace App\Filament\Resources\Produsens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProdusenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
