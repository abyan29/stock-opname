<?php

namespace App\Filament\Resources\Bagians\Schemas;

use App\Models\Bagian;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BagianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                Select::make('referensi_id')
                    ->label('Referensi')
                    ->searchable()
                    ->options(Bagian::pluck('nama', 'id')),
            ]);
    }
}
