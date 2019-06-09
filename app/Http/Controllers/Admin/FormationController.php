<?php

namespace App\Http\Controllers\Admin;

use App\Formation;
use App\Http\Requests\FormationRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::withcount('users')->get();
        return view('admin.formation.index', compact("formations"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.formation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormationRequest $request
     * @return Response
     */
    public function store(FormationRequest $request)
    {
        Formation::create($request->all());
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Enregistrement formation reussi'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Formation $formation
     * @return Response
     */
    public function edit(Formation $formation)
    {
        return view('admin.formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormationRequest $request
     * @param Formation $formation
     * @return Response
     */
    public function update(FormationRequest $request, Formation $formation)
    {
        $formation->update($request->all());

        return redirect()->route('admin.formations.index')->with([
            'message' => 'Modification effectuée avec success',
            'type'    => 'success'
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
