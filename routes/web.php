<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\StoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Đây là nơi bạn có thể định nghĩa tất cả route cho web app
*/

// ------------------------------
// Public Routes (không cần đăng nhập)
// ------------------------------

// Trang chủ
Route::get('/', [PageController::class, 'index'])->name('home');

// Danh mục sản phẩm
Route::get('/danh-muc', [DanhMucController::class, 'index'])->name('danhmuc');

// Cửa hàng chung (liệt kê tất cả sản phẩm hoặc sản phẩm theo bộ lọc)
Route::get('/store', [StoreController::class, 'index'])->name('store.index');

// Trang danh mục cụ thể
// Trang danh mục cụ thể (chuyển hướng về trang /store với tham số category)
Route::redirect('/laptop', '/store?category=laptop')->name('laptop');
Route::redirect('/telephone', '/store?category=dien-thoai')->name('telephone');
Route::redirect('/camera', '/store?category=may-anh')->name('camera');
Route::redirect('/phu-kien', '/store?category=phu-kien')->name('accessories');
// Chi tiết sản phẩm
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Trang thanh toán
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');

// Trang trống (blank)
Route::get('/blank', [PageController::class, 'blank'])->name('blank');

// Đăng nhập / Đăng ký
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister']);

// ------------------------------
// Protected Routes (cần đăng nhập)
// ------------------------------
Route::middleware('auth')->group(function () {
    // Giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Đặt hàng
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
});

// ------------------------------
// Admin Routes (nếu cần quản lý backend)
// ------------------------------
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::resource('products', ProductController::class);
// });
