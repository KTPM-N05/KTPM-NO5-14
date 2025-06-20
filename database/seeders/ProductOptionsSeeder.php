<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductOptionsSeeder extends Seeder
{
    public function run()
    {
        // Laptop mẫu
        DB::table('products')->where('name', 'LIKE', '%laptop%')->update([
            'configurations' => json_encode(["Core i5/8GB/256GB", "Core i7/16GB/512GB"]),
            'colors' => json_encode(["Đen", "Bạc"]),
            'sizes' => json_encode(["13 inch", "15 inch"]),
            'storages' => json_encode(["256GB SSD", "512GB SSD"]),
        ]);
        // Điện thoại mẫu
        DB::table('products')->where('name', 'LIKE', '%phone%')->update([
            'configurations' => json_encode(["8GB/128GB", "12GB/256GB"]),
            'colors' => json_encode(["Đen", "Trắng", "Xanh"]),
            'sizes' => json_encode(["6.1 inch", "6.7 inch"]),
            'storages' => json_encode(["128GB", "256GB"]),
        ]);
        // Tai nghe mẫu
        DB::table('products')->where('name', 'LIKE', '%tai nghe%')->update([
            'configurations' => json_encode(["Bluetooth", "Có dây"]),
            'colors' => json_encode(["Đen", "Trắng"]),
            'sizes' => json_encode(["Chụp tai", "Nhét tai"]),
            'storages' => json_encode([]),
        ]);
        // Máy ảnh mẫu
        DB::table('products')->where('name', 'LIKE', '%camera%')
            ->orWhere('name', 'LIKE', '%máy ảnh%')
            ->orWhere('name', 'LIKE', '%tempora%')
            ->update([
                'configurations' => json_encode(["Chỉ thân máy", "Kèm ống kính 18-55mm", "Kèm ống kính 24-105mm"]),
                'colors' => json_encode(["Đen", "Bạc"]),
                'sizes' => json_encode(["Full Frame", "APS-C"]),
                'storages' => json_encode([]),
            ]);
        // Thêm option mặc định cho tất cả sản phẩm chưa có option
        $allProducts = DB::table('products')->get();
        foreach ($allProducts as $product) {
            $updateData = [];
            if (empty($product->configurations)) {
                $updateData['configurations'] = json_encode(["Option 1", "Option 2"]);
            }
            if (empty($product->colors)) {
                $updateData['colors'] = json_encode(["Đen", "Trắng"]);
            }
            if (empty($product->sizes)) {
                $updateData['sizes'] = json_encode(["Nhỏ", "Vừa", "Lớn"]);
            }
            if (empty($product->storages)) {
                $updateData['storages'] = json_encode(["128GB", "256GB"]);
            }
            if (!empty($updateData)) {
                DB::table('products')->where('id', $product->id)->update($updateData);
            }
        }
    }
}
