<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Product;
use App\Models\Category; // Đảm bảo đã import Category model

class PageController extends Controller
{
    // Trang chủ
    public function index()
    {
        // Lấy sản phẩm mới nhất (newProducts trong index.blade.php)
        $newProducts = Product::with('category')->latest()->take(8)->get();

        // Lấy sản phẩm bán chạy (topSellingProducts trong index.blade.php)
        $topSellingProducts = Product::with('category')->orderBy('sold_count', 'desc')->take(8)->get();

        // Lấy sản phẩm cho các widget ở cuối trang (widgetProductsX trong index.blade.php)
        $widgetProducts1 = Product::with('category')->inRandomOrder()->take(3)->get();
        $widgetProducts2 = Product::with('category')->inRandomOrder()->take(3)->get();
        $widgetProducts3 = Product::with('category')->inRandomOrder()->take(3)->get();
        $widgetProducts4 = Product::with('category')->inRandomOrder()->take(3)->get();
        $widgetProducts5 = Product::with('category')->inRandomOrder()->take(3)->get();

        return view('index', compact( // Đã đổi 'clients.index' thành 'index' nếu view của bạn nằm trực tiếp trong resources/views
            'newProducts',
            'topSellingProducts',
            'widgetProducts1',
            'widgetProducts2',
            'widgetProducts3',
            'widgetProducts4',
            'widgetProducts5'
        ));
    }

    // Trang cửa hàng chung (liệt kê tất cả sản phẩm hoặc sản phẩm theo bộ lọc)
    public function store(Request $request)
    {
        $productsQuery = Product::query();

        // Lọc theo danh mục
        if ($request->has('category')) {
            $categorySlug = $request->get('category');
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $productsQuery->where('category_id', $category->id);
            }
        }

        // Xử lý sắp xếp chính cho các sản phẩm hiển thị (tùy chọn)
        $sort = $request->get('sort', 'new'); // Mặc định là 'new'

        switch ($sort) {
            case 'new':
                $productsQuery->orderBy('created_at', 'desc');
                break;
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;
            case 'popularity':
                // Giả sử 'sold_count' là chỉ số phổ biến
                $productsQuery->orderBy('sold_count', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
        }

        // Lấy các sản phẩm bán chạy nhất TRƯỚC KHI phân trang
        // Đảm bảo cột 'sold_count' tồn tại trong bảng products của bạn.
        $bestSellingProducts = Product::orderByDesc('sold_count')->take(3)->get();

        // Lấy các sản phẩm chính để hiển thị trên trang
        $perPage = $request->get('per_page', 9);
        $products = $productsQuery->paginate($perPage);


        // Lấy danh mục nếu cần
        $categories = Category::withCount('products')->get();

        return view('store', [
            'products' => $products,
            'bestSellingProducts' => $bestSellingProducts, // Truyền biến mới vào view
            'categories' => $categories, // Đảm bảo bạn truyền biến categories nếu sử dụng
        ]);
    }

    // Lấy sản phẩm theo danh mục Máy ảnh
    public function camera()
    {
        $category = Category::where('slug', 'may-anh')->first(); // Sử dụng slug đã chuẩn hóa
        $products = [];
        if ($category) {
            $products = $category->products()->paginate(12);
        }
        $categories = Category::withCount('products')->get(); // Để hiển thị sidebar danh mục
        return view('store', compact('products', 'categories')); // Đổi view sang 'store' và truyền categories
    }

    // Lấy sản phẩm theo danh mục Phụ kiện
    public function accessories()
    {
        $category = Category::where('slug', 'phu-kien')->first();
        $products = [];
        if ($category) {
            $products = $category->products()->paginate(12);
        }
        $categories = Category::withCount('products')->get(); // Để hiển thị sidebar danh mục
        return view('store', compact('products', 'categories')); // Đổi view sang 'store' và truyền categories
    }

    // Lấy sản phẩm theo danh mục Telephone
    public function telephone()
    {
        $category = Category::where('slug', 'dien-thoai')->first();
        $products = [];
        if ($category) {
            $products = $category->products()->paginate(12);
        }
        $categories = Category::withCount('products')->get(); // Để hiển thị sidebar danh mục
        return view('store', compact('products', 'categories')); // Đổi view sang 'store' và truyền categories
    }

    // Lấy sản phẩm theo danh mục Laptop
    public function laptop()
    {
        $category = Category::where('slug', 'laptop')->first();
        $products = [];
        if ($category) {
            $products = $category->products()->paginate(12);
        }
        $categories = Category::withCount('products')->get(); // Để hiển thị sidebar danh mục
        return view('store', compact('products', 'categories')); // Đổi view sang 'store' và truyền categories
    }

    // Phương thức categories (nếu có trang danh mục tổng hợp)
    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories')); // Đã đổi 'clients.categories' thành 'categories'
    }

    // Trang thanh toán
    public function checkout()
    {
        return view('checkout');
    }

    // Trang trống (blank)
    public function blank()
    {
        return view('blank');
=======

class PageController extends Controller
{
    public function index() {
        return view('clients.index'); // resources/views/index.blade.php
    }

    public function store() {
        return view('clients.store'); // resources/views/store.blade.php
    }

    public function product() {
        return view('clients.product'); // resources/views/product.blade.php
    }

    public function checkout() {
        return view('clients.checkout'); // resources/views/checkout.blade.php
    }
    public function blank(){
        return view('clients.blank');// resources/views/blank.blade.php
    }
    public function camera(){
        return view('clients.camera'); //resources/views/camera.blade.php
    }
    public function telephone(){
        return view('clients.telephone'); //resorces/views/telephone.blade.php
    }
    public function laptop(){
        return view('clients.laptop'); //resources/views/laptop/blade.php
    }
    public function login() {
        return view('clients.login'); // resources/views/login.blade.php
    }
    public function register() {
        return view('clients.register'); // resources/views/register.blade.php
    }
    public function dashboard() {
        return view('dashboard'); // resources/views/dashboard.blade.php
>>>>>>> 3f0c0263bbe65bf7560769edd502045988e2964c
    }
}