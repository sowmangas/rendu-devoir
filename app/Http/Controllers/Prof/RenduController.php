<?php

namespace App\Http\Controllers\Prof;

use App\Devoir;
use App\Http\Requests\RenduFormRequestEtudiant;
use App\Http\Requests\RenduFormRequestProf;
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
     * @param RenduFormRequestEtudiant $request
     * @return Response
     */
    public function store(RenduFormRequestEtudiant $request)
    {
        $path = str_replace(
            'public', 'storage',
            $request->file('rendu')->store(config('uploads.image'))
        );

        $data = array_merge(
            $request->only('devoir_id'),
            ['user_id' => Auth::id(), 'rendu' => $path, 'date_depot' => now()]
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
     * @param RenduFormRequestProf $request
     * @param int $id
     * @return Response
     */
    public function update(RenduFormRequestProf $request, $id)
    {
        $whereDevoirId = Rendu::whereDevoirId($id)
            ->whereUserId($request->get('etudiant_id'));

        $first = $whereDevoirId->first();
      //  dd($first);
        if ($first != null && $first->note !=null )
            return abort(401, 'action no authority');

        $whereDevoirId
            ->whereUserId($request->get('etudiant_id'))
            ->update([
                'note'        => $request->get('note'),
                'commentaire' => $request->get('commentaire')
            ]);

        return redirect()->back()->with([
            'type'    => 'success',
            'message' => 'Correction effectuée avec succèss'
        ]);
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
