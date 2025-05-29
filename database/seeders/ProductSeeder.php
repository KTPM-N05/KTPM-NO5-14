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
            'price' => 24500000, 
            'img' => 'public/img/product01.png', 
        ]);
    }
}
