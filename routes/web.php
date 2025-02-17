<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class , 'viewLogin'])->name('viewLogin')->middleware('guest');
Route::post('/login/submit', [AuthController::class , 'login'])->name('submit.login')->middleware('guest');

Route::get('/register', [AuthController::class , 'viewRegister'])->name('viewRegister')->middleware('guest');
Route::post('/register/submit', [AuthController::class , 'register'])->name('submit.register')->middleware('guest');
