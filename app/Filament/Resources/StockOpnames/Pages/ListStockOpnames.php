<?php

namespace App\Filament\Resources\StockOpnames\Pages;

use App\Filament\Resources\StockOpnames\StockOpnameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use App\Models\MasterStock;
use App\Models\StockOpname;
use Filament\Notifications\Notification;

class ListStockOpnames extends ListRecords
{
    protected static string $resource = StockOpnameResource::class;

    protected function getHeaderActions(): array
    {
        return [
        Action::make('print')
            ->label('Cetak Laporan')
            ->icon('heroicon-o-printer')
            ->form([
        DatePicker::make('tanggal')
            ->label('Tanggal')
            ->required()
            ->default(now()),
    ])
    ->action(function (array $data) {

        return redirect()->route(
            'stock-opname.report',
            [
                'tanggal' => $data['tanggal'],
            ]
        );

    }),
            Action::make('finalisasi')
                ->label('Finalisasi')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Finalisasi Stock Opname')
                ->modalDescription('Stok pada Master Stock akan diperbarui sesuai hasil stock opname.')
                ->form([
                    DatePicker::make('tanggal')
                        ->label('Tanggal Stock Opname')
                        ->required()
                        ->default(now()),
                ])
                ->action(function (array $data) {

                    $stockOpnames = StockOpname::whereDate('created_at', $data['tanggal'])->get();

                    foreach ($stockOpnames as $opname) {

                        $masterStock = MasterStock::where('barang_id', $opname->barang_id)
                            ->where('bagian_id', $opname->bagian_id)
                            ->where('batch', $opname->batch)
                            ->first();

                        if ($masterStock) {
                            $masterStock->update([
                                'jumlah_satuan_kecil' => $opname->stok_fisik,
                            ]);
                        }
                    }

                    Notification::make()
                        ->title('Finalisasi berhasil')
                        ->body('Master Stock berhasil diperbarui.')
                        ->success()
                        ->send();

                }),
            CreateAction::make(),
        ];
    }
}
