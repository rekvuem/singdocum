@foreach ($errors->all() as $error)
  <div class="alert bg-success text-white alert-styled-left alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    <span class="font-weight-semibold">{{ $error }}</span>
  </div>
@endforeach

@if(session('update'))
  <div class="alert bg-info-700 text-white alert-styled-left alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    <span class="font-weight-semibold">{{ session('update') }}</span>
  </div>
@endif

@if(session('infor'))
  <div class="alert bg-info-700 text-white alert-styled-left alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    <span class="font-weight-semibold">{{ session('infor') }}</span>
  </div>
@endif