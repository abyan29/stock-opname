<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\MasterStock;
use Filament\Tables\Columns\TextColumn;

class RecentStockActivity extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => MasterStock::query())
            ->columns([
                TextColumn::make('barang.nama')
                    ->label('Barang')
                    ->grow()
                    ->searchable(),

                TextColumn::make('bagian.nama')
                    ->grow()
                    ->label('Bagian'),

                TextColumn::make('jumlah_satuan_kecil')
                    ->label('Jumlah'),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
