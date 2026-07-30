<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\LaporanStockController;

Route::get('/laporan-stock/pdf', [LaporanStockController::class, 'pdf'])
    ->name('laporan.stock.pdf');
Route::get('/scanner', [ScannerController::class, 'index'])
    ->name('scanner');
Route::get('/', function () {
    return view('welcome');
});
