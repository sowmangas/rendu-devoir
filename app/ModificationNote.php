<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModificationNote extends Model
{
    protected $fillable = [
        'note', 'justif', 'commentaire', 'user_id', 'rendu_id', 'old_commentaire', 'old_note', 'status'
    ];
}
