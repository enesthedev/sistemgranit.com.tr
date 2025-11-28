<?php

use App\Http\Actions\Auth\Login;
use App\Http\Actions\Auth\Logout;
use App\Http\Actions\Auth\ShowLoginPage;
use App\Http\Actions\Auth\EmailVerification\SendEmailVerificationNotification;
use App\Http\Actions\Auth\EmailVerification\ShowEmailVerificationPrompt;
use App\Http\Actions\Auth\EmailVerification\VerifyEmail;
use App\Http\Actions\Auth\Password\ConfirmPassword;
use App\Http\Actions\Auth\Password\ResetPassword;
use App\Http\Actions\Auth\Password\SendPasswordResetLink;
use App\Http\Actions\Auth\Password\ShowForgotPasswordPage;
use App\Http\Actions\Auth\Password\ShowPasswordConfirmPage;
use App\Http\Actions\Auth\Password\ShowPasswordResetPage;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', ShowLoginPage::class)
        ->name('login');

    Route::post('login', Login::class);

    Route::get('forgot-password', ShowForgotPasswordPage::class)
        ->name('password.request');

    Route::post('forgot-password', SendPasswordResetLink::class)
        ->name('password.email');

    Route::get('reset-password/{token}', ShowPasswordResetPage::class)
        ->name('password.reset');

    Route::post('reset-password', ResetPassword::class)
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', ShowEmailVerificationPrompt::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmail::class)
        ->name('verification.verify');

    Route::post('email/verification-notification', SendEmailVerificationNotification::class)
        ->name('verification.send');

    Route::get('confirm-password', ShowPasswordConfirmPage::class)
        ->name('password.confirm');

    Route::post('confirm-password', ConfirmPassword::class);

    Route::post('logout', Logout::class)
        ->name('logout');
});
