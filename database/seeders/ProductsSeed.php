<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        products::create([
            'name' => 'Urun 1 Erkek Saati',
            'category_id' => "2",
            'img_1' => null,
            'img_2' => null,
            'img_3' => null,
            'img_4' => null,
            'img_5' => null,
            'sku' => "000100",
            'price' => "95.00",
            'status' => "0"
        ]);
    }
}
