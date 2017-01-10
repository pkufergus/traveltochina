						<?php 
						$fromdate = date ( "Y-m-d", strtotime ( "3 day" ) ) ;
						$todate = date ( "Y-m-d", strtotime ( "10 day" ) ) ;
						$month = "pricechart.php?type=MONTH&from=Toronto&to=Beijing&fromdate=".$fromdate."&todate=".$todate."";
						$year = "pricechart.php?type=YEAR&from=Toronto&to=Beijing&fromdate=".$fromdate."&todate=".$todate."";
						?>
 						<script type="text/javascript">
						function selectchang()
						{
							//var FROM = document.getElementById("FROM").value;
							//alert(FROM);
							//var TO = document.getElementById("TO").value;
							//alert(TO);
							//var MONTH = document.getElementById("MONTH").value;
							//alert(MONTH);
							//var STAYDAYS = document.getElementById("STAYDAYS").value;
							//alert(STAYDAYS);
							var STOPS = document.getElementById("STOPS").value;
							//alert(STOPS);

							//document.getElementById("iframepage_calendar").src = "../calendar.php?lan=TW&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS;
							
							var FromOption = document.getElementById("FROM");
							var FromCity = FromOption.options[FromOption.selectedIndex].text;
							var FROM = document.getElementById("FROM").value;
							var TOOption = document.getElementById("TO");
							var ToCity = TOOption.options[TOOption.selectedIndex].text;
							var TO = document.getElementById("TO").value;
							var MONTH = document.getElementById("MONTH").value;
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							//var STOPS = "0";
							document.getElementById("iframepage_calendar").src = "../calendar_6m_datamonotor_all.php?lan=TW&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS+"&title="+FromCity+"至"+ToCity+"特價機票";							//alert("calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS);
							
							//alert("calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS);
							
						}
						function enableHongKong(formid,formid2)
						{
							var result = document.getElementById(formid).value ;
							var obj=document.getElementById(formid2);
							obj.options.length=0;
							if (result == "YTO" || result =="YVR" )
							{
								obj.options.add(new Option("北京","BJS")); 
								obj.options.add(new Option("上海","SHA")); 
								obj.options.add(new Option("香港","HKG")); 
								}
							else
							{
								obj.options.add(new Option("北京","BJS")); 
								obj.options.add(new Option("上海","SHA")); 
							}	
						}

						</script>
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
									                  var flighturl = "chinese_from_usa_cnt.php";
									              </script>						
                        			<iframe src="chinese_from_usa_cnt.php" id="iframepage" name="iframepage" frameBorder="0" scrolling="no" width="960px"  onLoad="IFrameReSize('iframepage');" ></iframe>                    
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
                        <table  cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                        <tr>
                            <td>
                               <table class="border" cellspacing="0" cellpadding="0" style="width: 100%; height: 30px;">
                                    <tr>
                                        <td width="10px">&nbsp;
                                        </td>
                                        <td width="160px" align="left">
                                            <span style="font-size: 12px; font-weight: bold;">始發城市</span>
                                            <select id="FROM" name="FROM" style="width: 100px;" onchange="enableHongKong('FROM','TO');">
                                                <option value="YTO">多倫多</option>
                                                <option value="YVR"  selected="selected">溫哥華</option>
                                                <option value="YYC">卡爾加里</option>
                                                <option value="YEG">埃德蒙頓</option>
                                                <option value="YOW">渥太華</option>
                                                <option value="YWG">溫尼伯</option>
                                            </select>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="180px"  align="left">
                                            <span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                                            <select id="TO" name="TO" style="width: 100px;">
                                            <option value="BJS">北京</option>
                                            <option value="SHA">上海</option>
                                            <option value="HKG">香港</option>
                                            </select>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="120px"  align="left">
                                            <span style="font-size: 12px; font-weight: bold;">出發月份</span>
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
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="160px"  align="left">
                                            <span style="font-size: 12px; font-weight: bold;">停留時間</span>
                                            <select id="STAYDAYS" name="STAYDAYS" style="width: 100px;">
                                                 <option selected="selected" value="14">兩周內往返 </option>
                                                <option value="28">一個月內往返 </option>
                                                <option value="91">三個月內往返 </option>
                                                <option value="182">半年內往返 </option>
                                            </select>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="120px"  align="left"  style="display:none;">
                                            <span style="font-size: 12px; font-weight: bold;">是否直飛</span>
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
                            <iframe src="<?php echo '../calendar_6m_datamonotor_all.php?lan=TW&from=YVR&to=BJS&stops=0&staydays=14&title='.urlencode('溫哥華至北京特價機票').'&month='.date('Ym');?>" id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="1070px"></iframe> 
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
                         <table class="border" cellspacing="0" cellpadding="0" style="width: 100%;  margin-top:5px;">  
                                <tr>
                                <td align="center" colspan="3" style="width: 100%;padding-left:3px; padding-top:10px; padding-bottom:5px;" valign="top"> 
                                	<table cellspacing="0" cellpadding="0">
                                	<tr>
                                	<td><img name="pricechart_month" id="pricechart_month" alt=" " src="<?php echo $month;?>" >
                                	</td>
                                    <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td><img  name="pricechart_year" id="pricechart_year"  alt=" " src="<?php echo $year;?>">
                                	</tr>
                                   
                                	
                                	</table>
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
                     <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tbody>
                            <tr>
                            <td width="10px">&nbsp;
                                        </td>
                            <td align="left">
                           
                             <span style="font-size: 12px; font-weight: bold;">加拿大主要城市至中國主要城市特價機票：</span>
                            </td>
                            </tr>
                                 <tr>
                                  <td width="10px">&nbsp;
                                        </td>
                        <td align="left" >
                        						<table border="0" cellspacing="5" cellpadding="5" width="98%" align="center">
                            <tbody>
                                <tr>
								<td><a href="../cheap-flights-from-toronto-to-beijing-tw/" target="_parent" style="font-size:12px"> 多倫多至北京特價機票</a> </td>
								<td><a href="../cheap-flights-from-toronto-to-shanghai-tw/" target="_parent" style="font-size:12px"> 多倫多至上海特價機票</a> </td> 
								<td><a href="../cheap-flights-from-toronto-to-hongkong-tw/" target="_parent" style="font-size:12px"> 多倫多至香港特價機票</a> </td> 
                                <td><a href="../cheap-flights-from-vancouver-to-beijing-tw/" target="_parent" style="font-size:12px"> 溫哥華至北京特價機票</a> </td>
								<td><a href="../cheap-flights-from-vancouver-to-shanghai-tw/" target="_parent" style="font-size:12px"> 溫哥華至上海特價機票</a> </td>
                                <td><a href="../cheap-flights-from-vancouver-to-hongkong-tw/" target="_parent" style="font-size:12px"> 溫哥華至香港特價機票</a> </td>
								 </tr>		
                                 <tr>
								<td><a href="../cheap-flights-from-montreal-to-beijing-tw/" target="_parent" style="font-size:12px"> 蒙特利爾至北京特價機票</a> </td>
								<td><a href="../cheap-flights-from-montreal-to-shanghai-tw/" target="_parent" style="font-size:12px"> 蒙特利爾至上海特價機票</a> </td> 
								<td><a href="../cheap-flights-from-calgary-to-hongkong-tw/" target="_parent" style="font-size:12px"> 卡爾加里至北京特價機票</a> </td> 
                                <td><a href="../cheap-flights-from-calgary-to-beijing-tw/" target="_parent" style="font-size:12px"> 卡爾加里至上海特價機票</a> </td>
								<td><a href="../cheap-flights-from-ottawa-to-shanghai-tw/" target="_parent" style="font-size:12px"> 埃德蒙頓至北京特價機票</a> </td>
                                <td><a href="../cheap-flights-from-ottawa-to-hongkong-tw/" target="_parent" style="font-size:12px"> 埃德蒙頓至上海特價機票</a> </td>
								 </tr>	
                                 <tr>
								<td><a href="../cheap-flights-from-ottawa-to-beijing-tw/" target="_parent" style="font-size:12px"> 渥太華至北京特價機票</a> </td>
								<td><a href="../cheap-flights-from-ottawa-to-shanghai-tw/" target="_parent" style="font-size:12px"> 渥太華至上海特價機票</a> </td> 
								<td><a href="../cheap-flights-from-winnipeg-to-hongkong-tw/" target="_parent" style="font-size:12px"> 溫尼伯至北京特價機票</a> </td> 
                                <td><a href="../cheap-flights-from-winnipeg-to-beijing-tw/" target="_parent" style="font-size:12px"> 溫尼伯至上海特價機票</a> </td>
								<td></td>
                                <td></td>
								 </tr>	
                                 						
							 </tbody>
                        </table>	
                        </td>
                        </tr>
                            </tbody>
                        </table>
                       
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td height="5">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
