<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home-page');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::post('/toggle-dark-mode', [UserConfigController::class, 'toggleDarkMode']);
    Route::post('/fullScreen-mode', [UserConfigController::class, 'fullScreenMode']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
