<?php

use App\Enum\UserRole;
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
        User::create([
            'nom'          => "ADMIN",
            'prenom'       => "ADMIN",
            'adresse_mel'  => "admin@admin.com",
            'role'         => UserRole::ADMIN,
            'titre'        => "Titre",
            'password'     => bcrypt("qwerty"),
        ]);

        for ($i = 1; $i < 10; $i++) {
            User::create([
                'nom'          => "Diallo $i",
                'prenom'       => "Hambaliou $i",
                'adresse_mel'  => "a$i@g.com",
                'role'         => $i % 2 == 0 ? UserRole::ETUDIANT : UserRole::PROF,
                'titre'        => "Titre$i",
                'password'     => bcrypt("qwerty"),
                'formation_id' => UserRole::ETUDIANT ? Formation::find($i)->id : null,
            ]);
        }
    }
}
