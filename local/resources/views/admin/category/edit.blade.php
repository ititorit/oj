@extends('admin.master_admin')
@section('title', 'Admin :: Chỉnh sửa thể loại')

@section('content')
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header bg-dark text-white">Sửa thể loại</div>
			<div class="card-body">
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="user"><span class="fa fa fa-database"></span> Tên chủ đề</label>
						<input type="text" class="form-control" name="nameCate" value="{{ $cate->name }}" placeholder="Nhập vào tên thể loại">
					</div>
					<button type="submit" class="btn btn-dark"><span class="fa fa-arrow-circle-o-right"></span> Thêm</button>
				</form>
			</div>
		</div>		
	</div>		
@endsection