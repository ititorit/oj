@extends('admin.master_admin')
@section('title', 'Admin :: Danh sách thể loại')

@section('content')
	<div class="card">
		<div class="card-header bg-dark text-white">Danh sách thể loại</div>
		<div class="card-body" id="list-users">
		@if(session('success'))
			<div class="alert alert-success alert-dismissable">
			  	<button type="button" class="close" data-dismiss="alert">&times;</button>
			  	<strong>Thống báo!</strong> {{ session('success') }}
			</div>
		@endif
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Tên chủ đề</th>
						<th class="text-center">Người tạo</th>
						<th class="text-center">Ngày tạo</th>
						<th class="text-center">Quản lý</th>
					</tr>
				</thead>
				<tbody>
				@foreach($cate as $val)
					<tr>
						<td class="text-center">{{ $val->id }}</td>
						<td class="text-center">{{ $val->name }}</td>
						<td class="text-center">{{ $val->user->name }}</td>
						<td class="text-center">{{ $val->created_at }}</td>
						<td class="text-center">
							@if(Auth::user()->role == 2 || Auth::user()->id == $val->idUser)
							<div class="btn-group btn-group-sm">
								<a data-toggle="tooltip" data-placement="top" title="Chỉnh sửa bài viết" onclick="return confirm('Bạn có chắc chắn muốn chỉnh sửa bài viết này không?')" href="{{ route('admin.cate.edit', ['id' => $val->id]) }}" class="btn btn-dark text-white"><span class="fa fa-pencil-square-o"></span></a>
							    <a data-toggle="tooltip" data-placement="top" title="Xoá bài viết" onclick="return confirm('Bạn có chắc chắn muốn xóa thể loại này không?')" href="{{ route('admin.cate.delete', ['id' => $val->id]) }}" class="btn btn-dark text-white"> <span class="fa fa-trash-o"></span> </a>
							</div>
							@else
							<p style="color: red;">Not allow</p>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<a href="{{ route('admin.cate.add') }}" class="btn btn-dark text-white pull-right" style="cursor: pointer;"><span class="fa fa-plus-circle"></span> Thêm thể loại</a>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection