<?php

namespace App\Http\Controllers;

use App\Devoir;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $auth = Auth::user();
        if (isStudent()) {

            $devoirs = DB::select("
            SELECT nom_matiere, SUM(nombre_rendu) as nombre_rendu, SUM(nombre_devoir) as nombre_devoir FROM
            (
                select nom_matiere, 0 as nombre_rendu, count(*) as nombre_devoir 
                from users 
                INNER JOIN devoirs on users.formation_id = devoirs.formation_id
                where users.id = " . Auth::id() . "
                GROUP by nom_matiere
                
                UNION all
                
                SELECT nom_matiere, COUNT(*) as nombre_rendu, 0 as nombre_devoir 
                FROM users 
                INNER JOIN rendus ON users.id = rendus.user_id
                INNER JOIN devoirs ON rendus.devoir_id=devoirs.id
                WHERE users.id = " . Auth::id() . "
                GROUP BY nom_matiere
            ) as t
            GROUP BY nom_matiere
            ");

            return view('etudiant.home.index', compact('devoirs'));

        } elseif (isProf()) {

            $whereUserId = Devoir::whereUserId(Auth::id());
            $devoirs = $whereUserId
                ->select('nom_matiere', DB::raw("count('nom_matiere') as nombre_devoir"))
                ->groupBy('nom_matiere')
                ->get();

            return view('prof.home.index', compact('devoirs'));

        } elseif (isAdmin()) {

            return view('admin.home.index');

        } else {
            return abort(404);
        }
    }
}
