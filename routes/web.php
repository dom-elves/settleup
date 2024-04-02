<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// todo: figure out how middleware, auth etc works
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
