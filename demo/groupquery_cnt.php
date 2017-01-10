<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Header">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link id="ctl00_linkCSS" href="./group/css/StyleSheet.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="./group/css/flick/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="./group/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="./group/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript">
			$(function(){
				// Tabs
				$('#tabs').tabs();	
			});
    </script>
<style>
.divNumbTab {
	background: transparent url(./img/iconIndbase.gif) no-repeat top left;
	color: #000;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 85% !important;
	font-weight: bold;
	padding: 1px 2px 2px 5px;
	width: 10px;
}
#FDFF .divNumbTab {
	background: transparent url(./img/iconIndbase.gif) no-repeat scroll 0;
	margin: 3px 0 0 3px;
	padding: 1px 1px 2px 5px;
	width: 15px !important;
}
</style>
<title>團隊機票</title>
<script type="text/javascript">

	var name_empty = " × 姓名不能為空!";
	var email_empty = " × Email 為空";
	var tel_empty = " × 聯絡電話為空";
	var fromcity_empty = " × 請選擇始發城市";
	var price_empty = " × 請選擇價格";
	var gender_empty = " × 請選擇稱謂";
	var tocity_empty = " × 請選擇目的城市";
	var email_invalid = "- Email 不是合法的地址";
	var msg_email_blank = " × 郵寄地址不能為空!";
	var msg_email_format = " × 郵寄地址不合法!";
	var msg_can_rg = " √ ";
	var info_right=" √";
	function showInfo(target,Infos){
    	document.getElementById(target).innerHTML = Infos;
	}
	function check_Data(control, notice,str) {
		if (control.value.length < 1) {
			showInfo(notice, str);
			return false;
		}
		showInfo(notice, '');
		return true;
	}
	function check_Data_Date(control, notice,str) {
		if (control.value.length < 1) {
			showInfo(notice, str);
			return false;
		}
		if (control.value == "mm/dd/yyyy") {
			showInfo(notice, str);
			return false;
		}
		showInfo(notice, '');
		return true;
	}
	function clear_Format(control) {
		if (control.value == "mm/dd/yyyy") {
			control.value = "";
		}
	}
	function add_Format(control) {
		if (control.value == "") {
			control.value = "mm/dd/yyyy";
		}
	}
	function replace_value(control1,control2) {
		if (control1.value != "") {
			document.getElementById(control2).value = control1.value;
		}
	}
	function check_Data_num(control, notice,str) {
		if (control.value.length < 1) {
			//showInfo(notice, str);
			return false;
		}
		if (!isNumber(control.value)) {
			showInfo(notice, str);
			return false;
		}
		showInfo(notice, '');
		return true;
	}
	function check_Data_num2(control, notice,str) {
		if (control.value.length < 1) {
			//showInfo(notice, str);
			return true;
		}
		if (!isNumber(control.value)) {
			showInfo(notice, str);
			return false;
		}
		showInfo(notice, '');
		return true;
	}
	function isNumber(oNum)
    {
		if(!oNum) return false;
		var strP=/^\d+(\.\d+)?$/;
		if(!strP.test(oNum)) return false;
		try{
			if(parseFloat(oNum)!=oNum) return false;
		}
		catch(ex)
		{
			return false;
		}
		return true;
    }
	function checkEmail(email)
	{
		if(email.value.length < 1)
		{
			showInfo("lbemail", "× 郵寄地址不能為空!");
			return false;
		}
		if (chekemail(email.value)==false)
		{
			//email.className = "FrameDivWarn";
			showInfo("lbemail","× 郵寄地址不合法!");
			return false;  
		} 
		showInfo("lbemail","");
		return true;
	}
	function chekemail(temail) {  
	 	var pattern = /^[\w]{1}[\w\.\-_]*@[\w]{1}[\w\-_\.]*\.[\w]{2,4}$/i;  
	 	if(pattern.test(temail)) {  
	  		return true;  
	 	}  
	 	else {  
	  		return false;  
	 	}  
	} 
	function CheckData()
	{
		var Title = document.getElementById('cboTitle');
		var FName = document.getElementById('txtFName');
		var LName = document.getElementById('txtLName');
		var rtnTitle = check_Data(Title, 'lbtitle', '×請選擇稱謂！');
		var rtnFName = check_Data(FName, 'lbFName', '×請輸入名！');
		var rtnLName = check_Data(LName, 'lbLName', '×請輸入姓！');

		var Email = document.getElementById('txtEmail');
		var rtnEmail = checkEmail(Email);

		var MoblePhone = document.getElementById('txtMoblePhone');		
		var rtnMoblePhone = check_Data(MoblePhone, 'lbphone', '×請輸手機電話！');
		
		var GroupName = document.getElementById('txtGroupName');		
		var rtnGroupName = check_Data(GroupName, 'lbGroupName', '×請輸團隊名稱！');
		
		var NumberOfPassengers = document.getElementById('NumberOfPassengers');		
		var rtnNumberOfPassengers = check_Data(NumberOfPassengers, 'lbNumberOfPassengers', '×請輸團隊人數！');
		var rtnNumberOfPassengers2 = check_Data_num(NumberOfPassengers, 'lbNumberOfPassengers', '×請輸數字！');


		var Price = document.getElementById('txtPrice');	 
		var rtnPrice = check_Data_num2(Price, 'lbPrice', '×請輸數字！');

		
		var flighttype = document.getElementById('flighttype').value;	 
		
		var rtnflight = false;

		if(flighttype==1)
		{
			var From1_1 = document.getElementById('txtFrom1_1');		
			var rtnFrom1_1 = check_Data(From1_1, 'lbFrom1_1', '×請輸始發城市或機場！');

			var To1_1 = document.getElementById('txtTo1_1');		
			var rtnTo1_1 = check_Data(To1_1, 'lbTo1_1', '×目的城市或機場！');

			var FromDate1_1 = document.getElementById('txtFromDate1_1');		
			var rtnFromDate1_1 = check_Data_Date(FromDate1_1, 'lbFromDate1_1', '×請輸啟程時間！');

			rtnflight = rtnFrom1_1&& rtnTo1_1&& rtnFromDate1_1;

		}
		else if (flighttype == 2)
		{
			var From2_1 = document.getElementById('txtFrom2_1');		
			var rtnFrom2_1 = check_Data(From2_1, 'lbFrom2_1', '×請輸始發城市或機場！');

			var To2_1 = document.getElementById('txtTo2_1');		
			var rtnTo2_1 = check_Data(To2_1, 'lbTo2_1', '×目的城市或機場！');

			var FromDate2_1 = document.getElementById('txtFromDate2_1');		
			var rtnFromDate2_1 = check_Data_Date(FromDate2_1, 'lbFromDate2_1', '×請輸啟程時間！');

			var ToDate2_1 = document.getElementById('txtToDate2_1');		
			var rtnToDate2_1 = check_Data_Date(ToDate2_1, 'lbToDate2_1', '×請輸返程時間！');

			rtnflight = rtnFrom2_1&& rtnTo2_1&& rtnFromDate2_1&&rtnToDate2_1;
		}
		else if (flighttype == 3)
		{
			var From3_1 = document.getElementById('txtFrom3_1');		
			var rtnFrom3_1 = check_Data(From3_1, 'lbFrom3_1', '×請輸始發城市或機場！');

			var To3_1 = document.getElementById('txtTo3_1');		
			var rtnTo3_1 = check_Data(To3_1, 'lbTo3_1', '×目的城市或機場！');

			var FromDate3_1 = document.getElementById('txtFromDate3_1');		
			var rtnFromDate3_1 = check_Data_Date(FromDate3_1, 'lbFromDate3_1', '×請輸啟程時間！');

			rtnflight = rtnFrom3_1&& rtnTo3_1&& rtnFromDate3_1;
		}
		
		if(rtnTitle&&rtnFName&&rtnLName&&rtnEmail&&rtnMoblePhone&&rtnGroupName&&rtnNumberOfPassengers&&rtnNumberOfPassengers2&&rtnPrice&&rtnflight)
		{
			document.getElementById('sending_mail').style.display="";
			document.aspnetForm.submit();
		}
		
	}

