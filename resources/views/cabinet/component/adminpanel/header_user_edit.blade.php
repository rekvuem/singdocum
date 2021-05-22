<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
       <h4 class="edit_title_famil">{{$userEdit->UserSettinged->imya}} {{$userEdit->UserSettinged->familia}}</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default"
          onclick="event.preventDefault(); document.getElementById('user_accept_edit').submit();">
								<i class="icon-checkmark4 text-green-800"></i>
								<span>Зберегти</span>
							</a>
							<a href="{{route('cabinet.admin.control.dashboard')}}" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-backspace text-warning-800"></i>
								<span>Назад</span>
							</a>
						</div>
					</div>
				</div>
			</div>