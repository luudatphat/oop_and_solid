<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/stripe', [StripeController::class, 'pay']);
// Route::get('/paypal', [PaypalController::class, 'pay']);
// Route::get('/bank', [\App\Http\Controllers\BankTransferController::class, 'pay']);

Route::prefix('api/comics')->group(function () {
    Route::get('/', [ComicController::class, 'index']);
    Route::get('/{slug}', [ComicController::class, 'show']);
});


Route::prefix('api/{slug}/chapters')->group(function () {
    Route::get('/{chapter_id}', [ChapterController::class, 'index']);
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return "Welcome, " . (auth()->user() ? auth()->user()->name : 'Guest');
})->name('dashboard');
