<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'ar' => $this->faker->title(),
                'en' => $this->faker->title(),
                'tr' => $this->faker->title(),
            ],

            'description' => ['ar' => $this->faker->title(), 'en' => $this->faker->title(), 'tr' => $this->faker->title(),],

            'image_url' => $this->faker->url(),
            'nation_id' => $this->faker->numberBetween(1, 2)
        ];
    }
}
