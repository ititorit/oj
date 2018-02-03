@extends('admin.master_admin')
@section('title', 'Admin :: Thêm chủ đề')

@section('content')
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header bg-dark text-white">Thêm chủ đề</div>
			<div class="card-body">
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="user"><span class="fa fa fa-database"></span> <b>Tên chủ đề</b></label>
						<input type="text" class="form-control" name="nameChude" placeholder="Nhập vào tên chủ đề">
					</div>
					@if($errors->has('nameChude'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('nameChude') }}
					</div>
					@endif
					<div class="form-group">
			     	<label for="sel1"><span class="fa fa-tag"></span> <b> Thuộc Thể loại:</b></label>
				      	<select class="form-control" name="theloai">
							@foreach($cate as $val)
				        	<option value="{{ $val->id }}">{{ $val->name }}</option>
							@endforeach
				      	</select>
					</div>
					<button type="submit" class="btn btn-dark"><span class="fa fa-arrow-circle-o-right"></span> Thêm</button>
				</form>
			</div>
		</div>		
	</div>
@endsection