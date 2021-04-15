<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;

class AdminUsersController extends BaseController
{
  public function listUser(){
    return view('cabinet.adminka.users');
  }
  
  public function listapp(){
    return view('cabinet.adminka.regapp');
  }
}
