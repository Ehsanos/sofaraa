<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>['en'=>$this->faker->name(), 'ar'=>$this->faker->name(),'tr'=>$this->faker->name()]
        ];
    }
}
