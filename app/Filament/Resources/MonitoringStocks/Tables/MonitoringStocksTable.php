<?php

namespace App\Filament\Resources\MonitoringStocks\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class MonitoringStocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('barang.nama')
                    ->label('Nama Barang')
                    ->searchable(),

                TextColumn::make('total_stok')
                    ->label('Total Stok')
                    ->state(function ($record) {

                        return DB::table('master_stock')
                            ->where('barang_id', $record->barang_id)
                            ->whereNull('deleted_at')
                            ->sum('jumlah_satuan_kecil');

                    })
                    ->numeric(),

                TextColumn::make('barang.stok_minimal')
                    ->label('Stok Minimal')
                    ->numeric(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->state(function ($record) {

                        $totalStok = DB::table('master_stock')
                            ->where('barang_id', $record->barang_id)
                            ->whereNull('deleted_at')
                            ->sum('jumlah_satuan_kecil');


                        if ($totalStok <= 0) {
                            return 'Stok Habis';
                        }


                        if ($totalStok <= $record->barang->stok_minimal) {
                            return 'Stok Menipis';
                        }


                        return 'Stok Aman';

                    })
                    ->color(function ($record) {

                        $totalStok = DB::table('master_stock')
                            ->where('barang_id', $record->barang_id)
                            ->whereNull('deleted_at')
                            ->sum('jumlah_satuan_kecil');


                        if ($totalStok <= 0) {
                            return 'danger';
                        }


                        if ($totalStok <= $record->barang->stok_minimal) {
                            return 'warning';
                        }


                        return 'success';

                    }),

                TextColumn::make('kadaluwarsa')
                    ->date()
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->state(function ($record) {

                        $totalStok = DB::table('master_stock')
                            ->where('barang_id', $record->barang_id)
                            ->whereNull('deleted_at')
                            ->sum('jumlah_satuan_kecil');


                        if ($totalStok <= 0) {
                            return 'Segera lakukan restock.';
                        }


                        if ($totalStok <= $record->barang->stok_minimal) {
                            return 'Persediaan hampir habis.';
                        }


                        return 'Persediaan masih mencukupi.';

                    }),

            ])

            ->filters([
                //
            ])

            ->recordActions([
                //
            ])

            ->toolbarActions([]);
    }
}