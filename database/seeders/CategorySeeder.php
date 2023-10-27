<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $femmemontres = Category::create([
            'name_en' => "Women's Watches",
            'name_fr' => 'Femme Montres',
            'name_tr' => 'Kadın Saatleri',
            'image' => null,
            'parent'=> null,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_tr' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_tr' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_tr' => null,
            'status' => "1"
        ]);
        $hommemontres =  Category::create([
            'name_en' => "Men's Wathces",
            'name_fr' => 'Homme Montres',
            'name_tr' => 'Erkek Saatleri',
            'image' => null,
            'parent'=> null,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_tr' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_tr' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_tr' => null,
            'status' => "1"
        ]);
       $bijoux = Category::create([
            'name_en' => 'Jewelry',
            'name_fr' => 'Bijoux',
            'name_tr' => 'Takı',
            'image' => null,
            'parent'=> null,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_tr' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_tr' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_tr' => null,
            'status' => "1"
        ]);

        Category::create([
            'name_en' => 'Necklace',
            'name_fr' => 'Collier',
            'name_tr' => 'Kolye',
            'image' => null,
            'parent'=> $bijoux->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_tr' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_tr' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_tr' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => 'Bracelet',
            'name_fr' => 'Bracelet',
            'name_tr' => 'Bilezik',
            'image' => null,
            'parent'=> $bijoux->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_tr' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_tr' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_tr' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => "Earring",
            'name_fr' => "Boucle d'oreille",
            'name_tr' => 'Küpe',
            'image' => null,
            'parent'=> $bijoux->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_tr' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_tr' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_tr' => null,
            'status' => "1"
        ]);
    }
}
