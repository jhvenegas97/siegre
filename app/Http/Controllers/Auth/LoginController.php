<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Identification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $userExists = User::where('email','=',$user->user['email'])->exists();
        if($userExists){
            $userOnDatabase = User::find(User::where('email','=',$user->user['email'])->first()->id);
            Auth::login($userOnDatabase);
            if(Auth::check()){
                return redirect()->route('home');
            }
        }
        else{
            session(['dataUser' => $user]);
            return view('auth.checkIdentification');
        }

    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        #TODO: verificar cómo regresa los datos Facebook
    }

    public function checkID(Request $request){
        if (session()->has('dataUser')){
            $userExists = Identification::where('documento', '=', $request->identificationField)->exists();
            if($userExists) {
                User::create([
                    'name' => session('dataUser')->user['name'],
                    'email' => session('dataUser')->user['email'],
                    'avatar' => session('dataUser')->user['picture'],
                    'state'=> '1',
                    'password' => Hash::make('password'),
                    'external_id' => session('dataUser')->user['id'],
                    'identification_id' => $request->identificationField,
                ]);
                $user = User::find(User::where('email','=',session('dataUser')->user['email'])->first()->id);
                Auth::login($user);
                if(Auth::check()){
                    return redirect()->route('home');
                }
            }
            else{
                return view('auth.userNotAllowed');
            }
        }

    }
}
