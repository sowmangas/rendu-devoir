<?php

namespace App\Http\Controllers\Etudiant;

use App\Devoir;
use App\Http\Requests\RenduFormRequest;
use App\Rendu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RenduController extends Controller
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
        $devoirs = Devoir::get();
        return view('etudiant.rendu.create', compact('devoirs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RenduFormRequest $request
     * @return Response
     */
    public function store(RenduFormRequest $request)
    {
        $path = $request->file('rendu')->store(Auth::id());

        $data = array_merge(
            $request->only('devoir_id'), ['user_id' => Auth::id(), 'rendu' => $path, 'date_depot' => now()]
        );

        Rendu::create($data);

        return redirect()->back()->with([
            'type'    => 'success',
            'message' => 'Enregistrement Rendu reussi'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
