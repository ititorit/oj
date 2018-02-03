@extends('pages.profiles.master_info')
@section('title', 'Thay đổi mật khẩu')
@section('content')
	<div class="col-md-6 offset-md-3">
		<div class="card" style="margin-top: 90px;">
			<div class="card-header text-white bg-dark">
				<span class="fa fa-key"></span> <b>Thay đổi mật khẩu</b>
			</div>
			<div class="card-body">
				@if(session('danger'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ session('danger') }}
				</div>
				@endif
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="oldpass"><span class="fa fa-key"></span> <b>Mật khẩu cũ:</b></label>
						<input type="password" class="form-control" name="oldPass" value="{{ old('oldPass') }}" placeholder="Nhập vào mật khẩu hiện tại của bạn">
					</div>
					@if($errors->has('oldPass'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('oldPass') }}
					</div>
					@endif
					<div class="form-group">
						<label for="newpass"><span class="fa fa-check-square-o"></span> <b>Mật khẩu mới:</b> </label>
						<input type="password" class="form-control" name="newPass" value="{{ old('newPass') }}" placeholder="Nhập vào mật khẩu mới">
					</div>
					@if($errors->has('newPass'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('newPass') }}
					</div>
					@endif
					<div class="form-group">
						<label for="re-newpass"><span class="fa fa-check-square-o"></span> <b>Nhập lại mật khẩu mới:</b> </label>
						<input type="password" class="form-control" name="re_newPass" value="{{ old('re_newPass') }}" placeholder="Nhập lại mật khẩu mới">
					</div>
					@if($errors->has('re_newPass'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('re_newPass') }}
					</div>
					@endif
					<button class="btn btn-dark"><span class="fa fa-cogs"></span> Đổi mật khẩu</button>
				</form>
			</div>
		</div>
	</div>
@endsection