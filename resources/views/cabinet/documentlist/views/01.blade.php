@extends('cabinet.layouts.index')
@section('title', 'Документ')
@section('header') @include('cabinet/component/header_view_document') @endsection
@section('page_styles')
<style>

</style>
@endsection
@section('content')
<!--  $viewDocuments->type \ $jsons['PIB']-->
<div class="row"> 
  <div class="col-md-9">
    <div class="card rounded-0">
      <div class="card-body">
        d
      </div>
    </div>
  </div>
  <div class="col-md-3">

    <div class="card rounded-0">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="card-title font-weight-semibold">Часу пройшло із творення</span>
        <div class="header-elements">
										<div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-center mb-4">
										<a href="#" class="badge bg-grey-300 mx-1">Пн</a>
										<a href="#" class="badge bg-grey-300 mx-1">Вт</a>
										<a href="#" class="badge bg-grey-300 mx-1">Ср</a>
										<a href="#" class="badge bg-grey-300 mx-1">Чет</a>
										<a href="#" class="badge bg-grey-300 mx-1">П'ят</a>
										<a href="#" class="badge bg-grey-300 mx-1">Суб</a>
										<a href="#" class="badge bg-grey-300 mx-1">Нед.</a>
        </div>
        
        
        <div class="d-flex justify-content-center" style="font-size: 1.8em">
          {{$difference}} дній пройшло
        </div>
        
        
      </div>
      <div class="card-footer">dasd</div>
    </div>

    <div class="card rounded-0">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="card-title font-weight-semibold">Деталі</span>
        <div class="header-elements">
										<div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>

      <table class="table table-borderless table-xs">
        <tbody>
										<tr>
            <td><i class="icon-briefcase mr-1"></i> Тип документу:</td>
            <td class="text-right">{{$typeOfDocum}}</td>
										</tr>
										<tr>
            <td><i class="icon-file-plus mr-2"></i> Хто створил:</td>
            <td class="text-right">{{$UserInfo->UserSettinged->imya}} {{$UserInfo->UserSettinged->familia}}</td>
										</tr>
										<tr>
            <td><i class="icon-briefcase mr-1"></i> Телефон:</td>
            <td class="text-right">{{$UserInfo->UserSettinged->number_mobile}}</td>
										</tr>
										<tr>
            <td><i class="icon-alarm-check mr-2"></i> Створено:</td>
            <td class="text-right">00.00.00</td>
										</tr>
										<tr>
            <td><i class="icon-alarm-add mr-2"></i> Оновлено:</td>
            <td class="text-right">00.00.00</td>
										</tr>
        </tbody>
      </table>

<div class="card-footer d-flex align-items-center">
									<ul class="list-inline list-inline-condensed mb-0">
										<li class="list-inline-item">
											<a href="#" class="text-default"><i class="icon-pencil7"></i></a>
										</li>
										<li class="list-inline-item">
											<a href="#" class="text-default"><i class="icon-bin"></i></a>
										</li>
									</ul>
								</div>
    </div>

    <div class="card rounded-0">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="card-title font-weight-semibold">Приклепнені файли</span>
        <div class="header-elements">
										<div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="media-list">
										<li class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-file-word icon-2x text-primary-300 top-0"></i>
            </div>

            <div class="media-body">
              <div class="font-weight-semibold">Overdrew_scowled.doc</div>
              <ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
                <li class="list-inline-item">Size: 1.2Mb</li>
                <li class="list-inline-item">By <a href="#">Winnie</a></li>
              </ul>
            </div>

            <div class="ml-3">
              <div class="list-icons">
                <a href="#" class="list-icons-item"><i class="icon-download"></i></a>
              </div>
            </div>
										</li>

										<li class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-file-stats icon-2x text-pink-300 top-0"></i>
            </div>

            <div class="media-body">
              <div class="font-weight-semibold">And_less_maternally.pdf</div>
              <ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
                <li class="list-inline-item">Size: 0.9Mb</li>
                <li class="list-inline-item">By <a href="#">Eugene</a></li>
              </ul>
            </div>

            <div class="ml-3">
              <div class="list-icons">
                <a href="#" class="list-icons-item"><i class="icon-download"></i></a>
              </div>
            </div>
										</li>

										<li class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-file-video icon-2x text-success-300 top-0"></i>
            </div>

            <div class="media-body">
              <div class="font-weight-semibold">Well_equitably.mov</div>
              <ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
                <li class="list-inline-item">Size: 14.8Mb</li>
                <li class="list-inline-item">By <a href="#">Jenny</a></li>
              </ul>
            </div>

            <div class="ml-3">
              <div class="list-icons">
                <a href="#" class="list-icons-item"><i class="icon-download"></i></a>
              </div>
            </div>
										</li>

										<li class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-file-pdf icon-2x text-warning-300 top-0"></i>
            </div>

            <div class="media-body">
              <div class="font-weight-semibold">The_less_overslept.pdf</div>
              <ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
                <li class="list-inline-item">Size: 4.3Mb</li>
                <li class="list-inline-item">By <a href="#">Natalie</a></li>
              </ul>
            </div>

            <div class="ml-3">
              <div class="list-icons">
                <a href="#" class="list-icons-item"><i class="icon-download"></i></a>
              </div>
            </div>
										</li>
        </ul>
      </div>
    </div>

    <div class="card rounded-0">
      <div class="card-header bg-transparent header-elements-inline">
        <span class="card-title font-weight-semibold">Рецінзенти</span>
        <div class="header-elements">
										<div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="media-list">
										<li class="media">
            <a href="#" class="mr-3 position-relative">
              <img src="{{ asset('theme/global_assets/images/placeholders/placeholder.jpg') }}" width="36" height="36" class="rounded-circle" alt="">
              <!--              <span class="badge badge-info badge-pill badge-float border-2 border-white">-</span>-->
            </a>

            <div class="media-body">
              <div class="font-weight-semibold">Rebecca Jameson</div>
              <span class="font-size-sm text-muted">Web developer</span>
            </div>

            <div class="ml-3 align-self-center">
              <div class="dropdown">
                <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(16px, 17px, 0px);">
                  <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                  <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                  <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                </div>
              </div>
            </div>
										</li>

        </ul>
      </div>
    </div>

  </div>
</div>
@endsection