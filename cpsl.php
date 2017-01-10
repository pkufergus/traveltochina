						<table class="border" cellspacing="0" cellpadding="0" style="width: 100%; ">
                            <tr>
                                <td>
                                 <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
		                            <tbody>
		                                <tr>
		                                    <td height="30">
		                                    	<img src="<?php if($language =='0') echo './images/cpsl.jpg'; else echo './images/Jing_traditional.jpg';?>" />
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
                                            <td >    
                                            	<iframe height='370px' width='990px' name='zoho-view' frameborder='0' scrolling='auto' allowTransparency ='true' src='https://creator.zoho.com/chenyanglee/e-traveltochina-com/view-embed/view/Y2x7aTGzYbGP2fa0BfUqpqCqz40b04ZDYJeztQgCNayP4xHh4uZQUkF1KEFUWYdv146neYCVt6vBs9q6mMC7E0pQPD9kqVZkC5aC/&recSumry=false'></iframe>
                                            </td>
		                                </tr>
		                            </tbody>
		                         </table> 
                            </td>
                            </tr>
                            <tr>
                            <td >
                            <?php /*
										include_once "./shared/ez_sql_core.php";
										include_once "./mysql/ez_sql_mysql.php";
										include_once "./config.inc.php";
										
										$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
										$db->query ( "set names utf8" );
										$SQL = "SELECT
												hotprice.ID,
												hotprice.displaytext,
												hotprice.queryfrom,
												hotprice.queryto
												FROM
												hotprice
												"; 
										$result = $db->get_results ( $SQL);
										if (is_array ( $result ))
										{
										?>
			                            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
			                            <tbody>
		                                	<tr><td colspan="3" height="15">&nbsp;</td></tr>
			                                <tr>
		                                    	<td width="15px">&nbsp; </td>
			                                    <td width="800px" style="color:#2A7FFF; font-size:12px">
                                                <script type="text/javascript">
												function SetQuery(from,to)
												{
													document.getElementById("iframepage").src = flighturl+"?from="+from+"&to="+to+"&type=1";
													//alert(flighturl+from + to);
												}
												</script>
			                                     <strong>热点城市特价机票：</strong>
					                        	<?php 
			                        			foreach ( $result as $Record ) {
													echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<a style='text-decoration:underline; color:#2A7FFF;' href='#FLIGHT' onclick='SetQuery(\"".$Record->queryfrom."\",\"".$Record->queryto."\");'>".$Record->displaytext."</a>";
												}														
												?>
			                        			</td>
		                                        <td width="15px">&nbsp; </td>
			                               	</tr>
		                                    <tr><td colspan="3" height="15">&nbsp;</td></tr>
			                            </tbody>
			                        	</table>
			                        	<?php 
			                        	}*/
			                        	?>
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
                        
                        