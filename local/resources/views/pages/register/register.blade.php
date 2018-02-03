@extends('pages.profiles.master_info')
@section('title', 'Đăng ký tài khoản')
	
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card content">
			<div class="card-header bg-dark text-white">
				<span class="fa fa-user-plus float-right"></span> Đăng ký tài khoản
			</div>
			<div class="card-body">
				<form method="POST" id="form-register">
					{{ csrf_field() }}
					
					<!-- Username -->
					<div class="form-group">
						<label for="user"><span class="fa fa-user-circle"></span> Tài khoản:</label>
						<input type="text" class="form-control" id="user-register" name="username_reg" required="true" value="{{ old('username_reg') }}" placeholder="Nhập vào tài khoản...">
					</div>
					@if($errors->has('username_reg'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('username_reg') }}
					</div>
					@endif
					<!-- /Username -->
					
					<!-- Password -->
					<div class="form-group">
						<label for="pass"><span class="fa fa fa-key"></span> Mật khẩu:</label>
						<input type="password" class="form-control" id="pass-register" required="true" name="password_reg" value="{{ old('password_reg') }}" placeholder="Nhập vào mật khẩu...">
					</div>
					@if($errors->has('password_reg'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('password_reg') }}
					</div>
					@endif
					<!-- /Password -->

					<!-- Re-password -->
					<div class="form-group">
						<label for="pass"><span class="fa fa fa-key"></span> Nhập lại mật khẩu:</label>
						<input type="password" class="form-control" id="re-pass-register" required="true" name="re_password_reg" value="{{ old('re_password_reg') }}" placeholder="Nhập lại mật khẩu...">
					</div>
					@if($errors->has('re_password_reg'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('re_password_reg') }}
					</div>
					@endif
					<!-- /Re-password -->

					<!-- name -->
					<div class="form-group">
						<label for="user"><span class="fa fa-user-circle"></span> Tên:</label>
						<input type="text" class="form-control" id="name-register" name="name_reg" required="true" value="{{ old('name_reg') }}" placeholder="Nhập vào tên...">
					</div>
					<!-- /name -->

					<!-- Email -->
					<div class="form-group">
						<label for="email"><span class="fa fa fa-envelope"></span> Email:</label>
						<input type="email" class="form-control" id="email-register" name="email_reg" required="true" value="{{ old('email_reg') }}" placeholder="Nhập vào email...">
					</div>
					@if($errors->has('email'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('email') }}
					</div>
					@endif
					<!-- /Email -->

					<button type="submit" id="btn-register" class="btn btn-block btn-success"><span class="fa fa-user-plus"></span> Đăng ký</button>
					</form>
					<hr>
					<form action="{{ route('login_with_facebook') }}" method="GET">
						<button class="btn btn-block btn-social btn-facebook text-white" type="submit">
				        	<span class="fa fa-facebook-square fa-lg"></span> Login with Facebook
				        </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection