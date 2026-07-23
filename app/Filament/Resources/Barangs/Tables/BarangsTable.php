<?php

namespace App\Filament\Resources\Barangs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BarangsTable
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
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('barang_jenis.nama')
                    ->label('Jenis Barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('satuan_besar.nama')
                    ->label('Satuan Besar')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('satuan_kecil.nama')
                    ->label('Satuan Kecil')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('stok_minimal')
                //     ->numeric()
                //     ->sortable()
                //     ->alignRight()
                //     ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.')),
                // TextColumn::make('stok_maksimal')
                //     ->numeric()
                //     ->sortable()
                //     ->alignRight()
                //     ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.')),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
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
