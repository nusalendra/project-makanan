<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'role' => 'Karyawan',
        ]);
        DB::table('role')->insert([
            'role' => 'Pembeli',
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin1234'),
        ]);
    }
}
//Command Terminal: php artisan db:seed --class=DatabaseSeeder