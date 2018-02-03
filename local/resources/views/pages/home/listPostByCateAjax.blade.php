<div class="alert alert-secondary">
  	<span class="fa fa-arrow-right"></span> Chuỗi bài viết thuộc thể loại: <code>{{ $nameCate }}</code>
</div>
@if($postByCate->isEmpty())
<div class="alert alert-warning">
	<span class="fa fa-warning"></span> Chưa có bài viết.... 
</div>
@else
@foreach($postByCate as $val)
	<div class="card content">
		<div class="card-header bg-dark text-white">
			<div style="width: 30%; display: inline-block;">
				<span class="fa fa-user-o" ></span> <a href="{{ route('pages.user.info', ['id' => $val->idUser]) }}" class="text-white" title="Thông tin cá nhân">{{ $val->user->username }}</a>
			</div>
			<div style="float: right; display: inline-block;" class="hidden-xs hidden-sm">
				<span class="fa fa-clock-o"></span> {{ $val->created_at->format('d/m/Y') }}
			</div>
		</div>
		<div class="card-body" id="{{ $val->idCate }}">
			<h4>{{$val->title}}</h4>
			<p id="content-post">{!! $val->intro  !!}</p>
			<a href="{{ route('post.detail', ['id' => $val->id]) }}" id="{{ $val->idCate }}" class="button arrow">Đọc tiếp »</a>
		</div>
	</div>
@endforeach
{{$postByCate->render("pagination::bootstrap-4")}}
@endif
<script>
	$(document).ready(function() {
		$('.pagination a').click(function(e) {
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			var idCate_ = $('.card-body').attr('id');
			$.ajax({
				url: "/learn/list/category/ajax/" + idCate_ + "/?page=" + page,
				dataType: 'html',
				data: {},
				success: function(data) {
					$('#noidungTheLoai').html(data);
					location.hash = "page=" + page;
				}
			});
		});
	});
</script>