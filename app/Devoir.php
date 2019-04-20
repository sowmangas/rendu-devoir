<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devoir extends Model
{
    protected $fillable = [
        'formation_id', 'user_id', 'intitule', 'evaluer', 'coefficient', 'type_correction', 'date_limit_depot', 'enonce', 'corrige_type', 'periode', 'nom_matiere'
    ];

    protected $dates = ['date_limit_depot'];


    protected $casts = [
        'type_correction' => 'boolean',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function etudiants()
    {
        return $this->belongsToMany(User::class, 'rendus')->withPivot('rendu', 'date_depot', 'note', 'commentaire');
    }

    public function professeur()
    {
        return $this->belongsTo(User::class);
    }

    public function rendus() {
        return $this->hasMany(Rendu::class);
    }
}
