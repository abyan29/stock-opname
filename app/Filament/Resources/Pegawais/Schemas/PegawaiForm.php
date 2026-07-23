<?php

namespace App\Filament\Resources\Pegawais\Schemas;

use App\Models\Bagian;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PegawaiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nip')
                    ->label('Nomor Induk Pegawai')
                    ->numeric(),
                Select::make('bagian_id')
                    ->label('Bagian')
                    ->searchable()
                    ->options(Bagian::pluck('nama', 'id')),
            ]);
    }
}
