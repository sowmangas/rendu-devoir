<?php

namespace App\Http\Controllers\Auth;

use App\Enum\StatusUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckFirstConnexionFormRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'adresse_mel';
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['status' => StatusUser::UNLOCKED]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response|void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }


        if ($this->attemptLogin($request)) {

            if ($request->user()->first_connexion) {

                session()->put(['user' => $request->user()]);

                Auth::logout();

                return redirect()->route('auth.first_connexion');
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @return View
     */
    public function firstConnexion()
    {
        return view('auth.firstConnexion');
    }

    public function check(CheckFirstConnexionFormRequest $request)
    {
        $user = User::where('adresse_mel', session()->get('user')->adresse_mel)->first();
        if ($user == null) return abort(422, 'Bad Info user');

        if (!Hash::check($request->get('password_old'), $user->password)) return abort(422, "Bad password");

        $user->first_connexion = "0";
        $user->password = bcrypt($request->get('password'));
        $user->save();

        Auth::loginUsingId($user->id);

        return redirect('/');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
