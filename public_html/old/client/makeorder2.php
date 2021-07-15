<?header( 'Content-Type: text/html; charset=windows-1251' );?>
<?php
include('./inc/head.php')
?>
<?php
include('./inc/connect.php')
?>

<?

// Скрипт проверки




if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   
if(isset($_POST['sum_exit'])){
setcookie("id", "", time() - 3600);

        setcookie("hash", "", time() - 3600);
                header("Location: login.php"); exit();
				
				return false;
            }
    $query = mysql_query("SELECT *,INET_NTOA(clientip) FROM clients WHERE clientid = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);


   if(($userdata['clienthash'] !== $_COOKIE['hash']) or ($userdata['clientid'] !== $_COOKIE['id']))


    {

        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        print "";
		header("Location: login.php"); exit();

    }

    else

    {
	?>


<?
	
	// Тело программы после авторизации
	
	# Кнопка заказа

include('./inc/orderbutton.php');
		
		# Левое меню
		
		include('./inc/menu_left.php');


if (isset($_POST['del'])){
 {$recid = $_POST['del'];

 }
 
 $query = "select * from orderlist where ol_id ='$recid'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$ol_city=$row["ol_city"];
$ol_num=$row["ol_num"];

 }
$query="delete from orderlist where ol_id ='$recid'
		";

		 $result=mysql_query ($query);

if ($result)
{
echo "<b><span style='font-size:16px'>Удалено - $ol_city:$ol_num $recid</span></b><br><hr width='500' align='left'>";

} else {
echo "<p><b><span style='font-size:16px'>Ошибка!$ol_city:$ol_num $recid</span></b><br><hr width='500' align='left'>";
}

}






if (isset($_POST['pallet'])) {$pallet = ($_POST['pallet']);}
if (isset($_POST['ves'])) {$ves = ($_POST['ves']);}
if (isset($_POST['summa'])) {$summa= ($_POST['summa']);}
if (isset($_POST['box'])) {$box = ($_POST['box']);}
if (isset($_POST['invoice'])) {$invoice = ($_POST['invoice']);}
if (isset($_POST['invoicedate'])) {$invoicedate = ($_POST['invoicedate']);}
if (isset($_POST['reccity'])) {$reccity = trim(strip_tags($_POST['reccity']));}
if (isset($_POST['recname'])) {$recname = trim(strip_tags($_POST['recname']));}
if (isset($_POST['recaddress'])) {$recaddress = trim(strip_tags($_POST['recaddress']));}
if (isset($_POST['clientnum'])) {$clientnum = $_POST['clientnum'];}
if (isset($_POST['orderdate2'])) {$orderdate2 = $_POST['orderdate2'];

$query = "select * from orderlist where ol_datein='$orderdate2' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)){
$ol_datein=$row["ol_datein"];
}	
}
if (isset($_POST['path'])) {};
if (isset($_POST['date2'])) {$date2 = $_POST['date2'];
$date22 = date('Y-m-d', strtotime($date2));}
if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['td'])) {$td = $_POST['td'];}

if (isset($_POST['orderdate'])) {$orderdate = $_POST['orderdate'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['orderclient'])) {$orderclient = trim(strip_tags($_POST['orderclient']));}
if (isset($_POST['orderid'])) {$orderid = trim(strip_tags($_POST['orderid']));}
if (isset($_POST['ordertype'])) {$ordertype = trim(strip_tags($_POST['ordertype']));}
if (isset($_POST['orderterm'])) {$orderterm = trim(strip_tags($_POST['orderterm']));}
if (isset($_POST['ordertransdate'])) {$ordertransdate = trim(strip_tags($_POST['ordertransdate']));}
if (isset($_POST['orderstore'])) {$orderstore = trim(strip_tags($_POST['orderstore']));}
if (isset($_POST['ordercomment'])) {$ordercomment = trim(strip_tags($_POST['ordercomment']));}
if (isset($_POST['orderrec'])) {$orderrec = trim(strip_tags($_POST['orderrec']));}
if (isset($_POST['clientmail'])) {$clientmail = trim(strip_tags($_POST['clientmail']));}

