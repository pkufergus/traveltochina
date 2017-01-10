<?php 

include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc_2.php";

date_default_timezone_set (LOCAL_TIMEZONE); 

$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
$db->query("set names utf8");
$aie_log = $db->get_results ( "SELECT *
								FROM aie_masterdata_copy 
								ORDER BY UpdatedDate DESC" );

?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>itemtest</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" type="text/css" href="./css/cpsl.css">
    <script src="./js/jquery-1.4.2.js"
        language="JavaScript" type="text/javascript"></script>
</head>
<body class="body-class">
    <div id="zc-component" style="width:100%; text-align:ccenter;">
        <table id="zc-pane" cellspacing="0" cellpadding="0" style="width:300px;">
            <tbody>
                <div >
                    <table class="zc-viewtable" cellspacing="0" cellpadding="3" width="300px" elname="zc-viewtable">
                        <!-- $Id$ -->
                        <tbody>
                            <tr class="zc-row-header" elname="zc-colheaderrow">
                            	<th class="zc-viewrowheader">
									时间                                   
                        		</th>
								<th class="zc-viewrowheader">
											DepartureDate                                
				                        </th>
				               <th class="zc-viewrowheader">
											ReturnDate                                
				                        </th>
                                        <th class="zc-viewrowheader">
											DepartureCity                                
				                        </th>
                                        <th class="zc-viewrowheader">
											ArrivalCity                                 
				                        </th>
										<th class="zc-viewrowheader">
											Price                                 
				                        </th>
										<th class="zc-viewrowheader">
											Stops                                 
				                        </th>
										<th class="zc-viewrowheader">
											AirlineCode                                 
				                        </th>
										<th class="zc-viewrowheader">
											AirlineName                                 
				                        </th>
				             </tr>
                         
                                <?php if (is_array ( $aie_log )) //add
								{	  
									$row = true;
									foreach ( $aie_log as $log ) {
										?>
										<tr class="<?php if($row) echo 'zc-viewrow zc-row-1'; else echo 'zc-viewrow zc-row-2';?>">
										
										
										<td><?php echo $log->UpdatedDate;?> </td>
										<td><?php echo $log->DepartureDate;?> </td>
                                        <td><?php echo $log->ReturnDate;?> </td>
                                        <td><?php echo $log->DepartureCity;?> </td>
                                        <td><?php echo $log->ArrivalCity;?> </td>
										<td><?php echo $log->Price;?> </td>
										<td><?php echo $log->Stops;?> </td>
										<td><?php echo $log->AirlineCode;?> </td>
										<td><?php echo $log->AirlineName;?> </td>
										</tr>
										<?php $row = !$row;
									}
									
								}?>       
                        </tbody>
                    </table>
                </div>
            </tbody>
        </table>
    </div>    
</body>
</html>
