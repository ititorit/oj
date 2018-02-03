@extends('admin.master_admin')
@section('title', 'Admin :: Thêm thể loại')

@section('content')
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header bg-dark text-white">Thêm thể loại</div>
			<div class="card-body">
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="user"><span class="fa fa fa-database"></span> Tên thể loại</label>
						<input type="text" class="form-control" id="nameCate" name="nameCate" placeholder="Nhập vào tên thể loại">
					</div>
					@if($errors->has('nameCate'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('nameCate') }}
					</div>
					@endif
					<button type="submit" class="btn btn-dark"><span class="fa fa-arrow-circle-o-right"></span> Thêm</button>
				</form>
			</div>
		</div>		
	</div>																		
@endsection