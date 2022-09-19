<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@stream.com',
            'password' => bcrypt('123'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
            'phone' => '123456789',
        ]);
    }
}
