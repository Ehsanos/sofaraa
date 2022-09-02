<?php

namespace Database\Seeders;

use App\Models\Nation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Area::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mada.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id' => 1,
            'remember_token' => '',
        ]);

        Nation::create([
            'name' => [
                'en' => 'Turkey',
                'ar' => 'تركيا',
                'tr' => 'Türkiye',
            ]

        ]);
        Nation::create([
            'name' => [
                'en' => 'Syria',
                'ar' => 'سوريا',
                'tr' => 'Suriye',
            ]
        ]);

        // الادمن
        DB::table('roles')->insert([
            'name' => 'super_admin',
        ]);
        // مدير التبرعات
        DB::table('roles')->insert([
            'name' => 'donations_manager',
        ]);
        // اعلامي
        DB::table('roles')->insert([
            'name' => 'informative',
        ]);
        // مستخدم عادي
        DB::table('roles')->insert([
            'name' => 'user',
        ]);
    }
}
