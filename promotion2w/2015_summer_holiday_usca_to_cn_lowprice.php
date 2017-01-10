<?php 
include_once "../shared/ez_sql_core.php";
include_once "../mysql/ez_sql_mysql.php";
include_once "../config.inc_2.php";

function GetPrice($Departure,$Arrival,$DepartureDate,$ReturnDate,$USD)
{
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$SQL = "SELECT 	min(Price) AS Price
			  FROM
				(
					SELECT CONVERT (Price, DECIMAL) AS Price
					FROM aie_masterdata
					WHERE TIMESTAMPDIFF(DAY,DepartureDate,ReturnDate) = 7
					   and DepartureCity = '".$Departure."'
					   and ArrivalCity = '".$Arrival."'
					   and DepartureDate >= '".$DepartureDate." 00:00:00'
					   and DepartureDate <= '".$ReturnDate." 23:59:59'
					 ) AS t";
	$masterdata = $db->get_results ($SQL );
	//echo $SQL."<br/>";
	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return $USD.(intval($Record->Price))."&nbsp;";
		}
	}
	else 
	{
		return '';
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=gb2312">
<meta name=Generator content="Microsoft Word 12 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:����;
	panose-1:2 1 6 0 3 1 1 1 1 1;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
@font-face
	{font-family:΢���ź�;
	panose-1:2 11 5 3 2 2 4 2 2 4;}
@font-face
	{font-family:"\@΢���ź�";
	panose-1:2 11 5 3 2 2 4 2 2 4;}
@font-face
	{font-family:"\@����";
	panose-1:2 1 6 0 3 1 1 1 1 1;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-link:"ҳü Char";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-link:"ҳ�� Char";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;}
p
	{margin-right:0cm;
	margin-left:0cm;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-link:"��ע���ı� Char";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Tahoma","sans-serif";}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:36.0pt;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:36.0pt;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
span.Char
	{mso-style-name:"ҳü Char";
	mso-style-link:ҳü;}
span.Char0
	{mso-style-name:"ҳ�� Char";
	mso-style-link:ҳ��;}
span.Char1
	{mso-style-name:"��ע���ı� Char";
	mso-style-link:��ע���ı�;
	font-family:"Tahoma","sans-serif";}
p.str, li.str, div.str
	{mso-style-name:str;
	margin-right:0cm;
	margin-left:0cm;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";}
.MsoChpDefault
	{font-size:11.0pt;}
.MsoPapDefault
	{margin-bottom:10.0pt;
	line-height:115%;}
 /* Page Definitions */
 @page Section1
	{size:612.0pt 792.0pt;
	margin:72.0pt 90.0pt 72.0pt 90.0pt;}
div.Section1
	{page:Section1;}
 /* List Definitions */
 ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}
-->
</style>

</head>

<body lang=ZH-CN link=blue vlink=purple>

<div class=Section1>

<p class=MsoNormal align=center style='margin-left:28.25pt;margin-top:28.25pt;text-align:center'><b><span
style='font-size:18.0pt;line-height:115%;font-family:"΢���ź�","sans-serif";
color:red'>���������ô�</span></b><b><span style='font-size:18.0pt;line-height:115%;
color:red'> </span></b><b><span style='font-size:18.0pt;line-height:115%;
font-family:"΢���ź�","sans-serif";color:red'>�й�</span></b><b><span lang=EN-US
style='font-size:18.0pt;line-height:115%;color:red'>2015</span></b><b><span
style='font-size:18.0pt;line-height:115%;font-family:"΢���ź�","sans-serif";
color:red'>������ؼۻ�Ʊ�۸�һ����</span></b></p>

<p class=MsoNormal align=center style='margin-left:28.25pt;text-align:center'><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span><span
lang=EN-US style='font-size:14.0pt;line-height:115%'><?php echo date("Y");?></span><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span><span
lang=EN-US style='font-size:14.0pt;line-height:115%'><?php echo date("m");?></span><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span><span
lang=EN-US style='font-size:14.0pt;line-height:115%'><?php echo date("d");?></span><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�ո��£�</span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://www.e-traveltochina.com/article/"><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif";
color:red'><span lang=EN-US>�������õ�������������˻ع���Ʊ������</span></span></b></a></span><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><span
lang=EN-US><a href="http://www.e-traveltochina.com/article" target="_top"><b><span
style='font-size:14.0pt;line-height:115%'>http://www.e-traveltochina.com/article</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>1</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����ɼ���Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'><?php echo GetPrice('LAX','SHA','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> (</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>)</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-los-angeles-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-los-angeles-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>2</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����ɼ������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('LAX','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>) </span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('LAX','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-los-angeles-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-los-angeles-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>3</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��ŦԼ���Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('NYC','SHA','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-new-york-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-new-york-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>4</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��ŦԼ������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('NYC','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('NYC','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-new-york-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-new-york-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���ɽ�ɽ���Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('SFO','SHA','2015-05-01','2015-08-31','USD');  ?> </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-san-francisco-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-san-francisco-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���ɽ�ɽ������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('SFO','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SFO','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-san-francisco-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-san-francisco-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����˹�ٵ��Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('HOU','SHA','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-houston-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-houston-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����˹�ٵ�����</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('HOU','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('HOU','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-houston-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-houston-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>9</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����ʿ�ٵ��Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('BOS','SHA','2015-05-01','2015-08-31','USD');  ?> </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-boston-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-boston-to-beijing</span></b></a></span><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>10</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����ʿ�ٵ�����</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('BOS','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>
<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('BOS','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>
<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-boston-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-boston-to-beijing</span></b></a></span><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>11</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����ʢ�ٵ��Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('WAS','SHA','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-washington-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-washington-to-shanghai</span></b></a></span><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>12</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����ʢ�ٵ�����</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('WAS','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('WAS','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-washington-to-beijing/"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-washington-to-beijing/</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>13</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��֥�Ӹ絽�Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('CHI','SHA','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-chicago-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-chicago-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>14</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��֥�Ӹ絽����</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('CHI','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('CHI','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-chicago-to-beijing/"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-chicago-to-beijing/</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>15</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ͼ���Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('SEA','SHA','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','SHA','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','SHA','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','SHA','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','SHA','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-seattle-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-seattle-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>16</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ͼ������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('SEA','BJS','2015-05-01','2015-08-31','USD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','BJS','2015-05-01','2015-05-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','BJS','2015-06-01','2015-06-30','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','BJS','2015-07-01','2015-07-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('SEA','BJS','2015-08-01','2015-08-31','USD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-seattle-to-beijing/"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-seattle-to-beijing/</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>17</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�����׶ൽ�Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YTO','SHA','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','SHA','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','SHA','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','SHA','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','SHA','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-toronto-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-toronto-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>18</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�����׶ൽ����</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YTO','BJS','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','BJS','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','BJS','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','BJS','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','BJS','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-toronto-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-toronto-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>19) </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���׶ൽ</span></b><b><span
style='font-size:14.0pt;line-height:115%'> </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YTO','HKG','2015-05-01','2015-08-31','CAD');  ?> </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','HKG','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','HKG','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','HKG','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YTO','HKG','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-toronto-to-hongkong"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-toronto-to-hongkong</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>20</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���¸绪���Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YVR','SHA','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','SHA','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','SHA','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','SHA','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','SHA','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-vancouver-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-vancouver-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>21</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���¸绪������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YVR','BJS','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','BJS','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','BJS','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','BJS','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','BJS','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-vancouver-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-vancouver-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>22</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���¸绪��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YVR','HKG','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','HKG','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','HKG','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','HKG','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YVR','HKG','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-vancouver-to-hongkong"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-vancouver-to-hongkong</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>23</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>����������������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YUL','BJS','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','BJS','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','BJS','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','BJS','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','BJS','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-montreal-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-montreal-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>24</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�������������Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YUL','SHA','2015-05-01','2015-07-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>(</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-montreal-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-montreal-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>25</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���������ﵽ����</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YYC','BJS','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YYC','BJS','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YYC','BJS','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YYC','BJS','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YYC','BJS','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-calgary-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-calgary-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>26</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���������ﵽ�Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YYC','SHA','2015-05-01','2015-08-31','CAD');  ?> </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YUL','SHA','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-calgary-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-calgary-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>27</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�����ɶٵ�����</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YEG','BJS','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','BJS','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','BJS','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','BJS','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','BJS','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-edmonton-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-edmonton-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>28</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�����ɶٵ��Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YEG','SHA','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','SHA','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','SHA','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','SHA','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YEG','SHA','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-edmonton-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-edmonton-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>29</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��̫��������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YOW','BJS','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','BJS','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','BJS','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','BJS','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','BJS','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-ottawa-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-ottawa-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>30</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��̫�����Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YOW','SHA','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','SHA','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','SHA','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','SHA','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YOW','SHA','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-ottawa-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-ottawa-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>31</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���Ხ������</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YWG','BJS','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','BJS','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','BJS','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','BJS','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','BJS','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-winnipeg-to-beijing"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-winnipeg-to-beijing</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>32</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>���Ხ���Ϻ�</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>2015</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>������ؼۻ�Ʊ</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'> <?php echo GetPrice('YWG','SHA','2015-05-01','2015-08-31','CAD');  ?></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b><b><span
style='font-size:14.0pt;line-height:115%'> <span lang=EN-US>(</span></span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>ȫ��</span></b><b><span
lang=EN-US style='font-size:14.0pt;line-height:115%'>) </span></b></p>


<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>5</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','SHA','2015-05-01','2015-05-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>6</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','SHA','2015-06-01','2015-06-30','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>7</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','SHA','2015-07-01','2015-07-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>8</span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�·ݳ���<span
lang=EN-US>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='color:red'><?php echo GetPrice('YWG','SHA','2015-08-01','2015-08-31','CAD');  ?></span></span>��<span lang=EN-US>(</span>ȫ��<span
lang=EN-US>)</span></span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><span lang=EN-US><a target="_top"
href="http://e-traveltochina.com/cheap-flights-from-winnipeg-to-shanghai"><b><span
style='font-size:14.0pt;line-height:115%'>http://e-traveltochina.com/cheap-flights-from-winnipeg-to-shanghai</span></b></a></span></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span style='font-size:14.0pt;
line-height:115%;font-family:"΢���ź�","sans-serif"'>���������ô�</span></b><b><span
style='font-size:14.0pt;line-height:115%'> </span></b><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>�й������������ؼۻ�Ʊ�����</span></b><span
lang=EN-US><a href="http://www.e-traveltochina.com"  target="_top"><b><span style='font-size:
10.0pt;line-height:115%'>www.e-traveltochina.com</span></b></a></span><b><span
style='font-size:14.0pt;line-height:115%;font-family:"΢���ź�","sans-serif"'>��</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span style='font-size:14.0pt;
line-height:115%;font-family:"΢���ź�","sans-serif"'>���չ�˾�۸�仯Ѹ�٣����Ͻ����ο���</span></b></p>

<p class=MsoNormal style='margin-left:28.25pt'><b><span lang=EN-US
style='font-size:14.0pt;line-height:115%'>&nbsp;</span></b></p>

<p style='margin-left:28.25pt;margin-right:28.25pt;line-height:15.85pt'><b><span style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>����ϣ����ʹ�ù��ʻ�Ʊרҵ��վ�����л�Ʊ���� ��</span></b><span
lang=EN-US><a href="http://www.e-traveltochina.com/" target="_top"><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>www.e-traveltochina.com</span></b></a></span><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>���͡����л�Ʊ������</span></b><span
lang=EN-US><a href="http://www.e-traveltochina.com/ca" target="_top"><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>www.e-traveltochina.com/ca</span></b></a></span><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>�����������Ļ�Ʊ������������ñ��ˣ���÷��ġ�</span></b></p>

<p style='margin-left:28.25pt;margin-right:28.25pt;line-height:15.85pt'><b><span style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>�йر�����ʼ�˵ļ����μ���</span></b><span
lang=EN-US><a href="http://www.linkedin.com/in/chenyangli" target="_top"><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>www.linkedin.com/in/chenyangli</span></b></a></span><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>������<span
lang=EN-US>FOLLOW</span>����ӡ�</span></b></p>

<p style='margin-left:28.25pt;margin-right:28.25pt;line-height:15.85pt'><b><span style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>��<span lang=EN-US>FB</span>�����ѣ���<span
lang=EN-US>LIKE</span>���ǣ�</span></b><span lang=EN-US><a target="_top"
href="http://www.facebook.com/TraveltoChinaCorp" target="_top"><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>http://www.facebook.com/TraveltoChinaCorp</span></b></a></span><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>�����ǻἰʱ�����ؼ���Ϣ��</span></b></p>

<p class=str style='margin-left:28.25pt;margin-right:28.25pt;line-height:15.85pt;background:#F2F2F2'><b><span
style='font-size:10.0pt;font-family:"΢���ź�","sans-serif";color:#555555'>����������š���������֮�������ػ㼯���Ƕ���Ĺ����飬�༭���ģ�ϣ��Ϊ��ҽ�ʡһ��ʱ�䡢��ʡһ���Ǯ����Ϊ������һЩ������Ϊ��Ŀ�ģ������������ݣ���ӭȫ�Ļ򲿷�ת���������������ݣ���Ϊԭ����Ϊ֪ʶ��Ȩ���������������κ�������ҵĿ�ġ�</span></b></p>

<div style="padding-top:30px; height:30px;">
&nbsp;
</div>


</div>


</body>

</html>
