<table class="table table-hover">
	<thead>
		<tr>
			<th class="text-center">Id</th>
			<th class="text-center">Tên bài viết</th>
			<th class="text-center">Thể loại</th>
			<th class="text-center">Chủ đề</th>
			<th class="text-center">Người tạo</th>
			<th class="text-center">Ngày tạo</th>
			<th class="text-center">Quản lý</th>
		</tr>
	</thead>
	<tbody>
	@foreach($post as $val)
		<tr>
			<td class="text-center">{{ $val->id }}</td>
			<td class="text-center">{{ $val->title }}</td>
			<td class="text-center">{{ $val->theloai->name }}</td>
			<td class="text-center">{{ $val->chude->name }}</td>
			<td class="text-center">{{ $val->user->name }}</td>
			<td class="text-center">{{ $val->created_at }}</td>
			<td class="text-center">
				@if(Auth::user()->role == 2 || Auth::user()->id == $val->idUser)
				<div class="btn-group btn-group-sm">
					<a data-toggle="tooltip" data-placement="top" title="Xoá bài viết" onclick="return confirm('Bạn có chắc chắn muốn chỉnh sửa bài viết này không?')" href="{{ route('admin.post.edit', ['id' => $val->id]) }}" class="btn btn-dark text-white"><span class="fa fa-pencil-square-o"></span></a>
				    <a data-toggle="tooltip" data-placement="top" title="Xoá bài viết" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')" href="{{ route('admin.post.delete', ['id' => $val->id]) }}" class="btn btn-dark text-white"> <span class="fa fa-trash-o"></span> </a>
				</div>
				@else
				<p>Not allow</p>
				@endif
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ $post->render("pagination::bootstrap-4") }}
<script>
	$(document).ready(function() {

		$('.pagination a').click(function(e) {
			e.preventDefault();
			var pages = $(this).attr('href').split('page=')[1];
			$.ajax ({
				url: '{{ route("admin.post.list.ajax") }}?page=' + pages,
				dataType: 'html',
				data: {},
				success: function(data) {
					$('#list-post').html(data);
					location.hash = "page=" + pages;
				}
			});
		});
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>