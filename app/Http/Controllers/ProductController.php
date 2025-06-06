<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Đảm bảo dòng này đã được import
use App\Models\Category; // Cần import Category model để lấy sản phẩm liên quan theo category
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm (có thể là trang danh sách sản phẩm quản trị hoặc toàn bộ sản phẩm)
    // Lưu ý: Route '/store' đang trỏ đến PageController::store.
    // Nếu bạn muốn ProductController::index() xử lý trang cửa hàng chính, hãy chỉnh sửa routes/web.php.
    public function index()
    {
        $products = Product::all();
        // Giả sử bạn có view products.index để hiển thị tất cả sản phẩm (thường dùng cho trang admin)
        return view('products.index', compact('products'));
    }

    // Hiển thị form tạo sản phẩm mới (nếu có)
    public function create()
    {
        // Có thể cần truyền danh mục vào đây để chọn khi tạo sản phẩm
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Lưu sản phẩm mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'long_description' => 'nullable|string', // Thêm validation cho long_description
            'details' => 'nullable|string',          // Thêm validation cho details
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0|gte:price',
            'stock' => 'required|integer|min:0',
            'image_path' => 'nullable|string', // Hoặc 'image|mimes:jpeg,png,jpg,gif|max:2048' nếu upload file
            'category_id' => 'nullable|exists:categories,id', // Đảm bảo category_id hợp lệ
            'is_new' => 'boolean',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'rating' => 'nullable|integer|min:0|max:5',
        ]);

        // Xử lý tạo slug tự động trong Product Model (sẽ được thêm vào Product Model)
        $product = Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công!');
    }

    // Hiển thị chi tiết sản phẩm
    public function show(Product $product)
    {
        // Tăng views_count mỗi khi sản phẩm được xem
        $product->increment('views_count');

        // Lấy 4 sản phẩm liên quan (cùng danh mục, không phải sản phẩm hiện tại)
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->inRandomOrder() // Lấy ngẫu nhiên
                                ->take(4)          // Lấy 4 sản phẩm liên quan
                                ->get();

        // Bạn có 3 file Blade cho chi tiết sản phẩm: show.blade.php, product.blade.php, product-detail.blade.php
        // Tôi sẽ ưu tiên sử dụng 'product.blade.php' vì nó có vẻ đầy đủ hơn.
        // Nếu bạn muốn dùng 'show.blade.php' hoặc 'product-detail.blade.php', hãy đổi tên view ở đây.
        return view('product', compact('product', 'relatedProducts'));
    }

    // Các phương thức khác cho quản lý sản phẩm (edit, update, destroy)
    // public function edit(Product $product)
    // {
    //     $categories = Category::all();
    //     return view('products.edit', compact('product', 'categories'));
    // }

    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0',
    //         // ... và các validation khác
    //     ]);

    //     if ($request->name != $product->name) {
    //         $product->slug = Str::slug($request->name);
    //     }
    //     $product->update($request->all());
    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã cập nhật thành công!');
    // }

    // public function destroy(Product $product)
    // {
    //     $product->delete();
    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã xóa thành công!');
    // }
}