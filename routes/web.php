<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\LaporanStockController;
use App\Http\Controllers\StockOpnameReportController;

Route::get('/stock-opname/report',[StockOpnameReportController::class, 'report'])->name('stock-opname.report');
Route::get('/laporan-stock/pdf', [LaporanStockController::class, 'pdf'])
    ->name('laporan.stock.pdf');
Route::get('/scanner', [ScannerController::class, 'index'])
    ->name('scanner');
Route::get('/', function () {
    return view('welcome');
});
