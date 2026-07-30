<?php

namespace App\Filament\Resources\MasterStocks\Schemas;

use App\Models\MasterStock;
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Schema;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MasterStockInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (MasterStock $record): bool => $record->trashed()),
                TextEntry::make('bagian.nama')
                    ->label('Bagian'),
                TextEntry::make('barang.nama')
                    ->label('Barang'),
                TextEntry::make('supplier.nama')
                    ->label('Supplier'),
                TextEntry::make('produsen.nama')
                    ->label('Produsen'),
                TextEntry::make('jumlah_satuan_kecil')
                    ->numeric(),
                TextEntry::make('satuan.nama')
                    ->label('Satuan Kecil'),
                TextEntry::make('batch')
                    ->placeholder('-'),
                TextEntry::make('lokasi')
                    ->placeholder('-'),
                TextEntry::make('kadaluwarsa')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('harga_beli')
                    ->prefix('Rp ')
                    ->numeric(),
                TextEntry::make('harga_jual')
                    ->prefix('Rp ')
                    ->numeric(),
                Actions::make([
                    Action::make('generate_qr')
                        ->label('Generate QR Code')
                        ->icon('heroicon-o-qr-code')
                        ->modalHeading('QR Code MasterStock')
                        ->modalContent(function (MasterStock $record) {
                            $url = url("/scm/stock-opnames/create?barang_id=$record->barang_id&batch=$record->batch&bagian_id=$record->bagian_id");
                            $qr = QrCode::size(200)->generate($url);

                            return view('components.qr-code', ['qr' => $qr, 'record' => $record]);
                        })
                        ->modalSubmitAction(false)
                        ->modalCancelAction(false),
                ]),
            ]);
    }
}
