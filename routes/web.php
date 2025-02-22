<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

route::get('/dashboard', [PanelController::class, 'viewDashboard'])->name('dashboard')->middleware('auth');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login')->middleware('guest');
Route::post('/login/submit', [AuthController::class, 'login'])->name('submit.login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [AuthController::class, 'viewForgotPassword'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'viewResetPassword'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update')->middleware('guest');

Route::get('/register', [AuthController::class, 'viewRegister'])->name('register')->middleware('guest');
Route::post('/register/submit', [AuthController::class, 'register'])->name('submit.register')->middleware('guest');


Route::get('/penjualan', [PanelController::class, 'viewPenjualan'])->name('penjualan')->middleware('auth');
Route::get('/pengguna', [PanelController::class, 'viewPengguna'])->name('pengguna')->middleware('auth');
Route::get('/pelanggan', [PanelController::class, 'viewPelanggan'])->name('pelanggan')->middleware('auth');
Route::get('/product', [PanelController::class, 'viewProduct'])->name('product')->middleware('auth');
