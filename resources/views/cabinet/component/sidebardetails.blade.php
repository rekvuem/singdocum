    
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
      <a href="#" class="badge mx-1 @if($dayng == 'пн') badge-danger @else bg-grey-300 @endif">пн</a>
      <a href="#" class="badge mx-1 @if($dayng == 'вт') badge-danger @else bg-grey-300 @endif">вт</a>
      <a href="#" class="badge mx-1 @if($dayng == 'ср') badge-danger @else bg-grey-300 @endif">ср</a>
      <a href="#" class="badge mx-1 @if($dayng == 'чт') badge-danger @else bg-grey-300 @endif">чт</a>
      <a href="#" class="badge mx-1 @if($dayng == 'пт') badge-danger @else bg-grey-300 @endif">пт</a>
      <a href="#" class="badge mx-1 @if($dayng == 'сб') badge-danger @else bg-grey-300 @endif">сб</a>
      <a href="#" class="badge mx-1 @if($dayng == 'нд') badge-danger @else bg-grey-300 @endif">нд</a>
    </div>

    <div class="d-flex justify-content-center" style="font-size: 1.8em">
      {{$difference}} пройшло
    </div>

  </div>
  <div class="card-footer"></div>
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

  <table class="table table-borderless table-xs table-responsive">
    <tbody>
      <tr>
        <td width="50%"><i class="icon-briefcase mr-1"></i> Тип документу:</td>
        <td class="text-right">{{$typeOfDocum}}</td>
      </tr>
      @if($viewDocuments->num ?? null)
      <tr>
        <td><i class="icon-briefcase mr-1"></i> Номер/Шифр:</td>
        <td class="text-right">№ {{$viewDocuments->num}}-{{$viewDocuments->shifr}}</td>
      </tr> 
      @endif
      <tr>
        <td><i class="icon-file-plus mr-2"></i> Хто створил:</td>
        <td class="text-right">{{$UserInfo->UserSettinged->imya}} {{$UserInfo->UserSettinged->familia}}</td>
      </tr>
      <tr>
        <td><i class="icon-mobile2 mr-1"></i> Телефон:</td>
        <td class="text-right">{{$UserInfo->UserSettinged->number_mobile}}</td>
      </tr>
      <tr>
        <td><i class="icon-alarm-check mr-2"></i> Створено:</td>
        <td class="text-right">{{date('d.m.Y', strtotime($viewDocuments->created_at))}}</td>
      </tr>
      <tr>
        <td><i class="icon-alarm-add mr-2"></i> Оновлено:</td>
        <td class="text-right">{{date('d.m.Y', strtotime($viewDocuments->updated_at))}}</td>
      </tr>
    </tbody>
  </table>
      
  <div class="card-footer d-flex align-items-center">
          <ul class="list-inline list-inline-condensed mb-0">
            <li class="list-inline-item">
              <a href="#" class="text-default"><i class="icon-history"></i></a>
            </li>
            @can('editUpdateUser')
            <li class="list-inline-item">
              <a href="{{route('cabinet.document.edit.view06', ['take'=>$viewDocuments->token])}}" class="text-default"><i class="icon-trash"></i></a>
            </li>
            @endcan
            
          </ul>
        </div>

</div>
<!-- Рецензенты полученные документы на подпись -->
<div class="card rounded-0">
  <div class="card-header bg-transparent header-elements-inline">
    <span class="card-title font-weight-semibold">Рецінзенти (на підпис)</span>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <ul class="media-list">
      @foreach($toAcceptNew as $userAccepts)
      <li class="media">
        <a href="#" class="mr-3 position-relative">
          <img src="{{ asset($userAccepts->foto) }}" width="36" height="36" class="rounded-circle" alt="">
        </a>

        <div class="media-body">
          <div class="font-weight-semibold">{{ $userAccepts->imya }} {{ $userAccepts->familia }}</div>
          <span class="font-size-sm text-muted">{{ $userAccepts->departament_title }} ({{ $userAccepts->position_title }})</span>
        </div>

        <div class="ml-3 align-self-center">
          @if($userAccepts->status_accept == 'no')
          <span class=""><i class="icon-file-empty text-danger-800" title="не підписано"></i></span>
          @else
          <span class=""><i class="icon-file-check text-primary-800" title="підписано в "></i></span>
          @endif       

          @if($userAccepts->view_status == 'no view')
          <span class=""><i class="icon-eye-blocked text-danger-700" title="не просмотрено"></i></span>
          @else
          <span class=""><i class="icon-eye text-green-700" title="просмотрено в {{date('d.m.y H:i', strtotime($userAccepts->date_view))}}"></i></span>
          @endif
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>

<!-- Полученные рассылки -->
<div class="card rounded-0">
  <div class="card-header bg-transparent header-elements-inline">
    <span class="card-title font-weight-semibold">Розсилка (користувачам)</span>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <ul class="media-list">

      @foreach($toView as $userView)
      <li class="media">
        <a href="#" class="mr-3 position-relative">
          <img src="{{ asset($userView->foto) }}" width="36" height="36" class="rounded-circle" alt="">
        </a>

        <div class="media-body">
          <div class="font-weight-semibold">{{ $userView->imya }} {{ $userView->familia }}</div>
          <span class="font-size-sm text-muted">{{ $userView->departament_title }} ({{ $userView->position_title }})</span>
        </div>

        <div class="ml-3 align-self-center">
          @if($userView->view_status == 'no view')
          <span class=""><i class="icon-eye-blocked text-danger-700" title="не просмотрено"></i></span>
          @else
          <span class=""><i class="icon-eye text-green-700" title="просмотрено в {{date('d.m.y H:i', strtotime($userView->created_at))}}"></i></span>
          @endif
        </div>
      </li>
      @endforeach

    </ul>
  </div>
</div>

<!-- Прикрипленное файлы -->
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
    @can('upload-role')
    <form action="" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="documentToken" value="{{$viewDocuments->token}}">
      <input type="file" name="FileInput" multiple>
      <input type="submit" class="btn" value="завантажити">
    </form>
    @endcan
  </div>
</div>