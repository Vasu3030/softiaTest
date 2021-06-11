<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EtudiantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etudiants')->insert([
            [
                'nom' => 'Rouge',
                'prenom' => 'Rubis',
                'mail' => 'rouge@rubis.com',
                'convention' => 1
            ],
            [
                'nom' => 'Bleu',
                'prenom' => 'Saphir',
                'mail' => 'bleu@saphir.com',
                'convention' => 2
            ],
            [
                'nom' => 'Gris',
                'prenom' => 'Fer',
                'mail' => 'gris@fer.com',
                'convention' => 3
            ],
            [
                'nom' => 'Orange',
                'prenom' => 'Bronze',
                'mail' => 'orange@bronze.com',
                'convention' => 4
            ],
            [
                'nom' => 'Vert',
                'prenom' => 'Emeraude',
                'mail' => 'vert@emeraude.com',
                'convention' => 4
            ]
        ]);   
    }
}
