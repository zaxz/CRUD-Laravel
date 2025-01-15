<?php

use App\Http\Controllers\ProductContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductContoller::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductContoller::class, 'create'])->name('product.create');
Route::post('/product/create', [ProductContoller::class, 'store'])->name('product.store');
Route::delete('/product/{id}', [ProductContoller::class, 'destroy'])->name('product.destroy');
Route::get('/product/{id}/edit', [ProductContoller::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductContoller::class, 'update'])->name('product.update');