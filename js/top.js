/**
 * 
 */
$(function(){
			$.ajax({
				type : 'GET',
				url : '/v1/user/issessionexist.json',
				success : function(result){
					if(result != null){
						$("#usernameLi").html("<span style='position: absolute;  margin-top: 9px;  margin-left: -113px'>Welcome " + result.user_name+"</span>");
						$("#loginoutLi").html("<a onclick='loginOut()' href='javascript:void(0)'>退出</a>");
					}
				},
				error : function(){
				}
			});				
});

function destroyCookie(cookieName,value){
			// $.cookie('user_name',null,{ path: '/' });
			  	 var date = new Date(); 
                date.setTime(date.getTime() - 10000); 
                document.cookie = cookieName + "="+value+"; expires=" + date.toGMTString(); 
				window.location.href="/index.php";
}

function loginOut(){
			$.ajax({
				type : 'GET',
				url : '/v1/user/loginout.json',
				success : function(result){
					window.location.href="./us/";
				},
				error : function(){}
			});
}