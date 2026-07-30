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
                TextColumn::make('barang.nama')
                    ->label('Barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('bagian.nama')
                    ->label('Bagian')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('batch')
                    ->label('Batch')
                    ->searchable(),

                TextColumn::make('stok_sistem')
                    ->label('Stok Sistem')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('stok_fisik')
                    ->label('Stok Fisik')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('selisih')
                    ->label('Selisih')
                    ->badge()
                    ->sortable()
                    ->color(fn ($state) => match (true) {

                        $state > 0 => 'warning',

                        $state < 0 => 'danger',

                        default => 'success',

                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal Stock Opname')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
