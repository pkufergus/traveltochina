<?php 
$ThreeDayLate=date ( "Y-m-d", strtotime ( "3 day" ) ) ;
$SevenDayLate=date ( "Y-m-d", strtotime ( "7 day" ) ) ;
$ThreeDayLate1=date ( "Y-m-d", strtotime ( "3 day" ) ) ; 
$SevenDayLate1=date ( "Y-m-d", strtotime ( "7 day" ) ) ; 
$Month1 = date ( "Ym", strtotime ( "3 day" ) ) ; 
$Day1 = date ( "d", strtotime ( "3 day" ) ) ; 
$Month2 = date ( "Ym", strtotime ( "7 day" ) ) ; 
$Day2 = date ( "d", strtotime ( "7 day" ) ) ; 
$from = "LAX";
$setfrom = false;
$setto = false;
try { 
	if(!empty($_REQUEST["from"]))
	{
		$from = $_REQUEST["from"];
		$setfrom = true;
	}
}catch (Exception $e) {}
$to = "SHA";
try { 
	if(!empty($_REQUEST["to"]))
	{
		$to = $_REQUEST["to"];
		$setto = true;
	}
}catch (Exception $e) {}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
<title>机票订单</title>
<!-- Bootstrap -->
<link rel="stylesheet" media="screen" href="./css_v3/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./css_v3/global.css" />
<link rel="stylesheet" type="text/css" href="./css_v3/datetimepicker.css" />
<link type="text/css" rel="stylesheet" href="./selectable/skin/selectable/style.css" />
<script type="text/javascript"  src="./selectable/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="./selectable/js/jQselectable.js"></script>
<script type="text/javascript" src="./js/etravel1.js"></script>
<!--[if lt IE 9]>
  <script src="./js_v3/html5shiv.js"></script>
  <script src="./js_v3/respond.min.js"></script>
<![endif]-->
</head>

<body>
<script type="text/javascript">
	jQuery(function($){
		$(".selectable").jQselectable({
			set: "fadeIn",
			setDuration: "fast",
			opacity: 1
		});
	});
	</script>
    
<!-- 内容开始 -->
<form name="form" id="form" method="post" action="http://wftc1.e-travel.com/plnext/AIEADBLADBL/AvailabilityFlowDispatcher.action?SITE=ADBLADBL&LANGUAGE=CN" onsubmit="return jpCheck();" target="_parent">
<input type="hidden" id="SEVEN_DAY_SEARCH" name="SEVEN_DAY_SEARCH" value="TRUE" />
<input type="hidden" id="SEARCH_PAGE" name="SEARCH_PAGE" value="MP" />
<input type="hidden" id="backPricingType" name="backPricingType" value="MP" />
<input type="hidden" id="PLTG_FROMPAGE" name="PLTG_FROMPAGE" value="ADVS"  />
<input type="hidden" id="TITLE" name="TITLE" />
<input type="hidden" id="FIRST_NAME" name="FIRST_NAME" />
<input type="hidden" id="LAST_NAME" name="LAST_NAME" />
<input type="hidden" id="TRIP_TYPE" name="TRIP_TYPE" value="R" />
<input type="hidden" id="MAX_PAX_VALUE" name="MAX_PAX_VALUE"  value="9" />
<input type="hidden" id="REFRESH" name="REFRESH" value="0" />
<input type="hidden" id="userLoggedTravellerType" name="userLoggedTravellerType" value="" />
<input type="hidden" id="ARRANGE_BY" name="ARRANGE_BY" value="N" />
<input type="hidden" id="COMPLEX" name="COMPLEX" value="" />
<input type="hidden" id="FIELD_CHD_NUMBER" name="FIELD_CHD_NUMBER" value="0" />
<input type="hidden" id="B_DATE1Cpx" name="B_DATE1Cpx" value="" />
<input type="hidden" id="B_DATE2Cpx" name="B_DATE2Cpx"  value="" />
<input type="hidden" id="B_DATE3Cpx" name="B_DATE3Cpx"  value="" />
<input type="hidden" id="B_DATE1" name="B_DATE1"  value="<?php echo $ThreeDayLate1;?>" />
<input type="hidden" id="B_TIME_WINDOW_1" name="B_TIME_WINDOW_1"  value="" />
<input type="hidden" id="E_DATE1" name="E_DATE1"  value="<?php echo $SevenDayLate1;?>" />
<input type="hidden" id="Month1" name="Month1"  value="<?php echo $Month1;?>" />
<input type="hidden" id="Day1" name="Day1"  value="<?php echo $Day1;?>" />
<input type="hidden" id="Month2" name="Month2"  value="<?php echo $Month2;?>" />
<input type="hidden" id="Day2" name="Day2"  value="<?php echo $Day2;?>" />
<input type="hidden" id="Month1Cpx" name="Month1Cpx"  value="" />
<input type="hidden" id="Day1Cpx" name="Day1Cpx"  value="" />
<input type="hidden" id="Month2Cpx" name="Month2Cpx"  value="" />
<input type="hidden" id="Day2Cpx" name="Day2Cpx"  value="" />
<input type="hidden" id="Month3" name="Month3Cpx"  value="" />
<input type="hidden" id="Day3" name="Day3Cpx"  value="" />
<input type="hidden" id="B_TIME_WINDOW_2" name="B_TIME_WINDOW_2"  value="" />
<input type="hidden" id="MAX_PAX_TYPES_VALUE" name="MAX_PAX_TYPES_VALUE"  value="6" />
<input type="hidden" id="ALLOW_PRIMARY_ADT" name="ALLOW_PRIMARY_ADT"  value="Y" />
<input type="hidden" id="ALLOW_PRIMARY_CHD" name="ALLOW_PRIMARY_CHD"  value="Y" />

