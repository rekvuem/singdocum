<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <title>{{config('app.name')}} | @yield('title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/global_assets/css/icons/material/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/css/bootstrap_limitless.min.css') }} " rel="stylesheet">
    <link href="{{ asset('theme/assets/css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/css/colors.min.css') }}" rel="stylesheet">
    
    <style>
    </style>
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
    <script src="{{ asset('theme/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/ui/slinky.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/ui/ripple.min.js') }}"></script>
    <script src="{{ asset('theme/global_assets/js/plugins/media/fancybox.min.js') }}"></script>

    <script src="{{ asset('theme/assets/js/custom.js') }}"></script>
    
    <script>
    </script>
  </body>
  <footer>

  </footer>
</html>