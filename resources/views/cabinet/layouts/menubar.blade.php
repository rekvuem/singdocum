<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">
  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
      <i class="icon-arrow-left8"></i>
				</a>
				Навигация
				<a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
				</a>
  </div>
  <!-- /sidebar mobile toggler -->
  <div class="sidebar-content">
				<!-- пользовательское меню -->
				<div class="sidebar-user-material">
      <div class="sidebar-user-material-body">
        <div class="card-body text-center">
          <a href="#">
            <img src="{{ asset(Cookie::get('Avatar')) }}" class="img-fluid rounded-circle shadow-1 mb-3" width="100" height="100" alt="">
          </a>
          <h6 class="mb-0 text-white text-shadow-dark">{!! Cookie::get('userShortPIB') !!}</h6>
          <span class="font-size-sm text-white text-shadow-dark">[відділ/звання/посада]</span>
        </div>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>

        <div class="sidebar-user-material-footer">
          <a href="#user-nav" 
             class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse">
            <span>Мій кабінет</span>
          </a>
        </div>
      </div>

      <div class="collapse" id="user-nav">
        <ul class="nav nav-sidebar">
          <li class="nav-item">
            <a href="{{ route('cabinet.settings') }}" class="nav-link">
              <i class="icon-user-plus"></i>
              <span>Налаштування</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="icon-exit3"></i>
              <span> 
                {{ __('Вихід') }}
              </span>
            </a>
          </li>
        </ul>
      </div>
				</div>
				<!-- /пользовательское меню -->
				<!-- главная навигация -->
				<div class="card card-sidebar-mobile">
      <ul class="nav nav-sidebar" data-nav-type="accordion">
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Меню</div> 
          <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('cabinet.dashboard')}}" class="nav-link ">
            <i class="mi-dashboard"></i>
            <span>
              Головна
              <span class="d-block font-weight-normal opacity-50"><small>dashboard</small></span>
            </span>
          </a>
        </li>
        <!-- /навигация -->
        <!-- Общие меню доступное для всех -->
        <li class="nav-item">
          <a href="{{route('cabinet.choose.document')}}" class="nav-link ">
            <i class="mi-exit-to-app"></i>
            <span>
              Вибрати тип документу
            </span>
          </a>
        </li>
        
        
        <!-- /конец общего меню -->
        <!-- Меню доступное для пользователя -->
        
        
        
        <!-- /конец пользователя -->
        
        
        <!-- меню администратора -->
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Панел адміністратора</div> 
          <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
          <a href="{{ route('cabinet.admin.control.dashboard') }}" class="nav-link ">
            <i class="mi-backspace"></i>
            <span>
              Dashboard (управління)
            </span>
          </a>
        </li>
        <!-- /администратора -->
        <!-- Пример 
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">начальное меню</div> 
          <i class="icon-menu" title="Layout options"></i>
        </li>
        <li class="nav-item nav-item-submenu ">
          <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Різне</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item"><a href="" class="nav-link">Завантажити файл</a></li>
            <li class="nav-item"><a href="" class="nav-link">Налаштувати півроку</a></li>
          </ul>
        </li>
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-upload4"></i> <span>Завантаження</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item"><a href="" class="nav-link">Семінарів</a></li>
            <li class="nav-item"><a href="" class="nav-link">Навчально-методичне забезпечення</a></li>
          </ul>
        </li>-->
      </ul>


				</div>
				<!-- /главная навигация -->
  </div>
</div>