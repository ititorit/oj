<div class="alert alert-secondary">
  	<span class="fa fa-arrow-right"></span> Chuỗi bài viết thuộc chủ đề: <code>{{ $nameChuDe }}</code>
</div>
@if($postByChuDe->isEmpty())
<div class="alert alert-warning">
	<span class="fa fa-warning"></span> Chưa có bài viết.... 
</div>
@else
@foreach($postByChuDe as $val)
	<div class="card content">
		<div class="card-header bg-dark text-white">
			<div style="width: 30%; display: inline-block;">
				<span class="fa fa-user-o" ></span> <a href="{{ route('pages.user.info', ['id' => $val->user->id]) }}" class="text-white" title="Thông tin cá nhân">{{ $val->user->username }}</a>
			</div>
			<div style="float: right; display: inline-block;" class="hidden-xs hidden-sm">
				<span class="fa fa-clock-o"></span> {{ $val->created_at->format('d/m/Y') }}
			</div>
		</div>
		<div class="card-body" id="{{ $val->idChuDe }}">
			<h4>{{$val->title}}</h4>
			<p id="content-post">{!! $val->intro  !!}</p>
			<a href="{{ route('post.detail', ['id' => $val->id]) }}" id="{{ $val->idCate }}" class="btn btn-dark">Đọc tiếp »</a>
		</div>
	</div>
@endforeach
{{$postByChuDe->render("pagination::bootstrap-4")}}
@endif
<script>
	$(document).ready(function() {
		$('.pagination a').click(function(e) {
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			var idChuDe_ = $('.card-body').attr('id');
			$.ajax({
				url: "/learn/list/chude/ajax/" + idChuDe_ + "/?page=" + page,
				dataType: 'html',
				data: {},
				success: function(data) {
					$('#noidungChuDe').html(data);
					location.hash = "page=" + page;
				}
			});
		});
	});
</script>