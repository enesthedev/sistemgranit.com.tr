<?php

use App\Http\Actions\Settings\Password\ChangePassword;
use App\Http\Actions\Settings\Password\ShowPasswordEditPage;
use App\Http\Actions\Settings\Profile\DeleteAccount;
use App\Http\Actions\Settings\Profile\ShowProfileEditPage;
use App\Http\Actions\Settings\Profile\UpdateProfile;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::translateGroup([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
], function () {
    Route::get('/', function () {
        return Inertia::render('dashboard');
    })
        ->name('index')
        ->translate();

    Route::get('profile', ShowProfileEditPage::class)
        ->name('profile.edit')
        ->translate();

    Route::patch('profile', UpdateProfile::class)
        ->name('profile.update')
        ->translate();

    Route::delete('profile', DeleteAccount::class)
        ->name('profile.destroy')
        ->translate();

    Route::get('change-password', ShowPasswordEditPage::class)->name('password.edit');
    Route::put('change-password', ChangePassword::class)->name('password.update');

    Route::get('appearance', function () {
        return Inertia::render('settings/appearance');
    })->name('appearance');
});
