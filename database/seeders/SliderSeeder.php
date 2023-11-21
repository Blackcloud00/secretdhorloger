<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'image' => 'assets/images/slider-image/slider-1.png',
            'small_text' => 'İngilizce',
            'lang' => 'en',
            'text_key' => Str::slug("Secret d Horloger"),
            'name' => 'Secret d Horloger',
            'button_content' => 'Shop Now',
            'content' => 'Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna',
            'link' => null,
            'status' => "1",
        ]);
        Slider::create([
            'image' => 'assets/images/slider-image/slider-1.png',
            'small_text' => 'Fransızca',
            'lang' => 'fr',
            'text_key' => Str::slug("Secret d Horloger"),
            'name' => 'Secret d Horloger',
            'button_content' => 'Shop Now',
            'content' => 'Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna',
            'link' => null,
            'status' => "1",
        ]);
        Slider::create([
            'image' => 'assets/images/slider-image/slider-1.png',
            'small_text' => 'Deutsch',
            'lang' => 'de',
            'text_key' => Str::slug("Secret d Horloger"),
            'name' => 'Secret d Horloger',
            'button_content' => 'Shop Now',
            'content' => 'Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna',
            'link' => null,
            'status' => "1",
        ]);
        Slider::create([
            'image' => 'assets/images/slider-image/slider-1.png',
            'small_text' => 'New Products DE',
            'lang' => 'de',
            'text_key' => Str::slug("Flexible Chair"),
            'name' => 'Flexible Chair ',
            'button_content' => 'Shop Now',
            'content' => 'Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna',
            'link' => null,
            'status' => "1",
        ]);
    }
}
