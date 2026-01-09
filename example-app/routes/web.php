<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stripe', [StripeController::class, 'pay']);
Route::get('/paypal', [PaypalController::class, 'pay']);
Route::get('/bank', [\App\Http\Controllers\BankTransferController::class, 'pay']);
