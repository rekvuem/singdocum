<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ListDepartament;
use App\Models\ListPosition;
use App\Models\ListFunction;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends BaseController {

  public function listUser() {
    $userList = User::with('UserSettinged')->get();
//    dd($userList->toArray());
    return view('cabinet.adminka.users', compact(['userList']));
  }

  public function user_edit($takeID) {
    $userEdit     = User::with(['UserSettinged', 'UserAccessDepart', 'UserAccessPosit', 'UserAccessFunct'])->where('id', $takeID)->first();
    $ListDepart   = ListDepartament::get();
    $ListPosition = ListPosition::get();
    $ListFunction = ListFunction::get();
//    dd($userEdit->toArray());
    return view('cabinet.adminka.user_edit', compact(['userEdit', 'ListDepart', 'ListPosition', 'ListFunction']));
  }

  public function user_upd(Request $req, $takeID) {
    $req->session()->flash('info', 'Данні оновлені!');
    if (!empty($req->pass_new))
    {
      IF ($req->pass_new == $req->pass_repeat)
      {
        $UserPasswordUpd           = User::where('id', $takeID)->first();
        $UserPasswordUpd->password = Hash::make($req->pass_new);
        $UserPasswordUpd->save();
        $req->session()->flash('update', 'Парол оновлен!');
      } else
      {
        $req->session()->flash('info', 'Помилка!');
      }
    }

    User::where('id', $takeID)->update([
      'email' => $req->email,
    ]);

    $userInfoUpdate = UserSettings::where('user_id', $takeID)->update([
      'familia'   => $req->familia,
      'imya'      => $req->imya,
      'otchestvo' => $req->otchestvo,
    ]);

    $SelectUser = User::where('id',$takeID)->first();
    $SelectUser->UserAccessDepart()->sync($req->roles_departament);
    $SelectUser->UserAccessPosit()->sync($req->roles_position);
    $SelectUser->UserAccessFunct()->sync($req->roles_function);

    return redirect()->route('cabinet.admin.control.user');
//    return dd($req->all());
  }

}
