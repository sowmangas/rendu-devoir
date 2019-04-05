<?php

namespace App\Http\Controllers;

use App\Devoir;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $formationId = Auth::user()->formation_id;
        $devoirs = Devoir::where('formation_id', $formationId)
            ->where('user_id', Auth::id())
            ->get();
        return view('home', compact('devoirs'));
    }
}
