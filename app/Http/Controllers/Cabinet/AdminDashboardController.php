<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;

class AdminDashboardController extends BaseController
{
  public function AdminDashboard(){
    return view('cabinet.adminka.dashboard');
  }
}
