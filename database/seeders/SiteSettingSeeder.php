<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name' => 'title',
            'data' => "Secret d'horloger - Magasin horlogerie bijouterie secret horloger",
        ]);

        SiteSetting::create([
            'name' => 'keywords',
            'data' => "Revision, Reparation, Restauration, Creation",
        ]);

        SiteSetting::create([
            'name' => 'description',
            'data' => "Ouvert depuis 2016, je vous accueille dans mon magasin, et je me tiens prêt pour vous faire découvrir les mondes merveilleux de l'horlogerie et de la bijouterie. Pour une révision, une réparation, une restauration ou un simple conseil, je prendrai plaisir à discuter avec vous de votre montre, pendule ou bijou.",
        ]);

        SiteSetting::create([
            'name' => 'copyright',
            'data' => "Copyright © Secret d'horloger",
        ]);
        SiteSetting::create([
            'name' => 'contact_phone',
            'data' => "0967138331",
        ]);
        SiteSetting::create([
            'name' => 'contact_email',
            'data' => "secretdhorloger@gmail.com",
        ]);
        SiteSetting::create([
            'name' => 'adress',
            'data' => "11 Rue du 8 Mai 42110 Feurs",
        ]);
        SiteSetting::create([
            'name' => 'map_code',
            'data' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d552.4851828150679!2d4.222720130718989!3d45.74411147438645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4472e96a985bd%3A0x2abdc3a7567f6d8!2sSecret%20d&#39;horloger!5e0!3m2!1str!2str!4v1697289128912!5m2!1str!2str',
        ]);
        SiteSetting::create([
            'name' => 'map_link',
            'data' => "https://maps.app.goo.gl/LdTsEPf9ifRTZEam9",
        ]);
        SiteSetting::create([
            'name' => 'top_body_code',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'bottom_body_code',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'top_head_code',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'bottom_head_code',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'editor',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'tema_dark',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'ltr',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'ico_16x16',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'ico_32x32',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'ico_128x128',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'logo_1',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'logo_2',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'instagram',
            'data' => null,
        ]);
        SiteSetting::create([
            'name' => 'facebook',
            'data' => "https://www.facebook.com/secretdhorloger/",
        ]);
    }
}
