<?php

namespace App\Filament\Resources\StockOpnames\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StockOpnamesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bagian.nama')
                    ->label('Bagian')
                    ->searchable(),

                TextColumn::make('barang.nama')
                    ->label('Nama Barang')
                    ->searchable(),

                TextColumn::make('batch')
                    ->label('Batch'),   
                
                TextColumn::make('kadaluwarsa')
                    ->label('Kadaluwarsa')
                    ->date(),

                TextColumn::make('jumlah_satuan_kecil')
                    ->label('Stok Sistem')
                    ->sortable(),
                
                
                
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Stock Opname'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
