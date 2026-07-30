<?php

namespace App\Filament\Widgets;

// use App\Models\Barang;
// use App\Models\Supplier;
// use App\Models\Produsen;
// use App\Models\Bagian;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;


class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Barang', DB::table('barang')->count()),
            Stat::make('Total Supplier', DB::table('supplier')->count()),
            Stat::make('Total Produsen', DB::table('produsen')->count()),
            Stat::make('Total Bagian', DB::table('bagian')->count()),
        ];
    }
}
