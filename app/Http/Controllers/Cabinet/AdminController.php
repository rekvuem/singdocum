<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;

class AdminController extends BaseController
{
  public function listDepart(){
    return view('cabinet.adminka.deport');
  }
  
  public function listPosition(){
    return view('cabinet.adminka.position');
  }
  
  public function listFunction(){
    return view('cabinet.adminka.function');
  }
}
