@extends('master')
@section('title', $post->title)

@section('content')
	
	<div class="card">

		<!-- Rate for post -->
		<div class="widget-rating hidden-xs" id="rate">
			<a class="fa fa-caret-up fa-lg fa-3x" data-toggle="tooltip" data-placement="right" title="Up Vote" id="vote_up"></a><br>
			<span style="font-size: 19px;">

				<b id="points">
					{{ $post->votes }}
				</b>

			</span><br>
			<a class="fa fa-caret-down fa-lg fa-3x" data-toggle="tooltip" data-placement="right" title="Down Vote" id="vote_down"></a>
		</div>
		<!-- End rate. -->

		<!-- Header of the post. -->
		<div class="card-header bg-dark text-white">
			<div style="width: 30%; display: inline-block;">
				<span class="fa fa-user-o"></span> 
				<a href="{{ route('pages.user.info', ['id' => $post->idUser]) }}" class="text-white" data-toggle="tooltip" title="Thông tin cá nhân [{{ $post->user->username }}]">{{ $post->user->username }}</a>
			</div>
			<div style="float: right; display: inline-block;" class="hidden-xs hidden-sm">
				<span class="fa fa-clock-o"></span> {{ $post->created_at->format('d/m/Y') }}
			</div>
		</div>
		<!-- End header of the post. -->

		<!--Content of the post. -->
		<div class="card-body">
			<h4><span class="fa fa-th-list"></span> {{ $post->title }}</h4>
			<p style="font-size: 14px;">
				{!! $post->full !!}
			</p>
			@if(Auth::check())
			@if(Auth::user()->role == 2 || Auth::user()->id == $post->idUser)
			<hr>
			<div class="btn-group btn-group-sm pull-right">
				<a data-toggle="tooltip" data-placement="top" title="chỉnh sửa viết" onclick="return confirm('Bạn có chắc chắn muốn chỉnh sửa bài viết này không?')" href="{{ route('admin.post.edit', ['id' => $post->id]) }}" class="btn btn-dark text-white"><span class="fa fa-pencil-square-o"></span></a>
			    <a data-toggle="tooltip" data-placement="top" title="Xoá bài viết" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')" href="{{ route('admin.post.delete', ['id' => $post->id]) }}" class="btn btn-dark text-white"> <span class="fa fa-trash-o"></span> </a>
			</div>
			@endif
			@endif
		</div>
		<!-- End content of the post. -->

		<!-- Footer of the post. -->
		<div class="card-footer text-right">
			<h6>
				<span class="fa fa-tag"></span> Tags: 
				<span class="badge badge-dark"><a href="{{ route('pages.listPost.bycate', ['idCate' => $post->idCate]) }}" style="color: white;">{{ $post->theloai->name }} </a></span> 
				<span class="badge badge-dark"><a href="{{ route('pages.listPost.byChuDe', ['idChuDe' => $post->idChuDe]) }}" style="color: white;">{{ $post->chude->name }}</a></span>
			</h6>
		</div>
		<!-- End footer of the post. -->

		<!-- Cmt by facebook application -->
		<div class="card-footer">
			<p><b>COMMENT</b></p>
			<div class="fb-like" data-href="{{ route('post.detail', ['id' => $post->id]) }}" data-width="1080" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
			<div class="fb-save" data-uri="{{ route('post.detail', ['id' => $post->id]) }}" data-size="small"></div>
			<br>
			<div class="fb-comments" data-href="{{ route('post.detail', ['id' => $post->id]) }}" data-width="100%" data-numposts="6"></div>
		</div>
		<!-- End cmt by facebook application -->
	</div>
@endsection