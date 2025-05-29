<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PageController::class, 'index']);
Route::get('/store', [PageController::class, 'store']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/checkout', [PageController::class, 'checkout']);
Route::get('/blank',[PageController::class,'blank']);
Route::get('/laptop',[PageController:: class,'laptop']);
Route::get('/telephone',[PageController::class,'telephone']);
Route::get('/camera',[PageController::class,'camera']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'postRegister']);
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
Route::get('/latop',function(){
    return view('clients.laptop');
})->name('laptop');
Route::get('/telephone',function(){
    return view('clients.telephone');
})->name('telephone');
Route::get('/camera',function(){
    return view('clients.camera');
})->name('camera');
Route::get('/login', function () {
    return view('login.login');
})->name('login');
Route::get('/register', function () {
    return view('login.register');
})->name('register');
