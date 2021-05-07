<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class LoginController extends Controller {
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
   *  protected $redirectTo = RouteServiceProvider::HOME;
   * @var string
   */
  protected $redirectTo = '/cabinet';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('guest')->except('logout');
  }

//  ПРОВЕРКА НА ДАННЫЕ (ЛОГИН И ПАРОЛЬ) 
//  ПАРОЛЬ = сделать совпадение пароля, и проверка на язык ввода
//  public function login(Request $request) {
//    $email = $request->email;
//    $pass  = $request->password;
//    
//
//    if (auth()->attempt(['email' => $email, 'password' => $pass]))
//    {
//      return redirect()->route('cabinet.dashboard');
//    } else
//    {
//      session()->flash('error', 'asdasdasd');
//      return redirect()->route('login');
//    }
//  }

  public function logout() {
    Cookie::queue(Cookie::forget('userShortPIB'));
    Cookie::queue(Cookie::forget('userFamil'));
    Cookie::queue(Cookie::forget('Avatar'));
    Auth::logout();
    return redirect()->route('welcome');
  }
}
