<table class="table table-hover">
	<thead>
		<tr>
			<th class="text-center">Id</th>
			<th class="text-center">Tên tài khoản</th>
			<th class="text-center">Tên</th>
			<th class="text-center">Ngày đăng ký</th>
			<th class="text-center">Tùy chỉnh</th>
		</tr>
	</thead>
	<tbody>
	@foreach($user as $val)
		<tr>
			<td class="text-center">{{ $val->id }}</td>
			<td class="text-center">{{ $val->username }}</td>
			<td class="text-center">{{ $val->name }}</td>
			<td class="text-center">{{ $val->created_at }}</td>
			<td class="text-center">
				@if(Auth::user()->role == 2)
				@if($val->id != Auth::user()->id)
				<div class="btn-group btn-group-sm">
					@if($val->role == 0)
					<a data-toggle="tooltip" data-placement="top" title="Set quyền admin" onclick="return confirm('Bạn có chắc chắn muốn set admin cho user này không?')" href="{{ route('admin.user.setadmin', ['id' => $val->id]) }}" class="btn btn-dark text-white" title="Set Admin"><span class="fa fa-user-secret"></span></a>
					@elseif($val->role == 1)
					<a data-toggle="tooltip" data-placement="top" title="Huỷ quyền admin" onclick="return confirm('Bạn có chắc chắn muốn hủy admin của user này không?')" href="{{ route('admin.user.cancelAdmin', ['id' => $val->id]) }}" class="btn btn-dark text-white" title="Hủy quyền Admin"><span class="fa fa-close"></span></a>
					@endif
					<a data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" onclick="return confirm('Bạn có chắc chắn muốn chỉnh sửa người dùng này không?')" href="{{ route('admin.user.edit', ['id' => $val->id]) }}" class="btn btn-dark text-white" title="Chỉnh sửa"><span class="fa fa-pencil-square-o"></span></a>
				    <a data-toggle="tooltip" data-placement="top" title="Xoá người dùng" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')" href="{{ route('admin.user.delete', ['id' => $val->id]) }}" class="btn btn-dark text-white" title="Xóa tài khoản"> <span class="fa fa-trash-o"></span> </a>
				</div>
				@endif
				@else
				<p style="color: red;">Not allow</p>
				@endif
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{ $user->render("pagination::bootstrap-4") }}
<script>
	$(document).ready(function() {

		$('.pagination a').click(function(e) {
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			$.ajax ({
				url: '{{ route("admin.user.list.ajax") }}?page=' + page,
				dataType: 'html',
				data: {},
				success: function(data) {
					$('#list-users').html(data);
					location.hash = "page=" + page;
				}
			});
		});
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>