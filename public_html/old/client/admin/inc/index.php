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
    $query = mysql_query("SELECT *,INET_NTOA(clientip) FROM clients WHERE clientid = '".intval($_COOKIE['id'])."' and clientrank='777' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);


   if(($userdata['clienthash'] !== $_COOKIE['hash']) or ($userdata['clientid'] !== $_COOKIE['id'])
   )


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
	
	# Кнопка регистрации пользователя

$day = date("w");
$time = date("H:i:s");
if (($day<8)&&($day>0)) {
echo "<div class='order'><form method='post' action='./register.php'>
            <input type='submit' name = 'path' value='Регистрировать нового пользователя'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>Регистрировать нового пользователя</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>добро пожаловать!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='Выход'/>
            
        </form></div>";
		
		# Левое меню
		
		include('./inc/menu_left.php');
		
		
		
		
# Принять на премодерацию
if (isset($_POST['premod']) or isset($_POST['endpremod'])){

 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
 $client = $_POST['client'];
 $clientname = $_POST['clientname'];
 $num = $_POST['num'];
$sendmoder = $_POST['sendmoder'];
$status = $_POST['status'];
$orderid = $_POST['orderid'];
$clientid = $_POST['clientid'];
$dateout= $_POST['dateout'];

 

 $statusdate = date("Y-m-d H:i:s");
mysql_query("UPDATE orderid SET 
orderstatus='".$status."',
statusdate='".$statusdate."'
where orderid='".$orderid."'") 
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
$headers .= "Cc: $clientmail" . "\r\n";
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "PREMODERATION. Zakaz - ".$od['orderid']." от: ".$cl['clientname']." $clientmail";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";




$message = "$date
\n1. ".$od['orderid']." от: ".$cl['clientname']." $clientmail
\n2. Заказ принят на премодерацию $statusdate";

$send = mail ($to, $subject, $message, $headers);

include('../inc/table_top.php');
include('../inc/mods.php');

}
# Удаление заказа
if(isset($_POST['del'])){ 
{$del = $_POST['del'];
$clientid = $_POST['clientid'];
$orderid = $_POST['orderid'];
}

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$del'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$clientid=$row['clientid'];
}
if ($result)
{
echo "<b><form action='' method='post'><span style='font-size:16px'>Подтвердите удаление заказа #$orderid от $orderdate</span></b>

<input type='submit' class='senddel' name='deltrue' value='$orderid' alt='Удалить' /><br><hr></form>";

} else {
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr>";
}
}
if(isset($_POST['deltrue'])){ 
{$deltrue = $_POST['deltrue'];

$comment = $_POST['comment'];
}


$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$deltrue'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$ordercsv=$row['ordercsv'];
$clientid=$row['clientid'];
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
echo "<b><span style='font-size:16px'>Заказ <i>$orderclient</i> $orderid от $orderdate удален</span></b><br><hr width='500' align='left'>";
} else {
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr width='500' align='left'>";
}


}
	


# Отклонение заказа
if(isset($_POST['deny'])){ 
{$deny = $_POST['deny'];
$clientid = $_POST['clientid'];
$orderid = $_POST['orderid'];
}

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$orderid'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$clientid=$row['clientid'];
}
if ($result)
{
echo "<b><form action='' method='post'><span style='font-size:16px'>Подтвердите отклонение заказа от $orderdate</span></b>
Комментарий<br><textarea name='comment' cols='50' rows='5'></textarea>
<input type='submit' class='senddel' name='deltrue' value='$orderid' alt='Отклонить' /><br><hr></form>";

} else {
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr>";
}
}
if(isset($_POST['denytrue'])){ 
{$denytrue = $_POST['denytrue'];

$comment = $_POST['comment'];}
$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$denytrue'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$clientid=$row['clientid'];
$orderclient=$row['clientname'];
}


