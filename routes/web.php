<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\FrequencyController;

/**
 * All Guest Routes List
 */
Route::get('/', [GuestController::class, 'index'])->name('index');

Auth::routes();

/**
 * All Normal Users Routes List
 */
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'user'])->name('user.home');
    Route::get('/frequency', [FrequencyController::class, 'index'])->name('user.frequency.index');
    Route::post('/frequency', [FrequencyController::class, 'store'])->name('user.frequency.store');
});
/**
 * All Admin Routes List
 */
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
    Route::get('/admin/key', [KeyController::class, 'index'])->name('admin.key.index');
    Route::post('/admin/key', [KeyController::class, 'store'])->name('admin.key.store');
});
