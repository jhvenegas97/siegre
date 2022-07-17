<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Library\Services\UserUdenarService;
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
    protected $_userUdenarService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserUdenarService $userUdenarService)
    {
        $this->middleware('guest')->except('logout');
        $this->_userUdenarService = $userUdenarService;
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
        $userExists = User::where('email', '=', $user->user['email'])->exists();
        if ($userExists) {
            $userOnDatabase = User::find(User::where('email', '=', $user->user['email'])->first()->id);
            Auth::login($userOnDatabase);
            if (Auth::check()) {
                return redirect()->route('home');
            }
        } else {
            session(['dataUser' => $user]);
            return view('auth.checkIdentification');
        }
    }

    public function checkID(Request $request)
    {
        $arrayStudentsUdenar = $this->_userUdenarService->GetDataUdenar();
        if (session()->has('dataUser')) {
            $userExistsUdenar = $this->_userUdenarService->userExistsInUdenar($request->identificationField,$arrayStudentsUdenar);
            if ($userExistsUdenar) {
                User::create([
                    'name' => session('dataUser')->user['name'],
                    'email' => session('dataUser')->user['email'],
                    'avatar' => session('dataUser')->user['picture'],
                    'state' => '1',
                    'password' => Hash::make('password'),
                    'external_id' => session('dataUser')->user['id'],
                    'identification_id' => Identification::select('id')->where('documento',$request->identificationField)->first()->id,
                ]);
                $user = User::find(User::where('email', '=', session('dataUser')->user['email'])->first()->id);
                Auth::login($user);
                if (Auth::check()) {
                    return redirect()->route('home');
                }
            } else {
                return view('auth.userNotAllowed');
            }
        }
    }

    
}
