<?php

use App\Http\Controllers\Api\OrderApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/orders', [OrderApiController::class, 'update'])->name('orders.update');
