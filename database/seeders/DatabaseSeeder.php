<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auth_user')->insert([
            [
                'username' => 'voeradmin',
                'first_name' => 'voer',
                'last_name' => 'voer',
                'email' => 'email@admin.com',
                'password' => bcrypt('Ecpvn2022@'),
                'is_staff' => '1',
                'is_active' => '1',
                'is_superuser' => '1',
                'last_login' => '2021-1-1 00:00:00',
                'date_joined' => Carbon::now()
            ]
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
