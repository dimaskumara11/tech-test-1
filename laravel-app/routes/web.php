<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('theme', [ThemeController::class, 'index'])->name('theme.index');
    Route::post('theme', [ThemeController::class, 'update'])->name('theme.update');
});
