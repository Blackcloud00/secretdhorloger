<?php

namespace Database\Seeders;

use App\Models\products_content;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsContentsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        products_content::create([
            'product_id' => "1",
            'lang' => "en",
            'title' => "Urun 1 Erkek Saati",
            'short_des' => "short des",
            'description' => "description",
            'technic_des' => "technic des",
            'seo_title' => "seo title",
            'seo_desc' => "seo des",
            'seo_keyword' => "seo keyword"
        ]);
    }
}
