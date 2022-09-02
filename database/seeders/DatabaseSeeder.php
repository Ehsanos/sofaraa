<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Section::factory(10)->create();
        \App\Models\Area::factory(10)->create();
        \App\Models\Project::factory(10)->create();
        \App\Models\Campaign::factory(10)->create();
        \App\Models\Office::factory(10)->create();
        \App\Models\Testimonial::factory(10)->create();
        \App\Models\Slider::factory(10)->create();
        \App\Models\Post::factory(10)->create();
        $this->call(MainSeeder::class);
    }
}
