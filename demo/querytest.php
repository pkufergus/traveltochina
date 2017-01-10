						<script type="text/javascript">
						function selectchang()
						{
							var selvalue = document.getElementById("QUERY_TYPE").value;
							document.getElementById("iframe_tjjp").src = "jscpsl_grid_test.php?type="+selvalue;
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
		                                    	<img src="./images/tjjp.jpg" />
		                                    </td>
		                                    <td width="200" align="right" valign="bottom">
		                                    	<font size="-1"><strong>停留时间：</strong></font>
		                                    </td>
		                                    <td width="120" valign="bottom">
                                                <SELECT style="width:100px; font-size:12px;" name="QUERY_TYPE" id="QUERY_TYPE" onchange=""  >
                                                    <OPTION selected value=0>两周内往返</OPTION>
                                                    <OPTION value=1>一个月往返</OPTION>
                                                    <OPTION value=2>三个月往返</OPTION>
                                                    <OPTION value=3>半年往返</OPTION>
                                                    <OPTION value=4>一年往返</OPTION>                                                    
                                            	</SELECT>
		                                    </td>
		                                    <td width="100" valign="bottom">
		                                    	<a href="javascript:void(0);"  onclick="selectchang();" ><img src="images/btn_tjjp.jpg" /></a>
		                                    </td>
		                                    <td width="380">
		                                    	
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
	                                            <td align="left" style="width: 800px;padding-top:20px;" valign="top">
													<script type="text/javascript" language="javascript">  
                                                                      function IFrameReSize_tjjp(iframename) {
                                                                          var pTar = document.getElementById(iframename);
                                                                          if (pTar) {//ff
                                                                              if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight) {
                                                                                  pTar.height = pTar.contentDocument.body.offsetHeight+12;
                                                                              }else if(pTar.Document && pTar.Document.body.scrollHeight)
                                                                              {//ie
                                                                                  pTar.height = pTar.Document.body.scrollHeight+12;
                                                                              }
                                                                          }
                                                                      }
                                                                  </script>						
                                                    <iframe src="./jscpsl_grid_test.php" id="iframe_tjjp" name="iframepage" frameBorder="0" scrolling="no" width="815px"  onLoad="IFrameReSize_tjjp('IFrameReSize_tjjp');" ></iframe>                    
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