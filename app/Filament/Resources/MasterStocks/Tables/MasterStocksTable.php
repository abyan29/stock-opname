<?php

namespace App\Filament\Resources\MasterStocks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class MasterStocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('bagian.nama')
                    ->label('Bagian')
                    ->sortable(),
                TextColumn::make('barang.nama')
                    ->label('Barang')
                    ->sortable(),
                TextColumn::make('supplier.nama')
                    ->label('Supplier')
                    ->sortable(),
                TextColumn::make('produsen.nama')
                    ->label('Produsen')
                    ->sortable(),
                TextColumn::make('jumlah_satuan_kecil')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('satuan.nama')
                    ->label('Satuan Kecil')
                    ->sortable(),
                TextColumn::make('batch')
                    ->searchable(),
                TextColumn::make('kadaluwarsa')
                    ->date()
                    ->sortable(),
                TextColumn::make('harga_beli')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('harga_jual')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
