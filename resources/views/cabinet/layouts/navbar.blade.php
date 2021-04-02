	<div class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
			<div class="navbar-brand navbar-brand-md">
				<a href="#" class="d-inline-block"">
					<img src="{{ asset('theme/global_assets/images/logo_dark.png')}}" alt="">
				</a>
			</div>
			
			<div class="navbar-brand navbar-brand-xs">
				<a href="#" class="d-inline-block" >
				 <img src="{{ asset('theme/global_assets/images/logo_icon_dark.png')}}" alt="">
				</a>
			</div>
		</div>
		<!-- /header with logos -->
	
		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="" class="d-inline-block">
					<img src="{{ asset('theme/global_assets/images/logo_light.png')}}" alt="">
				</a>
			</div>	
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->
		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav mr-md-auto">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->
	</div>