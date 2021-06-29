<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller {
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
   * RouteServiceProvider::HOME
   * @var string
   */
  protected $redirectTo = 'login';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data) {

    $messages = [
      'password.confirmed' => 'Підтвердження пароля не збігається.',
    ];

    return Validator::make($data, [
          'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'familia'  => ['required', 'string'],
          'imya'     => ['required', 'string'],
            ], $messages);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function create(array $data) {

    $userInsert = User::create([
          'email'    => $data['email'],
          'password' => Hash::make($data['password']),
    ]);

    $userInfor = UserSettings::create([
          'user_id'       => $userInsert->id,
          'familia'       => $data['familia'],
          'imya'          => $data['imya'],
          'otchestvo'     => $data['otchestvo'],
          'number_mobile' => $data['num_mobile'],
          'foto'          => 'foto/default.png',
          'telegram'      => null,
          'created_at'    => now(),
          'updated_at'    => now(),
    ]);

    DB::table('user_departament')->insert([
      'user_id'        => $userInsert->id,
      'departament_id' => 4,
    ]);

//придумать как вывести сообщение об регистрации
    return $userInsert;
  }

}
