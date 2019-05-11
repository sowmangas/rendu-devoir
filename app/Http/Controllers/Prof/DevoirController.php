<?php

namespace App\Http\Controllers\Prof;

use App\Devoir;
use App\Formation;
use App\Http\Requests\DevoirRequest;
use App\Matiere;
use App\Rendu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DevoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formations = Formation::get();
        $matieres = Matiere::get();
        return view('prof.devoir.create', compact('formations'),compact('matieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DevoirRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $path = $request->file('enonce')->store("/public/files/".Auth::id());
        $data = array_merge(
            $request->only('formation_id', 'intitule', 'evaluer',
                'type_correction', 'date_limit_depot', 'enonce', 'periode',
                'nom_matiere'), [ 'enonce' => $path, 'user_id' => Auth::id() ]
        );

        Devoir::create($data);

        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Enregistrement Devoir reussi'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $devoir = Devoir::whereUserId(Auth::id())
            ->with('rendus')
            ->findOrFail($id);

        return view('prof.devoir.show', compact('devoir'));
    }

    public function devoirByMatiere($name)
    {
        $devoirs = Devoir::whereNomMatiere($name)
            ->whereUserId(Auth::id())
            ->get();

        return view('prof.devoir.matiere', compact('devoirs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DevoirRequest $request
     * @param int $id
     * @return Response
     */
    public function update(DevoirRequest $request, $id)
    {
        dd($id);
//        dd($request->all(), $request->file('corrige_type'));
//
//        $path = str_replace('public', 'storage',
//            $request->file('corrige_type')->store(config('uploads.image'))
//        );
//
//        Devoir::whereId($id)->update(['corrige_type' => $path]);
//
//        Rendu::whereDevoirId($id)
//            ->whereUserId($request->get('etudiant_id'))
//            ->update([
//                'note' => $request->get('note'),
//                'commentaire' => $request->get('commentaire')
//            ]);
//
//        return redirect()->back()->with([
//            'type'    => 'success',
//            'message' => 'Correction effectuée avec succèss'
//        ]);
    }

    /**
     * Permert de rendre un devoir visible
     *
     * @param $id
     * @return RedirectResponse
     */
    public function putVisible ($id) {
        Devoir::findOrFail($id)->update(['visible_corrige_type' => true]);
        return redirect()->back()->with([
            'type'    => 'success',
            'message' => 'Succèss, corrigé type visible pour tous.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
