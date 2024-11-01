<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
                Route::get('staff/Login', [StaffController::class, 'stafflogin'])->name('staff');
                Route::post('staff/Login', [StaffController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
Route::middleware('staff.auth')->group(function () {
    Route::get('staff/Dashboard', [StaffController::class, 'staffDashboard'])->name('staff.Dashboard');
    Route::post('staff/logout', [StaffController::class, 'destroy'])->name('staff.logout');
    Route::get('staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::post('staff/edit/update/{id}',[StaffController::class, 'update'])->name('staff.edit.post');
    Route::get('staff/profile',[StaffController::class, 'profile'])->name('staff.profile');
    Route::get('staff/profile/edit', [StaffController::class, 'selfedit'])->name('staff.profile.edit');
    Route::post('staff/profile/update',[StaffController::class, 'selfupdate'])->name('staff.profile.update.post');
    Route::get('staff/pass/edit', [StaffController::class, 'passedit'])->name('staff.pass.edit');
    Route::post('staff/pass/update',[StaffController::class, 'passupdate'])->name('staff.pass.update.post');
    Route::post('staff/userupdate', [StaffController::class, 'userupdate'])->name('staff.userupdate');

});
