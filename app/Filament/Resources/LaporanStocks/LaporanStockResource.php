<?php

namespace App\Filament\Resources\LaporanStocks;

use App\Filament\Resources\LaporanStocks\Pages\CreateLaporanStock;
use App\Filament\Resources\LaporanStocks\Pages\EditLaporanStock;
use App\Filament\Resources\LaporanStocks\Pages\ListLaporanStocks;
use App\Filament\Resources\LaporanStocks\Schemas\LaporanStockForm;
use App\Filament\Resources\LaporanStocks\Tables\LaporanStocksTable;
use App\Models\LaporanStock;
use App\Models\MasterStock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanStockResource extends Resource
{
    protected static ?string $navigationLabel = 'Laporan';
    protected static ?string $modelLabel = 'Laporan';
    
    protected static ?string $title = 'Laporan';

    protected static ?string $model = MasterStock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentChartBar;

    protected static ?string $recordTitleAttribute = 'MasterStock';

    public static function form(Schema $schema): Schema
    {
        return LaporanStockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LaporanStocksTable::configure($table);
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
            'index' => ListLaporanStocks::route('/'),
            // 'create' => CreateLaporanStock::route('/create'),
            // 'edit' => EditLaporanStock::route('/{record}/edit'),
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
