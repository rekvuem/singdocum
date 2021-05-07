@extends('auth.layouts.app')
@section('title','Форма реєстрації')
@section('content_login')

<div class="row" style="position: absolute; z-index: 1">
  @if(session('info'))
  <div class="col-12">
    <div class="alert bg-success-800 text-white alert-styled-left alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
      <span class="font-weight-semibold">{{ session('info') }}</span>
    </div>
  </div>
  @endif
</div>


<div class="content d-flex justify-content-center align-items-center">
  <form method="POST" id="formRegisration" class="login-form" action="{{ route('register') }}">
    @csrf
    <div class="card mb-0">
						<div class="card-body">
        <div class="text-center mb-3">
          <h5 class="mb-0">Форма реєстрації</h5>
          <span class="d-block text-muted">Всі поля потрібно заповнити</span>
        </div>

        <div class="form-group text-center text-muted content-divider">
          <span class="px-2">Данні для авторизації</span>
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input id="email" type="email" 
                 class="form-control" value="{{ old('email') }}" 
                 name="email"
                 autocomplete="off" 
                 placeholder="{{ __('E-Mail') }}" required autofocus>
          <div class="form-control-feedback">
            <i class="icon-mention text-muted"></i>
          </div>
          @if ($errors->has('email'))
          @foreach ($errors->get('email') as $error)
          <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
          @endforeach
          @endif
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input id="password" type="password" class="form-control"
                 name="password" required autocomplete="new-password" placeholder="Пароль">
          <div class="form-control-feedback">
            <i class="icon-key text-muted"></i>
          </div>
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input id="password-confirm" type="password" class="form-control" placeholder="Повторити пароль" name="password_confirmation" required autocomplete="new-password">
          <div class="form-control-feedback">
            <i class="icon-key text-muted"></i>
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group text-center text-muted content-divider">
          <span class="px-2">Ваші данні</span>
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input type="text" class="form-control" name="familia" value="{{ old('familia') }}" autocomplete="off" placeholder="Призвіще" required >
          <div class="form-control-feedback">
            <i class="icon-vcard text-muted"></i>
          </div>
          @if ($errors->has('familia'))
          @foreach ($errors->get('familia') as $error)
          <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
          @endforeach
          @endif
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input type="text" class="form-control" name="imya" value="{{ old('imya') }}" autocomplete="off" placeholder="І`мя" required>
          <div class="form-control-feedback">
            <i class="icon-vcard text-muted"></i>
          </div>
          @if ($errors->has('imya'))
          @foreach ($errors->get('imya') as $error)
          <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
          @endforeach
          @endif
        </div>

        <div class="form-group form-group-feedback form-group-feedback-left">
          <input type="text" class="form-control" name="otchestvo" value="{{ old('otchestvo') }}" autocomplete="off" placeholder="Побатькові" >
          <div class="form-control-feedback">
            <i class="icon-vcard text-muted"></i>
          </div>
          @if ($errors->has('otchestvo'))
          @foreach ($errors->get('otchestvo') as $error)
          <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
          @endforeach
          @endif
        </div>


        <div class="form-group form-group-feedback form-group-feedback-left">
          <input id="number_mobile" type="tel" type="text" class="form-control" 
                 name="num_mobile" value="{{ old('num_mobile') }}" autocomplete="off" placeholder="{{ __('+38 0__ ___ __ __') }}"  required>
          <div class="form-control-feedback">
            <i class="icon-mobile2 text-muted"></i>
          </div>
        </div>


        <div class="form-group text-center text-muted content-divider">
          <span class="px-2">Додатково</span>
        </div>
        <div class="form-group text-justify">
          <p>При заповненні форми Ви автоматично підтверджуєте передачу та обробку персональних даних.</p>
        </div>

        <button type="submit" class="btn bg-teal-400 btn-block">{{ __('зареєструватися')}} <i class="icon-circle-right2 ml-2"></i></button>
						</div>
    </div>
    <a href="{{route('welcome')}}" class="btn-link"><i class="icon-arrow-left8"></i> на головну</a>
  </form>
</div>
@endsection