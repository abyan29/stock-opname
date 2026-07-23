<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('pic'),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('telepon')
                    ->tel(),
                DatePicker::make('tanggal_mulai_pks'),
                DatePicker::make('tanggal_akhir_pks'),
                FileUpload::make('pks_aktif')
                    ->label('File PKS')
                    ->disk('public')
                    ->directory('pks')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ])
                    ->maxSize(512000),
            ]);
    }
}
