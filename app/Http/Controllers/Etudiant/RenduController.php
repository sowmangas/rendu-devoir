<?php

namespace App\Http\Controllers\Etudiant;

use App\Devoir;
use App\Http\Requests\RenduFormRequestEtudiant;
use App\Mail\EtudiantRenduDevoirMail;
use App\Mail\ProfesseurRenduDevoirMail;
use App\Rendu;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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


        $rendu = Rendu::create($data);

        $rendu = $rendu->load('devoir');

        $user = User::whereId($rendu->devoir->user_id)->first();

        if ($user != null) {
            $email = $user->adresse_mel;

            Mail::to($email)->send(new ProfesseurRenduDevoirMail($rendu, $user));
        }

        Mail::to(Auth::user()->adresse_mel)->send(new EtudiantRenduDevoirMail($rendu));


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
