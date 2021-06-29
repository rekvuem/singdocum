<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;
use App\Models\DocumentCreate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider {

  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
// 'App\Models\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot() {
    $this->registerPolicies();

// Админка
    Gate::define('adminka', function ($user) {
      return $user->hasRoleSuccessDepartament(['admin']);
    });

// Канцелярия (отдельный доступ)
    Gate::define('chancery-role', function ($user) {
      return $user->hasRoleSuccessDepartament(['chancery']);
    });
    
// Рецензенты (подпись)
    Gate::define('signing-role', function ($user) {
      return $user->hasRoleFunction(['signing']) ? Response::allow() : Response::deny('У Вас немає дозволу на підпис документу');
    });

// Возможность загружать файлы
    Gate::define('upload-role', function ($user) {
      return $user->hasRoleFunction(['upload']);
    });
    
// Возможность скачивать файлы
    Gate::define('editUpdateUser', function ($user) {
      return $user->hasEditDocument(Auth::id()) ? Response::allow() : Response::deny('У Вас немає дозволу на редагування');
    });
  
// Возможность комментировать
    Gate::define('canComments', function ($user) {
      return $user->hasComment(Auth::id());
    });
    
  }
  
// возможность комментировать документы
  
//    Викладач
//    Gate::define('lecture-role', function ($user) {
//      return $user->hasRoleSuccessDepartament(['lecturer']);
//    });
//    Простой пользователь (сотрудник)
//    Департамент (отдел, кафедра, деканат)
//    Gate::define('deanery-role', function ($user) {
//      return $user->hasRoleSuccessPosition('deanery');
//    });
}
