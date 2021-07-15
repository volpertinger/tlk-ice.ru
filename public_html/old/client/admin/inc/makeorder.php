<?if ($_POST['path']== "Отправить"):{

if (isset($_POST['orderdate'])) {$orderdate = $_POST['orderdate'];}
if (isset($_POST['orderclient'])) {$orderclient = $_POST['orderclient'];}
if (isset($_POST['ordertype'])) {$ordertype = $_POST['ordertype'];}

if (isset($_POST['orderterm'])) {$orderterm = $_POST['orderterm'];}
if (isset($_POST['ordertransdate'])) {$ordertransdate = $_POST['ordertransdate'];}
if (isset($_POST['orderstore'])) {$orderstore = $_POST['orderstore'];}
if (isset($_POST['ordercomment'])) {$ordercomment = $_POST['ordercomment'];}
if (isset($_POST['orderrec'])) {$orderrec = $_POST['orderrec'];}


$to = "artem@neskorodov.ru"; /*УКАЗАТЬ СВОЙ АДРЕС!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "Заказ. $orderclient";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";
$message = "$date
\n1. От: $orderclient
\n2. На дату: $ordertransdate
\n3. На дату: $ordercomment
";

$send = mail ($to, $subject, $message, $headers);

mysql_query("INSERT INTO orders SET 
orderdate='".$orderdate."', 
orderclient='".$orderclient."',
ordertypee='".$ordertype."',
orderterm='".$orderterm."',
ordertransdate='".$ordertransdate."',
orderstore='".$orderstore."',
orderrec='".$orderrec."',
ordercomment='".$ordercomment."'") or die ("Ошибка подключения к базе");


if ($send == 'true')
{
echo "$orderclient, cпасибо за отправку Вашего сообщения!<br>В ближайшее время мы отреагируем на Вашу заявку и вышлем 
информацию по тарифам на Ваш груз и условиям транспортировки<p>";

}
else 
{
echo "<p><b>Ошибка. Сообщение не отправлено!";
}
}

else:

$datetime_today = date("Y-m-d H:i:s");
$today = date("Y-m-d");
echo "
<form method='post' action='./?path=Отправить' style='font-size:18px'>
            Дата заказа <input name='orderdate' type='text' value='".$datetime_today."'><br>
			Клиент <input name='orderclient' type='text' value='".$userdata['clientname']."'><br>
			Тип перевозки <input name='ordertype' type='text' value='Продукты питания'><br>
			t режим <input name='orderterm' type='text' value='+2С-+6С'><br>
			Дата передачи груза <input name='ordertransdate' type='text' value='".$today."'><br>
			Склад (наименование) <input name='orderstore' type='text' value=''><br>
			Комментарий к заказу <br><textarea cols='40' rows='5' name='ordercomment'></textarea><br>
			Пункты назначения <br><textarea cols='40' rows='5' name='orderrec'></textarea>
			
			
			
			<input type='submit' name = 'path' value='Отправить'/>
            
        </form>";
		
	endif	
		
		?>