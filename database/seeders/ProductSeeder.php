<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    Product::create([
        'name' => 'Sample T-Shirt',
        'description' => 'High-quality cotton shirt',
        'price' => 499.99,
        'stock' => 50,
        'image' => 'tshirt.jpg',
    ]);
}
}
