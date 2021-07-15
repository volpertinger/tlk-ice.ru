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
// Страница календаря из шаблонов


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



# Кнопка выхода

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
            
        </form></div><div class='client'>ЗАПОЛНЕНИЕ КП НА ОСНОВЕ ШАБЛОНОВ</div><div class='right'>";


// Создание записей в календаре


if (isset($_POST['submit'])) {

$date1 = $_POST['date1'];
if (empty($date1)) {
echo "<p><span style='font-size:16px; color:red'>Введите дату!</span><br><hr>";
}else{

$date1 = $_POST['date1'];
$date2 = date('Y-m-d', strtotime($date1));
$city = $_POST['city'];
$recbase=($city);
      $printrec=unserialize($city);
 // прием созданного формой готового массива №2
		  
$result = mysql_query("SELECT * FROM calendar where calenddate='$date2'")or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$calenddate=$row['calenddate'];
}

if (isset($calenddate)){
 echo "<p><span style='font-size:16px; color:red'>Ошибка ввода даты! Списки на <b>$calenddate</b> сформированы, введите другую дату</span><br><hr>";
}else{

 $query="INSERT INTO calendar SET 
		calendcity='".$recbase."', 
		calenddate='".$date2."'
		";

		$result=mysql_query ($query);

if ($result)
{
print "<b><span style='font-size:16px'>Сознана запись на дату <b>$date1</b></span></b><br><hr>";
}
else 
{
echo "<p><b><span style='font-size:16px'>Ошибка звписи на дату <b>$date1</b>!</span></b><br><hr>";
}
}
}
}


$client = $_POST['client'];





 



$result = mysql_query("SELECT * FROM calendar order by calenddate desc limit 1")or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$calenddate=$row['calenddate'];
}
$date_today = date("d-m-Y");
if (empty($calenddate)){

echo "База не содержит записей<p>";





} else {
echo "Последняя запись КП датирована - <b>$calenddate</b>";

$n = 1;
$nextdate = date('d-m-Y', strtotime($calenddate.'+'.$n.' day'));




}



echo "<div id='calendnote'>";

echo "<script type='text/javascript' src='../js/jquery-1.3.2.js'></script>
<script src='../js/chekbox.js' type='text/javascript'>
</script><script src='../js/calend.js' type='text/javascript'></script>
<form method='post' action='' id='example_group1'>

<p><b>Назначить дату:</b> <input type='text' name='date1' value='".$date_today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\"><p>
	<b>Выбрать шаблон:</b></br>
	
";
$result = mysql_query("SELECT * FROM stamp") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$stampname = $row['stampname'];
$stampcity = $row['stampcity'];





print "<label><input type='radio' name='city' value='$stampcity'> $stampname<br></label>";



}

echo "<p><input name='submit' type='submit' value='Добавить запись' style='font-size:18px'></form></div>";

echo "</div>";






echo "</div></div>";
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