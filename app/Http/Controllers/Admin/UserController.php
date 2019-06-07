<?php

namespace App\Http\Controllers\Admin;

use App\Enum\StatusUser;
use App\Enum\UserRole;
use App\Formation;
use App\Http\Requests\AdminUserUpdateFormRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::where('role', '!=', UserRole::ADMIN)->get();
        return view('admin.users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
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
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        $roles = [UserRole::PROF, UserRole::ETUDIANT];
        $formations = Formation::all();
        return view('admin.users.edit', compact('user'), ['formations' => $formations, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUserUpdateFormRequest $request
     * @param User $user
     * @return void
     */
    public function update(AdminUserUpdateFormRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with([
            'message' => 'Modification effectuer avec success',
            'type'    => 'success'
        ]);
    }

    /**
     * Unlock the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function unlock(Request $request, User $user)
    {
        $user->update(['status' => StatusUser::UNLOCKED]);

        return redirect()->route('admin.users.index')->with([
            'message' => 'Utilisatueur débloqué avec success',
            'type'    => 'success'
        ]);
    }

    /**
     * Lock the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function lock(Request $request, User $user)
    {
        $user->update(['status' => StatusUser::LOCKED]);

        return redirect()->route('admin.users.index')->with([
            'message' => 'Utilisatueur bloqué avec success',
            'type'    => 'success'
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
