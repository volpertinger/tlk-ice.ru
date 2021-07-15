<?

# Подтверждение











if ($_POST['path']== "1"&&empty($_POST['del'])) {

$ok = $_POST['path'];

if(isset($_POST['orderid'])) {$orderid = $_POST['orderid'];}

if(isset($_POST['orderclient'])) {$orderclient = $_POST['orderclient'];}


if (empty($_POST['number'])) {
echo "<div class='right'><form method='POST' action=''>Введите номер заказа <input name='number' type='text' style='font-size:14px'>
<input type='hidden' name='orderid' value='$orderid'><input type='hidden' name='orderclient' value='$orderclient'><input type='hidden' name='path' value='1'><p>
<input name='send' type='submit' value='Присвоить номер заказу' style='font-size:20px'></form></div>";
}else{

if(isset($_POST['number'])) 
{$number = $_POST['number'];}

$query = mysql_query("SELECT* 
FROM orders where ordernum='$number'") or die (mysql_error());
$num = mysql_fetch_assoc($query);
$ordernum=$num['ordernum'];
if (isset($ordernum)) {
echo "<div class='right'><form method='POST' action=''>$ordernum присутствует в заказах, <br>введите уникальный номер заказа <input name='number' type='text' style='font-size:14px'>
<input type='hidden' name='orderid' value='$orderid'><input type='hidden' name='orderclient' value='$orderclient'><input type='hidden' name='path' value='1'><p>
<input name='send' type='submit' value='Присвоить номер заказу' style='font-size:20px'></form></div>";
} else {

 $query="UPDATE orders SET 
		ordernum='".$number."',
		orderstatus='".$ok."',
		orderacceptdate='".date("Y-m-d (H:i:s)",time())."'
		where orderid='".$orderid."'";

		 $result=mysql_query ($query);

if ($result)
{



$query = mysql_query("SELECT* 
FROM clients where clientname='$orderclient'") or die (mysql_error());
		
$client = mysql_fetch_assoc($query);
$mail=$client['clientmail'];

$query = mysql_query("SELECT* 
FROM orders where orderid='$orderid'") or die (mysql_error());
		
$order = mysql_fetch_assoc($query);



$to  = "$mail"; 
$cc = "admin@polard.ru";


$headers = "Content-type: text/plain; charset = windows-1251";
$headers .= "From: admin@polard.ru" . "\r\n";
$headers .= "Cc: admin@polard.ru" . "\r\n";
$sub = "ACTIVATION #".$order['ordernum'].". For ".$order['orderclient']." date ".$order['orderdate']."";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";
$message = "$date
\n1. Информация об активации заказа для клиента: ".$order['orderclient']." от ".$order['orderdate']."
\n2. Ваш заказ принят к исполнению: ".$order['ordertransdate']."
\n3. Заказу присвоен номер: ".$order['ordernum']."
\n4. Адрес панели управления заказами: http://tlk-ice.ru/clients/
";

$send = mail ($to, $subject, $message, $headers);
		
		
       

		if ($send == 'true')
{
print "<div class='right'><b><span style='font-size:16px'>Уведомление отправлено $to, копия $cc<br>Заказу присвоен номер ".$order['ordernum']."</span></b><br><hr>";
}
else 
{
echo "<div class='right'><p><b><span style='font-size:16px'>Ошибка. Сообщение $mail не отправлено!</span></b><br><hr></div>";
}
		
		

    }

    else {

    

        print "<div class='right'><b><span style='font-size:16px'>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."</span></b><br><hr></div>";

        }

    

}
}
}		
}






# Удаление заказа
if(empty($_POST['path'])&&isset($_POST['del'])){ 
{$del = $_POST['del'];}

$result = mysql_query("SELECT* 
FROM `orders` 
WHERE `orderid` ='$del'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['orderdate'];
$orderclient=$row['orderclient'];
$orderid=$row['orderid'];
}
if ($result)
{
echo "<div class='right'><b><form action='' method='post'><span style='font-size:16px'>Подтвердите удаление заказа $orderclient от $orderdate</span></b>
<input type='submit' class='senddel' name='deltrue' value='$orderid' alt='Удалить' /><br><hr></form></div>";

} else {
echo "<div class='right'><b><span style='font-size:16px'>Ошибка!</span></b><br><hr></div>";
}
}
if(isset($_POST['deltrue'])){ 
{$deltrue = $_POST['deltrue'];}
$result = mysql_query("SELECT* 
FROM `orders` 
WHERE `orderid` ='$deltrue'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['orderdate'];
$orderid=$row['orderid'];
$orderclient=$row['orderclient'];
}
$query="delete from orders where orderid='$orderid'
		";

		 $result=mysql_query ($query);

if ($result)
{
echo "<div class='right'><b><span style='font-size:16px'><i>$orderclient</i> заказ от $orderdate удален</span></b><br><hr></div>";

} else {
echo "<div class='right'><b><span style='font-size:16px'>Ошибка!</span></b><br><hr></div>";
}
}	