<div class="container iflight_search" id="iflight_search">
    <div class="row">
        <ul class="changTab" id="changTab">
            <li class="cur"><a href="javascript:;" onclick="selectTab_jp('R',$(this))">往返旅行</a></li>
            <li><a href="javascript:;" onclick="selectTab_jp('O',$(this))">单程</a></li>
            <li><a href="javascript:;" onclick="selectTab_jp('M',$(this))">多目的地</a></li>
        </ul>
    </div>
    <div class="row search_content">        
        <div class="select_con" style="display:none;">      
            <span class="vm mr10">我想选择航班，通过</span>
            <input class="vm mt0" name="radioflowType" value="price" checked="checked" onclick="javascript:radioflowType_select(0);" type="radio"><span class="vm">价格</span>
            <input class="vm mt0" name="radioflowType" value="schedule" onclick="javascript:radioflowType_select(1);" type="radio"><span class="vm">时间表</span>
        </div>
        <div class="select_con clearfix" id="oneflight">
            <div id="LOCATION_1" class="location">
                <p class="mb10"  style="display:none;">* 如果不确定某个城市或机场的拼写，请输入前 3 个或更多字母并加上一个星号 (*)。</p>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场 *</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" value="<?php echo $from;?>" datatype="1" name="B_LOCATION_1" id="B_LOCATION_1" placeholder="">
                            
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_1" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场 *</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" value="<?php echo $to;?>" datatype="2" id="E_LOCATION_1" name="E_LOCATION_1" placeholder="">                             
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_1" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-3 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">                    	 
                        <input type="text" class="form-control timeIcon setdatatime departure_day" onchange="Date_Change('setdeparture_day_1','B_DATE1','Month1','Day1','B_LOCATION_1');" value="<?php echo $ThreeDayLate;?>" name="setdeparture_day_1" id="setdeparture_day_1">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-3">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours1" id="Hours1" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours1" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="col-sm-3 pr10 onlyone">
                    <p class="bold mb10">返程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime return_day" onchange="Date_Change('setreturn_day_1','E_DATE1','Month2','Day2','E_LOCATION_1');"  value="<?php echo $SevenDayLate;?>" name="setreturn_day_1" id="setreturn_day_1">
                    </div>
                    <p class="mt10 return_week"></p>
                </div>
                <div class="col-sm-3 onlyone">
                    <p class="bold mb10">返程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours2" id="Hours2" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours2" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
            </div>            
        </div>

        <div class="select_con clearfix" id="moreflight" style="display: none;"> 
            <p class="mb10">* 如果不确定某个城市或机场的拼写，请输入前 3 个或更多字母并加上一个星号 (*)。</p>           
            <div id="LOCATION_Cpx_1" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_1_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" style="display:none;" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_1_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_1_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_1_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" onchange="selectDateTimeChange('setdeparture_day_1_Cpx','B_DATE1Cpx','Month1Cpx','Day1Cpx');" id="setdeparture_day_1_Cpx" name="setdeparture_day_1_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours1Cpx" id="Hours1Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours1Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_2" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_2_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_2_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_2_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_2_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" onchange="selectDateTimeChange('setdeparture_day_2_Cpx','B_DATE2Cpx','Month2Cpx','Day2Cpx');" id="setdeparture_day_2_Cpx" name="setdeparture_day_2_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours2Cpx" id="Hours2Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours2Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_3" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_3_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_3_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2"  name="E_LOCATION_3_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_3_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" onchange="selectDateTimeChange('setdeparture_day_3_Cpx','B_DATE3Cpx','Month3Cpx','Day3Cpx');" id="setdeparture_day_3_Cpx" name="setdeparture_day_3_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours3Cpx" id="Hours3Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours3Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_4" style="display:none;" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_4_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_4_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_4_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_4_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" name="setdeparture_day_4_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours4Cpx" id="Hours4Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours4Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_5" style="display:none;" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_5_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_5_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_5_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_5_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" name="setdeparture_day_5_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours5Cpx" id="Hours5Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours5Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_6" style="display:none;" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_6_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_6_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_6_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_6_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" name="setdeparture_day_6_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours6Cpx" id="Hours6Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours6Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_7" style="display:none;" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_7_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_7_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_7_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_7_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" name="setdeparture_day_7_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours7Cpx" id="Hours7Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours7Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_8" style="display:none;" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_8_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_8_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_8_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_8_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" name="setdeparture_day_8_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours8Cpx" id="Hours8Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours8Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div><div id="LOCATION_Cpx_9" style="display:none;" class="location">                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">始发城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="1" name="B_LOCATION_9_Cpx">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="B_SEARCH_RANGE_9_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>
                <div class="col-sm-6 pr50">
                    <div class="form-group mb10 clearfix">
                        <div>
                            <label for="fromCity">目的城市或机场</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control mt10 cityselect" datatype="2" name="E_LOCATION_9_Cpx" placeholder="">
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn mt10 ml10 btn-default cityselectbutton">选 择</button>
                        </div>
                    </div>
                    <div class="checkbox search_range">
                        <label>
                          <input type="checkbox" name="E_SEARCH_RANGE_9_Cpx" value="100"> 及 100 英里以内的机场
                        </label>
                    </div>
                </div>            
                 <div class="col-sm-6 pr10">
                    <p class="bold mb10">启程日期</p>
                    <div class="in-bo">
                        <input type="text" class="form-control timeIcon setdatatime departure_day" name="setdeparture_day_9_Cpx">
                    </div>
                    <p class="mt10 departure_week"></p>
                </div>
                <div class="col-sm-6">
                    <p class="bold mb10">启程时间</p>
                    <div class="in-bo">
                        <input type="hidden" name="Hours9Cpx" id="Hours9Cpx" value="ANY">
                        <input type="text" class="text selectIcon form-control w115" hiddenvar="Hours9Cpx" value="任意时间">
                        <div class="selectTip settime"></div>
                    </div>
                </div>
                <div class="container"></div>
            </div>            
        </div>

        <div class="select_con clearfix">
            <div class="col-sm-4">
                <p class="bold mb10"></p>
                <div class="in-bo w125"  style="vertical-align:middle;">成人（十二岁以上）</div>
                <div class="in-bo">
                    <input type="text" name="FIELD_ADT_NUMBER" id="FIELD_ADT_NUMBER" value="1" class="text selectIcon form-control w65">
                    <div class="selectTip">
                        <a href="javascript:;">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a><a href="javascript:;">4</a><a href="javascript:;">5</a><a href="javascript:;">6</a><a href="javascript:;">7</a><a href="javascript:;">8</a><a href="javascript:;">9</a>                    </div>
                </div>
                <p class="mt10"></p>
                <div class="in-bo w125"  style="vertical-align:middle;">儿童（两岁至十一岁）</div>
                <div class="in-bo">
                    <input type="text" name="FIELD_CHD_NUMBER" id="FIELD_CHD_NUMBER" value="0" class="text selectIcon form-control w65">
                    <div class="selectTip">
                        <a href="javascript:;">0</a><a href="javascript:;">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a><a href="javascript:;">4</a><a href="javascript:;">5</a><a href="javascript:;">6</a><a href="javascript:;">7</a><a href="javascript:;">8</a><a href="javascript:;">9</a>                    </div>
                </div>
                <p class="mt10"></p>
                <div class="in-bo w125"  style="vertical-align:middle;">婴儿（两岁以下）</div>
                <div class="in-bo">
                    <input type="text" name="FIELD_INFANTS_NUMBER" id="FIELD_INFANTS_NUMBER" value="0" class="text selectIcon form-control w65">
                    <div class="selectTip">
                        <a href="javascript:;">0</a><a href="javascript:;">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a><a href="javascript:;">4</a><a href="javascript:;">5</a><a href="javascript:;">6</a><a href="javascript:;">7</a><a href="javascript:;">8</a><a href="javascript:;">9</a>                    </div>
                </div>
            </div>
            <div class="col-sm-8">
            <table cellpadding="0" cellspacing="0" style="line-height:50px;" >
            <tr>
            <td style="width:120px;vertical-align:middle; text-align:right;"><p class="bold ">价格类型</p>
            </td>
            <td  style="vertical-align:middle; text-align:left; padding-left:10px;">
            <div class="in-bo2">
                    <input type="hidden" name="CABIN" id="cabin_id" value="E">
                    <input type="text" hiddenvar="cabin_id" value="经济舱" class="text selectIcon form-control w140">                    
                    <div class="selectTip">
                        <a href="javascript:;" data="F">头等舱</a>
                        <a href="javascript:;" data="B">商务舱</a>
                        <a href="javascript:;" data="E">经济舱</a>
                        <a href="javascript:;" data="R">具有限制的经济舱</a>
                    </div>
                </div>
            </td>
            <td  style="width:120px;vertical-align:middle; text-align:right;"><p class="bold ">最高停靠次数</p>
            </td>
            <td  style="vertical-align:middle; text-align:left;padding-left:10px;">
            <div class="in-bo2 maximum">
                    <input type="text" name="AIR_MAX_CONNECTIONS" id="AIR_MAX_CONNECTIONS" value="2" class="text selectIcon form-control w65">
                    <div class="selectTip">
                        <a href="javascript:;">0</a>
                        <a href="javascript:;">1</a>
                        <a href="javascript:;">2</a>
                    </div>
                </div>
            </td>
            </tr>
            <tr>
            <td style="vertical-align:middle; text-align:right;"><p class="bold ">仅这些航空公司</p>  
            </td>
            <td colspan="3"  style="vertical-align:middle; text-align:left;">
            <div class="in-bo ml10 clearfix">
                    <div class="col-xs-8">
                        <input type="text" name="AIRLINE_1" id="AIRLINE_1" class="form-control flightselect">
                    </div>
                    <div class="col-xs-4">
                        <button type="button" class="btn ml10 btn-default flightselectbutton">选 择</button>
                    </div>                    
                </div>
            </td>
            <td>
            </td>
            </tr>
            
            </table>
                
                

                
                
            </div>
            <div class="col-sm-5">
                         
                
            </div>
        </div>
        <div class="text-right mt20">
            <a  href="javascript:document.getElementById("form").submit();"><img src="./images/btn_search.jpg" /></a>
        </div>
    </div>    
