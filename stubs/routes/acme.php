<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::view('', 'acme.login')
            ->name('login');
        Route::post('', LoginController::class);
    });
    Route::prefix('register')->group(function () {
        Route::view('', 'acme.register')
            ->name('register');
        Route::post('', RegisterController::class);
    });
    Route::prefix('password/recovery')->group(function () {
        Route::view('', 'acme.forgot-password')
            ->name('password.request');
        Route::post('', PasswordRecoveryController::class);
    });
    Route::prefix('password/reset')->group(function () {
        Route::view('{token}', 'acme.reset-password')
            ->name('password.reset');
        Route::post('', PasswordResetController::class)
            ->name('password.update');
    });
});

Route::post('logout', LogoutController::class)->name('logout');

Route::middleware('acme')->group(function () {
    Route::prefix('email/verify')->group(function () {
        Route::view('', 'acme.verify-email')
            ->name('verification.notice');
        Route::post('', [EmailVerifyController::class, 'resend'])
            ->middleware('throttle:6,1')
            ->name('verification.send');
        Route::get('{id}/{hash}', [EmailVerifyController::class, 'handler'])
            ->middleware(['signed'])
            ->name('verification.verify');
    });
    Route::prefix('user/profile')->group(function () {
        Route::view('', 'acme.profile-information')
            ->name('user-profile');
        Route::put('/basic', [UserProfileController::class, 'basicDetails'])
            ->name('user-profile.basics-details');
        Route::put('/password', [UserProfileController::class, 'changePassword'])
            ->name('user-profile.change-password');
    });
});
