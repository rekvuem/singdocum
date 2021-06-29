@extends('cabinet.layouts.index')
@section('title', 'Вибрати тип створення документу')
@section('page_styles')
<style>
  .card{
    height: 350px;
  }
</style>
@endsection
@section('content')
<div class="row"> 
@can('adminka')
  <div class="col-sm-6 col-md-2 col-10">
    <div class="card rounded-0">
      <div class="card-body text-center">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title ">Накази загальні / 01</h5>
        <p class="mb-3">
          накази загальні по академії, 
        </p>

      </div>
      <div class="card-footer text-right">
        <a href="{{route('cabinet.document.select', 1)}}" class="btn bg-blue-400 rounded-0">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>


  <div class="col-3 col-sm-6 col-md-3">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Накази по співробітникам / 02</h5>
        <p class="mb-3">
          Накази по співробітникам, переведення з одного віділення до іншего та інше
        </p>

      </div>
      <div class="card-footer text-right">
        <a href="{{route('cabinet.document.select', 2)}}" class="btn bg-blue-400">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>

  <div class="col-3 col-sm-5 col-md-3">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Накази по студентам / 03</h5>
        <p class="mb-3">
          Накази по студентам відрахування, назначення стимпендії, зарухування студентів та інше.
        </p>

      </div>
      <div class="card-footer text-right">
        <a href="{{route('cabinet.document.select', 03)}}" class="btn bg-blue-400">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>
@endcan
  <div class="col-12 col-sm-6 col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Відпустка / 04</h5>
        <p class="mb-3">
          Відправлення співробітників в відпустку
        </p>

      </div>
      <div class="card-footer text-right">
        <a href="{{route('cabinet.document.select', 4)}}" class="btn bg-blue-400">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Відрадження / 05</h5>
        <p class="mb-3">
          Відправлення співробітників у відрадження
        </p>

      </div>
      <div class="card-footer text-right">
        <a href="{{route('cabinet.document.select', ['typeId'=>5, 'bbb'=>55])}}" class="btn bg-blue-400">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Перенесення пар</h5>
        <p class="mb-3">
          Перенесення пар для викладача
        </p>

      </div>
      <div class="card-footer text-right">
        <a href="{{route('cabinet.document.shablon_06')}}" class="btn bg-blue-400">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>

</div>

@endsection