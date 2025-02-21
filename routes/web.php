<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/dashboard', function () {
    return view('kasirPanel.dashboard');
})->name('dashboard');
Route::get('/pengguna', function () {
    return view('kasirPanel.pengguna');
})->name('pengguna');
Route::get('/penjualan', function () {
    return view('kasirPanel.penjualan');
})->name('penjualan');
Route::get('/product', function () {
    return view('kasirPanel.product');
})->name('product');

Route::get('/login', [AuthController::class , 'viewLogin'])->name('login')->middleware('guest');
Route::post('/login/submit', [AuthController::class , 'login'])->name('submit.login')->middleware('guest');

Route::get('/register', [AuthController::class , 'viewRegister'])->name('register')->middleware('guest');
Route::post('/register/submit', [AuthController::class , 'register'])->name('submit.register')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);

