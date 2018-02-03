$(document).ready(function() {

	$('#btn-login').click(function() {
		$('#form-login').validate({
			rules : {
				username_login: {
					required : true
				},
				password_login : 	{ required : true, minlength : 8 }
			},
			messages : {
				username_login : {
					required : 		"Bạn chưa nhập tài khoản."
				},
				password_login : {
					required : 		"Bạn chưa nhập mật khẩu",
					minlength : 	"Mật khẩu phải chứa ít nhất 8 ký tự."
				}
			},
			submitHandler : function() {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type: 'POST',
					url: '/learn/login',
					data: {
						username_login: $('#user').val(),
						password_login: $('#pass').val()
					},
					dataType: 'json',
					success: function(data) {
						if(data.error == true) {
							$('.error').hide();
							if(data.mess.username_login != undefined) {
								$('.errorUsername').show().text(data.mess.username_login[0]);
							}
							if(data.mess.password_login != undefined) {
								$('.errorPass').show().text(data.mess.password_login[0]);
							}
							if(data.mess.errorLogin != undefined) {
								alert('Tài khoản hoặc mật khẩu không đúng. Vui lòng kiểm tra lại');
							}
						} else {
							alert('Login success');
							window.location.href = document.URL;
						}
					}
				});
			}
		});
	});
});