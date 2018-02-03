<div class="modal fade" id="registerModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span class="fa fa-user-plus"></span> Đăng ký tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			 <!-- Modal body -->
			 <div class="modal-body">
			 	<form method="POST" id="form-register">
					{{ csrf_field() }}
					
					<!-- Username -->
					<div class="form-group">
						<label for="user"><span class="fa fa-user-circle"></span> Tài khoản:</label>
						<input type="text" class="form-control" id="user-register" name="username_reg" value="{{ old('username_reg') }}" placeholder="Nhập vào tài khoản...">
					</div>
					<!-- /Username -->
					
					<!-- Password -->
					<div class="form-group">
						<label for="pass"><span class="fa fa fa-key"></span> Mật khẩu:</label>
						<input type="password" class="form-control" id="pass-register" name="password_reg" value="{{ old('password_reg') }}" placeholder="Nhập vào mật khẩu...">
					</div>
					<!-- /Password -->

					<!-- Re-password -->
					<div class="form-group">
						<label for="pass"><span class="fa fa fa-key"></span> Nhập lại mật khẩu:</label>
						<input type="password" class="form-control" id="re-pass-register" name="re_password_reg" value="{{ old('re_password_reg') }}" placeholder="Nhập lại mật khẩu...">
					</div>
					<!-- /Re-password -->

					<!-- name -->
					<div class="form-group">
						<label for="user"><span class="fa fa-user-circle"></span> Tên:</label>
						<input type="text" class="form-control" id="name-register" name="name_reg" value="{{ old('name_reg') }}" placeholder="Nhập vào tên...">
					</div>
					<!-- /name -->

					<!-- Email -->
					<div class="form-group">
						<label for="email"><span class="fa fa fa-envelope"></span> Email:</label>
						<input type="text" class="form-control" id="email-register" name="email_reg" value="{{ old('email_reg') }}" placeholder="Nhập vào email...">
					</div>
					<!-- /Email -->

					<button type="submit" id="btn-register" class="btn btn-dark"><span class="fa fa-user-plus"></span> Đăng ký</button>
				</form>
			 </div>
		</div>
	</div>
</div>