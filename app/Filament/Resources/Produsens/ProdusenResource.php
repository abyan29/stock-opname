<?php

namespace App\Filament\Resources\Produsens;

use App\Filament\Resources\Produsens\Pages\CreateProdusen;
use App\Filament\Resources\Produsens\Pages\EditProdusen;
use App\Filament\Resources\Produsens\Pages\ListProdusens;
use App\Filament\Resources\Produsens\Schemas\ProdusenForm;
use App\Filament\Resources\Produsens\Tables\ProdusensTable;
use App\Models\Produsen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ProdusenResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 6;

    protected static ?string $model = Produsen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return ProdusenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProdusensTable::configure($table);
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
            'index' => ListProdusens::route('/'),
            'create' => CreateProdusen::route('/create'),
            'edit' => EditProdusen::route('/{record}/edit'),
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
