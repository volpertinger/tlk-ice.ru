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
		# Удаление заказа
if(isset($_POST['del'])){ 
{$del = $_POST['del'];}

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$del'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
}
if ($result)
{
echo "<b><form action='' method='post'><span style='font-size:16px'>Подтвердите удаление вашего заказа #$orderid от $orderdate</span></b>
<input type='submit' class='senddel' name='deltrue' value='$orderid' alt='Удалить' /><br><hr></form>";

} else {
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr>";
}
}
if(isset($_POST['deltrue'])){ 
{$deltrue = $_POST['deltrue'];}
$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$deltrue'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$ordercsv=$row['ordercsv'];
$orderclient=$row['clientname'];
}
$uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$csv = ("$uploaddir/$ordercsv");
unlink($csv);
$query="delete from orderid where orderid='$orderid'
		";
		$res=mysql_query ($query);
$query="delete from orderlist where ol_orderid='$orderid'
		";

		 $result=mysql_query ($query);

if ($result&&$res)
{
echo "<b><span style='font-size:16px'><i>$orderclient</i> ваш заказ #$orderid от $orderdate удален</span></b><br><hr width='500' align='left'>";

} else {
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr width='500' align='left'>";
}
}	






# Отправка на премодерацию
if (isset($_POST['sendmoder'])){
 {
$sendmoder = $_POST['sendmoder'];
$status = $_POST['status'];
$orderid = $_POST['orderid'];
$clientid = $_POST['clientid'];
$dateout= $_POST['dateout'];
 }
 
$res = mysql_query("SELECT * FROM orderlist where ol_orderid ='$orderid' order by ol_city"); 

$uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$umploaddir = "../csv";  
 $newname = date("dmYHis");

$name = ($clientid."_".$orderid."_".$dateout);
 $filen=("$uploaddir/$name".".csv");
  $file=("$umploaddir/$name".".csv");
   $ordercsv=("$name".".csv");
  copy($filen, $filen);
$f = fopen($filen, 'w'); 

$num = mysql_num_rows($res);
for ($x=0; $x<$num; $x++) {		
$ol=mysql_fetch_array ($res);

$rec="".$ol['ol_clientnum'].";".$ol['ol_clientname'].";".$ol['ol_orderid'].";".$ol['ol_dateout'].";".$ol['ol_city'].";".$ol['ol_name'].";".$ol['ol_address'].";".$ol['ol_num'].";".$ol['ol_pallet'].";".$ol['ol_box'].";".$ol['ol_ves'].";".$ol['ol_summa'].";".$ol['ol_invoice'].";".$ol['ol_invoicedate']."";
$arrec=array($rec);


foreach ($arrec as $line) {

fputcsv($f, split(';',$line), ';');
}
}
 fclose($f);
 $statusdate = date("Y-m-d H:i:s");
mysql_query("UPDATE orderid SET 
orderstatus='".$status."',
statusdate='".$statusdate."',
ordercsv='".$ordercsv."' 
where orderid='".$orderid."'") 
or die ("Ошибка подключения к базе");

mysql_query("UPDATE orderlist SET 
ol_status='".$status."'
where ol_orderid='".$orderid."'") 
or die ("Ошибка подключения к базе");

$resu = mysql_query("SELECT* 
FROM `clients` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$cl=mysql_fetch_array ($resu);
$clientmail=$cl['clientmail'];
$resul = mysql_query("SELECT* 
FROM `orderid` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$od=mysql_fetch_array ($resul);



$to = "admin@pollard.ru, $clientmail"; 

$headers .= "From: $clientmail" . "\r\n";
$headers .= "Cc: $clientmail" . "\r\n";/*УКАЗАТЬ СВОЙ АДРЕС!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "ZAKAZ. Client - ".$cl['clientname']."";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";




$message = "$date
\n1. ЗАКАЗ ".$od['orderid']." ".$cl['dateout']." от: ".$cl['clientname']." $clientmail
\n2. Дата составления заказа: ".$od['datein']."
\n3. Дата передачи груза на склад: ".$od['dateout']."
\n4. Скачать заказ http://tlk-ice.ru/client/csv/".$ordercsv."";

$send = mail ($to, $subject, $message, $headers);

}




		# Главная
		if (empty($_POST['path'])){
		echo "<div class='client'>ВАШИ ЗАКАЗЫ</div>";	
		include('./inc/search.php');
		include('./inc/table_top.php');
		
$page = $_GET['page'];
$lines=10;
$begin=$page*$lines;
$p=$p;
if (empty($_GET ['page'])){
$page=0;
} 		
$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `clientname` ='".$userdata['clientname']."'  order by datein desc limit $begin,$lines
") or die (mysql_error());

	
while ($row = mysql_fetch_array ($result)){
$orderstatus=$row['orderstatus'];
$dateout=$row['dateout'];
$statusdate=$row['statusdate'];
echo "<div class='row'><div class='field' style='width:40px; height:auto'>".$row['clientname']."</div>
<div class='field' style='width:40px; height:auto'>".$row['orderid']."</div>
<div class='field' style='width:60px; height:auto'>".$row['datein']."</div>";
$actual = date("Y-m-d");
if ($dateout<=$actual) {
echo "<div class='field' style='width:60px; height:auto; color:red;'>не актуально<br>".$row['dateout']."</div>";
} else {
echo "<div class='field' style='width:60px; height:auto'>".$row['dateout']."</div>";
}
echo "<div class='field_order'>";


$query = mysql_query("select * 
from orderlist 
where ol_orderid='".$row['orderid']."' 
order by ol_city") 
or die (mysql_error());

$num = mysql_num_rows($query);
for ($n=0; $n<$num; $n++) {		
$ol=mysql_fetch_array ($query);

echo "".($n+1).". <b><span style='text-transform:uppercase'>".$ol['ol_city']."</span></b>:".$ol['ol_name'].":".$ol['ol_address'].":".$ol['ol_num']."<br>
<b>".$ol['ol_dateout']."</b> - вес ".$ol['ol_ves']." кг, объем ".$ol['ol_pallet']." паллет, 
коробок ".$ol['ol_box']." шт., сумма ".$ol['ol_summa']." руб.<br>
ТТН № ".$ol['ol_invoice']." от ".$ol['ol_invoicedate']."<br>";

}


echo "</div>";
if (($dateout<=$actual) and ($orderstatus=="30")) {


echo "<div class='field' style='width:120px; height:auto; color:green'>принят, в архиве<br> ".$row['statusdate']."</div>";



} 
if (($dateout<=$actual) and ($orderstatus!=="30")) {

echo "<div class='field' style='width:120px; height:auto; color:red;'>не актуально<br>".$row['dateout']."</div>";




} 
if ($dateout>$actual) {
if (empty($orderstatus)) {
echo "<div class='field' style='width:120px; height:auto'>
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
<input type='submit' name='sendmoder' value='Отправить'>
<br>Если всё готово, отправьте заказ на премодерацию. <u>Доступен для операторов только после отправки!</u>
</form></div>";
} 
if ($orderstatus=="5") {
echo "<div class='field' style='width:120px; height:auto; color:red;'>
Заказ №".$row['orderid']." на ".$row['dateout']." Отклонен модератором. 
";
}
if ($orderstatus=="10") {
echo "<div class='field' style='width:120px; height:auto; color:blue;'>
Заказ №".$row['orderid']." на ".$row['dateout']." отправлен на премодерацию. 
Доступен для скачивания <a href='./csv/".$row['ordercsv']."'>".$row['ordercsv']."</a></div>";
}
if ($orderstatus=="15") {
echo "<div class='field' style='width:120px; height:auto; color:blue;'>
Заказ №".$row['orderid']." на ".$row['dateout']." был изменен $statusdate. 
Доступен для скачивания <a href='./csv/".$row['ordercsv']."'>".$row['ordercsv']."</a></div>";
}
if ($orderstatus=="20") {
echo "<div class='field' style='width:120px; height:auto; color:green;'>
В процессе премодерации с ".$row['statusdata']."
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
Вы можете внести изменения (кнопка редактирования) и отправить повторно
</form></div>";
}
if ($orderstatus=="30") {
echo "<div class='field' style='width:120px; height:auto; color:red;'>
Заказ принят к исполенению ".$row['statusdata']."</div>";
}
}
if (empty($orderstatus)) {
echo "<div class='field' style='width:80px; height:auto'></div>";
} else {

echo "
<div class='field' style='width:80px; height:auto'><form action='./order_for_print.php' target=_blank method='post'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input type='submit' name='' value='Печать' alt='Печать' /></form></div>";
}


if (empty($orderstatus) or ($orderstatus=="5") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "
<div class='field' style='width:40px; height:auto'><form action='' method='post'>
<input type='submit' class='senddel' name='del' value='".$row['orderid']."' alt='Удалить' />
</form></div>";
} else {
echo "<div class='field' style='width:40px; height:auto'></div>";
}
if (($orderstatus=="5") or ($orderstatus=="15") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder22.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>

<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='Редактировать' /></form></div>";
} else {
if (empty($orderstatus)) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder2.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>

<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='Редактировать' /></form></div>";
} else {
echo "<div class='field' style='width:40px; height:auto'></div>";
}
}
echo "


</div>";

}


$query="select COUNT(*) as count from `orderid` WHERE `clientname` ='".$userdata['clientname']."'";
$result=mysql_query ($query);
$items=mysql_fetch_array ($result);
$count=$items["count"];
$pages=($count/$lines);

if ($pages>1) {
echo "<br><p style='font-family: Verdana; font-size: 10pt'><font color=#E77616><b>страницы</b></font>";

for ($p=0;$p<$pages;$p++) {
echo "<font color=#E77616> | </font><a style=\"color: #E77616; text-decoration: none\" href='./index.php?page=".$p."' onmouseover=\"this.style.color='#521D1E' \" 
 onmouseout=\"this.style.color='#E77616'\" onmousedown=\"this.style.color='#521D1E' \" align=center>
";

 if ($page == "$p") { 
echo "<input type='hidden' value='".($p+1)."'><font color=black><b>".($p+1)."</b></font>"; 

} else {
 
echo "<input type='hidden' value='".($p+1)."'><font color='#E77616'><b>".($p+1)."</b></font>";
} 

echo "</a>";

}
}


echo "</div>";







		
    }
# Поиск заказа
	

if ($_POST['path']== "Поиск заказов") {
if (isset($_POST['date1'])) {$date1 = $_POST['date1'];}
if (isset($_POST['date2'])) {$date2 = $_POST['date2'];}

echo "<div class='client'>ВАШИ ЗАКАЗЫ,<br>сформированные за период<br></i>$date1 - $date2</i></div>";

include('./inc/ordersearchresult.php');
}
# Страница заказа
if ($_POST['path']== "Сделать заказ") {

echo "<div class='client'>ШАГ 1. Дата отгузки на склад ЛК</div><div class='right'><i>Пожалуйста, правильно указывайте дату желаемой отгрузки</i><p>";

$datetime_today = date("d-m-Y H:i:s");
$datesimple_today = date("Y-m-d");
$today = date("d-m-Y");
echo "<script src='./js/calend.js' type='text/javascript'></script>
<form method='post' action='' style='font-size:14px; color:#666'>
            <i>Дата <input style='font-size:12px' disabled='disabled' name='date' type='text' size='30' value='".$datetime_today."'><br>
			<span style='color:red'>Дата отгрузки на склад ЛК </span><input type='text' name='date1' value='".$today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\"><br>
			<input name='orderdate' type='hidden' value='".$datetime_today."'>
			<input name='orderdatesimple' type='hidden' value='".$datesimple_today."'>
			Клиент <input style='font-size:12px' name='orderclient' type='text' value='".$userdata['clientname']."' size='40'><br>
			Тип перевозки <input style='font-size:12px' name='ordertype' type='text' value='Продукты питания' size='35'><br>
			t режим <input style='font-size:12px' name='orderterm' type='text' value='+2С-+6С'><br>
			
			Склад (наименование) <input style='font-size:12px' name='orderstore' type='text' value='Айсберг-Амурская'  size='30'><br>
			<p><input type='submit' name = 'path' value='Выбор получателей груза'/>";
	}
if	($_POST['path']== "Выбор получателей груза") {
$today1 = date("d-m");
$today2 = date("Y");
$date1 = $_POST['date1'];
$date11=  date('d-m', strtotime($date1));
$date12=  date('Y', strtotime($date1));
 if (strtotime(date("d.m.Y"))>=strtotime($date1)&&($today2>=$date12)) {
 echo "Дата выбрана неверно, проверьте данные!";
 } else {
$orderterm = $_POST['orderterm'];
$orderstore = $_POST['orderstore'];
$ordertype = $_POST['ordertype'];
$orderdate = $_POST['orderdate'];
$orderdatesimple = $_POST['orderdatesimple'];	
$orderclient = $_POST['orderclient'];
$date2 = date('Y-m-d', strtotime($date1));
$date222 = date('d-m-Y', strtotime($date1));
$orderdate2 = date('Y-m-d H:i:s', strtotime($orderdate));

$query = "select * from orderid where dateout='$date2' and clientid='".$userdata['clientid']."'";

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
dateout='".$date2."',
orderstore='".$orderstore."',
clientid='".$userdata['clientid']."'") or die ("Ошибка подключения к базе");

$query = "select * from orderid where datein='$orderdate2' and dateout='$date2' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}			
			echo "<div class='client'>ШАГ 2. Выбор получателей груза</div>
			<div class='right'><b>Создан заказ №$orderid.</b> <br><i>Пожалуйста, заполните правильно поля объема и веса груза</i><br>
			
";
		} else {



$query = "select * from orderid where datein='$orderdate2' and dateout='$date2' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}			
			echo "<div class='client'>ШАГ 2. Выбор получателей груза</div>
			<div class='right'><b>Ваш заказ</b> (на дату отправки $date2) <b>№$orderid.</b> 
			<br><i>Вы можете внести соответствующие изменения и дополнения</i><br>
";



$query = mysql_query("select * from oredrlist where ol_clientid='".$userdata['clientid']."' and ol_orderid='$orderid' and ol_dateout='$date2'");

$num = mysql_num_rows($query);
for ($n=0; $n<$num; $n++) {		
$ol=mysql_fetch_array ($query);
	

	
	

	echo "
<form method='post' action='' style='font-size:14px; color:#666'>
".($n+1).". ".$ol['ol_city'].":".$ol['ol_name'].":".$ol['ol_address'].":".$ol['ol_num']."
<input type='submit' name = 'path' value='Удалить'/></form>
";

		
}			
}			
			echo "<p><i>Дата передачи груза на склад $orderstore - <b>$date222</b><br>
</i><u>Пункты назначения <i>согласно Календарному плану</i></u><p>";

	 $query = "select * from calendar where calenddate='$date2'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$calendid=$row["calendid"];
$calendcity=unserialize($row["calendcity"]);
$calendsort=sort($calendcity);


for ($i=0; $i<count($calendcity); $i++) {

$calendaddress=explode(';', $calendcity[$i]);

$calendrec=htmlspecialchars($calendaddress[0]);

		
			


$query = "select * from clients where clientname='$orderclient'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$clientid=$row["clientid"];
$clientrec=unserialize($row["clientrec"]);
$clientrecsort=sort($clientrec);


for ($z=0,$y=1,$c=2; $z<count($clientrec); $z++,$y++,$c++) {
$clientaddress=explode(':', $clientrec[$z]);
$clientrec=$clientrec;
$address=$clientaddress;
$clientrecc=$clientaddress[0];
$clientad[0]=htmlspecialchars($clientaddress[0]);
$clientad[1]=htmlspecialchars($clientaddress[1]);
$clientad[2]=htmlspecialchars($clientaddress[2]);
$clientad[3]=htmlspecialchars($clientaddress[3]);

 if ($clientrecc==("$calendrec")){
 if (empty($clientrecc)){
 echo "Проверьте условия вашего договора или возможности перевозчика согласно Каледарного плана";
 } else {

echo "<div id='recipients'><form method='post' action='' style='font-size:14px; color:#666'><b>$clientrec[$z]</b></div> 
<input name='ordertype' type='hidden' value='Продукты питания'>
			<input name='orderterm' type='hidden' value='+2С-+6С'>
			<input name='orderstore' type='hidden' value='Айсберг-Амурская'>
<input name='orderdate2' type='hidden' value='$orderdate2'>
<input name='date2' type='hidden' value='$date2'>
<input name='orderclient' type='hidden' value='$orderclient'>
<input type='hidden' name='reccity' value='$clientad[0]'>
<input type='hidden' name='recname' value='$clientad[1]'>
<input type='hidden' name='recaddress' value='$clientad[2]'>
<input type='hidden' name='recnum' value='$clientad[3]'>
<input type='hidden' name='orderid' value='$orderid'>

<input style='font-size:12px' name='pallet' type='text' size='10'> паллет, 
вес <input style='font-size:12px' name='ves' type='text' size='10'> кг, 
коробок <input style='font-size:12px' name='box' type='text' size='10'> шт., 
сумма <input style='font-size:12px' name='summa' type='text' size='10'> руб.<br> 

накладная № <input style='font-size:12px' name='invoice' type='text' size='10'> 
дата <input style='font-size:12px' name='invoicedate' type='text' size='10'> 
<input type='submit' name = 'path' value='Отправить'/></form>
<hr align='left' style='color: #999; size: 1px; width:320px'>
";
} 
}
}
}
}
} 
	
			echo "<p>
            
        ";
		
echo "</div>";
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