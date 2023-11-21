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
        $cat = [
            "montres" => "1",
            "women_montres" => "2",
            "men_montres" => "3",
            "titanium_montres" => "4",
            "bijoux" => "5",
            "collier" => "6",
            "bracelet" => "7",
            "boucle_doreille" => "8",
            "bague_ajustable" => "9",
        ];
        $montres = ['3261-03',
        '3275-01',
        '3276-05',
        '3276-08',
        '3281-06',
        '3290-02',
        '3308-02',
        '3591-06',
        '3615-04',
        '3633-04',
        '3636-01',
        '3636-02',
        '3212-04',
        '3273-06',
        '3280-01',
        '3290-01',
        '3249-02',
        '3317-02',
        '3619-01',
        '3751-02',
        '3607-02',
        '3767-03',
        '3239-01',
        '3637-02',
        '3249-03'];
     //products::factory(15)->create();
     products::create([
        'name' => 'chaine motif coeur',
        'category_id' =>   $cat["bracelet"],
        'img_1' => '1.jpg',
        'img_2' => null,
        'img_3' => null,
        'img_4' => null,
        'img_5' => null,
        'sku' => "000100",
        'price' =>  '30',
        'status' => "1"
    ]);
    products::create([
        'name' => 'jonc ouvert fléche',
        'category_id' =>  $cat["bracelet"],
        'img_1' => '2.jpg',
        'img_2' => null,
        'img_3' => null,
        'img_4' => null,
        'img_5' => null,
        'sku' => "000100",
        'price' =>  '65',
        'status' => "1"
    ]);
    products::create([
        'name' => 'motif Arbre de vie',
        'category_id' =>  $cat["bracelet"],
        'img_1' => '3.jpg',
        'img_2' => null,
        'img_3' => null,
        'img_4' => null,
        'img_5' => null,
        'sku' => "000100",
        'price' =>  '30',
        'status' => "1"
    ]);
    products::create([
        'name' => 'motif Infinity',
        'category_id' =>  $cat["bracelet"],
        'img_1' => '4.jpg',
        'img_2' => null,
        'img_3' => null,
        'img_4' => null,
        'img_5' => null,
        'sku' => "000100",
        'price' =>  '30',
        'status' => "1"
    ]);
    products::create([
        'name' => 'Perles de culture noires',
        'category_id' =>  $cat["bracelet"],
        'img_1' => '5.jpg',
        'img_2' => null,
        'img_3' => null,
        'img_4' => null,
        'img_5' => null,
        'sku' => "000100",
        'price' =>  '55',
        'status' => "1"
    ]);
    products::create([
        'name' => 'Plume',
        'category_id' =>  $cat["bracelet"],
        'img_1' => '6.jpg',
        'img_2' => null,
        'img_3' => null,
        'img_4' => null,
        'img_5' => null,
        'sku' => "000100",
        'price' =>  '30',
        'status' => "1"
    ]);

 /** BRACELET FINISH  */

 products::create([
    'name' => 'arbre de vie',
    'category_id' =>  $cat["collier"],
    'img_1' => '7.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  '25',
    'status' => "1"
]);
products::create([
    'name' => 'Noeud avec Zircones',
    'category_id' =>   $cat["boucle_doreille"],
    'img_1' => '8.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Noeuds',
    'category_id' =>  $cat["boucle_doreille"],
    'img_1' => '9.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => '3 barrettes plaquées',
    'category_id' =>  $cat["collier"],
    'img_1' => '10.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Double Coeur',
    'category_id' =>  $cat["collier"],
    'img_1' => '11.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Motif Plume',
    'category_id' =>  $cat["collier"],
    'img_1' => '12.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => '3 barrettes plaquées',
    'category_id' =>  $cat["collier"],
    'img_1' => '13.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => '3 Etoiles plaquées',
    'category_id' => $cat["collier"],
    'img_1' => '14.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Arbre de Vie',
    'category_id' =>  $cat["collier"],
    'img_1' => '15.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Infinity',
    'category_id' =>  $cat["collier"],
    'img_1' => '16.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Cercles',
    'category_id' => $cat["collier"],
    'img_1' => '17.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'filigrane multi coeurs',
    'category_id' => $cat["collier"],
    'img_1' => '18.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'asymétrique ajouré',
    'category_id' =>  $cat["collier"],
    'img_1' => '19.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'découpé',
    'category_id' =>  $cat["collier"],
    'img_1' => '20.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Ruban 1 Zircone',
    'category_id' =>  $cat["collier"],
    'img_1' => '21.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'ajourés',
    'category_id' => $cat["collier"],
    'img_1' => '22.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Licorne',
    'category_id' =>  $cat["collier"],
    'img_1' => '23.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Musique',
    'category_id' =>  $cat["collier"],
    'img_1' => '24.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Perle de culture blanche',
    'category_id' =>  $cat["collier"],
    'img_1' => '25.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Perle de culture noire',
    'category_id' =>  $cat["collier"],
    'img_1' => '26.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Pompon',
    'category_id' =>  $cat["collier"],
    'img_1' => '27.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Topaze bleue',
    'category_id' =>  $cat["collier"],
    'img_1' => '28.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Tourbillon',
    'category_id' =>  $cat["collier"],
    'img_1' => '29.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Trèfle',
    'category_id' =>  $cat["collier"],
    'img_1' => '30.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Fil torsadé',
    'category_id' =>  $cat["bague_ajustable"],
    'img_1' => '31.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'motif Barres',
    'category_id' => $cat["bague_ajustable"],
    'img_1' => '32.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'motif Plume',
    'category_id' =>  $cat["bague_ajustable"],
    'img_1' => '33.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Papillon',
    'category_id' => $cat["boucle_doreille"],
    'img_1' => '34.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
products::create([
    'name' => 'Tourbillon',
    'category_id' =>  $cat["boucle_doreille"],
    'img_1' => '35.jpg',
    'img_2' => null,
    'img_3' => null,
    'img_4' => null,
    'img_5' => null,
    'sku' => "000100",
    'price' =>  null,
    'status' => "1"
]);
foreach($montres as $montre){
    products::create([
        'name' => $montre,
        'category_id' =>   $cat["titanium_montres"],
        'img_1' => $montre.'.jpg',
        'img_2' => null,
        'img_3' => null,
        'img_4' => null,
        'img_5' => null,
        'sku' => "000100",
        'price' =>  null,
        'status' => "1"
    ]);
}

  }
}
