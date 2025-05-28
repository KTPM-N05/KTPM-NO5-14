<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('/store', [PageController::class, 'store']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/checkout', [PageController::class, 'checkout']);
Route::get('/blank',[PageController::class,'blank']);
Route::get('/', function () {
    return view('clients.index');
})->name('home');
Route::get('/checkout', function () {
    return view('clients.checkout');
})->name('checkout');
Route::get('/store',function(){
    return view('clients.store');
})->name('danhmuc');
Route::get('/product',function(){
    return view('clients.product');
})->name('product');
