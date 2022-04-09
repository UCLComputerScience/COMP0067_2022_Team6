<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'org' => $data['org'],
            'phone' => $data['phone'],
            'role' => 2,
            'address' => $data['address'],
            'country' => $data['country'],
            'latitude'=> $data['latitude'],
            'longitude'=> $data['longitude'],
            'number_of_employees'=> $data['number_of_employees'],
            'number_of_volunteers'=> $data['number_of_volunteers'],
            'website'=> $data['website'],
            'sdg1' => $data['sdg1'],
            'sdg2' => $data['sdg2'],
            'sdg3' => $data['sdg3'],
            'sdg4' => $data['sdg4'],
            'sdg5' => $data['sdg5'],
            'sdg6' => $data['sdg6'],
            'sdg7' => $data['sdg7'],
            'sdg8' => $data['sdg8'],
            'sdg9' => $data['sdg9'],
            'sdg10' => $data['sdg10'],
            'sdg11' => $data['sdg11'],
            'sdg12' => $data['sdg12'],
            'sdg13' => $data['sdg13'],
            'sdg14' => $data['sdg14'],
            'sdg15' => $data['sdg15'],
            'sdg16' => $data['sdg16'],
            'sdg17' => $data['sdg17'],
        ]);

        
    }
}
