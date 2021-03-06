<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable=['nom_formation'];
    public function users(){
        return $this->hasMany(User::class);
    }
}
