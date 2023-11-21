<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products_content>
 */
class products_contentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lang = ["tr", "en", "fr"];
        $lang = $lang[rand(0,count($lang)-1)];
        return [
            'lang' => $lang,
            'title' => $this->faker->text('50'),
            'short_des' => $this->faker->text('50'),
            'description' => $this->faker->text('50'),
            'technic_des' => $this->faker->text('50'),
            'seo_title' => $this->faker->text('50'),
            'seo_desc' => $this->faker->text('50'),
            'seo_keyword' => $this->faker->text('50')
        ];
    }
}
