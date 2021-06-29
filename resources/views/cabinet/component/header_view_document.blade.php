<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
       <h4 class="edit_title_famil">
          @switch($viewDocuments->type)
            @case(1)
              Накази загальні
            @break
            @case(2)
              Накази по співробітникам
            @break
            @case(3)
              Накази по студентам
            @break
            @case(4)
              Відпустка
            @break  
            @case(5)
              Відрадження
            @break   
            @case(6)
              Перенесення пар
            @break
          @endswitch
       </h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">

						</div>
					</div>
				</div>
			</div>