@extends('master')
@section('title', 'Bài viết theo chủ đề')
@section('content')
	<div id="noidungChuDe">
		@include('pages.home.listPostByChuDeAjax')
	</div>
@endsection