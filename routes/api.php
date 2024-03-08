<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RateController;
use App\Models\Currency;
use App\Services\QuoteService;
use App\Services\RateService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "temp" middleware group. Make something great!
|
*/

// Grouping Rate routes
Route::prefix('rates')->group(function () {
    Route::get('/', [RateController::class, 'index']);
    Route::get('/{rate}', [RateController::class, 'show']);
});

// Grouping Order routes
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/{order}', [OrderController::class, 'show']);
});

Route::get('/quote', [QuoteController::class, 'quote']);

Route::prefix('currencies')->group(function () {
    Route::get('/', [CurrencyController::class, 'index']);
});
