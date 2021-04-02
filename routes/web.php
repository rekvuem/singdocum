<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Cabinet\DashboardController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//Route::get('/', function () {
//  return view('home.welcome');
//});
//Главная страница
Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/leave_app', [LeaveFormController::class, 'app_for_reg'])->name('leave_form');
Route::post('/insert_form_user', [LeaveFormController::class, 'insert_reg_form'])->name('InsertRegForm');

//Кабинет
Auth::routes(['register' => false]);
Route::group(['prefix' => '/cabinet', 'namespace' => 'Cabinet'], function () {
  Route::get('/', [DashboardController::class, 'dashboard'])->name('cabinet.dashboard');
});

//Route::get('/home', [HomeController::class, 'index'])->name('home');