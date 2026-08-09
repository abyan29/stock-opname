<?php

namespace App\Filament\Resources\MasterStocks\Schemas;

use App\Models\Bagian;
use App\Models\Barang;
use App\Models\Produsen;
use App\Models\Satuan;
use App\Models\Supplier;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MasterStockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('bagian_id')
                    ->label('Bagian')
                    ->required()
                    // ->disabled(fn ($context) => $context === 'edit')
                    ->options(Bagian::pluck('nama', 'id')),
                Select::make('barang_id')
                    ->label('Barang')
                    ->searchable()
                    ->required()
                    // ->disabled(fn ($context) => $context === 'edit')
                    ->options(Barang::pluck('nama', 'id')),
                Select::make('supplier_id')
                    ->label('Supplier')
                    ->required()
                    // ->disabled(fn ($context) => $context === 'edit')
                    ->options(Supplier::pluck('nama', 'id')),
                Select::make('produsen_id')
                    ->label('Produsen')
                    ->required()
                    // ->disabled(fn ($context) => $context === 'edit')
                    ->options(Produsen::pluck('nama', 'id')),
                TextInput::make('jumlah_satuan_kecil')
                    ->label('Jumlah Satuan')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('satuan_id_kecil')
                    ->label('Satuan')
                    ->required()
                    // ->disabled(fn ($context) => $context === 'edit')
                    ->options(Satuan::pluck('nama', 'id')),
                TextInput::make('batch'),
                    // ->disabled(fn ($context) => $context === 'edit')
                DatePicker::make('kadaluwarsa')
                    ->disabled(fn ($context) => $context === 'edit'),
                TextInput::make('harga_beli')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled(fn ($context) => $context === 'edit')
                    ->default(0),
                TextInput::make('harga_jual')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled(fn ($context) => $context === 'edit')
                    ->default(0),
            ]);
    }
}
