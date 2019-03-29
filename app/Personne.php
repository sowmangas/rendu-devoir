<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $fillable = ['nom', 'prenom', 'adresse_mel', 'role', 'titre', 'formation_id','password'];
}
