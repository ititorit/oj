@extends('master')
@section('title', 'Thể loại :: ' . $nameCate)
@section('content')
<div id="noidungTheLoai">
	@include('pages.home.listPostByCateAjax')
</div>
@endsection