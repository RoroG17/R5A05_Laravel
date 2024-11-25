<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eleve;
use Illuminate\Support\Facades\DB;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eleves')->insert([
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'date_naissance' => '2000-05-14',
                'numero_etudiant' => 'ETU123456',
                'email' => 'jean.dupont@example.com',
                'image' => 'image_jean.png',
            ],
            [
                'nom' => 'Martin',
                'prenom' => 'Alice',
                'date_naissance' => '2001-11-22',
                'numero_etudiant' => 'ETU123457',
                'email' => 'alice.martin@example.com',
                'image' => 'image_alice.png',
            ],
            [
                'nom' => 'Durand',
                'prenom' => 'Pierre',
                'date_naissance' => '1999-01-05',
                'numero_etudiant' => 'ETU123458',
                'email' => 'pierre.durand@example.com',
                'image' => 'image_pierre.png',
            ],
        ]);
    }
}