$resu = mysql_query("SELECT* FROM `clients` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$cl=mysql_fetch_array ($resu);
$clientmail=$cl['clientmail'];
$resul = mysql_query("SELECT* FROM `orderid` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$od=mysql_fetch_array ($resul);

$statusdate = date("Y-m-d H:i:s");
mysql_query("UPDATE orderid SET 
orderstatus='5',
statusdate='".$statusdate."'
where orderid='".$orderid."'") 
or die ("Ошибка подключения к базе");

$to = "admin@pollard.ru, $clientmail"; 
$headers .= "From: $clientmail" . "\r\n";
$headers .= "Cc: $clientmail" . "\r\n";
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "OTMEHA. Zakaz - ".$od['orderid']." ".$cl['dateout']." от: ".$cl['clientname']." $clientmail";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";
$message = "$date
\n1. ".$od['orderid']." от: ".$cl['clientname']." ".$cl['dateout']." $clientmail
\n2. Заказ ".$od['orderid']." ".$cl['dateout']." отклонен модератором
\n2. По причине: $comment";

$send = mail ($to, $subject, $message, $headers);
if ($send == 'true') {
echo "<b><span style='font-size:16px'>Заказ <i>$orderclient</i> $orderid от $orderdate отклонен. Уведомление отправлено на адрес $clientmail</span></b><br><hr width='500' align='left'>";

} else {
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr width='500' align='left'>";
}
}		
		
		
		
		# Главная
		if (empty($_POST['path'])){
		echo "<div class='client'>ПАНЕЛЬ АДМИНИСТРИРОВАНИЯ</div>";	
		include('./inc/search.php');
    }
# Поиск заказа
include('./inc/makecsv.php');	

if ($_POST['path']== "Поиск клиента") {
$page = $_POST['page'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$clientname = $_POST['clientname'];
$client = $_POST['client'];
$num = $_POST['num'];

if (empty($_POST['client'])&&empty($_POST['clientname'])&&empty($_POST['num'])&&isset($_POST['date1'])) {

echo "<div class='client'>ЗАКАЗЫ ЗА ПЕРИОД
 <br><span style='font-size:16px;'>от $date1 - $date2</span>
 <form action='' method='post'>

 <input type='hidden' name='date1' value='$date1'>
 <input type='hidden' name='date2' value='$date2'>
 <input type='submit' name='path' value='Сводный отчет' />
 </div>";
  } else {
  if (empty($_POST['client'])&&isset($_POST['clientname'])&&empty($_POST['num'])&&isset($_POST['date1'])) {

echo "<div class='client'>ЗАКАЗЫ $clientname <br><span style='font-size:16px;'>от $date1 - $date2</span>
 <form action='' method='post'>
 <input type='hidden' name='client' value='$clientname'>
 <input type='hidden' name='date1' value='$date1'>
 <input type='hidden' name='date2' value='$date2'>
 <input type='submit' name='path' value='Сводный отчет клиента' />
 </div>";
  } else {


if (isset($_POST['client'])&&empty($_POST['clientname'])&&empty($_POST['num'])&&isset($_POST['date1'])) {


echo "<div class='client'><form action='' method='post'>ЗАКАЗЫ $client
 <input type='hidden' name='client' value='$client'>
 
 <input type='submit' name='path' value='Полный отчет клиента' /></div>";
}  else {
if (empty($_POST['client'])&&empty($_POST['clientname'])&&isset($_POST['num'])&&isset($_POST['date1'])) {

echo "<div class='client'>ЗАКАЗ
 <br>#$num</div>";
 }  
}}}

$page = $_POST['page'];
$lines=10;
$begin=$page*$lines;
$p=$p;
if (empty($_GET ['page'])){
$page=0;
} 	
include('./inc/ordersearchresult.php');






}

# Страница заказа









# Закрываем основное поле
echo "</div>";



} } 
else

{

    print "Включите куки";
header("Location: login.php"); exit();
}


?>