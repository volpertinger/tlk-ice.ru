<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />

<?php
include('./inc/connect.php')
?>
<?
if (isset($_POST['orderid'])) {$orderid = $_POST['orderid'];}

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid`='$orderid'
") or die (mysql_error());
$row = mysql_fetch_assoc ($result);


$result = mysql_query("SELECT* 
FROM `clients` 
WHERE `clientname`='".$row['clientname']."'
") or die (mysql_error());
$row1 = mysql_fetch_assoc ($result);
echo "<title>ЗАКАЗ #".$row['ordernum']."</title>"

?>
<style type="text/css">
<!--
body {
	margin-left: 20px;
	margin-top: 20px;
	margin-right: 20px;
	margin-bottom: 20px;
}
body,td,th {
	font-family: calibri;
	font-size: 16px;
}
-->
</style></head>

<body>
<div style='width:900px; height:auto'>
  <p style='font-size:24px'>ЗАКАЗ №<? echo "".$row['orderid']."";?></p>
  <p>Оказание транспортно-логистических услуг компанией <b>ООО "ЛК Айсберг"</b><br>
  для Заказчика <b><? echo "".$row1['clientfullname']."";?></b> </p>
  <table width="800" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
 
  <tr>
    <td width="300" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>Организация</blockquote></td>
    <td width="500" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote><? echo "".$row1['clientfullname']."";?></blockquote></td>
  </tr>
  <tr>
    <td width="300" height="37" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>Подготовил (ФИО) </blockquote></td>
    <td width="500" height="37" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>&nbsp;</blockquote></td>
  </tr>
  <tr>
    <td width="300" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>Должность</blockquote></td>
    <td width="500" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>&nbsp;</blockquote></td>
  </tr>
  <tr>
    <td width="300" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>Телефон</blockquote></td>
    <td width="500" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote><? echo "".$row1['clientphone']."";?></blockquote></td>
  </tr>
  <tr>
    <td width="300" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>E-MAIL</blockquote></td>
    <td width="500" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote><? echo "".$row1['clientmail']."";?></blockquote></td>
  </tr>
  <tr>
    <td width="300" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>Дата</blockquote></td>
    <td width="500" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote><? echo "".$row['datein']."";?></blockquote></td>
  </tr>
  <tr>
    <td width="300" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote>Условия перевозки </blockquote></td>
    <td width="500" height="40" align="left" valign="middle" nowrap="nowrap" bordercolor="#333333"><blockquote><? echo "".$row['orderterm']."";?></blockquote></td>
  </tr>
</table>
<p>
<table width="900px" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
  <tr>
  <td width="5" height="40"><div align="center">№</div></td>
    <td width="100" height="40"><div align="center">Дата прихода на склад ЛК</div></td>
    <td width="100" height="40"><div align="center">Дата прихода на склад ТЦ</div></td>
    <td width="560" height="40"><div align="center">Город:Наименование ТЦ:Адрес</div></td>
    <td width="70" height="40"><div align="center">Объем, паллет</div>    </td>
    <td width="70" height="40"><div align="center">Вес, кг</div></td>
	<td width="70" height="40"><div align="center">Коробок</div></td>
	<td width="70" height="40"><div align="center">Сумма</div></td>
	<td width="70" height="40"><div align="center">Накладная</div></td>
  </tr>
 <? 
 $result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$orderid'
") or die (mysql_error());


		
$row = mysql_fetch_array ($result);

$query = mysql_query("select * 
from orderlist 
where ol_orderid='".$row['orderid']."' 
order by ol_city") 
or die (mysql_error());

$num = mysql_num_rows($query);
for ($n=0; $n<$num; $n++) {		
$ol=mysql_fetch_array ($query);




  echo "<tr>
  <td height='5'><div align='center'>".($n+1)."</div></td>
    <td height='40'><div align='center'>".$ol['ol_dateout']."</div></td>
    <td height='40'><div align='center'></div></td>
    <td height='40' style='padding:10px'>".$ol['ol_city'].":".$ol['ol_name'].":".$ol['ol_address'].":".$ol['ol_num']."</td>
<td height='40' style='padding:10px'>".$ol['ol_pallet']."</td>
    <td height='40' style='padding:10px'>".$ol['ol_ves']."</td>
	<td height='40' style='padding:10px'>".$ol['ol_box']."</td>
	<td height='40' style='padding:10px'>".$ol['ol_summa']."</td>
	<td height='40' style='padding:10px'>№".$ol['ol_invoice']." от ".$ol['ol_invoicedate']."</td>
  </tr>";
  }
  
  
 ?> 
  
  
</table>



<p>
<p>
<p>
<p>
<p>
<p>
<table width="900px" border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="#333333">
  <tr>
    <td width="450" height="300" valign="top"><div align="center">
      <p>ЗАКАЗЧИК</p>
      <p><strong><? echo "".$row1['clientfullname']."";?></strong></p>
      <p>&nbsp;</p>
      <p>___________________________________</p>
    </div> 
	<div align="right"></div>
      </td>
    <td width="450" height="300" valign="top"><div align="center">
      <p>ИСПОЛНИТЕЛЬ</p>
      <p><strong>ООО &quot;ЛК Айсберг&quot;</strong></p>
      <p>&nbsp;</p>
      <p>___________________________________</p>
    </div> 

<?
$date_today = date("Y-m-d");
$dayname = array("Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота");
$monthnow = array("января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
$numday = date(w);
//$numday = $numday-1;
$nowdayname = $dayname[$numday];
echo $nownumday;
$day = date(d);

$nownummonth = date(m);
$nownummonth = $nownummonth-1;
$nowmonth = $monthnow[$nownummonth];
//echo $nownummonth;
//echo $nowmonth;


$temp_date = explode("-", "$date_today");
//echo $temp_date[2].'-'.$temp_date[1].'-'.$temp_date[0];
$y = $temp_date[0];
$day = $temp_date[2];
//$num_day = $day-1;
$num_month = $temp_date[1]-1;
$month_name = $monthnow[$num_month];

$name_day = mktime (0, 0, 0, $num_month+1, $day, $temp_date[0]);
$name_day = strftime("%w", $name_day);
$name_day = $name_day;
$name_day = $dayname[$name_day];
//echo $name_day ;

echo "



	
      <div align='right'>$day &quot;$month_name&quot; $y г.</div></td>
    </tr>
</table>";
?>


</div>

</body>
</html>
