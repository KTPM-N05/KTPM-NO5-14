<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('/store', [PageController::class, 'store']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/checkout', [PageController::class, 'checkout']);
Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('/store',function(){
    return view('store');
})->name('danhmuc');
Route::get('/product',function(){
    return view('product');
})->name('product');
