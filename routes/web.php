<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cabinet\AdminController;
use App\Http\Controllers\Cabinet\AdminDashboardController;
use App\Http\Controllers\Cabinet\AdminUsersController;
use App\Http\Controllers\Cabinet\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Cabinet\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
//Кабинет
Auth::routes(['register' => true, 'verify' => true]);
Route::group(['prefix' => '/cabinet', 'namespace' => 'Cabinet', 'middleware' => 'auth'], function () {
  Route::get('/', [DashboardController::class, 'getUserInfo'])->name('cabinet.getinfors');
  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('cabinet.dashboard');
//  налаштування своїх настроєк
  Route::get('/settings', [SettingsController::class, 'index'])->name('cabinet.settings');
  Route::put('/updpass/{user}', [SettingsController::class, 'checkingPass'])->name('cabinet.settings.updpass');
  Route::put('/updinfo/{user}', [SettingsController::class, 'updateInfo'])->name('cabinet.settings.info');
  Route::put('/insertinfo/{user}', [SettingsController::class, 'insertFoto'])->name('cabinet.settings.foto');

  Route::prefix('/admin')->name('cabinet.admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'AdminDashboard'])->name('control.dashboard');
    Route::get('/users', [AdminUsersController::class, 'listUser'])->name('control.user');
//  Управление и добавление должностями, отделами, званиями и т.д.
    Route::get('/departament', [AdminController::class, 'listDepart'])->name('control.departament');
        Route::post('/departament/insert/', [AdminController::class, 'insertDepart'])->name('control.insert.departament');   
        Route::put('/departament/update/{id}', [AdminController::class, 'updateDepart'])->name('control.update.departament');
        Route::delete('/departament/delete/{delete}',[AdminController::class, 'deleteDepart'])->name('control.delete.departament');
    Route::get('/position', [AdminController::class, 'listPosition'])->name('control.position');
        Route::post('/position/insert/', [AdminController::class, 'insertPosition'])->name('control.insert.position');
        Route::put('/position/update/{id}', [AdminController::class, 'updatePosition'])->name('control.update.position');
        Route::delete('/position/delete/{delete}',[AdminController::class, 'deletePosition'])->name('control.delete.position');
    Route::get('/functions', [AdminController::class, 'listFunction'])->name('control.function');
        Route::post('/function/insert/', [AdminController::class, 'insertFunction'])->name('control.insert.function');  
        Route::put('/function/update/{id}', [AdminController::class, 'updateFunction'])->name('control.update.function');
        Route::delete('/function/delete/{delete}',[AdminController::class, 'deleteFunction'])->name('control.delete.function');
//  ДОБАВЛЕНИЕ департ, отдел \ должность \ функционал для отдела, позиции



//  ОБНОВЛЕНИЕ департ, отдел \ должность \ функционал для отдела, позиции


  });
});
