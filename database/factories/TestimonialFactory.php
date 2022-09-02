<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => [
                'ar' => $this->faker->title(),
                'en' => $this->faker->title(),
                'tr' => $this->faker->title(),
            ],

            'description' => ['ar' => $this->faker->text(), 'en' => $this->faker->text(), 'tr' => $this->faker->text(),],
            'url'=>$this->faker->url()
        ];
    }
}
