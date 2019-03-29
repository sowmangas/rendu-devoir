<?php

use App\Formation;
use Illuminate\Database\Seeder;

class FormationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
        	Formation::create([
        		'nom_formation' => "MIAGE $i",
        	]);
        }
    }
}
