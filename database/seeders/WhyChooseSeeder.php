<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WhyChooseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('why_choose')->insert([
            [
                'title' => 'COMPANY VALUE',
                'description' => 'Guna mencapai Visi dan Misi . Maka Kantor Hukum Sylvia Anwar & Rekan mempunyai KOMITMEN bersama dalam memberikan pelayanan hukum secara maksimal terhadap para Pencari Keadilan.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'MORALITAS',
                'description' => 'Kantor Hukum Sylvia Anwar & Rekan sangat Menjunjung tinggi Moralitas, yang mana Faktor Kejujuran adalah merupakan Landasan utama dalam menjalankan setiap aktifitas usaha kami.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'KREDIBILITAS',
                'description' => 'Kredibilitas bagi kami merupakan aspek yang dikedepankan dalam memberikan pelayanan hukum kepada Klien/Mitra merupakan faktor utama dalam memberikan kepuasan pelayanan .',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
