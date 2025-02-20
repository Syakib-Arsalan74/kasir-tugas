<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);