</script>
</head>
<body id="ctl00_bodyMain" >
<form name="aspnetForm" method="post" id="aspnetForm">
  <div id="divMain">
    <div id="ctl00_Contents" class="Contents">
      <table width="100%">
        <tr>
          <td id="mainContent"><!--NOINDEX-->
            <!--/NOINDEX-->
            <h1 id="ctl00_ContentPageHeading_PageHeader1_h1PageHeading" class="PageHeading"> <span id="ctl00_ContentPageHeading_PageHeader1_lblPageHeading">團隊申請須知</span></h1>
            <p> 1. 團隊申請較為複雜，請詳細填寫各項要求。 <br />
              2. 因收益管理部門管理嚴格和散客傾向嚴重， 美國的航空公司團隊申請較為困難。團隊價格（尤其是大團）的價格較高。儘量使用中國或者亞洲的航空公司。<br />
              3. 航空公司多要求預先支付抵押金以保證基礎運價；稅費等項的價格隨時可能調整。因此，盡可能在得到我們的報價後，迅速全額付款。部分情況下，需要隔日付款。部分情況下，定金不退。<br />
              4. 儘量使用銀行轉帳方式付款。有關費用由團隊申請方支付。<br />
              5. 提前申請簽證。簽證申請越晚，機票價格越高。學生團的主要問題是保證機位，請儘量在校方協助下，提前2-3個月辦好簽證。<br />
              6. 團隊成員的名單需仔細核實並校對無誤。出票後更改的費用較高（部分情況下，出票前更改，也會對票價有影響）。</p>
            <h3> 聯絡人資訊</h3>
            <p>
            <table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><label> <span class="Content">稱謂:</span><br />
                  </label>
                  <select name="cboTitle" style="width: 100px; font-size:12px;" id="cboTitle" class="Content">
                    <option value="">未選</option>
                    <option value="先生">先生</option>
                    <option value="女士">女士</option>
                    <option value="博士">博士</option>
                    <option value="教授">教授</option>
                  </select></td>
                <td width="10"></td>
                <td valign="bottom"><label> <span class="Content">名:</span><br />
                    <input name="txtFName" type="text" maxlength="30" size="30" id="txtFName" />
                  </label></td>
                <td width="10"></td>
                <td valign="bottom"><label> <span class="Content">姓:</span><br />
                    <input name="txtLName" type="text" maxlength="30" size="30" id="txtLName" />
                  </label></td>
                <td style="vertical-align:bottom;"><span style="color:#F00" >*</span> <span style="color:#F00" id="lbtitle" ></span> <span style="color:#F00" id="lbFName" ></span> <span style="color:#F00" id="lbLName" ></span></td>
              </tr>
            </table>
            </p>
            <p id="ctl00_ContentInfo_trEmailList">
            <table border="0" cellpadding="0" cellspacing="0">
              <tr id="ctl00_ContentInfo_EmailList_trEmailInputFields">
                <td><label> <span class="Content">郵箱地址:</span><br />
                    <input name="txtEmail" type="text" maxlength="75" size="50" id="txtEmail" />
                  </label></td>
                <td style="vertical-align:bottom;"><span style="color:#F00" >*</span><span style="color:#F00" id="lbemail" ></span></td>
              </tr>
            </table>
            </p>
            <p>
            <table border="0" cellpadding="0" cellspacing="0">
              <tr id="ctl00_ContentInfo_HomePhoneList_trPhoneInputFields">
                <td><table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="bottom"><label> <span class="Content">公司名稱:</span><br />
                          <input name="txtCompany" type="text" maxlength="100" size="50" id="txtCompany" />
                        </label></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            </p>
            <p>
            <table border="0" cellpadding="0" cellspacing="0">
              <tr id="ctl00_ContentInfo_HomePhoneList_trPhoneInputFields">
                <td><table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="bottom"><label> <span class="Content">手機電話:</span><br />
                          <input name="txtMoblePhone" type="text" maxlength="30" size="20" id="txtMoblePhone" />
                        </label></td>
                      <td style="width: 10px"></td>
                      <td valign="bottom"><label> <span class="Content">國家:</span><br />
                          <select style="width: 100px; font-size:12px;" name="cboMoblePhoneCountry" id="cboMoblePhoneCountry" class="Content">
                            <option value="US">美國</option>
                            <option value="CA">加拿大</option>
                            <option value="CN">中國</option>
                          </select>
                        </label></td>
                      <td style="vertical-align:bottom;"><span style="color:#F00" >*</span> <span style="color:#F00" id="lbphone" ></span></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            </p>
            <p>
            <table border="0" cellpadding="0" cellspacing="0">
              <tr id="ctl00_ContentInfo_BusinessPhoneList_trPhoneInputFields">
                <td><table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="bottom"><label> <span class="Content">辦公電話:</span><br />
                          <input name="txtOfficePhone" type="text" maxlength="30" size="20" id="txtOfficePhone" />
                        </label></td>
                      <td style="width: 10px"></td>
                      <td valign="bottom"><label> <span class="Content">分機:</span><br />
                          <input name="txtPhoneExt" type="text" maxlength="10" size="6" id="txtPhoneExt" style="width: 100px;" />
                        </label></td>
                      <td style="width: 10px"></td>
                      <td valign="bottom"><label> <span class="Content">國家:</span><br />
                          <select style="width: 100px; font-size:12px;" name="cboOfficePhoneCountry" id="cboOfficePhoneCountry" class="Content">
                            <option value="US">美國</option>
                            <option value="CA">加拿大</option>
                            <option value="CN">中國</option>
                          </select>
                        </label></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            </p>
            <p>
            <table border="0" cellpadding="0" cellspacing="0">
              <tr id="ctl00_ContentInfo_AddressList_trAddressInputFields">
                <td><table border="0" cellpadding="0" cellspacing="0">
                    <tr id="ctl00_ContentInfo_AddressList_trAddressType">
                      <td><table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td style="height: 10px"></td>
                          </tr>
                          <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><span class="Content">公司地址</span></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="height: 10px"></td>
                    </tr>
                    <tr>
                      <td><table>
                          <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><label> <span class="Content">街道地址:</span><br />
                                      <input name="txtAddress1" type="text" maxlength="40" size="30" id="txtAddress1" />
                                    </label></td>
                                  <td width="10"></td>
                                  <td valign="top"></td>
                                </tr>
                                <tr>
                                  <td><label> <span class="Content"></span>
                                      <input name="txtAddress2" type="text" maxlength="40" size="30" id="txtAddress2" />
                                    </label></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><label> <span class="Content"></span>
                                      <input name="txtAddress3" type="text" maxlength="40" size="30" id="txtAddress3" />
                                    </label></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td height="10"></td>
                          </tr>
                          <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td valign="bottom"><table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td><label> <span class="Content">城市:</span><br />
                                            <input name="txtCity" type="text" maxlength="30" size="30" id="txtCity" />
                                          </label></td>
                                      </tr>
                                    </table></td>
                                  <td width="10"></td>
                                  <td valign="bottom"><table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td valign="bottom"><table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td><label> <span class="Content">州/省:</span><br />
                                                  <input name="txtState" type="text" maxlength="30" size="30" id="txtState" />
                                                </label></td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td height="10"></td>
                          </tr>
                          <tr>
                            <td><table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td valign="top"><label> <span class="Content">郵編:</span><br />
                                      <input name="txtZip" type="text" maxlength="10" size="10" id="txtZip" />
                                    </label></td>
                                  <td width="40"></td>
                                  <td valign="top"><label> <span class="Content">國家:</span><br />
                                      <select style="width: 100px; font-size:12px;" name="cboCountry" id="cboCountry" class="Content">
                                        <option value="US">美國</option>
                                        <option value="CA">加拿大</option>
                                        <option value="CN">中國</option>
                                      </select>
                                    </label></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            </p>
            <h3> 團隊信息</h3>
            <p>
              <label> <span class="Content">團隊名稱:</span><br />
                <input name="txtGroupName" type="text" maxlength="30" size="30" id="txtGroupName" />
                <span style="color:#F00" >*</span><span style="color:#F00" id="lbGroupName" ></span> </label>
            </p>
            <p>
              <label> <span class="Content">團隊描述:</span><br />
                <textarea name="txtGroupDesc" rows="2" cols="50" id="txtGroupDesc"></textarea>
              </label>
            </p>
            <p>
              <label> <span class="Content">團隊人數:</span><br />
                <input name="NumberOfPassengers" type="text" maxlength="50" size="50" id="NumberOfPassengers" />
                <span style="color:#F00" >*</span><span style="color:#F00" id="lbNumberOfPassengers" ></span> </label>
            </p>
            <p>
            <div id="tabs">
              <script type="text/javascript">
							function IFrameReSize_groupquery(iframename,type) {

								
								var pTar = parent.document.getElementById(iframename);
								if (pTar) {//ff
									if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight) {
										pTar.height = pTar.contentDocument.body.offsetHeight+10;
									}else if(pTar.Document && pTar.Document.body.scrollHeight)
									{//ie
										pTar.height = pTar.Document.body.scrollHeight+10;
									}
								}
								document.getElementById("flighttype").value = type;
								//alert(document.getElementById("flighttype").value);
							}
                                </script>
              <ul>
                <li><a href="#tabs-1" onblur="IFrameReSize_groupquery('iframe_group',1);">單程</a></li>
                <li><a href="#tabs-2" onblur="IFrameReSize_groupquery('iframe_group',2);">往返旅程</a></li>
                <li><a href="#tabs-3" onblur="IFrameReSize_groupquery('iframe_group',3);">多目的地</a></li>
              </ul>
              <div id="tabs-1">
                <p>
                <table>
                  <tr>
                    <td><table>
                        <tr id="ctl00_ContentInfo_OandD_trOrigin">
                          <td><label>
                            <div> <span class="Content">始發城市或機場:</span></div>
                            <input name="txtFrom1_1" type="text" maxlength="100" size="30" id="txtFrom1_1" class="txtAirLoc" /><span style="color:#F00" >*</span> <span style="color:#F00" id="lbFrom1_1" ></span>
                            </label></td>
                        </tr>
                      </table></td>
                    <td style="padding-left: 90px"><table>
                        <!-- <tr id="ctl00_ContentInfo_OandD_space">
