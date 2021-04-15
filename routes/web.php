<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveFormController;
use App\Http\Controllers\Cabinet\AdminController;
use App\Http\Controllers\Cabinet\AdminDashboardController;
use App\Http\Controllers\Cabinet\AdminUsersController;
use App\Http\Controllers\Cabinet\SettingsController;
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
//  налаштування своїх настроєк
  Route::get('/settings', [SettingsController::class, 'index'])->name('cabinet.settings');
  Route::put('/updpass/{user}', [SettingsController::class, 'checkingPass'])->name('cabinet.settings.updpass');
  Route::put('/updinfo/{user}', [SettingsController::class, 'updateInfo'])->name('cabinet.settings.info');
  Route::put('/insertinfo/{user}', [SettingsController::class, 'insertFoto'])->name('cabinet.settings.foto'); 

  Route::prefix('/admin')->name('cabinet.admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'AdminDashboard'])->name('control.dashboard');
    Route::get('/users', [AdminUsersController::class, 'listUser'])->name('control.user');
    Route::get('/regapp', [AdminUsersController::class, 'listApp'])->name('control.app');
//  Управление и добавление должностями, отделами, званиями и т.д.
    Route::get('/departament', [AdminController::class, 'listDepart'])->name('control.departament');
    Route::get('/position', [AdminController::class, 'listPosition'])->name('control.position');
    Route::get('/functions', [AdminController::class, 'listFunction'])->name('control.function');
  });
});

//Route::get('/home', [HomeController::class, 'index'])->name('home');