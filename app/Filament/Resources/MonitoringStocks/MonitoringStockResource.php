<?php

namespace App\Filament\Resources\MonitoringStocks;

use App\Filament\Resources\MonitoringStocks\Pages\CreateMonitoringStock;
use App\Filament\Resources\MonitoringStocks\Pages\EditMonitoringStock;
use App\Filament\Resources\MonitoringStocks\Pages\ListMonitoringStocks;
use App\Filament\Resources\MonitoringStocks\Schemas\MonitoringStockForm;
use App\Filament\Resources\MonitoringStocks\Tables\MonitoringStocksTable;
use App\Models\MasterStock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
use Illuminate\Database\Eloquent\Builder;

class MonitoringStockResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Monitoring';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Monitoring Stock';

    protected static ?string $modelLabel = 'Monitoring Stock';

    protected static ?string $pluralModelLabel = 'Monitoring Stock';

    protected static ?string $model = MasterStock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereIn('id', function ($query) {

                $query->selectRaw('MIN(id)')
                    ->from('master_stock')
                    ->whereNull('deleted_at')
                    ->groupBy('barang_id');

            });
    }

    public static function form(Schema $schema): Schema
    {
        return MonitoringStockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MonitoringStocksTable::configure($table);
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
            'index' => ListMonitoringStocks::route('/'),
            // 'create' => CreateMonitoringStock::route('/create'),
            // 'edit' => EditMonitoringStock::route('/{record}/edit'),
        ];
    }
}
