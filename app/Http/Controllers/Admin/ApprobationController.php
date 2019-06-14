<?php

namespace App\Http\Controllers\Admin;

use App\Enum\ModificationNoteStatus;
use App\Http\Requests\RenduFormRequestProf;
use App\ModificationNote;
use App\Rendu;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApprobationController extends Controller
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
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $modificationNotes = ModificationNote::with('professeur','etudiant')
            ->whereStatus(ModificationNoteStatus::PENDING)
            ->get();
        if ($request->ajax()) { return $modificationNotes; }

        return view('admin.approbation.create', compact('modificationNotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        if ($request->get('status')==='ok' ) {
            $whereRenduId = Rendu::whereId($request->get('rendu_id'))
                ->update([
                    'note'        => $request->get('note'),
                    'commentaire' => $request->get('commentaire')
                ]);

            $whereApproId = ModificationNote::whereId($request->get('appro_id'))
                ->update([
                    'status' => ModificationNoteStatus::OK,
                ]);


            return redirect()->back()->with([
                'type'    => 'success',
                'message' => 'Approbation effectuée avec succèss'
            ]);
        }
        elseif ($request->get('status')==='rejected' ) {
            $whereApproId = ModificationNote::whereId($request->get('appro_id'))
                ->update([
                    'status' => ModificationNoteStatus::REJECTED,
                ]);


            return redirect()->back()->with([
                'type'    => 'danger',
                'message' => 'Approbation refusée'
            ]);
        }

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
