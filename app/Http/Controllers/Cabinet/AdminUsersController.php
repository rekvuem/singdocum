<?php

namespace App\Http\Controllers\Cabinet;

//use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Carbon;

class AdminUsersController extends BaseController {

  public function listUser() {
    $userList = User::with('UserSettinged')->get();
    return view('cabinet.adminka.users', compact(['userList']));
  }


}
