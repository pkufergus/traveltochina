<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta name="Keywords" content="温哥华至成都特价机票-加中机票网-加拿大华人购买机票首选网站" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<script src="js/jquery-1.4.2.js"></script>
<script>
//$(function(){
//$.ajax({
 //type:'GET',
//url : '/v1/menu/get_commnet1.json',
//data : {
//fromCode :'YVR',
//toCode :'CTU'
//},
//success:function(result){
//var htmlTemp = document.getElementById('introduction-div').innerHTML;
//for(var key in result){
//var keyTepm=0;
//keyTemp= 11+parseInt(key);
//if(key == 0){htmlTemp +='&nbsp;&nbsp;<p style="padding-bottom:11px;margin-top:-28px;padding-left:20px;width:930px;margin-bottom: 0px; padding-top: 0px;font-size: 13px; font-family:-webkit-body">'+keyTemp+'）'+result[key].description+'</p>';}else{//htmlTemp +='&nbsp;&nbsp;<p style="padding-bottom:11px;margin-top:-8px;padding-left:20px;width:930px;margin-bottom: 0px; padding-top: 0px;font-size: 13px; font-family:-webkit-body">'+keyTemp+'）'+result[key].description+'</p>';}
//}
//$('#introduction-div').html(htmlTemp);
//},
//error:function(){}
//});
//});
</script>
<script src="js/util.js"></script>
<script>
var fromCode ='YVR';
var toCode = 'CTU';
var fromP = '温哥华';
var toP = '成都';
var country = 'CA';
</script>
</head>
<body>
 <?php $fromCodePhp = 'YVR';
 		$toCodePhp = 'CTU';
 		$fromP = '温哥华';
 		$toP = '成都';
        $country = 'CA';
 ?>
<a name=FLIGHT></a>
<div id="maincontainer">
  <?php $language = '0';  require("top.php");?>
  <div id="content_area">
    <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        <tr>
      
      <td style="width:240px;" valign="top"><?php $language = '0';$from_param = $fromCodePhp;$to_param = $toCodePhp; $param_test = $country; require("menu.php");?></td>
      <td style="width:5px;">&nbsp;</td>
      <td  style="width:1000px;" valign="top"><table border="0" cellspacing="0" width="1000px" cellpadding="0" style="vertical-align: text-top;">
          <tr>
            <td valign="top" colspan="2" style="padding-left:30px;"><?php require("notice.php");//通知公告?></td>
          </tr>
          <tr id="content_top">
            <td></td>
          </tr>
            <tr id="content_middle">
          
          <td valign="top" colspan="2" ><table cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
             
              <tr>
                <td>
                  <table class="border" cellspacing="0" cellpadding="0" style="width: 960px; height: 350px;">
                    <tr height="5">
                      <td colspan="3" ></td>
                    </tr>
                    <tr>
                      <td align="left" style="width: 495px;padding-left:3px;" valign="top"><script type="text/javascript" language="javascript">  
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
									                  var flighturl = "request_end.php?fromCode="+fromCode+"&toCode="+toCode+"&fromP="+fromP+"&toP="+toP+"&country="+country;
									              </script>
                        <iframe src="" id="iframepage" name="iframepage" frameBorder="0" scrolling="no" width="960px"  height="400px"  onLoad="IFrameReSize('iframepage');" ></iframe></td>
                    <script>
                    	document.getElementById("iframepage").src="request_end.php?fromCode="+fromCode+"&toCode="+toCode+"&fromP="+fromP+"&toP="+toP+"&country="+country;
                    </script>
                    </tr>
                  </table></td>
              <tr style="height:10px;">
                <td>&nbsp;</td>
              </tr>
                </tr>
              
              
                <td><?php 
                                                    include_once "./config.inc.php";
                                                    date_default_timezone_set (LOCAL_TIMEZONE);
												
										
													?>
                  <script type="text/javascript">
						function selectchang()
						{
							var FROM = fromCode;
							//alert(FROM);
							var TO = toCode;
							//alert(TO);
							var MONTH = <?php echo date('Ym');?>;
							//alert(MONTH);
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							//alert(STAYDAYS);
							var STOPS = "0";
							//alert(STOPS);
							document.getElementById("iframepage_calendar").src = "calendar_6m.php?lan=CN&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS+"&title=温哥华至成都特价机票";
							
						}
						</script>
                  <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                    <tbody>
                      <tr>
                        <td height="5" ><img border="0" src="./images/content_line_bk.jpg"  /></td>
                      </tr>
                    </tbody>
                  </table>
                  <table  cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                    <tr>
                      <td><table class="border" cellspacing="0" cellpadding="0" style="width: 100%; height: 30px;">
                          <tr>
                            <td width="10px">&nbsp;</td>
                            <td width="160px" align="left" style="display:none;"><span style="font-size: 12px; font-weight: bold;">始发城市</span>
                              <select id="FROM" name="FROM" style="width: 100px;">
                                <option value="SFO">San Francisco</option>
                                <option value="LAX">Los Angeles</option>
                                <option value="SFO">San Francisco</option>
                              </select></td>
                            <td width="5px"  style="display:none;">&nbsp;</td>
                            <td width="180px"  align="left" style="display:none;"><span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                              <select id="TO" name="TO" style="width: 100px;">
                                <option value="CHA">Beijing</option>
                                <option value="SHA">Shanghai</option>
                              </select></td>
                            <td width="5px" style="display:none;">&nbsp;</td>
                            <td width="120px"  align="left" style="display:none;"><span style="font-size: 12px; font-weight: bold;">出发月份</span>
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
                              </SELECT></td>
                            <td width="5px" style="display:none;">&nbsp;</td>
                            <td width="160px"  align="left"><span style="font-size: 12px; font-weight: bold;">停留时间</span>
                              <select id="STAYDAYS" name="STAYDAYS" style="width: 100px;">

                                <option selected="selected" value="14">两周内往返 </option>
                                <option value="28">一个月内往返 </option>
                                <option value="91">三个月内往返 </option>
                                <option value="182">半年内往返 </option>
                              </select></td>
                            <td width="5px">&nbsp;</td>
                            <td width="120px"  align="left"  style="display:none;"><span style="font-size: 12px; font-weight: bold;">是否直飞</span>
                              <select id="STOPS" style="width: 40px;">
                                <option value="1">是</option>
                                <option selected="selected" value="0">否</option>
                              </select></td>
                            <td  align="left"><a href="javascript:void(0);"  onclick="selectchang();" ><img border="0" src="./images/search_flight.png" /></a></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr height="335px">
                      <td colspan="3" > 
                      <iframe src="<?php
                       echo 'calendar_6m.php?lan=CN&from='.$fromCodePhp.'&to='.$toCodePhp.'&stops=0&&staydays=14&title='.urlencode($fromP.'至'.$toP.'特价机票').'&month='.date('Ym');?>" 
                       id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="1760px"></iframe></td>
                    </tr>
                  </table>
                  <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                    <tbody>
                      <tr>
                        <td height="5" ><img border="0" src="./images/content_line_bk.jpg"  /></td>
                      </tr>
                    </tbody>
                  </table>
                  </td>
              </tr>
               <tr>
                <td valign="top" ><table width="100%">
                    <tbody>
                      <tr id="tr_right_Chinese">
                        <td colspan="2"><div id='introduction-div'><p style="padding-bottom: 18px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 8px"> <font color="#004483" size="3" face="微软雅黑">美中机票网评论: 温哥华到成都航班</font></p>
