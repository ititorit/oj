<?php
function changeColorWords($str, $keywords) {
	return str_replace($keywords, "<span style='background-color: yellow;'>$keywords</span>", $str);
}
?>
@foreach($result as $val)
<div class="card content">
	<div class="card-header bg-dark text-white">
		<div style="width: 30%; display: inline-block;">
			<span class="fa fa-user-o"></span> <a href="{{ route('pages.user.info', ['id' => $val->idUser]) }}" class="text-white" title="Thông tin cá nhân">{{ $val->user->username }}</a>
		</div>
		<div style="float: right; display: inline-block;" class="hidden-xs hidden-sm">
			<span class="fa fa-clock-o"></span> {{ $val->created_at->format('d/m/Y') }}
		</div>
	</div>
	<div class="card-body">
		<h4 class="">{!! changeColorWords($val->title, $keywords) !!}</h4>
		<p id="content-result">{!! changeColorWords($val->intro, $keywords) !!}</p>
		<a href="{{ route('post.detail', ['id' => $val->id]) }}" class="btn btn-dark">Đọc tiếp »</a>
	</div>
</div>
@endforeach
{{ $result->render("pagination::bootstrap-4") }}
<script>
	$(document).ready(function() {
		$('.pagination a').click(function(e) {
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			console.log(page);
			$.ajax({
				url: "/learn/search/ajax?page=" + page,
				dataType: 'html',
				data: {},
				success: function(data) {
					$('#resultSearch').html(data);
					location.hash = "page=" + page;
				}
			});
		});
	});
</script>