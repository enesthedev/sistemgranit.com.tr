<?php

use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->as('dashboard.')
    ->translate()
    ->group(function () {
        Route::get('/', function () {
            return Inertia::render('dashboard');
        })->name('index');

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('change-password', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('change-password', [PasswordController::class, 'update'])->middleware('throttle:6,1')->name('password.update');

        Route::get('appearance', function () {
            return Inertia::render('settings/appearance');
        })->name('appearance');
    });
