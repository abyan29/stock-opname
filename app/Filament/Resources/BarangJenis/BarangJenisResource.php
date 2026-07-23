<?php

namespace App\Filament\Resources\BarangJenis;

use App\Filament\Resources\BarangJenis\Pages\CreateBarangJenis;
use App\Filament\Resources\BarangJenis\Pages\EditBarangJenis;
use App\Filament\Resources\BarangJenis\Pages\ListBarangJenis;
use App\Filament\Resources\BarangJenis\Schemas\BarangJenisForm;
use App\Filament\Resources\BarangJenis\Tables\BarangJenisTable;
use App\Models\BarangJenis;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class BarangJenisResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 3;

    protected static ?string $model = BarangJenis::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return BarangJenisForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BarangJenisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBarangJenis::route('/'),
            'create' => CreateBarangJenis::route('/create'),
            'edit' => EditBarangJenis::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
