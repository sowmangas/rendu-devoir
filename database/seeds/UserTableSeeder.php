<?php

use App\User;
use App\Formation;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 10; $i++) { 
        	User::create([
        		'nom'=>"Diallo $i",
				'prenom'=>"Hambaliou $i",
				'adresse_mel'=>"hambaliou$i@gmail.com",
				'role'=>"Rol$i",
				'titre'=>"Titre$i",
                'password'=>bcrypt("qwerty"),
                'formation_id'=> Formation::find($i)->id,
        	]);
        }
    }
}
