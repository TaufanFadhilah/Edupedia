<?php

namespace App\Http\Controllers\Auth;

use App\University;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Storage;
class UniversityRegisterController extends Controller
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
    protected $redirectTo = '/university';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:universities',
            'password' => 'required|string|min:6|confirmed',
            'decree' => 'required|string|unique:universities',
            'address' => 'required|string',
            'country' => 'required|string',
            'website' => 'required|string',
            'phone' => 'required|string',
            'desc' => 'required|string',
            'photo' => 'required|file',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $path = Storage::disk('public')->put('avatar/university', $data['photo']);
        return University::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'decree' => $data['decree'],
            'address' => $data['address'],
            'country' => $data['country'],
            'website' => $data['website'],
            'phone' => $data['phone'],
            'desc' => $data['desc'],
            'photo' => $path,
        ]);
    }
}
