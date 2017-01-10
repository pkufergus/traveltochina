/**
 * 
 */
function closeOrder(){
	$("#order_mail_div").hide();
}
function checkTxt(){
	var email = $("#email").val();
	var leave_date = $("#leave_date").val();
	var back_date = $("#back_date").val();
	var leave_city = $("#leave_city").val();
	var dest_city = $("#dest_city").val();
	var price = $("#ticket_price").val();
	if(email == ''){
		$("#email").focus();
		$("#email-msg").html('不能为空');
		return false;
	}else if(leave_date == ''){
		$("#leave_date").focus();
		$("#leave_date-msg").html('不能为空');
		return false;
	}else if( back_date== ''){
		$("#back_date").focus();
		$("#back_date-msg").html('不能为空');
		return false;
	}else if(leave_city == ''){
		$("#leave_city").focus();
		$("#leave_city-msg").html('不能为空');
		return false;
	}else if(dest_city == ''){
		$("#dest_city").focus();
		$("#dest_city-msg").html('不能为空');
		return false;
	}else if( price== ''){
		$("#ticket_price").focus();
		$("#ticket_price-msg").html('不能为空');
		return false;
	}
	
	var mailReg = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
	if (!mailReg.test(email)) {
		$("#email-span").html('邮件格式不正确');
		$("#email").focus();
		return false;
	}
	
	return true;
}

function showOrderMailDiv(){
	//var wait = document.createElement("div");
	//wait.className = "lui-wait";
	//wait.innerHTML='hello'
		//document.body.appendChild(wait);
	
	$.ajax({
		type : 'GET',
		url : '/v1/city/citylist.json',
		data : {
			pageNow : 1
		},
		success : function(result){
			drawCityTable(result);
		},
		error : function(){
			
		}
	
	});
	
}
function drawCityTable(result){
	var leave_selectHtml = "<select class='mail-order-txt' style='height:30px;background:white' class='txt-order' id='leave_city'>";
	var dest_selectHtml = "<select class='mail-order-txt' style='height:30px;background:white'  class='txt-order' id='dest_city'>"
	for(var key in result){
		leave_selectHtml += '<option value='+result[key].cityCode+'>'+result[key].chineseName+"</option>"
		dest_selectHtml += '<option value='+result[key].cityCode+'>'+result[key].chineseName+"</option>"
	}
	leave_selectHtml = leave_selectHtml+"</select>";
	dest_selectHtml = dest_selectHtml+"</select>";
	
	var htmlTemp = ""; 
	htmlTemp = "<table style='text-align:center;width:100%';font-family:'微软雅黑'>" +
			"<thead style='font-size: 14px;'><tr>" +
			" <th class='tbl-head-th' colspan=2>" +
			"<span>机票邮件订阅</span><span><a class='close-a' onclick=closeOrder() href='javascript:void(0)'>X</a></span></th></tr></thead>" 
				+"<tbody style='font-size: 13px;'>" 
				+"<tr>"
				+"<td style='height:35px'>邮件地址</td>"
				+"<td>" 
				+"<div class='order-div'><input class='mail-order-txt' id='email' class='txt-order' type='text'>" +
						"<span id='email-msg' class='warn-msg'></span>"
				+"</div></td>"
				+"</tr>"
				+"<tr>"
				+"<td  style='height:35px'>出发日期</td>"
				+"<td>"
				+"<div class='order-div'><input style='height: 30px;  border-radius: 3px;  border: solid 1px rgb(199, 199, 199);width:146px;background:white' class='date-pick' id='leave_date' type='text' onclick=''>" +
						"<span id='leave_date-msg' class='warn-msg'></span>"
				+"</div></td>"
				+"</tr>"
				+"<tr>"
				+"<td  style='height:35px'>返回日期</td>"
				+"<td>"
				+"<div class='order-div'><input style='margin-left:-3px;width:146px;background:white;height: 30px;  border-radius: 3px;  border: solid 1px rgb(199, 199, 199);' class='date-pick' id='back_date' type='text' /> " +
						"<span id='back_date-msg' class='warn-msg'></span>"
				+"</div></td>"
				+"</tr>"
				+"<tr>"
				+"<td  style='height:35px'>出发城市</td>"
				+"<td><div class='order-div'>"+leave_selectHtml  +
						"<span id='leave_city-msg' class='warn-msg'></span></div></td>"
				+"</tr>"
				+"<tr>"
				+"<td  style='height:35px'>目的城市</td>"
				+"<td><div class='order-div'>"+ dest_selectHtml+
						"<span id='dest_city-msg' class='warn-msg'></span></div></td>"
				+"</tr>"
				+"<tr>"
				+"<td  style='height:35px'>机票价格</td>"
				+"<td><div ><input class='mail-order-txt' placeholder='低于此价格会发送邮件' class='txt-order' type='text' id='ticket_price' />" +
						"<span id='ticket_price-msg' class='warn-msg'></span></div></td>"
				+"</tr>"
				
				+"</tbody>"
				+"<tfoot>" 
				+"<tr>"
				+"<td colspan=2 style='height:35px'>" +
						"<input   class='mail-order-submit' type='button' value='提交订阅' onclick='saveOrderMail()' /></td>"
				+"</tr>"
				+"</tfoot></table>";
	
	
	$("#order_mail_div").html(htmlTemp);
	$("#order_mail_div").show();
	 dateReg();
}
function dateReg(){
	 $("#leave_date").datepicker({
		        minDate : +2,
		         numberOfMonths : 2
		          });
	$("#back_date").datepicker({
	                 minDate : +2,
		                 numberOfMonths : 2
	                   });

	}
function saveOrderMail(){
	var email = $("#email").val();
	var leave_date = $("#leave_date").val();
	var back_date = $("#back_date").val();
	var leave_city = $("#leave_city").val();
	var dest_city = $("#dest_city").val();
	var price = $("#ticket_price").val();
	
	if(!checkTxt()){
		return;
	}
	var leaveArry=leave_date.split("/");
	var leaveTmp="";
	leaveTmp=leaveArry[2] +"-"+ leaveArry[0]+"-"+leaveArry[1];
	console.log(leaveTmp);
	var backTmp="";
	var backArry=back_date.split("/");
	backTmp=backArry[2]+"-"+backArry[0]+"-"+backArry[1];
	console.log(backTmp);
	$.ajax({
		type : 'GET',
		url : '/v1/mail/save_mail_order.json',
		data :{
			email : email,
			leave_date : leaveTmp,
			back_date : backTmp,
			leave_city : leave_city,
			dest_city : dest_city,
			round_trip: '1',
			max_price : price
		},
		success:function(result){
			if(result != '0'){
				alert('订阅成功');
				$('#order_mail_div').hide();
			}else{
				alert('请求超时，请稍后再试！');
			}
		},
		error : function(){
			alert('请求超时，请稍后再试');
		}
	});
}

function showWait(){
	var wait = document.createElement("div");
	wait.className = "lui-wait";
	wait.innerHTML = "<img class='lui-wait-img' width='50' height='50' src='img/loading.gif'/>";
	document.body.appendChild(wait);
	}
