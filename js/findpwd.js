/**
 * 
 */

$(function(){
	$("#find_pwd_btn").click(function(){
		if(check()){
			$.ajax({
				type : 'GET',
				url : '/v1/user/findpwd.json',
				data : {
					email : $("#emailTxt").val(),
					username: $("#usernameTxt").val(),
					checkCode:$("#checkCodeTxt").val()
				},
				success : function(result){
					if(result ==-1){
						clearWarnInfo();
						$("#checkCodeTxt-span").html('验证码错误');
					}else if(result ==-2){
						clearWarnInfo();
						$("#emailTxt-span").html('输入的邮件地址和用户名不匹配');
					}else{
						clearWarnInfo();
						alert('重置密码成功，新密码已发送至您的邮箱');
						window.location.href="http://e-traveltochina.com";
					}
					
				},
				error : function(){}
			});
		}
	});
});
function check(){
	clearWarnInfo();
	var uValue = $("#usernameTxt").val();
	var eValue = $("#emailTxt").val();
	var cValue = $("#checkCodeTxt").val();
	 if(eValue == ''){
		$("#emailTxt").focus();
		$("#emailTxt-span").html('邮件不能为空');
		return false;
	}else if(uValue == ''){
		$("#usernameTxt").focus();
		$("#usernameTxt-span").html('用户名不能为空');
		return false;
	}else if(cValue == ''){
		$("#checkCodeTxt").focus();
		$("#checkCodeTxt-span").html('验证码不能为空');
		return false;
	}
	
	var mailReg = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
	if (!mailReg.test(eValue)) {
		$("#emailTxt-span").html('邮件格式不正确');
		$("#emailTxt").focus();
		return false;
	}
	
	return true;
}
function clearWarnInfo(){
	$(".warn-span").each(function(){
		$(this).html('');
	});
}