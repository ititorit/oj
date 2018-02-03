@extends('admin.master_admin')
@section('title', 'Admin :: Thêm bài viết')

@section('content')

	<div class="card">
		<div class="card-header bg-dark text-white">Thêm bài viết</div>
		<div class="card-body">
		
			<form method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name_post"><span class="fa fa-link"></span><b> Tên bài viết:</b></label>
					<input type="text" class="form-control" name="name_edit" value="{{ $post->title }}" placeholder="Nhập vào tên bài viết">
				</div>
				@if($errors->has('name_add'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong>{{ $errors->first('name_add') }}
				</div>
				@endif
				<hr>
				<div class="form-group">
			     	<label for="sel1"><span class="fa fa-tag"></span> <b> Thể loại:</b></label>
			      	<select class="form-control" name="cate_edit" id="cate_add_post">
						@foreach($cate as $val)
			        	<option 
						@if($val->id == $post->idCate)
						{{"selected"}}
						@endif
			        	value="{{ $val->id }}">{{ $val->name }}</option>
						@endforeach
			      	</select>
				</div>
				<hr>

				<div class="form-group">
			     	<label for="sel1"><span class="fa fa-paperclip"></span> <b> Chủ đề:</b></label>
			      	<select class="form-control" name="chude_edit" id="chude_add_post">
						@foreach($chude as $val)
						<option 
						@if($post->idChuDe == $val->id)
						{{"selected"}}
						@endif
						value="{{ $val->id }}">{{ $val->name }}</option>
						@endforeach
			      	</select>
				</div>
				<hr>
				<div class="form-group">
					<label for="intro" style="color: red;"><b>Tóm tắt bài viết.. Khuyến khích copy 150 từ của nội dung bài viết..</b></label>
					<textarea name="intro_edit" id="content-tomtat">{{ $post->intro }}</textarea>
					<script type="text/javascript">
						confi = {};
						confi.entities_latin = false;
						confi.language = 'vi';
						confi.toolbarGroups = [
							{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
							{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
							{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
							{ name: 'forms', groups: [ 'forms' ] },
							{ name: 'document', groups: [ 'document', 'mode', 'doctools' ] },
							{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
							{ name: 'links', groups: [ 'links' ] },
							{ name: 'insert', groups: [ 'insert' ] },
							{ name: 'styles', groups: [ 'styles' ] },
							{ name: 'colors', groups: [ 'colors' ] },
							{ name: 'tools', groups: [ 'tools' ] },
							{ name: 'others', groups: [ 'others' ] },
							{ name: 'about', groups: [ 'about' ] }
						];
						confi.removeButtons = 'Form,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,Undo,Redo,SelectAll,Replace,Outdent,Indent,CreateDiv,NewPage,Preview,Print,Radio,Templates,BidiLtr,BidiRtl,Language,Anchor,Smiley,Iframe,About,Flash,PageBreak,HorizontalRule,SpecialChar,Image,Unlink,JustifyLeft,JustifyCenter,JustifyRight,Maximize,ShowBlocks,Find,Paste,PasteText,PasteFromWord';
						CKEDITOR.replace('content-tomtat', confi);
					</script>
				</div>
				@if($errors->has('intro_add'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('intro_add') }}
				</div>
				@endif
				<hr>
				<div class="form-group">
					<label for="content"><b>Nội dung bài viết</b></label>
					<textarea name="full_edit" id="content-noidung">{{ $post->full }}</textarea>
					<script type="text/javascript">
						confi = {};
						confi.entities_latin = false;
						confi.language = 'vi';
						CKEDITOR.replace('content-noidung', confi);
					</script>
				</div>
				@if($errors->has('full_add'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('full_add') }}
				</div>
				@endif
				<button type="submit" class="btn btn-dark float-right"><span class="fa fa-plus-circle"></span> Đăng bài mới</button>
			</form>

		</div>
	</div>
@endsection
@section('script')
<script>
		$(document).ready(function() {
			$('#cate_add_post').change(function() {
				var id = $(this).val();
				$.ajax({
					type: 'GET',
					url: '/learn/admin/ajax/chude/' + id,
					dataType: 'html',
					success: function(data) {
						$('#chude_add_post').html(data);
					}
				});
			});
		});
	</script>
@endsection