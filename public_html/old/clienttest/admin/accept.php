<?header( 'Content-Type: text/html; charset=windows-1251' );?>
<?php
include('./inc/head.php')
?>
<?php
include('./inc/connect.php')
?>
<?php
include('./inc/menu_left.php')
?>
<?
// Страница регситрации нового пользователя


# Соединямся с БД





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


# Кнопка заказа

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
		
		
		
		
		
	if(isset($_POST['ok'])){

$ok = $_POST['ok'];
if(isset($_POST['orderid'])) {$orderid = $_POST['orderid'];}
if(isset($_POST['number'])) {$number = $_POST['number'];}
if(isset($_POST['orderclient'])) {$orderclient = $_POST['orderclient'];}



 $query="UPDATE orders SET 
		ordernum='".$number."',
		orderstatus='".$ok."'
		where orderid='".$orderid."'";

		 $result=mysql_query ($query);

if ($result)
{
$query = "select * from orders where orderid='$orderid'";
$result=mysql_query ($query);
$row=mysql_fetch_array ($result);


$to = "artem@neskorodov.ru"; /*УКАЗАТЬ СВОЙ АДРЕС!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "ACTIVATION. Client - $orderclient";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";
$message = "$date
\n1. Информация об активации заказа для клиента: $orderclient от $orderdate
\n2. Ваш заказ принят к исполнению на дату: $ordertransdate
\n3. Заказу присвоен номер: $number
\n4. Адрес панели управления заказами: http://tlk-ice.ru/clients/
";

$send = mail ($to, $subject, $message, $headers);
		
		
       

		if ($send == 'true')
{
print "<b><span style='font-size:16px'>Уведомление отправлено на ".$row['clientmail']."</span></b><br><hr>";
}
else 
{
echo "<p><b><span style='font-size:16px'>Ошибка. Сообщение не отправлено!</span></b><br><hr>";
}
		
		

    }

    else {

    

        print "<b><span style='font-size:16px'>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."</span></b><br><hr>";

        }

    

}
}
}		
}



else

{

    print "Включите куки";
header("Location: login.php"); exit();
}

?>



<?php
include('./inc/end.php')
?>