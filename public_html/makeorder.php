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

$day = date("w");
$time = date("H:i:s");
if (($day<6)&&($day>0)) {
echo "<div class='order'><form method='post' action='./index.php?path=Сделать заказ'>
            <input type='submit' name = 'path' value='Сделать заказ'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>Сделать заказ</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>добро пожаловать!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='Выход'/>
            
        </form></div>";
		
		# Левое меню
		
		include('./inc/menu_left.php');
if (isset($_COOKIE['FormSubmitted'])
{
die('Вы может отправить форму только один раз за сессию!');
} else {

if ($_POST['path']== "Отправить"){



if (isset($_POST['orderdate'])) {$orderdate = $_POST['orderdate'];}
if (isset($_POST['date1'])) {$date1 = $_POST['date1'];}
if (isset($_POST['orderclient'])) {$orderclient = $_POST['orderclient'];}
if (isset($_POST['ordertype'])) {$ordertype = $_POST['ordertype'];}
if (isset($_POST['orderterm'])) {$orderterm = $_POST['orderterm'];}
if (isset($_POST['ordertransdate'])) {$ordertransdate = $_POST['ordertransdate'];}
if (isset($_POST['orderstore'])) {$orderstore = $_POST['orderstore'];}
if (isset($_POST['ordercomment'])) {$ordercomment = $_POST['ordercomment'];}
if (isset($_POST['orderrec'])) {$orderrec = $_POST['orderrec'];}
if (isset($_POST['rec']))
     { 
	 

	 $rec = $_POST['rec'];
     	 // прием созданного формой готового массива №2
	 $pal = $_POST['pal'];
	 	
	 $kg = $_POST['kg'];
	 
	 $arra=($rec);
	 $arr=serialize($arra);
	 $cutter = (":");
	 $printrec=unserialize($arr);
	 $ordernum=count($rec);
	 $orderfilter=array_filter($printrec);
echo "<div class='right'>ЗАКАЗ от: $orderclient<br>
Дата составления заказа: $orderdate<br>
Дата передачи груза на склад: $date1<br>
Комментарий: $ordercomment<br>
Пункты назначения: ";


for ($i=0,$a=1,$x=2; $i<$ordernum+1; $i++,$a++,$x++) {

$one=($i+$a+$x-3);
$pal=($i+$a+$x-2);
$kg=($i+$a+$x-1);

if (empty($orderfilter[$one])) {
}else {

echo "$orderfilter[$one] ";
}
if (empty($orderfilter[$pal])) {
echo "";
}else {
echo "- $orderfilter[$pal] паллет "; 
}
if (empty($orderfilter[$kg])) {
echo "<br>";
}else {
echo "- $orderfilter[$kg] кг<br>";


}
}

	 
	 
	 
	
	 
	 
	 
	 }

$to = "artem@neskorodov.ru"; /*УКАЗАТЬ СВОЙ АДРЕС!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "ZAKAZ. Client - $orderclient";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";




$message = "$date
\n1. ЗАКАЗ от: $orderclient
\n2. Дата составления заказа: $orderdate
\n3. Комментарий: $ordercomment
\n4. Дата передачи груза на склад: $date1
";

$send = mail ($to, $subject, $message, $headers);
setcookie("FormSubmitted", "1");
mysql_query("INSERT INTO orders SET 
orderdate='".$orderdate."', 
orderclient='".$orderclient."',
ordertype='".$ordertype."',
orderterm='".$orderterm."',
ordertransdate='".$date1."',
orderstore='".$orderstore."',
orderrec='".$arr."',
ordercomment='".$ordercomment."'") or die ("Ошибка подключения к базе");


if ($send == 'true')
{

echo "<br>$orderclient, cпасибо за отправку Вашего заказа!<br>В ближайшее время мы отреагируем на Вашу заявку и вышлем 
информацию по тарифам на Ваш груз и условиям транспортировки<p>";

}
else 
{
echo "<p><b>Ошибка. Сообщение не отправлено!";
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