<td style="height:3px"></td>
</tr>
 -->
                        <tr id="ctl00_ContentInfo_OandD_trDestination">
                          <td><label>
                            <div> <span class="Content">目的城市或機場:</span></div>
                            <input name="txtTo1_1" type="text" maxlength="100" size="30" id="txtTo1_1"
                                                                        class="txtAirLoc" /><span style="color:#F00" >*</span> <span style="color:#F00" id="lbTo1_1" ></span>
                            </label></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                </p>
                <p>
                <table border="0" cellpadding="0" cellspacing="0" width="300">
                  <tr>
                    <td valign="bottom"><label> <span class="Content">啟程時間:</span><br />
                        <input name="txtFromDate1_1" type="text" value="mm/dd/yyyy" maxlength="10" size="10"
                                                            style="width: 100px;" id="txtFromDate1_1" class="txtDate" onfocus="javascript:clear_Format(this);"  onblur="javascript:add_Format(this);"/><span style="color:#F00" >*</span> <span style="color:#F00" id="lbFromDate1_1" ></span>
                      </label></td>
                    <td><label> <span class="Content"></span> <br />
                      </label>
                      <select id="txtFromTime1_1" name="txtFromTime1_1" style="width: 100px;  font-size:12px;">
                        <option value="任意時間" selected="selected">任意時間 </option>
                        <option value="00:00">00:00 </option>
                        <option value="早上">早上</option>
                        <option value="上午">上午</option>
                        <option value="下午">下午</option>
                        <option value="晚上">晚上</option>
                        <option value="1:00">1:00 </option>
                        <option value="2:00">2:00 </option>
                        <option value="3:00">3:00 </option>
                        <option value="4:00">4:00 </option>
                        <option value="5:00">5:00 </option>
                        <option value="6:00">6:00 </option>
                        <option value="7:00">7:00 </option>
                        <option value="8:00">8:00 </option>
                        <option value="9:00">9:00 </option>
                        <option value="10:00">10:00 </option>
                        <option value="11:00">11:00 </option>
                        <option value="12:00">12:00 </option>
                        <option value="13:00">13:00 </option>
                        <option value="14:00">14:00 </option>
                        <option value="15:00">15:00 </option>
                        <option value="16:00">16:00 </option>
                        <option value="17:00">17:00 </option>
                        <option value="18:00">18:00 </option>
                        <option value="19:00">19:00 </option>
                        <option value="20:00">20:00 </option>
                        <option value="21:00">21:00 </option>
                        <option value="22:00">22:00 </option>
                        <option value="23:00">23:00 </option>
                      </select></td>
                  </tr>
                  <tr>
                    <td class="tdHSpace"></td>
                  </tr>
                </table>
                </p>
              </div>
              <div id="tabs-2">
                <p>
                <table>
                  <tr>
                    <td><table>
                        <tr id="ctl00_ContentInfo_OandD_trOrigin">
                          <td><label>
                            <div> <span class="Content">始發城市或機場:</span></div>
                            <input name="txtFrom2_1" type="text" maxlength="100" size="30" id="txtFrom2_1" class="txtAirLoc" /><span style="color:#F00" >*</span> <span style="color:#F00" id="lbFrom2_1" ></span>
                            </label></td>
                        </tr>
                      </table></td>
                    <td style="padding-left: 90px"><table>
                        <!-- <tr id="ctl00_ContentInfo_OandD_space">
