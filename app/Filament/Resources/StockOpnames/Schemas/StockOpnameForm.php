<?php

namespace App\Filament\Resources\StockOpnames\Schemas;

use App\Models\MasterStock;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StockOpnameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([


            Select::make('barang_id')
                ->label('Barang')
                ->relationship('barang', 'nama')
                ->searchable()
                ->preload()
                ->required()
                ->live()
                ->default($_GET['barang_id'] ?? null)
                ->afterStateUpdated(function ($set) {

                    $set('batch', null);
                    $set('stok_sistem', null);
                    $set('selisih', null);

                }),



            Select::make('batch')
                ->label('Batch')
                ->default($_GET['batch'] ?? null)
                ->options(function ($get) {


                    if (!$get('barang_id')) {
                        return [];
                    }


                    return MasterStock::where(
                        'barang_id',
                        $get('barang_id')
                    )
                    ->pluck('batch', 'batch');


                })
                ->searchable()
                ->required()
                ->live()
                ->afterStateHydrated(function ($state, $set, $get) {

                    if (!$state || !$get('barang_id')) {
                        return;
                    }

                    $stock = MasterStock::where('barang_id', $get('barang_id'))
                        ->where('batch', $state)
                        ->first();

                    if ($stock) {
                        $set('stok_sistem', $stock->jumlah_satuan_kecil);
                        $set('bagian_id', $stock->bagian_id);
                    }
                })
                ->afterStateUpdated(function ($state, $set, $get) {

                    $stock = MasterStock::where('barang_id', $get('barang_id'))
                        ->where('batch', $state)
                        ->first();

                    if ($stock) {
                        $set('stok_sistem', $stock->jumlah_satuan_kecil);
                        $set('bagian_id', $stock->bagian_id);
                    }
                }),



            Select::make('bagian_id')
                ->label('Bagian')
                ->relationship('bagian', 'nama')
                ->disabled()
                ->dehydrated()
                ->default($_GET['bagian_id'] ?? null)
                ->required(),



            TextInput::make('stok_sistem')
                ->label('Stok Sistem')
                ->numeric()
                ->disabled()
                ->dehydrated(),



            TextInput::make('stok_fisik')
                ->label('Stok Fisik')
                ->numeric()
                ->required()
                ->live()
                ->afterStateUpdated(function ($state, $get, $set) {


                    $set(
                        'selisih',
                        ($state ?? 0)
                        -
                        ($get('stok_sistem') ?? 0)
                    );


                }),



            TextInput::make('selisih')
                ->label('Selisih')
                ->numeric()
                ->disabled()
                ->dehydrated(),


        ]);
    }
}