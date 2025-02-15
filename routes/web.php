<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/orders/{order}/products', [OrderProductController::class, 'index']);