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
if (isset($_POST['count'])) {$count = ($_POST['count']);}
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


$snum=serialize($recnum);
$unum=unserialize($snum);
	 $ordernum=count($snum);
	 $filternum=array_filter($unum);
$pallet = ($_POST['pallet']);
$spal=serialize($pallet);
$upal=unserialize($spal);
	 $orderpal=count($spal);
	 $filterpal=array_filter($upal);
	 
	 $ves = ($_POST['ves']);
$sves=serialize($ves);
$uves=unserialize($sves);
	 $orderves=count($sves);
	 $filterves=array_filter($uves);
	
	 
	 $box = ($_POST['box']);
$sbox=serialize($box);
$ubox=unserialize($sbox);
	 $orderbox=count($sbox);
	 $filterbox=array_filter($ubox);
	 
	  $inv = ($_POST['invoice']);
$sinv=serialize($inv);
$uinv=unserialize($sinv);
	 $orderinv=count($sinv);
	 $filterinv=array_filter($uinv);
	 
	  $invd = ($_POST['invoicedate']);
$sinvd=serialize($invd);
$uinvd=unserialize($sinvd);
	 $orderinvd=count($sinvd);
	 $filterinvd=array_filter($uinvd);
	 
	 $sum = ($_POST['summa']);
$ssum=serialize($sum);
$usum=unserialize($ssum);
	 $ordersum=count($ssum);
	 $filtersum=array_filter($usum);
$os=('0');	 
$city = ($_POST['city']);
for ($a=0,$b=1,$c=2,$d=3,$e=4,$f=5,$g=6; $a<15000; $a++,$b++,$c++,$d++,$e++,$f++,$g++) {



	
$query = "select * from recipients where recnum='$filternum[$a]'";

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
ol_city='".$reccity."',
ol_name='".$recname."',
ol_address='".$recaddress."',
ol_num='".$recnum."',
ol_invoice='".$filterinv[$a]."',
ol_invoicedate='".$filterinvd[$a]."',
ol_summa='".$filtersum[$a]."',
ol_type='".$ordertype."',
ol_term='".$orderterm."',
ol_store='".$orderstore."',
ol_ves='".$filterves[$a]."',
ol_pallet='".$filterpal[$a]."',
ol_status='".$os."',
ol_box='".$filterbox[$a]."'") or die ("Ошибка подключения к базе");


 }
 
 }
 
 mysql_query("UPDATE orderid SET 
orderstatus='".$os."'
where orderid='".$orderid."'") 
or die ("Ошибка подключения к базе");
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
			echo "<div class='client'>ШАГ 3. Заполнение спецификации</div>
			<div class='right'><b>Создан заказ №$orderid.</b> <br>
			
";
		} else {



$query = "select * from orderid where datein='$orderdate2' and dateout='$date22' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}			
			echo "<div class='client'>ШАГ 3. Заполнение спецификации</div>
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


		


if (empty($_POST['choose'])){

echo "<a href='./index.php'>Перейти к отправке заказа на премодерацию</a>";
}else{
echo "<span style='color:red'>Выберите пункты назначения из списков, заполните поля спецификации.<br>
после чего нажмите кнопку внизу списка для перехода к проверке и отправке на премодерацию.</span>
<br><form method='post' action='' style='font-size:14px; color:#666'>";
$td = ($_POST['td']);
$city = ($_POST['city']);
$ccity=serialize($city);
$cccity=unserialize($ccity);
	 $ordernum=count($ccity);
	 $filter=array_filter($cccity);

for ($i=0; $i<500; $i++) {	

if (empty($filter[$i])) {
}else{	
$actual = date("Y-m-d H:i:s");
	echo "<p>

<table width='980' height='auto' border='0' cellpadding='2' cellspacing='2'>
<tr>
    <td width='270px' style='padding: 5px;  background-color:#ECF7FC'><div align='center'><b>$filter[$i]</b></div></td>
<td width='70' style='padding: 5px;  background-color:#ECF7FC'><div align='center'>Объем, паллет</div></td>
    <td width='70' style='padding: 5px;  background-color:#ECF7FC'><div align='center'>Вес, кг</div></td>
	<td width='70' style='padding: 5px;  background-color:#ECF7FC'><div align='center'>Коробок</div></td>
	<td width='70' style='padding: 5px;  background-color:#ECF7FC'><div align='center'>Сумма</div></td>
	<td width='70' style='padding: 5px;  background-color:#ECF7FC'><div align='center'>Накладная</div></td>
	<td width='70' style='padding: 5px;  background-color:#ECF7FC'><div align='center'>Дата накладной</div></td>
</tr></table>";
echo "
<input name='ordertype' type='hidden' value='Продукты питания'>
<input name='orderterm' type='hidden' value='+2С-+6С'>
<input name='orderstore' type='hidden' value='Айсберг-Амурская'>
<input name='orderdate2' type='hidden' value='$actual'>
<input name='orderdate' type='hidden' value='$orderdate2'>
<input name='date2' type='hidden' value='$date2'>
<input name='orderclient' type='hidden' value='$orderclient'>
<input name='clientnum' type='hidden' value='".$userdata['clientnum']."'>
<input type='hidden' name='city' value='$city'>
<input type='hidden' name='orderid' value='$orderid'>



";
	 
for ($a=0,$b=1,$c=2,$d=3,$e=4,$f=5,$g=6; $a<$td[$i]; $a++,$b++,$c++,$d++,$e++,$f++,$g++) {	 
 
	 echo "<p><table width='980' height='auto' border='0' cellpadding='0' cellspacing='0'><tr><td width='270px' bordercolor='#fff'><div align='left'><b>".$b."."; 
	 
	 $query = "select * from recipients where reccity='$filter[$i]'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$recid=($row["recid"]);


$x=	($recid*30+$a);
$y=	($recid*30+$b);
$z=	($recid*30+$c);
$o=	($recid*30+$d);
$p=	($recid*30+$e);
$q=	($recid*30+$f);
$r=	($recid*30+$g);
echo "<select size='1' name='recnum[$x]' style='width: 320px;'><option value=''></option>";
	 $query = "select * from recipients where reccity='$filter[$i]'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$recnam=str_replace("'","`",$row["recname"]);
$rname=str_replace('"',"",$recnam);
$recname=trim($rname);
$recnum=($row["recnum"]);
$reccity= trim($row["reccity"]);

$recadd=str_replace("'","`",$row["recaddress"]);
$recaddres=str_replace('"',"",$recadd);
$recaddress=trim($recaddres);
echo "<option value='$recnum'>$recname:$recaddress:".$row['recnum']."</option>";
}		

echo "</select></b></td>";

echo "<td width='70'><div align='right'><input style='font-size:12px; align:right' name='pallet[$x]' type='text' size='11'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='ves[$x]' type='text' size='11'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='box[$x]' type='text' size='11'></div></td>
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='summa[$x]' type='text' size='11'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='invoice[$x]' type='text' size='12'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='invoicedate[$x]' type='text' size='12'> </div></td>
<input type='hidden' name='city[$x]' value='$filter[$i]'>
<input type='hidden' name='td[$x]' value='$td[$i]'>
</tr></table><p>
";
}
}
}
}
echo "<p><input type='submit' name = 'path'  style='width: 320px;' value='Переход к премодерации'/></form>";

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