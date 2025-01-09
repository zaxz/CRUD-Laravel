<?php

use App\Http\Controllers\ProductContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductContoller::class, 'index']);
Route::get('/product/create', [ProductContoller::class, 'create'])->name('product.create');