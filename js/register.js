/**
 * 
 */
$(function() {
	$("#reg_btn").click(function() {
		if (check()) {
			$.ajax({
				type : 'GET',
				url : '/v1/user/check_email.json',
				data : {
					email : $("#emailTxt").val()
				},
				success : function(result) {
					if (!result) {
						register();
					} else {
						clearWarnMsg();
						$("#emailTxt-span").html('邮件已被注册');
					}
				},
				error : function() {

				}
			});
		}
	});
});

function check() {
	clearWarnMsg();
	var emailValue = $("#emailTxt").val();
	var usernameValue = $("#usernameTxt").val();
	var pwdValue = $("#pwdTxt").val();
	var repPwdValue = $("#repPwdTxt").val();
	if (emailValue == '') {
		$("#emailTxt-span").html('邮件不能为空');
		$("#emailTxt").focus();
		return false;
	} else if (usernameValue == '') {
		$("#usernameTxt-span").html('用户名不能为空');
		$("#usernameTxt").focus();
		return false;
	} else if (pwdValue == '') {
		$("#pwdTxt-span").html('密码不能为空');
		$("#pwdTxt").focus();
		return false;
	} else if (repPwdValue == '') {
		$("#repPwdTxt-span").html('重复密码不能为空');
		$("#repPwdTxt").focus();
		return false;
	}

	var mailReg = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
	if (!mailReg.test(emailValue)) {
		$("#emailTxt-span").html('邮件格式不正确');
		$("#emailTxt").focus();
		return false;
	}

	if (pwdValue != repPwdValue) {
		$("#repPwdTxt-span").html('两次输入密码不一致');
		$("#repPwdTxt").focus();
		return false;
	}

	return true;
}

function clearWarnMsg() {
	$(".warn-msg").each(function() {
		$(this).html('');
	});
}
function register() {
	$.ajax({
		type : 'GET',
		url : '/v1/user/register.json',
		data : {
			email : $("#emailTxt").val(),
			user_name : $("#usernameTxt").val(),
			password : hex_md5($("#pwdTxt").val())
		},
		success : function(result) {
			alert('感谢您注册，请去您的邮箱激活账户！');
			window.location.href="./us/";
		},
		error : function() {
			alert('注册失败');
		}
	});
}