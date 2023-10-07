<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/change-password', function () {
        return view('front.profile.partials.update-password-form');
    })->name('change.password');
});

require __DIR__.'/auth.php';

// =======LoginController Route
Route::controller(LoginController::class)->group(function(){
    Route::get('auth/twitter', 'redirectToTwitter')->name('auth.twitter');
    Route::get('auth/twitter/callback', 'handleTwitterCallback');
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('login/google/callback', 'handelGoogleCallback');
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('login/facebook/callback', 'handleFacebookCallback');
});



Route::get('upload', [ImageController::class, 'uploadForm'])->name('upload.form');
Route::post('upload', [ImageController::class, 'upload'])->name('upload.image');
Route::get('image', [ImageController::class, 'image'])->name('image');

