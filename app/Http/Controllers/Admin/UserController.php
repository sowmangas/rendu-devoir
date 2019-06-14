<?php

namespace App\Http\Controllers\Admin;

use App\Enum\StatusUser;
use App\Enum\UserRole;
use App\Formation;
use App\Http\Requests\AdminUserUpdateFormRequest;
use App\Mail\SenderMailUsersRegisted;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::with('formation')->where('role', '!=', UserRole::ADMIN)->orderBy('id')->paginate(10);
        return view('admin.users.index', compact("users"));
    }

    /**
     * Display a listing of the resource.
     *
     * @param String $formation
     * @return Response
     */
    public function list(String $formation)
    {
        $users = User::with('formation')->where('formation_id', '=', $formation)->paginate(10);
        return view('admin.users.index', compact("users"));
    }

    /**
     * Display a listing of the resource.
     *
     * @param String $formation
     * @return Response
     */
    public function search(Request $request)
    {   $search=trim(strtolower($request->search));

        $search=trim(strtolower($search));
        $users = User::with('formation')

            ->where(function ($query) use ($search){
                $query->whereRaw('LOWER(`adresse_mel`) LIKE ? ',['%'.trim(strtolower($search)).'%'])
                      ->orWhereRaw('LOWER(`nom`) LIKE ? ',['%'.trim(strtolower($search)).'%'])
                      ->orWhereRaw('LOWER(`prenom`) LIKE ? ',['%'.trim(strtolower($search)).'%'])
                      ->orWhereRaw('LOWER(`role`) LIKE ? ',['%'.trim(strtolower($search)).'%'])
                      ->get();
            })
            ->paginate(10);

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
            'message' => 'Modification effectuée avec success',
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
            'message' => 'Utilisateur débloqué avec success',
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
            'message' => 'Utilisateur bloqué avec success',
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
    public function reset(Request $request, User $user)
    {
        $random = Str::random(15);
        $user->update(['password'=> $random,'first_connexion'=>'1']);

        Mail::to($user->getAttributeValue('adresse_mel'))->queue(new SenderMailUsersRegisted($random, $user));

        return redirect()->route('admin.users.index')->with([
            'message' => 'Réinitialisation effectuée avec success',
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
