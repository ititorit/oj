@extends('pages.profiles.master_info')
@section('title', 'Thông tin tài khoản')
@section('content')
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<span class="fa fa-user-circle-o"></span> Thông tin tài khoản
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td><b><span class="fa fa-user-circle"></span> Tên tài khoản:</b></td>
								<td>{{ $user->username }}</td>
							</tr>
							<tr>
								<td><b><span class="fa fa-snowflake-o"></span> Họ và tên:</b></td>
								<td>{{ $user->name }}</td>
							</tr>
							<tr>
								<td><b><span class="fa fa-envelope"></span> Email: </b></td>
								<td>{{ $user->email }}</td>
							</tr>
							<tr>
								<td><b><span class="fa fa-taxi"></span> Địa chỉ: </b></td>
								<td>{{ $user->address }}</td>
							</tr>
							<tr>
								<td><b><span class="fa fa-graduation-cap"></span> Trường: </b></td>
								<td>{{ $user->school }}</td>
							</tr>
							<tr>
								<td><b><span class="fa fa-map"></span> Cấp bậc: </b></td>
								<td>
									<kbd>
									@if($user->role == 0)
									Member
									@elseif($user->role == 1)
									Moderater
									@elseif($user->role == 2)
									Admin
									@endif
									</kbd>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				@if(Auth::check() && Auth::user()->id == $user->id)
				<div class="card-footer">
					<div class="btn-group">
					  	<button type="button" class="btn btn-dark">Chức năng</button>
					  	<button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
					    	<span class="caret"></span>
					  	</button>
					  	<div class="dropdown-menu">
					    	<a class="dropdown-item" href="{{ route('pages.user.edit.info') }}"><span class="fa fa-cog"></span> Cập nhật thông tin</a>
					    	<a class="dropdown-item" href="{{ route('pages.user.edit.password') }}"><span class="fa fa-key"></span> Đổi mật khẩu</a>
					  	</div>
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="col-md-3">
			<div class="card content">
				<div class="card-header bg-dark text-white">
					<span class="fa fa-user-o float-right"></span> {{$user->name}}
				</div>
				<div class="card-body">
					<div class="col-xs-1">fdsa</div>
					<div class="col-xs-1">fdsa</div>
					<div class="col-xs-1">fdsa</div>
				</div>
			</div>
		</div>
	</div>
@endsection