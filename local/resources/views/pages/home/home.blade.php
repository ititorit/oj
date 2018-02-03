@extends('master')
@section('title', 'Home')
@section('content')
	@if(session('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> {{ session('success') }}
	</div>
	@endif
	@if(session('danger'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> {{ session('danger') }}
	</div>
	@endif
	<div id="noidung">
		@include('pages.home.homeAjax')
	</div>
@endsection