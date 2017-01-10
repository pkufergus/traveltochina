<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
<a name=FLIGHT></a>
    <div id="maincontainer">
        <?php $language = '1';   require("top_cnt.php");?>
        <div id="content_area">
        <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        	<tr>
            	<td style="width:240px;" valign="top">
                <?php $language = '0'; require("menu_cnt.php");?>
                </td>
                <td style="width:5px;">&nbsp;
                </td>
                <td  style="width:1000px;" valign="top">
                    <table border="0" cellspacing="0" width="1000px" cellpadding="0" style="vertical-align: text-top;">
                     <tr>
                            <td valign="top" colspan="2" style="padding-left:30px;">
                                <?php require("notice_cnt.php");//通知公告?>
                            </td>
                        </tr>
                        <tr id="content_top">
                        	<td>
                            </td>
                        </tr>
                       
                        <tr id="content_middle">
                            <td valign="top" colspan="2" >
                                <table cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                                   
                                    <tr>
                                    <td>
                                   
                                    <table class="border" cellspacing="0" cellpadding="0" style="width: 960px; height: 230px;">
                        	<tr height="5">
                            <td colspan="3" ></td>
                            </tr>
                            <tr>
                                <td align="left" style="width: 495px;padding-left:3px;" valign="top">
	                                <script type="text/javascript" language="javascript">  
									                  function IFrameReSize(iframename) {
									                      var pTar = document.getElementById(iframename);
									                      if (pTar) {//ff
									                          if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight) {
									                              pTar.height = pTar.contentDocument.body.offsetHeight;
									                          }else if(pTar.Document && pTar.Document.body.scrollHeight)
									                          {//ie
									                              pTar.height = pTar.Document.body.scrollHeight;
									                          }
									                      }
									                  }
									                  var flighturl = "chinese_from_usa_cnt_yvr_bjs.php";
									              </script>						
                        			<iframe src="chinese_from_usa_cnt_yvr_bjs.php" id="iframepage" name="iframepage" frameBorder="0" scrolling="no" width="960px"  onLoad="IFrameReSize('iframepage');" ></iframe>                    
                                </td>
                                
                                </tr>
                                </table>
                                    </td>
                                    </tr>  
                                    <tr style="height:10px;">
                                    <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                       <?php 
                                                    include_once "./config.inc.php";
                                                    date_default_timezone_set (LOCAL_TIMEZONE);
												
										
													?> 

                        <script type="text/javascript">
						function selectchang()
						{
							var FROM = "YVR";
							//alert(FROM);
							var TO = "BJS";
							//alert(TO);
							var MONTH = <?php echo date('Ym');?>;
							//alert(MONTH);
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							//alert(STAYDAYS);
							var STOPS = "0";
							//alert(STOPS);

							document.getElementById("iframepage_calendar").src = "calendar_6m.php?lan=CN&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS+"&title=溫哥華至北京特價機票";;
							//alert("calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS);
							
						}
						</script>
                       <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td height="5" >
                                    <img border="0" src="./images/content_line_bk.jpg"  />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table  cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                         <tr>
                            <td>
                                <table class="border" cellspacing="0" cellpadding="0" style="width: 100%; height: 30px;">
                                    <tr>
                                        <td width="10px">&nbsp;
                                        </td>
                                        <td width="160px" align="left" style="display:none;">
                                            <span style="font-size: 12px; font-weight: bold;">始发城市</span>
                                            <select id="FROM" name="FROM" style="width: 100px;">
                                            <option value="YVR">Vancouver</option>
                                            <option value="LAX">Los Angeles</option>
                                            <option value="SFO">San Francisco</option>
                                              </select>
                                        </td>
                                        <td width="5px"  style="display:none;">&nbsp;
                                        </td>
                                        <td width="180px"  align="left" style="display:none;">
                                            <span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                                            <select id="TO" name="TO" style="width: 100px;">
                                            <option value="BJS">Beijing</option>
                                            <option value="SHA">Shanghai</option>
                                            </select>
                                        </td>
                                        <td width="5px" style="display:none;">&nbsp;
                                        </td>
                                        <td width="120px"  align="left" style="display:none;">
                                            <span style="font-size: 12px; font-weight: bold;">出发月份</span>
                                            <SELECT style="width:60px; font-size:12px;" name="MONTH" id="MONTH" onchange=""  >
                                                    <?php 
                                                    include_once "./config.inc.php";
                                                    date_default_timezone_set (LOCAL_TIMEZONE);
													$MonthText = array('一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月');
													$cur_month = intval(date('m')); 
													$cur_year = date('Y');
													for($i=1;$i<=11;$i++)
													{
														if($cur_month <10)
														{
															echo '<OPTION value="'.$cur_year.'0'.($cur_month).'">'.$MonthText[$cur_month-1].'</OPTION>';//$cur_month.$MonthText[$cur_month-1].'<br/>';
														}
														else
														{
															echo '<OPTION value="'.$cur_year.($cur_month).'">'.$MonthText[$cur_month-1].'</OPTION>';//$cur_month.$MonthText[$cur_month-1].'<br/>';
														}
														
														if($cur_month >=12)
														{
															$cur_month = $cur_month - 12;
															$cur_year = $cur_year + 1;
														}
														$cur_month++;
													}
													?>           
                                                                                                           
                                            	</SELECT>
                                        </td>
                                        <td width="5px" style="display:none;">&nbsp;
                                        </td>
                                        <td width="160px"  align="left">
                                            <span style="font-size: 12px; font-weight: bold;">停留時間</span>
                                            <select id="STAYDAYS" name="STAYDAYS" style="width: 100px;">
                                                <option value="7">一周內往返 </option>
                                                <option selected="selected" value="14">兩周內往返 </option>
                                                <option value="28">一個月內往返 </option>
                                                <option value="91">三個月內往返 </option>
                                                <option value="182">半年內往返 </option>
                                            </select>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="120px"  align="left"  style="display:none;">
                                            <span style="font-size: 12px; font-weight: bold;">是否直飞</span>
                                            <select id="STOPS" style="width: 40px;">
                                                <option value="1">是</option>
                                                <option selected="selected" value="0">否</option>
                                            </select>
                                        </td>
                                        <td  align="left">
                                        <a href="javascript:void(0);"  onclick="selectchang();" ><img border="0" src="./images/search_flight.png" /></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr height="335px">
                            <td colspan="3" >
                            <iframe src="<?php echo 'calendar_6m.php?lan=CN&from=YVR&to=BJS&stops=0&staydays=14&title='.urlencode('溫哥華至北京特價機票').'&month='.date('Ym');?>" id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="1065px"></iframe> 
                            </td>
                        </tr>
                       
                    </table>
                                    
                                    
                                     <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td height="5" >
                                    <img border="0" src="./images/content_line_bk.jpg"  />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                                    
                                    
                                    
                                    
                                    
                                    
                                    </td>
                                    </tr>  
                                    
                                     <tr>
                                    <td valign="top" >
                                    <table width="100%">
                    <tbody>
                      <tr id="tr_right_Chinese">
                        <td colspan="2"><p style="padding-bottom: 18px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 8px"> <font color="#004483" size="3" face="微软雅黑">美中機票網評論: 溫哥華至北京航班</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 1) 直飛： 加拿大航空公司 (Air Canada) 和中國國際航空公司 (Air China) 執行溫哥華至北京直飛航班。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 2) 機型： 國航執飛溫哥華至北京航班的機型較新為空客330；加航執飛溫哥華至北京航班的機型為波音767。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 3) 機場：溫哥華國際機場。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 4) 航班： 國航執飛溫哥華至北京直飛航班每日運營1-2班；加航執飛溫哥華至北京直飛航班每日運營1-2班。國航投放運力較多。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 5) 航班銜接： 國航中國國內航班銜接網路比較完善，絕大部分城市可以當日中轉；加航在加拿大境內及美國國內航班銜接網路完善，大多城市當日銜接。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 6) 艙位佈局： 國航溫哥華至北京直飛航班設公務和經濟艙兩艙；加航溫哥華至北京直飛航班設公務艙和經濟艙兩艙。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 7) 其他線路： 旅客可以搭乘美聯航、達爾美 、美利堅 從溫哥華在美國境內中轉至北京；也可以搭乘大韓、韓亞、國泰、日航、全日空等在韓國、日本、香港中轉至北京或中國其他城市；也可以轉機至美國西岸再搭乘國航、東航、南航、海航和其它航空公司航班飛往北京或中國其他城市；部分旅客喜歡從陸路到西雅圖，再飛北京或中國其他城市。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px; line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 8) 中轉須知：溫哥華飛北京中轉時注意最好不要選擇過夜航班；回程建議預留三個小時左右轉機時間。 </font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px; line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 9）價格：就溫哥華飛北京航班而言，通常來講，1 月到3 月初（中國春節除外）、11 月到12 月初的價格最為便宜；4 月和5月、9 月和10 月其次；6 月中到9 月初、12 月中到1 月初和中國春節期間，價格最貴。行程在1個月以內的較便宜；1個月以上、3個月以內會貴一些；3個月以上、6個月以內更貴一些；6個月以上最貴。 </font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px; line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 10） 學生寒、暑假回國時，機票價格很高，在考試和放假日期確定後，儘量提前訂票，儘量晚走、早回。探親訪友的旅客，最好選擇在淡季出行，最好不要超過1個月。 </font></p>
                          
                          
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;
                                                                margin-bottom: 0px; padding-top: 0px"> </p></td>
                      </tr>
                    </tbody>
                  </table>

                                    </td>
                                    </tr>                               
                                   
                                </table>
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                                    <tbody>
                                        <tr>
                                            <td height="5">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>	   
                        <tr id="content_bottom">
                        	<td>&nbsp;
                            </td>
                        </tr>         
                    </table>
                     </td>
            </tr>
         </table>
        </div>
        <?php require("footer.php");?>
    </div>
</body>
</html>
