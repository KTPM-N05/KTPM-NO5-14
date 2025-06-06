<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Bạn cần import model Product

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop UltraBook ZenMax',
            'description'=>'Đây là một đoạn văn bản mô tả mẫu, thường được sử dụng để trình bày bố cục sản phẩm. Nội dung này mô tả chi tiết về sản phẩm, các tính năng nổi bật và lợi ích mang lại cho người dùng.',
            'price' => 24500000, 
            'image' => 'public/img/product01.png', 
        ]);
    }
}
