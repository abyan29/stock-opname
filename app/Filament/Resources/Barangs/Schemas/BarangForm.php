<?php

namespace App\Filament\Resources\Barangs\Schemas;

use App\Models\BarangJenis;
use App\Models\Satuan;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                Select::make('barang_jenis_id')
                    ->required()
                    ->label('Jenis Barang')
                    ->searchable()
                    ->options(function () {
                        return BarangJenis::all()->pluck('nama', 'id');
                    }),
                Select::make('satuan_id_besar')
                    ->required()
                    ->label('Satuan Besar')
                    ->searchable()
                    ->options(function () {
                        return Satuan::all()->pluck('nama', 'id');
                    }),
                Select::make('satuan_id_kecil')
                    ->required()
                    ->label('Satuan Kecil')
                    ->searchable()
                    ->options(function () {
                        return Satuan::all()->pluck('nama', 'id');
                    }),
                TextInput::make('stok_minimal')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('stok_maksimal')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
