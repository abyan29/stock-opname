<?php

namespace App\Filament\Resources\LaporanStocks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class LaporanStocksTable
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
                    ->sortable(),

                TextColumn::make('batch')
                    ->label('Batch'),

                TextColumn::make('jumlah_satuan_kecil')
                    ->label('Jumlah')
                    ->sortable()
                    ->numeric(),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->sortable()
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([
                SelectFilter::make('bagian_id')
                    ->label('Bagian')
                    ->relationship('bagian', 'nama')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('barang_id')
                    ->label('Barang')
                    ->relationship('barang', 'nama')
                    ->searchable()
                    ->preload(),

                Filter::make('tanggal')
                    ->label('Rentang Tanggal')
                    ->form([
                        DatePicker::make('tanggal_awal')
                            ->label('Tanggal Awal'),

                        DatePicker::make('tanggal_akhir')
                            ->label('Tanggal Akhir'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['tanggal_awal'],
                                fn (Builder $query, $date) =>
                                    $query->whereDate('updated_at', '>=', $date),
                            )
                            ->when(
                                $data['tanggal_akhir'],
                                fn (Builder $query, $date) =>
                                    $query->whereDate('updated_at', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                //     ForceDeleteBulkAction::make(),
                //     RestoreBulkAction::make(),
                // ]),
            ]);
    }
}
