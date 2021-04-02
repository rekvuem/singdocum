@extends('auth.layouts.app')
@section('title','Авторизування')
@section('content_login')
<div class="content d-flex justify-content-center align-items-center">
  <form method="POST" action="{{ route('login') }}" class="login-form" >
    @csrf
    <div class="card mb-0">
						<div class="card-body">
        <div class="text-center mb-3">
          <i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
          <h5 class="mb-0">{{ __('Форма авторизування') }}</h5>
          <span class="d-block text-muted">Ваші данні</span>
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input type="text"
                 id="email"
                 name="email"
                 class="form-control"
                 placeholder="{{ __('E-Mail') }}" 
                 value="{{ old('email') }}" 
                 autocomplete="email" required autofocus>
          <div class="form-control-feedback">
            <i class="icon-user text-muted"></i>
          </div>
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input 
            type="password" 
            name="password"
            class="form-control" 
            placeholder="{{ __('Пароль') }}" 
            autocomplete="current-password">
          <div class="form-control-feedback">
            <i class="icon-lock2 text-muted"></i>
          </div>
        </div>

        <div class="form-group d-flex align-items-center">
          <div class="form-check mb-0">
            <label class="form-check-label">
              <input type="checkbox" name="remember" class="form-input-styled" id="remember" {{ old('remember') ? 'checked' : '' }} data-fouc \>
              запам'ятати
            </label>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Авторизуватись <i class="icon-circle-right2 ml-2"></i></button>
        </div>
        <div class="form-group text-center text-muted content-divider">
          <span class="px-2">У Вас немає аккаунту?</span>
        </div>

        <div class="form-group">
          <a href="{{route('leave_form')}}" class="btn btn-light btn-block">заповнити форму для реєстрації</a>          
        </div>
        
        
        <div class="form-group text-center text-muted content-divider">
          <span class="px-2">Забули пароль?</span>
        </div>
        <div class="form-group">
          @if (Route::has('password.request'))
          <a class="btn btn-light btn-block" href="{{ route('password.request') }}">
            {{ __('Запросити новий пароль!') }}
          </a>
          @endif
        </div>

						</div>
    </div>
    <a href="{{ route('welcome')}} " class="btn-link"><i class="icon-arrow-left8"></i> на головну</a>
    
  </form>
  
</div>
@endsection