</div>
</form>
<div class="modal fade" id="flightselect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 700px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">航空公司选择</h4>
      </div>
      <div class="modal-body">
        <ul id="flightselectTab" class="nav nav-tabs"><li class="dropdown active"><a href="#" id="AEFSTabDrop" class="dropdown-toggle" data-toggle="dropdown">A-E <b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="AEFSTabDrop"><li><a href="#A_FStab" tabindex="-1" data-toggle="tab">A</a></li><li><a href="#B_FStab" tabindex="-1" data-toggle="tab">B</a></li><li><a href="#C_FStab" tabindex="-1" data-toggle="tab">C</a></li><li><a href="#D_FStab" tabindex="-1" data-toggle="tab">D</a></li><li><a href="#E_FStab" tabindex="-1" data-toggle="tab">E</a></li></ul></li><li class="dropdown"><a href="#" id="FJFSTabDrop" class="dropdown-toggle" data-toggle="dropdown">F-J <b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="FJFSTabDrop"><li><a href="#F_FStab" tabindex="-1" data-toggle="tab">F</a></li><li><a href="#G_FStab" tabindex="-1" data-toggle="tab">G</a></li><li><a href="#H_FStab" tabindex="-1" data-toggle="tab">H</a></li><li><a href="#I_FStab" tabindex="-1" data-toggle="tab">I</a></li><li><a href="#J_FStab" tabindex="-1" data-toggle="tab">J</a></li></ul></li><li class="dropdown"><a href="#" id="KOFSTabDrop" class="dropdown-toggle" data-toggle="dropdown">K-O <b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="KOFSTabDrop"><li><a href="#K_FStab" tabindex="-1" data-toggle="tab">K</a></li><li><a href="#L_FStab" tabindex="-1" data-toggle="tab">L</a></li><li><a href="#M_FStab" tabindex="-1" data-toggle="tab">M</a></li><li><a href="#N_FStab" tabindex="-1" data-toggle="tab">N</a></li><li><a href="#O_FStab" tabindex="-1" data-toggle="tab">O</a></li></ul></li><li class="dropdown"><a href="#" id="PTFSTabDrop" class="dropdown-toggle" data-toggle="dropdown">P-T <b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="PTFSTabDrop"><li><a href="#P_FStab" tabindex="-1" data-toggle="tab">P</a></li><li><a href="#Q_FStab" tabindex="-1" data-toggle="tab">Q</a></li><li><a href="#R_FStab" tabindex="-1" data-toggle="tab">R</a></li><li><a href="#S_FStab" tabindex="-1" data-toggle="tab">S</a></li><li><a href="#T_FStab" tabindex="-1" data-toggle="tab">T</a></li></ul></li><li class="dropdown"><a href="#" id="UZFSTabDrop" class="dropdown-toggle" data-toggle="dropdown">U-Z <b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="UZFSTabDrop"><li><a href="#U_FStab" tabindex="-1" data-toggle="tab">U</a></li><li><a href="#V_FStab" tabindex="-1" data-toggle="tab">V</a></li><li><a href="#W_FStab" tabindex="-1" data-toggle="tab">W</a></li><li><a href="#X_FStab" tabindex="-1" data-toggle="tab">X</a></li><li><a href="#Y_FStab" tabindex="-1" data-toggle="tab">Y</a></li><li><a href="#Z_FStab" tabindex="-1" data-toggle="tab">Z</a></li></ul></li></ul>        <div id="flightselectContent" class="tab-content">
            <div class="tab-pane fade active in" id="A_FStab">A</div><div class="tab-pane fade" id="B_FStab">B</div><div class="tab-pane fade" id="C_FStab">C</div><div class="tab-pane fade" id="D_FStab">D</div><div class="tab-pane fade" id="E_FStab">E</div><div class="tab-pane fade" id="F_FStab">F</div><div class="tab-pane fade" id="G_FStab">G</div><div class="tab-pane fade" id="H_FStab">H</div><div class="tab-pane fade" id="I_FStab">I</div><div class="tab-pane fade" id="J_FStab">J</div><div class="tab-pane fade" id="K_FStab">K</div><div class="tab-pane fade" id="L_FStab">L</div><div class="tab-pane fade" id="M_FStab">M</div><div class="tab-pane fade" id="N_FStab">N</div><div class="tab-pane fade" id="O_FStab">O</div><div class="tab-pane fade" id="P_FStab">P</div><div class="tab-pane fade" id="Q_FStab">Q</div><div class="tab-pane fade" id="R_FStab">R</div><div class="tab-pane fade" id="S_FStab">S</div><div class="tab-pane fade" id="T_FStab">T</div><div class="tab-pane fade" id="U_FStab">U</div><div class="tab-pane fade" id="V_FStab">V</div><div class="tab-pane fade" id="W_FStab">W</div><div class="tab-pane fade" id="X_FStab">X</div><div class="tab-pane fade" id="Y_FStab">Y</div><div class="tab-pane fade" id="Z_FStab">Z</div>        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">手动填写</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cityselect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">城市或机场</h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">手动填写</button>
      </div>
    </div>
  </div>
