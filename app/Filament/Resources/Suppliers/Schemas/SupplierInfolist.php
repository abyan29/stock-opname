<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use App\Models\Supplier;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SupplierInfolist
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
                    ->visible(fn (Supplier $record): bool => $record->trashed()),
                TextEntry::make('nama'),
                TextEntry::make('pic')
                    ->label('PIC')
                    ->placeholder('-'),
                TextEntry::make('alamat')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('telepon')
                    ->placeholder('-'),
                TextEntry::make('tanggal_mulai_pks')
                    ->label('Tanggal Mulai PKS')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('tanggal_akhir_pks')
                    ->label('Tanggal Akhir PKS')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('pks_aktif')
                    ->label('File PKS')
                    ->url(fn ($state) => $state ? asset('storage/'.$state) : null)
                    ->openUrlInNewTab()
                    ->placeholder('-'),
            ]);
    }
}
