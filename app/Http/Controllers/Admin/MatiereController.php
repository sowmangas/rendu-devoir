<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminMatiereUpdateFormRequest;
use App\Http\Requests\MatiereRequest;
use App\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Matiere::all();
        return view('admin.matiere.index', compact("matieres"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matiere.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MatiereRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatiereRequest $request)
    {
        Matiere::create($request->all());
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Enregistrement formation reussi'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Matiere $matiere
     * @return void
     */
    public function edit(Matiere $matiere)
    {
        return view('admin.matiere.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MatiereRequest $request
     * @param Matiere $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(MatiereRequest $request, Matiere $matiere)
    {
        $matiere->update($request->all());

        return redirect()->route('admin.matiere.index')->with([
            'message' => 'Modification effectuée avec success',
            'type'    => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Matiere $matiere
     * @return int
     * @throws \Exception
     */
    public function destroy( Matiere $matiere)
    {
        $matiere->delete();
        return redirect()->route('admin.matiere.index')->with([
            'message' => 'Suppression effectuée avec success',
            'type'    => 'success'
        ]);
    }
}
