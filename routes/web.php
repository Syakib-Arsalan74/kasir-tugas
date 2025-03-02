<?php

use App\Models\Penjualan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('home');
})->name('home');

route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login')->middleware('guest');
Route::post('/login/submit', [AuthController::class, 'login'])->name('submit.login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [AuthController::class, 'viewForgotPassword'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'viewResetPassword'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update')->middleware('guest');
Route::get('/register', [AuthController::class, 'viewRegister'])->name('register')->middleware('guest');
Route::post('/register/submit', [AuthController::class, 'register'])->name('submit.register')->middleware('guest');

Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan')->middleware('auth');
Route::post('/penjualan', [PenjualanController::class, 'store'])->name('tambah.penjualan')->middleware('auth');

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna')->middleware('auth');
Route::post('/pengguna', [PenggunaController::class, 'createPengguna'])->name('tambah.pengguna')->middleware('auth');
Route::get('/pengguna/{pengguna}/edit', [PenggunaController::class, 'editPengguna'])->name('edit.pengguna')->middleware('auth');
Route::put('/pengguna/{pengguna}', [PenggunaController::class, 'updatePengguna'])->name('update.pengguna')->middleware('auth');
Route::delete('/pengguna/{pengguna}', [PenggunaController::class, 'destroyPengguna'])->name('hapus.pengguna')->middleware('auth');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan')->middleware('auth');
Route::post('/pelanggan', [PelangganController::class, 'createPelanggan'])->name('tambah.pelanggan')->middleware('auth');
Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'editPelanggan'])->name('edit.pelanggan')->middleware('auth');
Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'updatePelanggan'])->name('update.pelanggan')->middleware('auth');
Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroyPelanggan'])->name('hapus.pelanggan')->middleware('auth');

Route::get('/product', [ProductController::class, 'index'])->name('product')->middleware('auth');
Route::post('/product', [ProductController::class, 'createProduk'])->name('tambah.product')->middleware('auth');
Route::get('/product/{product}/edit', [ProductController::class, 'editProduk'])->name('edit.product')->middleware('auth');
Route::put('/product/{product}', [ProductController::class, 'updateProduk'])->name('update.product')->middleware('auth');
route::delete('/product/{product}', [ProductController::class, 'destroyProduk'])->name('hapus.product')->middleware('auth');

Route::get('/penjualan/Download-pdf', [PdfController::class, 'generatePDf']);
