@extends('master')
@section('title', 'Tìm kiếm')
@section('content')
	@if($result->isEmpty())
	<div class="alert alert-warning">
		<span class="fa fa-warning"></span> Không có kết quả với từ khoá "<code>{{ $keywords }}</code>". Vui lòng thử lại...
	</div>
	<!-- Search -->
	<form action="{{ route('search') }}" method="GET">
	  <div class="input-group content" style="width: 50%;">
	    <input type="text" name="keywords" required="true" class="form-control" value="{{ $keywords }}" placeholder="Nội dung tìm kiếm...">
	    <div class="input-group-btn">
	      <button class="btn btn-default" type="submit">
	        <i class="fa fa-search"></i>
	      </button>
	    </div>
	  </div>
	  
	</form>
	@else
	<div class="alert alert-success">
		<span class="fa fa-info-circle fa-lg"></span> Tìm thấy {{ count($result) }} bài viết với từ khoá <code>"{{ $keywords }}"</code>
	</div>
	
	<div id="resultSearch">
		@include('pages.search.searchAjax')
	</div>
	@endif
@endsection