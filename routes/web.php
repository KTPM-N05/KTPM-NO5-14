<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;


// Trang chủ
Route::get('/', [PageController::class, 'index'])->name('home');

// Các trang sản phẩm
Route::get('/store', [PageController::class, 'store'])->name('store');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/blank', [PageController::class, 'blank'])->name('blank');
Route::get('/laptop', [PageController::class, 'laptop'])->name('laptop'); // sửa typo
Route::get('/telephone', [PageController::class, 'telephone'])->name('telephone');
Route::get('/camera', [PageController::class, 'camera'])->name('camera');

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister']);

// Trang dashboard (có middleware auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Nhóm route profile cần đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route cho admin
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');

require __DIR__.'/auth.php';
