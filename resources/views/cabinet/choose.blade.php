@extends('cabinet.layouts.index')
@section('title', 'Вибрати тип створення документу')
@section('content')

<div class="row">
  <div class="col-2">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Накази загальні / 01</h5>
        <p class="mb-3">
          накази загальні по академії, 
        </p>
        <a href="{{route('cabinet.select.document', 1)}}" class="btn bg-blue-400 legitRipple">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>
  <div class="col-2">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Накази по співробітникам / 02</h5>
        <p class="mb-3">
          Накази по співробітникам, переведення з одного віділення до іншего та інше
        </p>
        <a href="{{route('cabinet.select.document', 2)}}" class="btn bg-blue-400 legitRipple">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>
  <div class="col-2">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Накази по студентам / 03</h5>
        <p class="mb-3">
          Накази по студентам відрахування, назначення стимпендії, зарухування студентів та інше.
        </p>
        <a href="{{route('cabinet.select.document', 03)}}" class="btn bg-blue-400 legitRipple">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>
  <div class="col-2">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Відпустка / 04</h5>
        <p class="mb-3">
          Відправлення співробітників в відпустку
        </p>
        <a href="{{route('cabinet.select.document', 4)}}" class="btn bg-blue-400 legitRipple">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>
  <div class="col-2">
    <div class="card text-center">
      <div class="card-body">
        <i class="icon-file-text icon-4x text-blue border-blue border-3 rounded-round p-3 mb-3"></i>
        <h5 class="card-title">Відрадження / 05</h5>
        <p class="mb-3">
          Відправлення співробітників у відрадження
        </p>
        <a href="{{route('cabinet.select.document', ['typeId'=>5, 'bbb'=>55])}}" class="btn bg-blue-400 legitRipple">Вибрати <i class="icon-arrow-right14 ml-2"></i></a>
      </div>
    </div>
  </div>
</div>

@endsection