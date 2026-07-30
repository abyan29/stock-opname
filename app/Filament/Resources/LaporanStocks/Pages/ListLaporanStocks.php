<?php

namespace App\Filament\Resources\LaporanStocks\Pages;

use App\Filament\Resources\LaporanStocks\LaporanStockResource;
use Filament\Actions\CreateAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class ListLaporanStocks extends ListRecords
{
    // public ?int $bagian = null;

    // public ?int $barang = null;

    // public ?string $tanggal_awal = null;

    // public ?string $tanggal_akhir = null;

    protected static string $resource = LaporanStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('pdf')
                ->label('Cetak PDF')
                ->icon('heroicon-o-printer')
                ->color('success')
                ->form([
                    Select::make('bagian_id')
                        ->label('Bagian')
                        ->relationship('bagian', 'nama'),

                    Select::make('barang_id')
                        ->label('Barang')
                        ->relationship('barang', 'nama'),

                    DatePicker::make('tanggal_awal')
                        ->label('Tanggal Awal'),

                    DatePicker::make('tanggal_akhir')
                        ->label('Tanggal Akhir'),
                ])
                ->action(function (array $data) {
                    return redirect()->route('laporan.stock.pdf', [
                        'bagian_id'      => $data['bagian_id'] ?? null,
                        'barang_id'      => $data['barang_id'] ?? null,
                        'tanggal_awal'   => $data['tanggal_awal'] ?? null,
                        'tanggal_akhir'  => $data['tanggal_akhir'] ?? null,
                    ]);
                }),
        ];
    }
}
