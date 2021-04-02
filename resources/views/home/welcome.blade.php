@extends('home.layouts.index')
@section('title','Головна сторінка')
@section('content')
@if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
  @auth
  <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">@lang('home.Home')</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="Вихід">
  </form>
  @else
  <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">@lang('home.login')</a>
  <a href="{{ route('leave_form') }}">@lang('home.live.form')</a>
  @endauth
</div>
@endif

<div class=""> Стартовая страница (приветсвия) </div> 
<div class=""> ширина 300пк надпись {{config('app.name')}} </div>
<div class=""> описание (расшифровка) </div>
<div class=""> перечислить в шахмотном порядке приймущества использования (телеграм подписание, уведомление) </div>
<div class=""> сохранение в одном месте документы </div>
<div class=""> подписание документов внутри академии без использования подписей и ожидание очередей </div>
<div class=""> отслеживание документов </div>
<div class=""> загрузка готового документа (ексель, ворд, пдф и т.д.) </div>
<div class=""> генерация документа посредствам текстового редактора </div>
@endsection