<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = rand(300,1000);
        $category = rand(0,3);
        return [
            'name' => $this->faker->text(25),
            'category_id' =>  $category,
            'img_1' => null,
            'img_2' => null,
            'img_3' => null,
            'img_4' => null,
            'img_5' => null,
            'sku' => "000100",
            'price' =>  $price,
            'status' => "1"
        ];
    }
}
