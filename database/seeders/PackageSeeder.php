<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                'name' => 'Basic',
                'price' => 30000,
                'max_days' => 7,
                'max_users' => 1,
                'is_downloaded' => false,
                'is_active' => true,
                'is_4k' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard',
                'price' => 42000,
                'max_days' => 14,
                'max_users' => 2,
                'is_downloaded' => false,
                'is_active' => true,
                'is_4k' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium',
                'price' => 59000,
                'max_days' => 30,
                'max_users' => 4,
                'is_downloaded' => false,
                'is_active' => true,
                'is_4k' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ultra',
                'price' => 119000,
                'max_days' => 60,
                'max_users' => 6,
                'is_downloaded' => false,
                'is_active' => true,
                'is_4k' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '4K',
                'price' => 150000,
                'max_days' => 90,
                'max_users' => 8,
                'is_downloaded' => false,
                'is_active' => true,
                'is_4k' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ]);
    }
}
