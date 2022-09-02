<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->numberBetween(0, 1),
            'title' => [
                'ar' => $this->faker->title(),
                'en' => $this->faker->title(),
                'tr' => $this->faker->title(),
            ],
            'description' => ['ar' => $this->faker->title(), 'en' => $this->faker->title(), 'tr' => $this->faker->title(),],
            'image_url' => $this->faker->url(),
            'project_id' => $this->faker->numberBetween(1, 9),
            'section_id' => $this->faker->numberBetween(1, 9),
            'vedio_url' => $this->faker->url(),
            'nation_id' => $this->faker->numberBetween(1, 9),
            "total_amount" => $this->faker->numberBetween(300, 6000),

        ];
    }
}
