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

        $montres = Category::create([
            'name_en' => "Watches",
            'name_fr' => 'Montres',
            'name_de' => 'Saatleri',
            'image' => null,
            'parent'=> null,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => "Women's Watches",
            'name_fr' => 'Femme Montres',
            'name_de' => 'Kadın Saatleri',
            'image' => null,
            'parent'=> $montres->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => "Men's Wathces",
            'name_fr' => 'Homme Montres',
            'name_de' => 'Erkek Saatleri',
            'image' => null,
            'parent'=> $montres->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => "Titanium Watch",
            'name_fr' => 'Montre en Titane',
            'name_de' => 'Titanyum Saatler',
            'image' => null,
            'parent'=> $montres->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
       $bijoux = Category::create([
            'name_en' => 'Jewelry',
            'name_fr' => 'Bijoux',
            'name_de' => 'Takı',
            'image' => null,
            'parent'=> null,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);

        Category::create([
            'name_en' => 'Necklace',
            'name_fr' => 'Collier',
            'name_de' => 'Kolye',
            'image' => null,
            'parent'=> $bijoux->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => 'Bracelet',
            'name_fr' => 'Bracelet',
            'name_de' => 'Bilezik',
            'image' => null,
            'parent'=> $bijoux->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => "Earring",
            'name_fr' => "Boucle d'oreille",
            'name_de' => 'Küpe',
            'image' => null,
            'parent'=> $bijoux->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
        Category::create([
            'name_en' => "Adjustable ring",
            'name_fr' => "Bague ajustable",
            'name_de' => 'Ayarlanabilir halka',
            'image' => null,
            'parent'=> $bijoux->id,
            'seo_title_en' => null,
            'seo_title_fr' => null,
            'seo_title_de' => null,
            'seo_desc_en' => null,
            'seo_desc_fr' => null,
            'seo_desc_de' => null,
            'seo_keyword_en' => null,
            'seo_keyword_fr' => null,
            'seo_keyword_de' => null,
            'status' => "1"
        ]);
    }
}
