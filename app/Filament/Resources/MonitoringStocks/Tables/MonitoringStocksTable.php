<?php

namespace App\Filament\Resources\MonitoringStocks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MonitoringStocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang.nama')
                    ->label('Nama Barang')
                    ->searchable(),

                TextColumn::make('jumlah_satuan_kecil')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('barang.stok_minimal')
                    ->label('Stok Minimal'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->state(function ($record) {

                        if ($record->jumlah_satuan_kecil == 0) {
                            return 'Stok Habis';
                        }

                        if ($record->jumlah_satuan_kecil <= $record->stok_minimal) {
                            return 'Stok Menipis';
                        }

                        return 'Stok Aman';
                    })
                    ->color(function ($record) {

                        if ($record->jumlah_satuan_kecil == 0) {
                            return 'danger';
                        }

                        if ($record->jumlah_satuan_kecil <= $record->stok_minimal) {
                            return 'warning';
                        }

                        return 'success';
                    }),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->state(function ($record) {

                        if ($record->jumlah_satuan_kecil == 0) {
                            return 'Segera lakukan restock.';
                        }

                        if ($record->jumlah_satuan_kecil <= $record->stok_minimal) {
                            return 'Persediaan hampir habis.';
                        }

                        return 'Persediaan masih mencukupi.';
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
