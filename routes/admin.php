<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

$appRoutes = function () {
    Route::get('/', function () {
        return redirect('admins/dashboard');
    });

    Route::middleware('guest')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store'])->name('register.save');

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.save');

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::put('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

    // // Email verification
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    Route::middleware(['auth:admin'])->group(function () { // verified

        // Change password
        Route::get('password/change', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('password/change/update', [ChangePasswordController::class, 'changePassword'])->name('password.change.update');

        // Route::resource('dashboard', 'DashboardController');

        // Route::get('users/datatable', 'UserController@getDatatable');
        // Route::resource('users', 'UserController');

        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
            ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->name('password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])->name('password.confirm.save');

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
};

Route::group(array('prefix' => "admins", "namespace" => "Admin", "as" => "admin::"), $appRoutes);

Route::resource('admins/dashboard', 'App\Http\Controllers\Admin\DashboardController')->middleware('auth:admin');
Route::get('admins/users/datatable', 'App\Http\Controllers\Admin\UserController@getDatatable')->middleware('auth:admin');
Route::resource('admins/users', 'App\Http\Controllers\Admin\UserController')->middleware('auth:admin');
