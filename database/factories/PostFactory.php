<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ['en' => $this->faker->title(), 'ar' => $this->faker->title(), 'tr' => $this->faker->title(),],
            'description' => ['en' => $this->faker->text(), 'ar' => $this->faker->text(), 'tr' => $this->faker->text(),],
            'image'=>$this->faker->url(),
        ];
    }
}
