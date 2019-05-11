<?php

namespace App\Http\Controllers\Etudiant;

use App\Devoir;
use App\Formation;
use App\Http\Requests\DevoirRequest;
use App\Rendu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DevoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('etudiant.devoir.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formations = Formation::get();
        return view('etudiant.devoir.create', compact('formations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $path = $request->file('enonce')->store("/public/" . Auth::id());
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
     * @param  string $name
     * @return Response
     */
    public function show($name)
    {
        $devoirs = Devoir::with(['etudiants' => function($query) {
            $query->where('user_id', Auth::user()->id);
        }])->where('nom_matiere', $name)
            ->where('formation_id', Auth::user()->formation_id)
            //->where('pivot_user_id', Auth::user()->id)
            ->get()
            //->where('pivot->user_id', Auth::user()->id)
            ->map(function ($devoir) {
                foreach ($devoir->etudiants as $etudiant) {
                    $devoir->etudiant_id=$etudiant->pivot->user_id;
                    $devoir->rendu = str_replace('public', 'storage', $etudiant->pivot->rendu);
                    $devoir->date_depot = $etudiant->pivot->date_depot;
                    $devoir->note = $etudiant->pivot->note;
                    $devoir->commentaire = $etudiant->pivot->commentaire;
                }
                return $devoir;
            });
            //->where('etudiant_id', Auth::user()->id);
           //dd($devoirs);
        return view('etudiant.devoirs.show', compact('devoirs'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
