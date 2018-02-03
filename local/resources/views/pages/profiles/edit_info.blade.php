@extends('pages.profiles.master_info')
@section('title', 'Thông tin tài khoản')
@section('content')
	<div class="card">
		<div class="card-header bg-dark text-white">
			<span class="fa fa-user-circle-o"></span> Cập nhật thông tin
		</div>
		<div class="card-body">
			<form method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="user"><b><span class="fa fa-user-circle"></span> Tên tài khoản:</b></label>
					<input type="text" class="form-control" value="{{ $user->username }}" disabled="true" title="Không thay đổi được">
				</div>
				<div class="form-group">
					<label for="name"><b><span class="fa fa-snowflake-o"></span> Họ và tên:</b></label>
					<input type="text" class="form-control" name="name_edit" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="email"><b><span class="fa fa-envelope"></span> Email: </b></label>
					<input type="email" class="form-control" value="{{ $user->email }}" disabled="true" title="Không thay đổi được">
				</div>
				<div class="form-group">
					<label for="address"><b><span class="fa fa-taxi"></span> Địa chỉ: </b></label>
					<input type="text" class="form-control" name="address_edit" value="{{ $user->address }}" placeholder="Chưa có.. Vui lòng nhập vào địa chỉ của bạn để cập nhật.">
				</div>
				<div class="form-group">
					<label for="school"><b><span class="fa fa-graduation-cap"></span> Trường: </b></label>
					<input type="text" class="form-control" name="school_edit" value="{{ $user->school }}" placeholder="Chưa có.. Vui lòng nhập vào trường học của bạn để cập nhật.">
				</div>
				<button type="submit" class="btn btn-dark"><span class="fa fa-check-square"></span> Cập nhật</button>	
			</form>
		</div>
	</div>
@endsection