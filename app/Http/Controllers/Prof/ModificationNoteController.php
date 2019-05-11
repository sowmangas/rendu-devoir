<?php

namespace App\Http\Controllers\Prof;

use App\Enum\ModificationNoteStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModificationNoteFormRequest;
use App\ModificationNote;

class ModificationNoteController extends Controller
{
    public function store(ModificationNoteFormRequest $request)
    {
        $modificationNote = ModificationNote::whereUserIdAndRenduIdAndStatus(
            $request->get('user_id'),
            $request->get('rendu_id'),
            ModificationNoteStatus::PENDING
        )->first();

        if ($modificationNote) return response("Même demande déjà en cours merci de patienter l'approbation de l'ADMIN");

        $data = array_merge(
            ['status' => ModificationNoteStatus::PENDING], $request->all()
        );

        ModificationNote::create($data);

        return response("Demande transférée avec succes à l'ADMIN");
    }
}
