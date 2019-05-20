<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendu extends Model
{
    protected $fillable = [
        'user_id',
        'devoir_id',
        'rendu',
        'date_depot',
        'note',
        'commentaire'
    ];

    public function devoir()
    {
        return $this->belongsTo(Devoir::class);
    }
}
