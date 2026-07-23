<?php

namespace App\Filament\Resources\MasterStocks;

use App\Filament\Resources\MasterStocks\Pages\CreateMasterStock;
use App\Filament\Resources\MasterStocks\Pages\EditMasterStock;
use App\Filament\Resources\MasterStocks\Pages\ListMasterStocks;
use App\Filament\Resources\MasterStocks\Pages\ViewMasterStock;
use App\Filament\Resources\MasterStocks\Schemas\MasterStockForm;
use App\Filament\Resources\MasterStocks\Schemas\MasterStockInfolist;
use App\Filament\Resources\MasterStocks\Tables\MasterStocksTable;
use App\Models\MasterStock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class MasterStockResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 4;

    protected static ?string $model = MasterStock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MasterStockForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MasterStockInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterStocksTable::configure($table);
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
            'index' => ListMasterStocks::route('/'),
            'create' => CreateMasterStock::route('/create'),
            'view' => ViewMasterStock::route('/{record}'),
            'edit' => EditMasterStock::route('/{record}/edit'),
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
