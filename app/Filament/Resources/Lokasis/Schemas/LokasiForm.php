<?php

namespace App\Filament\Resources\Lokasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class LokasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('bagian_id')
                    ->label('Bagian')
                    ->relationship('bagian', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('deskripsi')
                    ->required(),
            ]);
    }
}
