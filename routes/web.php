<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScannerController;

Route::get('/scanner', [ScannerController::class, 'index'])
    ->name('scanner');
Route::get('/', function () {
    return view('welcome');
});
