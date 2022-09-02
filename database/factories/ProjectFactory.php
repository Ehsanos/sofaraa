<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'finish_state' => $this->faker->boolean(),
            "total_amount" => $this->faker->numberBetween(300, 6000),
            'section_id' => $this->faker->numberBetween(1, 9),
            'campaign_id' => $this->faker->numberBetween(1, 9),
            'title' => ['en' => $this->faker->title(), 'ar' => $this->faker->title(), 'tr' => $this->faker->title(),],
            'description' => ['en' => $this->faker->text(), 'ar' => $this->faker->text(), 'tr' => $this->faker->text(),],
            'image_url' => $this->faker->url(),
            'vedio_url' => $this->faker->url(),

        ];
    }
}
