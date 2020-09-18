<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use App\Models\User\User;
use App\Providers\RouteServiceProvider;
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
//        dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_name' => ['required', 'string'],
            'edrpou' => ['required', 'string'],
            'passport' => ['required', 'string'],
            'ipn' => ['required', 'string', 'max:10'],
            'p_c' => ['required', 'string', 'max:29'],
            'phone' => ['required', 'string', 'max:15'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['name'],
            'patronymic' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'passport' => 'default passport',
            'phone' => 'default phone'
        ]);

        $company = Company::create([
            'name' => $data['company_name'],
            'edrpou' => $data['edrpou'],
            'ipn' => $data['ipn'],
            'p_c' => $data['p_c'],
            'company_phone' => $data['phone'],
            'director_id' => $user->id,
            'email' => $data['email'],
        ]);

        $user->company_id = $company->id;
        $user->update();

        return $user;
    }
}