<p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">1) 直飞： 温哥华至成都暂无直飞航班；四川航空公司 (Sichuan Airlines) 执行温哥华至成都“一票到底”(经上海沈阳)航班。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">2) 机型： 川航航执飞温哥华至成都航班的机型为空客330。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">3) 机场： 川航温哥华至成都直飞航班运营机场为温哥华国际机场。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">4) 班期时刻： 川航执飞温哥华至成都直飞航班每周运营3班（周二、五、日）。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">5) 航班衔接： 川航四川省内及中国国内航班衔接网络完善，主要城市当日衔接。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">6) 舱位布局： 川航温哥华至成都直飞航班设公务和经济舱两舱。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">7) 其他线路： 从温哥华飞往成都，可搭乘美联航（United Airlines）在美国境内（旧金山）中转；也可以在温哥华搭乘国航、东航、南航、厦航、国泰和全日空等航空公司航班转机北京、上海、广州、厦门、香港和东京等飞往成都或中国其他城市。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">8) 中转须知：温哥华飞成都中转时注意最好不要选择过夜航班；回程建议预留三个小时左右转机时间。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">9) 价格：就温哥华飞成都航班而言，请参考以下原则：</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">1月到4月中旬（中国春节除外）、8月中到11月初、10月中到11月底及12月初，多数航空公司认为是“淡季”，价格也最为便宜；</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">4月中到6月中、7月初偏后到8月中、“十一”长假之后到10月中，多数航空公司认为是“平季”，价格较贵；</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">6月中到7月初、12 月中旬左右，多数航空公司认为是“旺季”，价格最贵。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">行程在1个月以内的较便宜；1个月以上、3个月以内会贵一些；3个月以上、6个月以内更贵一些；6个月以上最贵。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">中国春节前的机票，由于旅客构成和航线配置等原因，中国及亚洲的航空公司比较贵，加航和美国的航空公司飞中国的航班相对便宜。春假机票，加航和美国的航空公司传统上比较贵，中国及亚洲的航空公司相对便宜一些。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">5） 免费行李： 全程为川航、东方、国航、南航或亚洲航空公司的免费交运行李额是2件；第一航段承运人决定免费行李额（美联航1件，其他航空公司两件）。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">6) 建议： 学生、学者寒、暑假回国时，机票价格很高，在考试和放假日期确定后，尽量提前订票，尽量晚走、早回。探亲访友的旅客，最好选择在淡季出行，最好不要超过1个月。圣诞节机票、暑假机票属于高峰季，应提前3-6个月考虑购买机票；感恩节机票、春节机票、春假机票属于旺季机票，应提前3个月左右购买；淡季机票可以提前1个月左右考虑。公务旅客，最好提前2周以上订购机票。</font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"></font></p><p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px; margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">转载请注明：加中机票网 (www.e-traveltochina.com/ca) - 加拿大华人购买机票首选网站</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;
                                                                margin-bottom: 0px; padding-top: 0px"> </p></div></td>
                      </tr>
                    </tbody>
                  </table></td>
              </tr>
            </table>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
              <tbody>
                <tr>
                  <td height="5"></td>
                </tr>
              </tbody>
            </table></td>
            </tr>
          
          <tr id="content_bottom">
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      
    </table>
  </div>
  <?php require("footer.php");?>
</div>
</body>
</html>

