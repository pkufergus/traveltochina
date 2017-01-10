						<script type="text/javascript">
						function selectchang()
						{
							var selvalue = document.getElementById("QUERY_TYPE").value;
							var TIME = document.getElementById("QUERY_TIME").value;
							document.getElementById("iframe_tjjp").src = "jscpsl_grid.php?lan=1&type="+selvalue+"&time="+TIME;
							//alert(selvalue);iframe_tjjp
						}
						</script>
						<table class="border" cellspacing="0" cellpadding="0" style="width: 100%; ">
                            <tr>
                                <td>
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
		                            <tbody>
		                                <tr>
		                                    <td height="31" width="100">
		                                    	<img src="./images/Te_traditional.jpg" />
		                                    </td>
		                                    <td width="80" align="right" valign="bottom">
		                                    	<font size="-1"><strong>出發月份：</strong></font>
		                                    </td>
		                                    <td width="130" valign="bottom">
                                                <SELECT style="width:100px; font-size:12px;" name="QUERY_TIME" id="QUERY_TIME" onchange=""  >
                                                    <?php 
													$MonthText = array('一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月');
													$cur_month = intval(date('m')); 
													$cur_year = date('Y');
													for($i=1;$i<=10;$i++)
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
		                                    
		                                    <td width="80" align="right" valign="bottom">
		                                    	<font size="-1"><strong>停貿時間：</strong></font>
		                                    </td>
		                                    
		                                    
		                                    
		                                    <td width="130" valign="bottom">
                                                <SELECT style="width:100px; font-size:12px;" name="QUERY_TYPE" id="QUERY_TYPE" onchange=""  >
                                                    <OPTION selected value=0>一周內往返</OPTION>
                                                    <OPTION value=1>兩周內往返</OPTION>
                                                    <OPTION value=2>一個月往返</OPTION>
                                                    <OPTION value=3>三個月往返</OPTION>
                                                    <OPTION value=4>半年往返</OPTION>
                                                    <OPTION value=5>一年往返</OPTION>                                                    
                                            	</SELECT>
		                                    </td>
                                            <td width="100"  valign="bottom">
		                                    	<a href="javascript:void(0);"  onclick="selectchang();" ><img src="images/tjss_cnt.jpg" /></a>
		                                    </td>
                                            <td   valign="bottom">
		                                    	&nbsp;
		                                    </td>
		                                    		                                    
		                                </tr>
		                            </tbody>
		                         </table>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
	                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
			                            <tbody>
			                                <tr>
			                                    <td width="15px">&nbsp;
	                                            </td>
	                                            <td align="left" style="width: 1000px;padding-top:20px;" valign="top">
													<script type="text/javascript" language="javascript">  
                                                                      function IFrameReSize_tjjp(iframename) {
                                                                          var pTar = document.getElementById(iframename);
                                                                          if (pTar) {//ff
                                                                              if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight) {
                                                                                  pTar.height = pTar.contentDocument.body.offsetHeight+10;
                                                                              }else if(pTar.Document && pTar.Document.body.scrollHeight)
                                                                              {//ie
                                                                                  pTar.height = pTar.Document.body.scrollHeight+10;
                                                                              }
                                                                          }
                                                                      }
                                                                  </script>						
                                                    <iframe src="./jscpsl_grid.php?lan=1" id="iframe_tjjp" name="iframe_tjjp" frameBorder="0" scrolling="no" width="985px"  onLoad="IFrameReSize_tjjp('iframe_tjjp');" ></iframe>                    
                                                </td>
                                                <td width="15px">&nbsp;
	                                            </td>
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