<td style="height:3px"></td>
</tr>
 -->
                        <tr id="ctl00_ContentInfo_OandD_trDestination">
                          <td><label>
                            <div> <span class="Content">目的城市或機場:</span></div>
                            <input name="txtTo2_1" type="text" maxlength="100" size="30" id="txtTo2_1"
                                                                        class="txtAirLoc" /><span style="color:#F00" >*</span> <span style="color:#F00" id="lbTo2_1" ></span>
                            </label></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                </p>
                <p>
                <table border="0" cellpadding="0" cellspacing="0" width="300">
                  <tr>
                    <td valign="bottom"><label> <span class="Content">啟程時間:</span><br />
                        <input name="txtFromDate2_1" type="text" value="mm/dd/yyyy" maxlength="10" size="10"
                                                            style="width: 100px;" id="txtFromDate2_1" class="txtDate" onfocus="javascript:clear_Format(this);"  onblur="javascript:add_Format(this);"/><span style="color:#F00" >*</span> <span style="color:#F00" id="lbFromDate2_1" ></span>
                      </label></td>
                    <td><label> <span class="Content"></span> <br />
                      </label>
                      <select id="txtFromTime2_1" name="txtFromTime2_1" style="width: 100px; font-size:12px;">
                        <option value="任意時間" selected="selected">任意時間 </option>
                        <option value="00:00">00:00 </option>
                        <option value="早上">早上</option>
                        <option value="上午">上午</option>
                        <option value="下午">下午</option>
                        <option value="晚上">晚上</option>
                        <option value="1:00">1:00 </option>
                        <option value="2:00">2:00 </option>
                        <option value="3:00">3:00 </option>
                        <option value="4:00">4:00 </option>
                        <option value="5:00">5:00 </option>
                        <option value="6:00">6:00 </option>
                        <option value="7:00">7:00 </option>
                        <option value="8:00">8:00 </option>
                        <option value="9:00">9:00 </option>
                        <option value="10:00">10:00 </option>
                        <option value="11:00">11:00 </option>
                        <option value="12:00">12:00 </option>
                        <option value="13:00">13:00 </option>
                        <option value="14:00">14:00 </option>
                        <option value="15:00">15:00 </option>
                        <option value="16:00">16:00 </option>
                        <option value="17:00">17:00 </option>
                        <option value="18:00">18:00 </option>
                        <option value="19:00">19:00 </option>
                        <option value="20:00">20:00 </option>
                        <option value="21:00">21:00 </option>
                        <option value="22:00">22:00 </option>
                        <option value="23:00">23:00 </option>
                      </select></td>
                  </tr>
                  <tr>
                    <td class="tdHSpace"></td>
                  </tr>
                  <tr>
                    <td valign="bottom"><label> <span class="Content">返程時間:</span><br />
                        <input name="txtToDate2_1" type="text" value="mm/dd/yyyy" maxlength="10" size="10"
                                                            style="width: 100px;" id="txtToDate2_1" class="txtDate" onfocus="javascript:clear_Format(this);"  onblur="javascript:add_Format(this);"/><span style="color:#F00" >*</span> <span style="color:#F00" id="lbToDate2_1" ></span>
                      </label></td>
                    <td><label> <span class="Content"></span> <br />
                      </label>
                      <select id="txtToTime2_1" name="txtToTime2_1" style="width: 100px; font-size:12px;">
                        <option value="任意時間" selected="selected">任意時間 </option>
                        <option value="00:00">00:00 </option>
                        <option value="早上">早上</option>
                        <option value="上午">上午</option>
                        <option value="下午">下午</option>
                        <option value="晚上">晚上</option>
                        <option value="1:00">1:00 </option>
                        <option value="2:00">2:00 </option>
                        <option value="3:00">3:00 </option>
                        <option value="4:00">4:00 </option>
                        <option value="5:00">5:00 </option>
                        <option value="6:00">6:00 </option>
                        <option value="7:00">7:00 </option>
                        <option value="8:00">8:00 </option>
                        <option value="9:00">9:00 </option>
                        <option value="10:00">10:00 </option>
                        <option value="11:00">11:00 </option>
                        <option value="12:00">12:00 </option>
                        <option value="13:00">13:00 </option>
                        <option value="14:00">14:00 </option>
                        <option value="15:00">15:00 </option>
                        <option value="16:00">16:00 </option>
                        <option value="17:00">17:00 </option>
                        <option value="18:00">18:00 </option>
                        <option value="19:00">19:00 </option>
                        <option value="20:00">20:00 </option>
                        <option value="21:00">21:00 </option>
                        <option value="22:00">22:00 </option>
                        <option value="23:00">23:00 </option>
                      </select></td>
                  </tr>
                </table>
                </p>
              </div>
              <div id="tabs-3">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td width="30px" valign="top"><div class="divNumbTab"> 1</div></td>
                    <td><p>
                      <table>
                        <tr>
                          <td><table>
                              <tr id="ctl00_ContentInfo_OandD_trOrigin">
                                <td><label>
                                  <div> <span class="Content">始發城市或機場:</span></div>
                                  <input name="txtFrom3_1" type="text" maxlength="100" size="30" id="txtFrom3_1" class="txtAirLoc" /><span style="color:#F00" >*</span> <span style="color:#F00" id="lbFrom3_1" ></span>
                                  </label></td>
                              </tr>
                            </table></td>
                          <td style="padding-left: 90px"><table>
                              <!-- <tr id="ctl00_ContentInfo_OandD_space">
