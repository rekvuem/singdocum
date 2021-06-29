<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кабінет | @yield('title')</title>  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/global_assets/css/icons/material/styles.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('theme/global_assets/css/icons/icomoon/styles.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('theme/assets/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('theme/assets/css/bootstrap_limitless.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('theme/assets/css/layout.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('theme/assets/css/components.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('theme/assets/css/colors.min.css') }} " rel="stylesheet" />
    @yield('page_styles')
  </head>
  <body class="navbar-top">
    @include('cabinet/layouts/navbar')
    <div class="page-content">
      @include('cabinet/layouts/menubar')
      @if(request()->routeIs('cabinet.admin.control.*'))
      @include('cabinet/component/adminpanel/sidebar_second_admin')
      @endif
      <div class="content-wrapper">
        @yield('header') 
        <div class="content">
          @yield('content')
        </div>
        @include('cabinet/layouts/footer')
      </div>
    </div>  
    <script src="{{ asset('theme/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/ui/perfect_scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/ui/perfect_scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/velocity/velocity.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/velocity/velocity.ui.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/app_cabinet.js') }}"></script>
    <!--<script src="{{ asset('theme/assets/js/animations_velocity_examples.js') }}"></script>-->
    <script src="{{ asset('theme/assets/js/custom.js') }}"></script>
    @yield('page_java')
  </body>
</html>