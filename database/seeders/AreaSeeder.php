<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'name' => 'area 1',
        ]);
        DB::table('areas')->insert([
            'name' => 'area 2',
        ]);
        DB::table('areas')->insert([
            'name' => 'area 3',
        ]);
        DB::table('areas')->insert([
            'name' => 'area 4',
        ]);
        DB::table('areas')->insert([
            'name' => 'area 5',
        ]);
        DB::table('areas')->insert([
            'name' => 'area 6',
        ]);
    }
}