<td style="height:3px"></td>
</tr>
 -->
                              <tr id="ctl00_ContentInfo_OandD_trDestination">
                                <td><label>
                                  <div> <span class="Content">目的城市或機場:</span></div>
                                  <input name="txtTo3_1" type="text" maxlength="100" size="30" id="txtTo3_1" class="txtAirLoc" onblur="javascript:replace_value(this,'txtFrom3_2');" /><span style="color:#F00" >*</span> <span style="color:#F00" id="lbTo3_1" ></span>
                                  </label></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      </p>
                      <p>
                      <table border="0" cellpadding="0" cellspacing="0" width="300">
                        <tr>
                          <td valign="bottom"><label> <span class="Content">啟程時間:</span><br />
                              <input name="txtFromDate3_1" type="text" value="mm/dd/yyyy" maxlength="10" size="10"
                                                                        style="width: 100px;" id="txtFromDate3_1" class="txtDate" onfocus="javascript:clear_Format(this);"  onblur="javascript:add_Format(this);"/><span style="color:#F00" >*</span> <span style="color:#F00" id="lbFromDate3_1" ></span>
                            </label></td>
                          <td><label> <span class="Content"></span> <br />
                            </label>
                            <select id="txtFromTime3_1" name="txtFromTime3_1" style="width: 100px; font-size:12px;">
                              <option value="任意時間" selected="selected">任意時間 </option>
                              <option value="00:00">00:00 </option>
                        <option value="早上">早上</option>
                        <option value="上午">上午</option>
                        <option value="下午">下午</option>
                        <option value="晚上">晚上</option>
                        <option value="1:00">1:00 </option>
                        <option value="2:00">2:00 </option>
                        <option value="3:00">3:00 </option>
                        <option value="4:00">4:00 </option>
                        <option value="5:00">5:00 </option>
                        <option value="6:00">6:00 </option>
                        <option value="7:00">7:00 </option>
                        <option value="8:00">8:00 </option>
                        <option value="9:00">9:00 </option>
                        <option value="10:00">10:00 </option>
                        <option value="11:00">11:00 </option>
                        <option value="12:00">12:00 </option>
                        <option value="13:00">13:00 </option>
                        <option value="14:00">14:00 </option>
                        <option value="15:00">15:00 </option>
                        <option value="16:00">16:00 </option>
                        <option value="17:00">17:00 </option>
                        <option value="18:00">18:00 </option>
                        <option value="19:00">19:00 </option>
                        <option value="20:00">20:00 </option>
                        <option value="21:00">21:00 </option>
                        <option value="22:00">22:00 </option>
                        <option value="23:00">23:00 </option>
                            </select></td>
                        </tr>
                        <tr>
                          <td class="tdHSpace"></td>
                        </tr>
                      </table>
                      </p></td>
                  </tr>
                  <tr>
                    <td width="30px" valign="top"><div class="divNumbTab"> 2</div></td>
                    <td><p>
                      <table>
                        <tr>
                          <td><table>
                              <tr id="ctl00_ContentInfo_OandD_trOrigin">
                                <td><label>
                                  <div> <span class="Content">始發城市或機場:</span></div>
                                  <input name="txtFrom3_2" type="text" maxlength="100" size="30" id="txtFrom3_2" class="txtAirLoc" />
                                  </label></td>
                              </tr>
                            </table></td>
                          <td style="padding-left: 90px"><table>
                              <!-- <tr id="ctl00_ContentInfo_OandD_space">
<td style="height:3px"></td>
</tr>
 -->
                              <tr id="ctl00_ContentInfo_OandD_trDestination">
                                <td><label>
                                  <div> <span class="Content">目的城市或機場:</span></div>
                                  <input name="txtTo3_2" type="text" maxlength="100" size="30" id="txtTo3_2"
                                                                                    class="txtAirLoc" onblur="javascript:replace_value(this,'txtFrom3_3');"/>
                                  </label></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      </p>
                      <p>
                      <table border="0" cellpadding="0" cellspacing="0" width="300">
                        <tr>
                          <td valign="bottom"><label> <span class="Content">啟程時間:</span><br />
                              <input name="txtFromDate3_2" type="text" value="mm/dd/yyyy" maxlength="10" size="10"
                                                                        style="width: 100px;" id="txtFromDate3_2" class="txtDate" onfocus="javascript:clear_Format(this);"  onblur="javascript:add_Format(this);"/>
                            </label></td>
                          <td><label> <span class="Content"></span> <br />
                            </label>
                            <select id="txtFromTime3_2" name="txtFromTime3_2" style="width: 100px; font-size:12px;">
                              <option value="任意時間" selected="selected">任意時間 </option>
                             <option value="00:00">00:00 </option>
                        <option value="早上">早上</option>
                        <option value="上午">上午</option>
                        <option value="下午">下午</option>
                        <option value="晚上">晚上</option>
                        <option value="1:00">1:00 </option>
                        <option value="2:00">2:00 </option>
                        <option value="3:00">3:00 </option>
                        <option value="4:00">4:00 </option>
                        <option value="5:00">5:00 </option>
                        <option value="6:00">6:00 </option>
                        <option value="7:00">7:00 </option>
                        <option value="8:00">8:00 </option>
                        <option value="9:00">9:00 </option>
                        <option value="10:00">10:00 </option>
                        <option value="11:00">11:00 </option>
                        <option value="12:00">12:00 </option>
                        <option value="13:00">13:00 </option>
                        <option value="14:00">14:00 </option>
                        <option value="15:00">15:00 </option>
                        <option value="16:00">16:00 </option>
                        <option value="17:00">17:00 </option>
                        <option value="18:00">18:00 </option>
                        <option value="19:00">19:00 </option>
                        <option value="20:00">20:00 </option>
                        <option value="21:00">21:00 </option>
                        <option value="22:00">22:00 </option>
                        <option value="23:00">23:00 </option>
                            </select></td>
                        </tr>
                        <tr>
                          <td class="tdHSpace"></td>
                        </tr>
                      </table>
                      </p></td>
                  </tr>
                  <tr>
                    <td width="30px" valign="top"><div class="divNumbTab"> 3</div></td>
                    <td><p>
                      <table>
                        <tr>
                          <td><table>
                              <tr id="ctl00_ContentInfo_OandD_trOrigin">
                                <td><label>
                                  <div> <span class="Content">始發城市或機場:</span></div>
                                  <input name="txtFrom3_3" type="text" maxlength="100" size="30" id="txtFrom3_3" class="txtAirLoc" />
                                  </label></td>
                              </tr>
                            </table></td>
                          <td style="padding-left: 90px"><table>
                              <!-- <tr id="ctl00_ContentInfo_OandD_space">
