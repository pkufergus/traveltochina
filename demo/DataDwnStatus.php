<?php 

include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc_2.php";

date_default_timezone_set (LOCAL_TIMEZONE); 

$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
$db->query("set names utf8");
$aie_log = $db->get_results ( "SELECT Date,Success,Failue,Need,(Success+Failue)/TIMESTAMPDIFF(MINUTE,CreateDate,LastDate) as speed
								FROM aie_log 
								ORDER BY CreateDate DESC" );

?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>数据下载日志</title>
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
									日期/次数                                   
                        		</th>
								<th class="zc-viewrowheader">
											任务数                                 
				                        </th>
				               <th class="zc-viewrowheader">
											下载成功                                 
				                        </th>
                                        <th class="zc-viewrowheader">
											下载失败                                 
				                        </th>
                                        <th class="zc-viewrowheader">
											下载速度（条/分钟）                                 
				                        </th>
				             </tr>
                         
                                <?php if (is_array ( $aie_log )) //add
								{	  
									$row = true;
									foreach ( $aie_log as $log ) {
										?>
										<tr class="<?php if($row) echo 'zc-viewrow zc-row-1'; else echo 'zc-viewrow zc-row-2';?>">
										
										
										<td><?php echo $log->Date;?> </td>
										<td><?php echo $log->Need;?> </td>
                                        <td><?php echo $log->Success;?> </td>
                                        <td><?php echo $log->Failue;?> </td>
                                        <td><?php echo $log->speed;?> </td>
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
