<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConventionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conventions')->insert([
            [
                'nom' => 'Banane',
                'nbHeur' => 127
            ],
            [
                'nom' => 'Fraise',
                'nbHeur' => 78
            ],
            [
                'nom' => 'Kiwi',
                'nbHeur' => 42
            ],
            [
                'nom' => 'Melon',
                'nbHeur' => 320
            ]
        ]);
    }
}
