@extends('admin.master_admin')
@section('title', 'Admin :: Chủ đề')

@section('content')
	<div class="card">
		<div class="card-header bg-dark text-white">Danh sách chủ đề</div>
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
						<th class="text-center">Tên thể loại</th>
						<th class="text-center">Ngày tạo</th>
						<th class="text-center">Quản lý</th>
					</tr>
				</thead>
				<tbody>
				@foreach($chude as $val)
					<tr>
						<td class="text-center">{{ $val->id }}</td>
						<td class="text-center">{{ $val->name }}</td>
						<td class="text-center">{{ $val->category->name }}</td>
						<td class="text-center">{{ $val->created_at }}</td>
						<td class="text-center">
							@if(Auth::user()->role == 2 || Auth::user()->id == $val->idUser)
							<div class="btn-group btn-group-sm">
								<a data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" onclick="return confirm('Bạn có chắc chắn muốn chỉnh sửa chủ đề này không?')" href="{{ route('admin.chude.edit', ['id' => $val->id]) }}" class="btn btn-dark text-white" title="Chỉnh sửa"><span class="fa fa-pencil-square-o"></span></a>
							    <a data-toggle="tooltip" data-placement="top" title="Xoá" onclick="return confirm('Bạn có chắc chắn muốn xoá chủ đề này không?')" href="{{ route('admin.chude.delete', ['id' => $val->id]) }}" class="btn btn-dark text-white"> <span class="fa fa-trash-o"></span> </a>
							</div>
							@else
							<p>Not allow</p>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<a href="{{ route('admin.chude.add') }}" class="btn btn-dark text-white pull-right"><span class="fa fa-plus-circle"></span> Thêm chủ đề</a>
		</div>
	</div>
	<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
@endsection