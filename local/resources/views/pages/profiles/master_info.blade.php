<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="fb:app_id" content="315350365632754"/>
	<meta property="fb:admins" content="100010252905927"/>
</head>
<body style="min-height: 1080px; font-size: 14px;">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  	var js, fjs = d.getElementsByTagName(s)[0];
	  	if (d.getElementById(id)) return;
	  	js = d.createElement(s); js.id = id;
	  	js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=315350365632754';
	  	fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- Navbar -->
	@include('pages.navbar.nav')
	<!-- /Navbar -->

	<div class="container normal">
		@yield('content')
	</div>

	<!-- The Modal To Login -->
	@include('pages.authentication.login')
	<!-- /The Modal To Login -->

	<!-- The Modal To Register -->
	<!-- /The Modal To Register -->
	
	<a href="javascript:void(0)" class="fa fa-arrow-circle-up fa-3x back-top-top"></a>

	<!-- Footer -->
	<hr>
	<div class="footer">
		<div class="text-center center-block">
			Copyright &copy; 2018 Learn Programming <br>
    	<a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
    	<a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
    	<a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
    	<a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
  	</div>
	</div>
	<!-- /Footer -->

	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/auth.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	<script>
		$(document).ready(function() {
			var btt = $('.back-top-top');
			$('.back-top-top').on('click', function() {
				$('html, body').animate({
					scrollTop: 0
				}, 500);
			});
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>