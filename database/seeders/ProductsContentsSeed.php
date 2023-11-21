<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Seeder;
use App\Models\products_content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsContentsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $products = products::get();

      foreach($products as $product){
        $lang = ["de", "en", "fr"];
        foreach($lang as $item){
            products_content::factory(1)->create(['products_id' => $product->id, 'lang' => $item, 'title' => $product->name . ' ' . $item]);
        }
      }
    }
}
