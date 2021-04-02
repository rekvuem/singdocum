<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;

class DashboardController extends BaseController {



  public function dashboard() {
    return view('cabinet.dashboard');
  }

}
