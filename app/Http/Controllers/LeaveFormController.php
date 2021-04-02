<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveFormController extends Controller
{
//форма заявки на регистрацию в системе  
  public function app_for_reg() {
    return view('auth.leave_form');
  }
  
  public function insert_reg_form(Request $request) {

    $messages = [
      'familia.regex'   => 'Вибачте, :input але такий вид даних не підтримується',
      'imya.regex'      => 'Вибачте, :input але такий вид даних не підтримується',
      'otchestvo.regex' => 'Вибачте, :input але такий вид даних не підтримується',
    ];

    $rules = [
      'email'         => 'required|email',
      'familia'       => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
      'imya'          => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
      'otchestvo'     => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
      'department'    => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
      'position'      => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
      'responsible'   => ['required', 'string', 'regex:/[а-яіА-ЯІ]|[a-zA-Z]/u'],
      'number_mobile' => ['regex:/(01)[0-9]{9}/'],
    ];

    $validator = Validator::make($request->all(), $rules, $messages)->validate();

    $request->session()->flash('info', 'Заява прийнята в оброботку');

    UserLeaveFrom::create([
      'email'         => $request->email,
      'familia'       => $request->familia,
      'imya'          => $request->imya,
      'otchestvo'     => $request->otchestvo,
      'department'    => $request->department,
      'position'      => $request->position,
      'responsible'   => $request->responsible,
      'number_mobile' => $request->num_mobile,
      'ip_form_send'  => $request->ip(),
      'create_at'     => now(),
    ]);

    return back();
  }
}
