/**
 * 
 */
$(function() {
	$("#login_btn").click(function() {
		if (check()) {
			$.ajax({
				type : 'GET',
				url : '/v1/user/login.json',
				data : {
					email : $("#emailTxt").val(),
					password : hex_md5($("#pwdTxt").val()),
					checkCode : $("#checkCodeTxt").val()
				},
				success : function(result) {
					if (result == null) {
						clearWarnInfo();
						$("#emailTxt-span").html('用户名或密码错误');
					}else if(result == '-1'){
						clearWarnInfo();
						$("#checkCodeTxt").focus();
						$("#checkCodeTxt-span").html('验证码错误');
					} else {
						window.location.href="./us/";
					}
				},
				error : function() {

				}
			});
		}

	});
});

function check() {
	clearWarnInfo();
	var usernameValue = $("#emailTxt").val();
	var pwdValue = $("#pwdTxt").val();
	var checkValue = $("#checkCodeTxt").val();
	if (usernameValue == '') {
		$("#emailTxt").focus();
		$("#emailTxt-span").html('邮箱不能为空');
		return false;
	} else if (pwdValue == '') {
		$("#pwdTxt").focus();
		$("#pwdTxt-span").html('请输入密码');
		return false;
	}else if(checkValue == ''){
		$("#checkCodeTxt").focus();
		$("#checkCodeTxt-span").html('验证码不能为空');
		return false;
	}

	var mailReg = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
	if (!mailReg.test(usernameValue)) {
		$("#emailTxt-span").html('邮件格式不正确');
		$("#emailTxt").focus();
		return false;
	}

	return true;
}

function clearWarnInfo(){
	$(".warn-msg").each(function(){
		$(this).html('');
	});
}

function changeImg(){
    document.getElementById("validateCodeImg").src="/v1/image/DrawImage?"+Math.random();
}



 