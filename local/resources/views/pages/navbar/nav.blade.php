<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" style="cursor: default; color: white;">Learn Programming</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href=" {{ route('home') }} " class="nav-link" id="home-page"><span class="fa fa-home"></span> Home</a>
				</li>
				<!-- <li class="nav-item">
					<a href="{{ route('about') }}" class="nav-link"><span class="fa fa-globe" id="about-page"></span> About</a>
				</li> -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" style="cursor: pointer;"><span class="fa fa-cubes"></span> Thuật toán</a>
					<div class="dropdown-menu">
						@foreach($cate as $val)
						<a href="{{ route('pages.listPost.bycate', ['idCate' => $val->id]) }}" class="dropdown-item"><span class="fa fa-code"></span> {{ $val->name }}</a>
						@endforeach
					</div>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<!-- Dropdown -->
				@if(Auth::check())
				<li class="nav-item dropdown">
					<a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"><span class="fa fa-user-circle-o"></span> {{ Auth::user()->username }}</a>
					<div class="dropdown-menu">
						@if(Auth::user()->role >= 1)
						<a href="{{ route('admin.home') }}" class="dropdown-item"><span class="fa fa-pie-chart"></span> Trang Admin</a>
						@endif
						<a href="{{ route('pages.user.info', ['id' => Auth::user()->id]) }}" class="dropdown-item"><span class="fa fa-address-book-o"></span> My Profile</a>
						<a href="{{ route('logout') }}" class="dropdown-item"><span class="fa 
						fa-power-off "></span> Log out</a>
					</div>
				</li>
				@else
				<li class="nav-item">
					<a data-toggle="modal" data-target="#loginModal" class="nav-link" style="cursor: pointer;"><span class="fa fa-user-circle"></span> Đăng nhập</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}"><span class="fa fa-user-plus"></span> Đăng ký</a>
				</li>
				@endif
				<!-- /Dropdown -->
			</ul>
		</div>
	</div>
</nav>