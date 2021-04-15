<!-- Secondary sidebar -->
<div class="sidebar sidebar-dark sidebar-secondary sidebar-expand-md">

  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-secondary-toggle">
      <i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Друге меню</span>
				<a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
				</a>
  </div>
  <!-- /sidebar mobile toggler -->


  <!-- Sidebar content -->
  <div class="sidebar-content">
				<div class="card mb-2">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="text-uppercase font-size-sm font-weight-semibold">Навігація</span>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>

      <div class="card-body p-0">
        <ul class="nav nav-sidebar" data-nav-type="accordion">
          <li class="nav-item-header">виконання</li>
          <li class="nav-item">
            <a href="{{ route('cabinet.admin.control.dashboard') }}" class="nav-link"><i class="icon-users2"></i> Головна</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cabinet.admin.control.user') }}" class="nav-link"><i class="icon-users2"></i> Користувачі</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cabinet.admin.control.app') }}" class="nav-link"><i class="icon-vcard"></i> Заяви на реїстрацію</a>
          </li>
        </ul>
      </div>
				</div>
				<!-- /sub navigation -->
				<!-- gggggg -->
				<div class="card mb-2">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="text-uppercase font-size-sm font-weight-semibold">долж / посад / функ</span>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>

      <div class="card-body p-0">
        <ul class="nav nav-sidebar" data-nav-type="accordion">
          <li class="nav-item-header">Редагувати / додати</li>
          <li class="nav-item">
            <a href="{{ route('cabinet.admin.control.departament') }}" class="nav-link"><i class="icon-rating3"></i> Департамент (відділ)</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cabinet.admin.control.position') }}" class="nav-link"><i class="icon-star-half"></i> Посада</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cabinet.admin.control.function') }}" class="nav-link"><i class="icon-cog5"></i> Функції возможності</a>
          </li>
        </ul>
      </div>
				</div>
				<!-- /online-users -->
				<!-- Online users -->
				<div class="card">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="text-uppercase font-size-sm font-weight-semibold">Користувачи</span>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>

      <div class="card-body">
        <ul class="media-list">
          <li class="media">
            <a href="#" class="mr-3">
              <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
            </a>
            <div class="media-body">
              <a href="#" class="media-title font-weight-semibold">James Alexander</a>
              <span class="font-size-xs text-muted d-block">Santa Ana, CA.</span>
            </div>
            <div class="ml-3 align-self-center">
              <span class="badge badge-mark border-success"></span>
            </div>
          </li>
        </ul>
      </div>
				</div>
				<!-- /online-users -->


				<!-- Latest updates -->
				<div class="card">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="text-uppercase font-size-sm font-weight-semibold">Останні оновлення</span>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>

      <div class="card-body">
        <ul class="media-list">
          <li class="media">
            <div class="mr-3">
              <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
                <i class="icon-git-pull-request"></i>
              </a>
            </div>

            <div class="media-body">
              Drop the IE <a href="#">specific hacks</a> for temporal inputs
              <div class="text-muted font-size-sm">4 minutes ago</div>
            </div>
          </li>
        </ul>
      </div>
				</div>
				<!-- /latest updates -->

  </div>
  <!-- /sidebar content -->

</div>
<!-- /secondary sidebar -->