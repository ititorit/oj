@extends('admin.master_admin')
@section('title', 'Admin :: Users')

@section('content')
	<div class="card">
		<div class="card-header bg-dark text-white">Danh sách tài khoản</div>
		<div class="card-body" id="list-users">
		@if(session('success'))
			<div class="alert alert-success alert-dismissable">
			  	<button type="button" class="close" data-dismiss="alert">&times;</button>
			  	<strong>Thống báo!</strong> {{ session('success') }}
			</div>
		@endif
			@include('admin.user.listAjax')
		</div>
	</div>
@endsection