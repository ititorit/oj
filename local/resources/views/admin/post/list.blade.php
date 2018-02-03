@extends('admin.master_admin')
@section('title', 'Admin :: Danh sách bài viết')

@section('content')
	<div class="card content">
		<div class="card-header bg-dark text-white">Danh sách bài viết</div>
		<div class="card-body" id="list-post">
		@if(session('success'))
			<div class="alert alert-success alert-dismissable">
			  	<button type="button" class="close" data-dismiss="alert">&times;</button>
			  	<strong>Thông báo!</strong> {{ session('success') }}
			</div>
		@endif
			@include('admin.post.listAjax')
			<a href="{{ route('admin.post.add') }}" class="btn btn-dark text-white pull-right" style="cursor: pointer;"><span class="fa fa-plus-circle"></span> Thêm bài viết</a>
		</div>
	</div>
@endsection