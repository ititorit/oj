@if($post->isEmpty())
<div class="alert alert-warning">
	<span class="fa fa-warning"></span> Chưa có bài viết.... 
</div>
@endif
@foreach($post as $val)
	<div class="card content">
		<div class="card-header bg-dark text-white">
			<div style="width: 30%; display: inline-block;">
				<span class="fa fa-user-o"></span> <a href="{{ route('pages.user.info', ['id' => $val->idUser]) }}" data-toggle="tooltip" class="text-white" title="Thông tin cá nhân">{{ $val->user->username }}</a>
			</div>
			<div style="float: right; display: inline-block;" class="hidden-xs hidden-sm">
				<span class="fa fa-clock-o"></span> {{ $val->created_at->format('d/m/Y') }}
			</div>
		</div>
		<div class="card-body">
			<a href="{{ route('post.detail', ['id' => $val->id]) }}" style="color: #343a40;"> <h4 class="">{{$val->title}}</h4></a>
			<p id="content-post">{!! $val->intro  !!}</p>
			<a href="{{ route('post.detail', ['id' => $val->id]) }}" class="btn btn-dark">Đọc tiếp »</a>
		</div>
	</div>
@endforeach
{{ $post->render("pagination::bootstrap-4") }}

<script>
	$(document).ready(function() {

		$('.pagination a').click(function(e) {
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			$.ajax ({
				url: '{{ route("pages.listPost.ajax") }}?page=' + page,
				dataType: 'html',
				data: {},
				success: function(data) {
					$('#noidung').html(data);
					location.hash = "page=" + page;
				}
			});
		});
	});
</script>