if (empty($_POST['orderdate2']) 
or empty($_POST['orderdate']) 
or isset($_POST['ol_datein']) 
or isset($_POST['del'])
or isset($_POST['choose'])){

} else {



	



if (isset($_POST['recnum'])) {
$recnum = ($_POST['recnum']);
$city = ($_POST['city']);
for ($i=0; $i<15000; $i++) {


	
$query = "select * from recipients where recnum='$recnum[$i]'";

 $result=mysql_query ($query);
 while ($row=mysql_fetch_array ($result)){
$num = mysql_num_rows($result);
$recnam=str_replace("'","`",$row["recname"]);
$rname=str_replace('"',"",$recnam);
$recname=trim($rname);
$recnum=($row["recnum"]);
$reccity= trim($row["reccity"]);
$recadd=str_replace("'","`",$row["recaddress"]);
$recaddres=str_replace('"',"",$recadd);
$recaddress=trim($recaddres);

mysql_query("INSERT INTO orderlist SET 
ol_orderid='".$orderid."', 
ol_clientid='".$userdata['clientid']."',
ol_datein='".$orderdate2."',
ol_dateout='".$date22."',
ol_clientname='".$userdata['clientname']."',
ol_clientnum='".$clientnum."',
ol_city='".$city[$i]."',
ol_name='".$recname."',
ol_address='".$recaddress."',
ol_num='".$recnum[$i]."',
ol_invoice='".$invoice[$i]."',
ol_invoicedate='".$invoicedate[$i]."',
ol_summa='".$summa[$i]."',
ol_type='".$ordertype."',
ol_term='".$orderterm."',
ol_store='".$orderstore."',
ol_ves='".$ves[$i]."',
ol_pallet='".$pallet[$i]."',
ol_box='".$box[$i]."'") or die ("Ошибка подключения к базе");


 }
 }
}
 

}

$today1 = date("d-m");
$today2 = date("Y");
$date1 = $_POST['date1'];
$date11=  date('d-m', strtotime($date2));
$date12=  date('Y', strtotime($date2));
 if (strtotime(date("d.m.Y"))>=strtotime($date2)&&($today2>=$date12)) {
 echo "Дата более не актуальна или не доступна для заказа, проверьте данные!";
 } else {
 $query = "select * from calendar where calenddate='$date22'";
 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$calendid=$row["calendid"];
}	
if (empty($calendid)){
echo "Дата не актуальна или не доступна для заказа, проверьте данные!";

 } else {
 
 $query = "select * from orderid where dateout='$date22' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$statusdate=$row["statusdate"];
$orderstatus=$row["orderstatus"];
}			
 if ($orderstatus=="30"){
echo "<span style='color:red; font-size:16px'>Заказ на дату $date22 был принят к исполнению $statusdate!</span>";

 } else {
 
$orderterm = $_POST['orderterm'];
$orderstore = $_POST['orderstore'];
$ordertype = $_POST['ordertype'];
$orderdate = $_POST['orderdate'];
$orderdatesimple = $_POST['orderdatesimple'];	
$orderclient = $_POST['orderclient'];

$date222 = date('d-m-Y', strtotime($date2));
$orderdate2 = date('Y-m-d H:i:s', strtotime($orderdate));

$query = "select * from orderid where dateout='$date22' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}	
if (empty($orderid)){		






mysql_query("INSERT INTO orderid SET 
datein='".$orderdate2."', 
clientname='".$userdata['clientname']."',
ordertype='".$ordertype."',
orderterm='".$orderterm."',
dateout='".$date22."',
orderstore='".$orderstore."',
clientid='".$userdata['clientid']."'") or die ("Ошибка подключения к базе");

$query = "select * from orderid where datein='$orderdate2' and dateout='$date22' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}			
			echo "<div class='client'>ШАГ 2. Выбор города доставки</div>
			<div class='right'><b>Создан заказ №$orderid.</b> <br>
			
";
		} else {



$query = "select * from orderid where datein='$orderdate2' and dateout='$date22' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}			
			echo "<div class='client'>ШАГ 2. Выбор города доставки</div>
			<div class='right'><b>Ваш заказ</b> (на дату отправки $date2) <b>№$orderid.</b> <span style='color:red'>Нажатие на [x] удалит строку из заказа</span>
			<br>
";

echo "<div id='orderbox'>";

$query = mysql_query("select * from orderlist where ol_clientid='".$userdata['clientid']."' and ol_orderid='$orderid' and ol_dateout='$date22' order by ol_city");

$num = mysql_num_rows($query);
for ($n=0; $n<$num; $n++) {		
$ol=mysql_fetch_array ($query);
	

	echo "
<form method='post' action='' style='font-size:14px; color:#666'>
".($n+1).". ".$ol['ol_city'].":".$ol['ol_name'].":".$ol['ol_address'].":".$ol['ol_num'].":".$ol['ol_ves']." кг:".$ol['ol_pallet']." пл:".$ol['ol_box']." коробок:".$ol['ol_summa']."руб.

<input name='orderdate2' type='hidden' value='$orderdate2'>
<input name='orderdate' type='hidden' value='$orderdate'>
<input name='date2' type='hidden' value='$date2'>
<input type='submit' class='senddel20' name='del' value='".$ol['ol_id']."' alt='Удалить' /></form>
";

		
}
echo "</div><hr>";			
}

echo "<form method='POST' action='./makeorder3.php' enctype='multipart/form-data'>
<span style='color:red'>Отметьте город и установите необходимое количество отправок в данный город согласно ТТН,<br>
после чего нажмите кнопку внизу списка для перехода к заполнению спецификации.</span>
<table width='980' height='auto' border='0' cellpadding='2' cellspacing='2'>
<tr>
<td width='300px' style='padding: 5px;  background-color:#ECF7FC'>Город назначения</td>
<td width='680px' style='padding: 5px;  background-color:#ECF7FC''>Количество доставок в город</td></tr></table>
";


$query = "select * from calendar where calenddate='$date22'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)){
$num = mysql_num_rows($result);
$calendid=$row["calendid"];
$calendcity=unserialize($row["calendcity"]);
$calendsort=sort($calendcity);
}




$query = "select * from clients where clientname='".$userdata['clientname']."'";

$result=mysql_query ($query);
while($row=mysql_fetch_array ($result)){
$num = mysql_num_rows($result);
$clientid=$row["clientid"];
$clientrec=unserialize($row["clientrec"]);
$clientrecsort=sort($clientrec);
}
for ($z=0,$y=1,$c=2; $z<count($clientrec); $z++,$y++,$c++){
$clientaddress=explode(':', $clientrec[$z]);
$clientrecc=array($clientaddress[0]);
$unique = array();

foreach($clientrecc as $unique)
{
    if(!in_array($unique, $clientrecc1)){
        $clientrecc1[] = $unique;
    }
}
}

$clientrecbaze[]=$clientrecc1;



 

for ($a=0; $a<500; $a++) {

if (!in_array($clientrecbaze,$calendcity)){


if (empty($clientrecc1[$a])){
} else {




if (empty($calendcity)){
 echo "Проверьте условия вашего договора или возможности перевозчика согласно Каледарного плана";
 } else {


echo "<table width='600' height='auto' border='0' cellpadding='0' cellspacing='0'>
<tr>
<td width='280px' style='padding: 5px; text-transform:uppercase'><b>$clientrecc1[$a]</b></td>
<td width='20px' style='padding: 5px'><input name='city[$a]' type='checkbox' value='$clientrecc1[$a]'> </td>

<td width='300px' style='padding: 5px;'><select size='1' name='td[$a]'>
<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>
<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option>
<option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option>
<option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option>
<option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option>
<option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>
</select></td></tr></table><hr>";
	


}
}
}
}
$count=count($calendcity);
echo "

<input name='count' type='hidden' value='$count'>
<input name='ordertype' type='hidden' value='Продукты питания'>
<input name='orderterm' type='hidden' value='+2С-+6С'>
<input name='orderstore' type='hidden' value='Айсберг-Амурская'>
<input name='orderdate2' type='hidden' value='$orderdate2'>
<input name='orderdate' type='hidden' value='$orderdate2'>
<input name='date2' type='hidden' value='$date2'>
<input name='orderclient' type='hidden' value='$orderclient'>
<input type='hidden' name='orderid' value='$orderid'>


";
echo "

";

echo "<br><input type='submit' name='choose' value='Подтвердите выбор для перехода к заполнению спецификации'><p></p>
</form>";
		
		
}
}
}


















# Закрываем основное поле
echo "</div>";
echo "</div>";



 } }
else

{

    print "Включите куки";
header("Location: login.php"); exit();
}
		
		?>

<?php
include('./inc/end.php')
?>