<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body>
	
	<!-- Navbar -->
	@include('pages.navbar.nav')
	<!-- /Navbar -->
	<div class="container normal">


		<div class="row content">
			<div class="col-md-3">
				<!-- Quán lý bài viết -->
				<div class="card">
				  	<div class="card-header bg-dark text-white text-center">Quản lý bài viết</div>
				    <div class="card-body"><span class="fa fa-pie-chart"></span> Hiện đang có: <b>{{ count($numPost) }}</b> bài viết. <br><hr>Bạn có thể thêm bài viết, sửa bài viết, xóa một bài viết nào đó.. <br><br><a href="{{ route('admin.post.list') }}" class="btn btn-dark pull-right text-white">Go »</a></div>
				</div>
			</div>

			<div class="col-md-3">
				<!-- Quản lý tài khoản -->
				<div class="card">
				  	<div class="card-header bg-dark text-white text-center">Quản lý tài khoản </div>
				    <div class="card-body"><span class="fa fa-pie-chart"></span> Hiện đang có: <b>{{ count($numUser) }}</b> tài khoản. <br><hr>Bạn có thể thêm, sửa, xóa 1 thể loại nào đó cho nội dung.<br><br><a href="{{ route('admin.user.list') }}" class="btn btn-dark pull-right text-white">Go »</a></div>
				</div>
			</div>
			
			<div class="col-md-3">
				<!-- Quản lý thể loại -->
				<div class="card">
				  	<div class="card-header bg-dark text-white text-center">Quản lý thể loại</div>
				    <div class="card-body"> 
				    	<span class="fa fa-pie-chart"></span> Hiện đang có: <b>{{ count($cate) }}</b> thể loại. <br><hr>Bạn có thể thêm, sửa, xóa 1 thể loại nào đó cho nội dung.
				    	<br><br>
				    	<a href="{{ route('admin.cate.list') }}" class="btn btn-dark pull-right text-white"> Go »</a>
				    </div>
				</div>
			</div>

			<div class="col-md-3">
				<!-- Quản ký chủ đề -->
				<div class="card">
				  	<div class="card-header bg-dark text-white text-center">Quản lý chủ đề</div>
				    <div class="card-body"><span class="fa fa-pie-chart"></span> Hiện đang có: <b>{{ count($numChuDe) }}</b> chủ đề. <br><hr>Bạn có thể thêm, sửa, xóa 1 chủ đề nào đó cho nội dung.<br><br><a href="{{ route('admin.chude.list') }}" class="btn btn-dark pull-right text-white">Go »</a></div>
				</div>
			</div>

			
		</div>
		<div class="row">
			<div class="col-md-12">
				@yield('content')
			</div>
		</div>
	</div>
	<hr>
	<div class="footer">
		<div class="text-center center-block">
			Copyright &copy; 2018 HUSC-OI <br>
	    	<a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	    	<a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	    	<a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	    	<a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
	  	</div>
	</div>
	<!-- /Footer -->
	@yield('script')
</body>
</html>