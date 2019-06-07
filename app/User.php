<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'adresse_mel', 'role', 'titre', 'status', 'formation_id', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function formation(){
        return $this->belongsTo(Formation::class);
    }

    public function renduEtudiant(){
        return $this->belongsToMany(Devoir::class, 'rendus');
    }

    public function devoirsProfesseur(){
        return $this->hasMany(Devoir::class);
    }
    public function professeurs () {
        return $this->hasMany(ModificationNote::class);
    }
}
