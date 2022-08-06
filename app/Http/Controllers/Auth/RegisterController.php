<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IdentificationController;
use App\Models\Identification;
use App\Library\Services\UserUdenarService;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Gender;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $_userUdenarService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserUdenarService $userUdenarService)
    {
        $this->middleware('guest');
        $this->_userUdenarService = $userUdenarService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'identification_id' => ['required', 'string'],
            'gender' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try{
            $arrayStudentsUdenar = $this->_userUdenarService->GetDataUdenar();
            $userExistsUdenar = $this->_userUdenarService->userExistsInUdenar($data['identification_id'],$arrayStudentsUdenar);
            if ($userExistsUdenar) {
                $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'state'=> '1',
                'gender_id'=> $data['gender'],
                'identification_id' => $data['identification_id'],
            ]);
            $user->assignRole([3]);
            return $user;
            } else {
                return view('auth.userNotAllowed');
            }
        }
        catch (Exception $e) {
            return view('auth.userNotAllowed');
        }
        
    }

    public function showRegistrationForm()
    {
        $genders = Gender::all();
        return view("auth.register", compact("genders"));
    }
}
