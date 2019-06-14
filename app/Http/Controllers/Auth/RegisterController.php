<?php

namespace App\Http\Controllers\Auth;

use App\Formation;
use App\Http\Controllers\Controller;
use App\Mail\ProfCorrectionDevoirMail;
use App\Mail\SenderMailUsersRegisted;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Show the application registration form.
     *
     * @param Request $request
     * @return Response
     */
    public function showRegistrationForm(Request $request)
    {
        $formations = Formation::get();

        if ($request->ajax()) {
            return $formations;
        }

        return view('auth.register', compact('formations'));
    }

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
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom'         => ['required', 'string', 'max:255'],
            'prenom'      => ['required', 'string', 'max:255'],
            'adresse_mel' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role'        => ['required', 'string', 'max:255'],
            'titre'       => ['nullable', 'string', 'max:255',],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    protected function create(array $data)
    {
        $random = Str::random(15);

        $user =  User::create([
            'nom'          => $data['nom'],
            'prenom'       => $data['prenom'],
            'adresse_mel'  => $data['adresse_mel'],
            'role'         => $data['role'],
            'titre'        => $data['titre'],
            'formation_id' => $data['formation_id'],
            'password'     => bcrypt($random)
        ]);

        Mail::to($user->adresse_mel)->queue(new SenderMailUsersRegisted($random, $user));

        return $user;
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if($request->ajax())
            return response('Utilisateur crée avec success');

        return redirect()->route('admin.users.index')->with([
            'message' => 'Utilisateur crée avec success',
            'type'    => 'success'
        ]);
    }
}