</div>

<script src="./js_v3/jquery-1.8.3.min.js"></script>
<script src="./js_v3/bootstrap.min.js"></script>
<script src="./js_v3/bootstrap-datetimepicker.min.js"></script>
<script src="./js_v3/iflight.js"></script>
<script type="text/javascript">

function Date_Change(formid,datetime,month,day,formid3)
{
	var result = document.getElementById(formid).value ;
	var date = result.replace(/-/g,"");
	document.getElementById(datetime).value = date;
    document.getElementById(month).value = date.substr(0,6);
	document.getElementById(day).value = date.substr(6,2);
	if((formid3 == "B_LOCATION_1"  || formid3 ==  "E_LOCATION_1"))
	{
		Location_Change(formid3);
	}
}
function Location_Change(formid2)
{
	var TRIP_TYPE = document.getElementById("TRIP_TYPE").value;
	if((formid2 == "B_LOCATION_1"  || formid2 ==  "E_LOCATION_1") && TRIP_TYPE=="R" )
		{
		    var from = document.getElementById("B_LOCATION_1").value;
			var to = document.getElementById("E_LOCATION_1").value;	
			
			if (from != "LAX"  && from != "NYC" && from != "SFO" && from != "BOS" && from != "CHI" && from != "HOU" && from != "WAS" && from != "SEA" )
			{
				return;
			}
			if (to != "BJS"  && to != "SHA" )
			{
				return;
			}				
				
			parent.document.getElementById("FROM").value=from;
			parent.document.getElementById("TO").value=to;
			window.parent.selectchang();
			
			var fromdate = document.getElementById("B_DATE1").value;
			var todate = document.getElementById("E_DATE1").value;	

			parent.document.getElementById("pricechart_month").src = "pricechart_city_v3.php?type=MONTH&from="+from+"&to="+to+"&fromdate="+fromdate+"&todate="+todate;
			parent.document.getElementById("pricechart_year").src = "pricechart_city_v3.php?type=YEAR&from="+from+"&to="+to+"&fromdate="+fromdate+"&todate="+todate;
			parent.document.getElementById("iframepage_calendar").src = "calendar_of_lowest_fares.php?stay=2&from="+from+"&to="+to+"&fromdate="+fromdate+"";
			
		}
}
</script>
</body>
</html>
