<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;

Route::get('/', [ShopController::class, 'show'])->name('shop');
Route::get('/products/{product}', [ShopController::class, 'showProduct'])->name('products.show');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');