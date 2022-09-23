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
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
                'phone' => '08568780192',
            ], [
                'name' => 'Author',
                'email' => 'author@author.com',
                'password' => bcrypt('123'),
                'role' => 'author',
                'created_at' => now(),
                'updated_at' => now(),
                'phone' => '08568780192',
            ]
        ]);
    }
}
