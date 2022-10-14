<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name'=> 'Perkara',
                'slug'=> 'Perkara',
            ],
            [
                'name'=> 'Perdata',
                'slug'=> 'Perdata',
            ],
            [
                'name'=> 'Pidana',
                'slug'=> 'Pidana',
            ],
            [
                'name'=> 'Kekayaan Intelektual',
                'slug'=> 'kekayaan-intelektual',
            ],

            [
                'name'=> 'Draft Gugatan',
                'slug'=> 'draft-gugatan',
            ],

        ]);
    }
}
