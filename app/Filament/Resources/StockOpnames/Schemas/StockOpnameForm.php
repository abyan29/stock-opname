<?php

namespace App\Filament\Resources\StockOpnames\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;


class StockOpnameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Select::make('barang_id')
                ->relationship('barang', 'nama')
                ->label('Nama Barang')
                ->disabled(fn (string $operation) => $operation === 'edit'),

            TextInput::make('batch')
                ->label('Batch')
                ->disabled(fn (string $operation) => $operation === 'edit'),

            DatePicker::make('kadaluwarsa')
                ->label('Kadaluwarsa')
                ->disabled(fn (string $operation) => $operation === 'edit'),

            TextInput::make('jumlah_satuan_kecil')
                ->label('Jumlah Hasil Stock Opname')
                ->numeric()
                ->required(),
            ]);
    }
}
