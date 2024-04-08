<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;

Route::view('/', 'welcome')->name('login');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



// todo: figure out how middleware, auth etc works
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// groups
Route::get('/group/{name}', [GroupController::class, 'index'])->name('group');

require __DIR__.'/auth.php';
