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
            ['status' => ModificationNoteStatus::Ok], $request->all()
        );

        ModificationNote::create($data);

        return redirect()->back()->with([
            'type'    => 'success',
            'message' => 'Demande de modification de note envoyer avec succès.'
        ]);
    }
}
