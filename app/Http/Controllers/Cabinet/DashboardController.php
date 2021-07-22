<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends BaseController {
  
  public function dashboard() {
//    
//    $showDate=cal_days_in_month(CAL_GREGORIAN, 7, 2021);
    
    
    return view('cabinet.dashboard');
  }

  public function getUserInfo() {
    $user = User::where('id', Auth::id())->first();
    $UserInformer = $user->UserSettinged()->first();
    $userShortPIB = $UserInformer->imya . " " . $UserInformer->familia . "";
    $userFamilia  = $UserInformer->familia;
    $userAvatar   = $UserInformer->foto;
    Cookie::queue(Cookie::forever('userShortPIB', $userShortPIB));
    Cookie::queue(Cookie::forever('userFamil', $userFamilia));
    
    IF(Cookie::get('Avatar') == $userAvatar){
      Cookie::queue(Cookie::forever('Avatar', $userAvatar)); 
    }else{
      Cookie::queue(Cookie::forget('Avatar')); 
      Cookie::queue(Cookie::forever('Avatar', $userAvatar)); 
    }
    return redirect()->route('cabinet.dashboard');
  }
  
}
