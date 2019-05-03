<?php

use App\Devoir;
use App\Enum\UserRole;
use App\Formation;
use App\User;
use Illuminate\Database\Seeder;

class DevoirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            Devoir::create([
                'formation_id'         => Formation::find($i)->id,
                'user_id'              => User::find($i)->id,
                'intitule'             => "Casse tête $i",
                'evaluer'              => $i % 2 == 0 ? true : false,
                'type_correction'      => 'corrigé type',
                'date_limit_depot'     => now(),
                'enonce'               => "public/devoirs/devoir1.txt $i",
                'periode'              => $i % 2 == 0 ? "S1" : "S2",
                'nom_matiere'          => "Spring boot $i",
                'visible_corrige_type' => false
            ]);
        }
    }
}
