<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
  protected $redirectTo = '/home';

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
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
      'mobile_number' => 'required|numeric',
      'date_of_birth' => 'required|date',
      'gender' => 'required|max:8',
      'height' => 'required',
      'weight' => 'required',
      'blood_group' => 'required|max:5',
      'address' => 'required',
      'occupation' => 'required|max:55',
      'photo_url' => 'required|file',
      'blood_donate_status' => 'required',
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  protected function create(array $data,$stored_file_path)
  {
    $data = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'mobile_number' => $data['mobile_number'],
      'date_of_birth' => $data['date_of_birth'],
      'gender' => $data['gender'],
      'height' => $data['height'],
      'weight' => $data['weight'],
      'blood_group' => $data['blood_group'],
      'address' => $data['address'],
      'occupation' => $data['occupation'],
      'photo_url' => $stored_file_path,
      'blood_donate_status' => $data['blood_donate_status'],
    ]);
    return $data;
  }
}
