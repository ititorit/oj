@extends('admin.master_admin')
@section('title', 'Admin :: Edit user')
@section('content')
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header bg-dark text-white">Chỉnh sửa tài khoản</div>
			<div class="card-body">
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="id">Id:</label>
						<input type="text" class="form-control" id="id_edit" name="id_edit" value="{{ $user->id }}" disabled="true">
					</div>
					<div class="form-group">
						<label for="user">Tài khoản:</label>
						<input type="text" class="form-control" id="user_edit" name="user_edit" value="{{ $user->username }}" disabled="true" placeholder="Tài khoản">
					</div>
					<div class="form-group">
						<label for="name">Tên:</label>
						<input type="text" class="form-control" id="name_edit" name="name_edit" value="{{ $user->name }}" placeholder="Tên">
					</div>
					@if($errors->has('name_edit'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('name_edit') }}
					</div>
					@endif
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" class="form-control" name="email_edit" value="{{ $user->email }}" placeholder="Email">
					</div>
					@if($errors->has('email_edit'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('email_edit') }}
					</div>
					@endif
					<button type="submit" id="btn-editUser" class="btn btn-dark"><span class="fa fa-user-o"></span> Chỉnh sửa</button>
				</form>
			</div>
		</div>
	</div>
@endsection