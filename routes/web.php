<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cabinet\AdminController;
use App\Http\Controllers\Cabinet\AdminDashboardController;
use App\Http\Controllers\Cabinet\AdminUsersController;
use App\Http\Controllers\Cabinet\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Cabinet\DashboardController;
use App\Http\Controllers\Cabinet\DistributionController;
use App\Http\Controllers\Cabinet\EditDocumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cabinet\DocumentController;
use App\Http\Controllers\Cabinet\SingingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\UserSettings;
use App\Notifications\TelegramHello;
use Illuminate\Support\Facades\Notification;

/*
  |--------------------------------------------------------------------------
  | Email Verification Request
  |--------------------------------------------------------------------------
  |
  | Система верификации пользователей (подверждение)
  |
 */
Route::get('/email/verify', function () {
  return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();
  return redirect('/cabinet');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();
  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

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
//Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Кабинет
Auth::routes(['register' => true, 'verify' => false]);
Route::prefix('/cabinet')->name('cabinet.')->namespace('Cabinet')->middleware(['auth', 'verified'])->group(function () {
  Route::get('/', [DashboardController::class, 'getUserInfo'])->name('getinfors');
  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');    //проверить нужен ли этот роут для главной страницы
//  налаштування своїх настроєк
  Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
  
  Route::get('/telegram', [SettingsController::class, 'TelegramUser'])->name('insert.telegram');
  
  Route::get('/send_telegram_msg', function(){
    $userSelect = UserSettings::where('user_id', Auth::id())
        ->first();
    Notification::send($userSelect->telegram_user, new TelegramHello());
    return redirect()->route('cabinet.dashboard');
  });
  
  Route::put('/updpass/{user}', [SettingsController::class, 'checkingPass'])->name('settings.updpass');
  Route::put('/updinfo/{user}', [SettingsController::class, 'updateInfo'])->name('settings.info');
  Route::put('/insertinfo/{user}', [SettingsController::class, 'insertFoto'])->name('settings.foto');

// создание документа 
// Список созданных документов
  Route::prefix('/document')->name('document.')->group(function () {
    Route::get('/', [DocumentController::class, 'listMyDocument'])->name('mydocuments'); //список документов созданных пользователем
    Route::get('/document_choose', [DocumentController::class, 'chooseDocument'])->name('choose');
    Route::get('/document_select/{typeId}', [DocumentController::class, 'SelectDocument'])->name('select');
// шаблони документів
    Route::get('/shablon01', [DocumentController::class, 'document01'])->name('shablon_01');
    Route::get('/shablon02', [DocumentController::class, 'document02'])->name('shablon_02');
    Route::get('/shablon03', [DocumentController::class, 'document03'])->name('shablon_03');
    Route::get('/shablon04', [DocumentController::class, 'document04'])->name('shablon_04');
    Route::get('/shablon05', [DocumentController::class, 'document05'])->name('shablon_05');
    Route::get('/shablon06', [DocumentController::class, 'document06'])->name('shablon_06'); //заява на перенос пар для преподователя   

    Route::post('/insert_document', [DocumentController::class, 'insertDocument'])->name('insert');
    Route::post('/insert_comment', [DocumentController::class, 'insertComment'])->name('insert.comment');
    Route::get('/take_comment', [DocumentController::class, 'takeComment'])->name('take.comment');
    
    Route::get('/view/01/{takeid}', [DocumentController::class, 'ViewDocument01'])->name('view01');
    Route::get('/view/02/{takeid}', [DocumentController::class, 'ViewDocument02'])->name('view02');
    Route::get('/view/03/{takeid}', [DocumentController::class, 'ViewDocument03'])->name('view03');
    Route::get('/view/04/{takeid}', [DocumentController::class, 'ViewDocument04'])->name('view04');
    Route::get('/view/05/{takeid}', [DocumentController::class, 'ViewDocument05'])->name('view05');
    
    Route::get('/view/06/{takeid}', [DocumentController::class, 'ViewDocument06'])->name('view06');
    Route::get('/edit/06/{take}', [EditDocumController::class, 'EditDocum06'])->middleware('can:editUpdateUser')->name('edit.view06');
    Route::put('/upd/06/{take}', [EditDocumController::class, 'UpdateDocum06'])->name('upd.view06');
    
  });

// Доступ сотрудников канцелярии. (перечень документов созданных пользователями, отображение список для ввода номера и шифра к документам)
  Route::group(['prefix' => '/chancery', 'name' => 'chancery', 'middleware' => 'can:chancery-role'], function () {
    Route::get('/', [DocumentController::class, 'listСhancery'])->name('chancery');
  });

// Доступ для разссылки документов
  Route::prefix('/distribution')->name('distrib.')->namespace('Cabinet')->group(function () {
    Route::get('/', [DistributionController::class, 'index'])->name('list');
    Route::get('/view/check/{token}/{type}', [DistributionController::class, 'checking'])->name('checking');
  });

//Доступ користувачіва кто має дозвул підпису
  Route::prefix('/signinged')->name('sign.')->namespace('Cabinet')->middleware(['can:signing-role'])->group(function () {
    Route::get('/', [SingingController::class, 'listing'])->name('list');
    Route::get('/view/check/{type}/{token}', [SingingController::class, 'check'])->name('check');
  });

// Доступ админка
  Route::prefix('/admin')->name('admin.')->middleware('can:adminka')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'AdminDashboard'])->name('control.dashboard');
//  Список пользователей и управление
    Route::get('/users', [AdminUsersController::class, 'listUser'])->name('control.user');
    Route::get('/users/edit/{takeID}', [AdminUsersController::class, 'user_edit'])->name('control.user.edit');
    Route::put('/users/update/{takeID}', [AdminUsersController::class, 'user_upd'])->name('control.user.upd');
    Route::delete('/users/delete/{delete}', [AdminUsersController::class, 'user_delete'])->name('control.user.del');
//  Управление департаментами, отделами, кафедрами, факультетами
    Route::get('/departament', [AdminController::class, 'listDepart'])->name('control.departament');
    Route::post('/departament/insert/', [AdminController::class, 'insertDepart'])->name('control.insert.departament');
    Route::put('/departament/update/{id}', [AdminController::class, 'updateDepart'])->name('control.update.departament');
    Route::delete('/departament/delete/{delete}', [AdminController::class, 'deleteDepart'])->name('control.delete.departament');
//  Управление должностями, званиями      
    Route::get('/position', [AdminController::class, 'listPosition'])->name('control.position');
    Route::post('/position/insert/', [AdminController::class, 'insertPosition'])->name('control.insert.position');
    Route::put('/position/update/{id}', [AdminController::class, 'updatePosition'])->name('control.update.position');
    Route::delete('/position/delete/{delete}', [AdminController::class, 'deletePosition'])->name('control.delete.position');
// Управление функциональностями (редактировать, комментраии, добавление, удалить, подписание, чат, уведомление)
    Route::get('/functions', [AdminController::class, 'listFunction'])->name('control.function');
    Route::post('/function/insert/', [AdminController::class, 'insertFunction'])->name('control.insert.function');
    Route::put('/function/update/{id}', [AdminController::class, 'updateFunction'])->name('control.update.function');
    Route::delete('/function/delete/{delete}', [AdminController::class, 'deleteFunction'])->name('control.delete.function');
// Управление факультетами
    Route::get('/faculty', [AdminController::class, 'listFaculty'])->name('control.faculty');

// Управление кафедрами
    Route::get('/kafedra', [AdminController::class, 'listKafedra'])->name('control.kafedra');
  });
});