<td style="height:3px"></td>
</tr>
 -->
                              <tr id="ctl00_ContentInfo_OandD_trDestination">
                                <td><label>
                                  <div> <span class="Content">目的城市或機場:</span></div>
                                  <input name="txtTo3_3" type="text" maxlength="100" size="30" id="txtTo3_3"
                                                                                    class="txtAirLoc"   />
                                  </label></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      </p>
                      <p>
                      <table border="0" cellpadding="0" cellspacing="0" width="300">
                        <tr>
                          <td valign="bottom"><label> <span class="Content">啟程時間:</span><br />
                              <input name="txtFromDate3_3" type="text" value="mm/dd/yyyy" maxlength="10" size="10"
                                                                        style="width: 100px;" id="txtFromDate3_3" class="txtDate" onfocus="javascript:clear_Format(this);"  onblur="javascript:add_Format(this);"/>
                            </label></td>
                          <td><label> <span id="lblField" class="Content"></span> <br />
                            </label>
                            <select id="txtFromTime3_3" name="txtFromTime3_3" style="width: 100px; font-size:12px;">
                              <option value="任意時間" selected="selected">任意時間 </option>
                              <option value="00:00">00:00 </option>
                        <option value="早上">早上</option>
                        <option value="上午">上午</option>
                        <option value="下午">下午</option>
                        <option value="晚上">晚上</option>
                        <option value="1:00">1:00 </option>
                        <option value="2:00">2:00 </option>
                        <option value="3:00">3:00 </option>
                        <option value="4:00">4:00 </option>
                        <option value="5:00">5:00 </option>
                        <option value="6:00">6:00 </option>
                        <option value="7:00">7:00 </option>
                        <option value="8:00">8:00 </option>
                        <option value="9:00">9:00 </option>
                        <option value="10:00">10:00 </option>
                        <option value="11:00">11:00 </option>
                        <option value="12:00">12:00 </option>
                        <option value="13:00">13:00 </option>
                        <option value="14:00">14:00 </option>
                        <option value="15:00">15:00 </option>
                        <option value="16:00">16:00 </option>
                        <option value="17:00">17:00 </option>
                        <option value="18:00">18:00 </option>
                        <option value="19:00">19:00 </option>
                        <option value="20:00">20:00 </option>
                        <option value="21:00">21:00 </option>
                        <option value="22:00">22:00 </option>
                        <option value="23:00">23:00 </option>
                            </select></td>
                        </tr>
                        <tr>
                          <td class="tdHSpace"></td>
                        </tr>
                      </table>
                      </p></td>
                  </tr>
                </table>
              </div>
            </div>
            </p>
            <p style="margin-bottom: -1em"> 日期及起飛時間是否靈活?</p>
            <ul class="simple">
              <li>
                <input id="FlexNo" type="radio" name="Flexible" value="旅行日期可靈活" checked="checked" />
                <label>旅行日期可靈活 </label>
              </li>
              <li>
                <input id="FlexTime" type="radio" name="Flexible" value="起飛時間靈活" />
                <label>起飛時間靈活</label>
              </li>
              <li>
                <input id="FlexDateTime" type="radio" name="Flexible" value="日期及起飛時間均較靈活" />
                <label for="FlexDateTime">日期及起飛時間均較靈活</label>
              </li>
            </ul>
            <p>
              <label> <span class="Content">目標價格:</span><br />
                <input name="txtPrice" type="text" maxlength="10" size="10" id="txtPrice" />&nbsp;&nbsp;&nbsp;<span style="color:#F00" id="lbPrice" ></span>
              </label>
            </p>
            <p>
              <label> <span class="Content">特殊需求(詳細):</span><br />
                <textarea name="txtSpecialNeeds" rows="2" cols="50" id="txtSpecialNeeds"></textarea>
              </label>
            </p>
            <p> </p>
            <fieldset class="buttons">
              <p>
                <input type="button" name="Continue" value="提交" onclick="CheckData();"
                                    id="Continue" class="btn btnBlue" />
                                    
                <span id="sending_mail" style="background:#CCC; text-align:center; padding:10px 10px; display:none; ">
                    	正在發送郵件，請稍候&nbsp;&nbsp;<img border="0" src="./images/loading.gif" />！
                    </span>
              </p>
              <p>
                <input type="reset" name="Cancel" value="重置" id="Cancel" class="btn btnGray" />
              </p>
            </fieldset></td>
        </tr>
      </table>
    </div>
  </div>
  <div id="ctl00_divWS" class="divWS"> </div>
  <!-- "Pat. 5,572,643; 5,737,619; 6,185,586; 6,457,025." -->
  <!-- Usercontrol exclusively for chase kiosk pages -->
  <?php
	if(isset($_POST['Action'])&&$_POST['Action']=='register')
	{
		
		header ( "Content-Type: text/html; charset=utf-8" );
		include_once "./shared/ez_sql_core.php";
		include_once "./mysql/ez_sql_mysql.php";
		include_once "./config.inc_2.php";
		
		
		
		date_default_timezone_set (LOCAL_TIMEZONE);
		$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
		
		$Title = $_POST['cboTitle'];
		$FName = $_POST['txtFName'];
		$LName = $_POST['txtLName'];		
		$Email = $_POST['txtEmail'];
		$Company = $_POST['txtCompany'];
		$MoblePhone = $_POST['txtMoblePhone'];
		$MoblePhoneCountry = $_POST['cboMoblePhoneCountry'];
		$OfficePhone = $_POST['txtOfficePhone'];		
		$PhoneExt = $_POST['txtPhoneExt'];
		$OfficePhoneCountry = $_POST['cboOfficePhoneCountry'];
		$Address1 = $_POST['txtAddress1'];
		$Address2 = $_POST['txtAddress2'];
		$Address3 = $_POST['txtAddress3'];
		$City = $_POST['txtCity'];
		$State = $_POST['txtState'];		
		$Zip = $_POST['txtZip'];		
		$Country = $_POST['cboCountry'];		
		$GroupName = $_POST['txtGroupName'];		
		$GroupDesc = $_POST['txtGroupDesc'];			
		$NumberOfPassengers = $_POST['NumberOfPassengers'];		
		$Flexible = $_POST['Flexible'];		
		$Price = $_POST['txtPrice'];
		$SpecialNeeds = $_POST['txtSpecialNeeds'];
		$language = $_POST['language'];
		$flighttype = $_POST['flighttype'];
		
		$db->query("SET NAMES 'utf8'");
		$db->query("SET CHARACTER_SET_CLIENT=utf8");
		$db->query("SET CHARACTER_SET_RESULTS=utf8");		

		$SQL = "INSERT INTO `groupflight` (`Title`,
										  `FirstName`,
										  `LastName`,
										  `Email`,
										  `Company`,
										  `MoblePhone`,
										  `PhoneCountry`,
										  `OfficePhone`,
										  `PhoneExt`,
										  `OfficePhoneCountry`,
										  `Address`,
										  `City`,
										  `State`,
										  `Zip`,
										  `Country`,
										  `GroupName`,
										  `GroupDescription`,
										  `NumberOfPassengers`,
										  `Flexible`,
										  `Price`,
										  `SpecialNeeds`,
										  `FlightType`,
										  `Language`) 
										VALUES (
										'".$Title."',
										'".$FName."',
										'".$LName."',
										'".$Email."',
										'".$Company."',
										'".$MoblePhone."',
										'".$MoblePhoneCountry."',
										'".$OfficePhone."',
										'".$PhoneExt."',
										'".$OfficePhoneCountry."',
										'".$Address1.$Address2.$Address3."',
										'".$City."',
										'".$State."',
										'".$Zip."',
										'".$Country."',
										'".$GroupName."',
										'".$GroupDesc."',
										'".$NumberOfPassengers."',
										'".$Flexible."',
										'".$Price."',
										'".$SpecialNeeds."',
										'".$flighttype."',
										'".$language."'
								);";
		
		//echo $SQL."<br/>";
		$db->query ( $SQL );
		
		$id = $db->insert_id;
		
		
		include_once ('./mail/mailsetting.php');
		include_once ('./mail/sendmail.php');
		
		$subject = "Group Flight";
		
		$mailTo = array ();
		$bcTo = array ();
		$AddAttachment = array ();
		//array_push ( $mailTo, array ($Email, $FName." ".$LName ) );
		//array_push ( $mailTo, array ("sales@e-traveltochina.com", "" ) );
		array_push ( $mailTo, array ("chenyang_li1@yahoo.com", "" ) );
	
		
		
		$content = "-----------------------------------------------------------------------<br/>";
		$content .= "稱謂:".$Title." 名:".$FName." 姓:".$LName."<br/>";
		$content .= "郵箱地址:".$Email."<br/>";
		$content .= "公司名稱:".$Company."<br/>";
		$content .= "手機電話:".$MoblePhone." 國家:".$MoblePhoneCountry."<br/>";
		$content .= "辦公電話:".$OfficePhone." 分機:".$PhoneExt." 國家:".$OfficePhoneCountry."<br/>";
		$content .= "-----------------------------------------------------------------------<br/>";
		$content .= "公司地址<br/>";		
		$content .= "街道地址:".$Address1.$Address2.$Address3."<br/>";
		$content .= "城市:".$City." 州/省:".$State." 郵編:".$Zip." 國家:".$Country."<br/>";
		$content .= "團隊名稱:".$GroupName."<br/>";
		$content .= "團隊描述:".$GroupDesc."<br/>";
		$content .= "團隊人數:".$NumberOfPassengers."<br/>";		
		$content .= "-----------------------------<br/>";
		
		
		if($flighttype == "1")
		{
			
			$From1_1 = $_POST['txtFrom1_1'];
			$To1_1 = $_POST['txtTo1_1'];
			$FromDate1_1 = $_POST['txtFromDate1_1'];
			$FromTime1_1 = $_POST['txtFromTime1_1'];
			
			$content .= "單程<br/>";
			$content .= "始發城市或機場:".$From1_1."<br/>";
			$content .= "目的城市或機場:".$To1_1."<br/>";
			$content .= "啟程時間:".$FromDate1_1."".$FromTime1_1 ."<br/>";
			$SQL = "";
			$SQL = "INSERT INTO `groupflightdetail` (`groupflightid`,
										  `from`,
										  `to`,
										  `startdate`,
										  `starttime`,
										  `returndate`,
										  `returntime`) 
										VALUES (
										'".$id."',
										'".$From1_1."',
										'".$To1_1."',
										'".$FromDate1_1."',
										'".$FromTime1_1."',
										'',
										''
			    						);";
			$db->query ( $SQL );
			

		}
		else if($flighttype == "2")
		{
			$From2_1 = $_POST['txtFrom2_1'];
			$To2_1 = $_POST['txtTo2_1'];
			$FromDate2_1 = $_POST['txtFromDate2_1'];
			$FromTime2_1 = $_POST['txtFromTime2_1'];
			$ToDate2_1 = $_POST['txtToDate2_1'];
			$ToTime2_1 = $_POST['txtToTime2_1'];
				
			$content .= "往返旅程<br/>";
			$content .= "始發城市或機場:".$From2_1."<br/>";
			$content .= "目的城市或機場:".$To2_1."<br/>";
			$content .= "啟程時間:".$FromDate2_1." ".$FromTime2_1 ."<br/>";
			$content .= "返程時間:".$ToDate2_1." ".$ToTime2_1 ."<br/>";
			
			$SQL = "";
			$SQL = "INSERT INTO `groupflightdetail` (`groupflightid`,
											`from`,
											`to`,
											`startdate`,
											`starttime`,
											`returndate`,
											`returntime`)
											VALUES (
											'".$id."',
											'".$From2_1."',
											'".$To2_1."',
											'".$FromDate2_1."',
											'".$FromTime2_1."',
											'".$ToDate2_1."',
											'".$ToTime2_1."'
											);";
			$db->query ( $SQL );
			
		}
		else if($flighttype == "3")
		{
			$From3_1 = $_POST['txtFrom3_1'];
			$To3_1 = $_POST['txtTo3_1'];
			$FromDate3_1 = $_POST['txtFromDate3_1'];
			$FromTime3_1 = $_POST['txtFromTime3_1'];
				
			$content .= "多目的地<br/>";
			$content .= "1<br/>";
			$content .= "始發城市或機場:".$From3_1."<br/>";
			$content .= "目的城市或機場:".$To3_1."<br/>";
			$content .= "啟程時間:".$FromDate3_1."".$FromTime3_1 ."<br/>";	

			
			
			$SQL = "";
			$SQL = "INSERT INTO `groupflightdetail` (`groupflightid`,
												`from`,
												`to`,
												`startdate`,
												`starttime`,
												`returndate`,
												`returntime`)
												VALUES (
												'".$id."',
												'".$From3_1."',
												'".$To3_1."',
												'".$FromDate3_1."',
												'".$FromTime3_1."',
												'',
												''
												);";
			$db->query ( $SQL );
			
			$To3_2 = $_POST['txtTo3_2'];
			
			if(!empty($To3_2))
			{
				$From3_2 = $_POST['txtFrom3_2'];
				$FromDate3_2 = $_POST['txtFromDate3_2'];
				$FromTime3_2 = $_POST['txtFromTime3_2'];
				
				$content .= "2<br/>";
				$content .= "始發城市或機場:".$From3_2."<br/>";
				$content .= "目的城市或機場:".$To3_2."<br/>";
				$content .= "啟程時間:".$FromDate3_2."".$FromTime3_2 ."<br/>";
				
				$SQL = "";
				$SQL = "INSERT INTO `groupflightdetail` (`groupflightid`,
													`from`,
													`to`,
													`startdate`,
													`starttime`,
													`returndate`,
													`returntime`)
													VALUES (
													'".$id."',
													'".$From3_2."',
													'".$To3_2."',
													'".$FromDate3_2."',
													'".$FromTime3_2."',
													'',
													''
													);";
				$db->query ( $SQL );
				
				$To3_3 = $_POST['txtTo3_3'];					
				if(!empty($To3_3))
				{
					$From3_3 = $_POST['txtFrom3_3'];
					$FromDate3_3 = $_POST['txtFromDate3_3'];
					$FromTime3_3 = $_POST['txtFromTime3_3'];
					$content .= "3<br/>";
					$content .= "始發城市或機場:".$From3_3."<br/>";
					$content .= "目的城市或機場:".$To3_3."<br/>";
					$content .= "啟程時間:".$FromDate3_3."".$FromTime3_3 ."<br/>";		

					$SQL = "";
					$SQL = "INSERT INTO `groupflightdetail` (`groupflightid`,
														`from`,
														`to`,
														`startdate`,
														`starttime`,
														`returndate`,
														`returntime`)
														VALUES (
														'".$id."',
														'".$From3_3."',
														'".$To3_3."',
														'".$FromDate3_3."',
														'".$FromTime3_3."',
														'',
														''
														);";
					$db->query ( $SQL );
				}
			}
		}
		
		$content .= "-----------------------------<br/>";	
		$content .= "日期及起飛時間是否靈活? :".$Flexible."<br/>";
		$content .= "目標價格:".$Price."<br/>";
		$content .= "特殊需求:".$SpecialNeeds."<br/>";
		$content .= "-----------------------------------------------------------------------<br/>";
		
		
					

		//echo $content;		
		
		if (sendmail_sunchis_com ( $mailTo, $bcTo, $subject, $content, $AddAttachment, $SYSTEMCONFIG ["WebSMTP"], $SYSTEMCONFIG ["WebSMTPPort"], $SYSTEMCONFIG ["WebMailName"], $SYSTEMCONFIG ["WebMailWord"], $SYSTEMCONFIG ["WebMailAddress"] )) {
			//AdminLog_Mail ( 1, 1, 'メール成功："' . $log, $nUser [0] [1] );
			//echo "メール成功：";
			$subject2 = "Group Flight";
				
			$mailTo2 = array ();
			$bcTo2 = array ();
			$AddAttachment2 = array ();
			array_push ( $mailTo2, array ($Email, $FName." ".$LName ) );
				
			$content2 = "Dear customer, <br/>";
			$content2 .= "<br/>";
			$content2 .= "We have received your request for group quotation. We will process your request and our sales manager may contact your shortly. Thank you for your business! <br/>";
			$content2 .= "<br/>";
			$content2 .= "我們已收到您的團體機票請求。我們正在處理您的請求，我們的銷售經理會儘快與您聯繫。感謝您的支持！<br/>";
			$content2 .= "<br/>";
			$content2 .= "Best regards!<br/>";
			$content2 .= "<br/>";
				
			$content2 .= '<a href="mailto:sales@e-traveltochina.com">sales@e-traveltochina.com </a><br/>';
			$content2 .= 'Web: <a href="http://www.e-traveltochina.com ">http://www.e-traveltochina.com</a><br/>';
			$content2 .= "Tel: 888-885-6999<br/>";
				
			if (sendmail_sunchis_com ( $mailTo2, $bcTo2, $subject2, $content2, $AddAttachment2, $SYSTEMCONFIG ["WebSMTP"], $SYSTEMCONFIG ["WebSMTPPort"], $SYSTEMCONFIG ["WebMailName"], $SYSTEMCONFIG ["WebMailWord"], $SYSTEMCONFIG ["WebMailAddress"] )) {
				echo "<script Language='JavaScript'>";
				echo "alert('提交成功！');";
				echo "</script>";
			}
			

			
		} else {
			//AdminLog_Mail ( 1, 1, 'メール失敗："' . $log, $nUser [0] [1] );
			echo "郵件發送失敗";
		}		
		
		
		
	}

  
  ?>
  <input name="Action" type="hidden" id="Action" value="register" />
  <input name="language" type="hidden" id="language" value="zh_tw" />
  <input name="flighttype" type="hidden" id="flighttype" value="1" />
</form>
</body>
</html>

