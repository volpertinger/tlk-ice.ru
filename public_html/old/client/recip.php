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
// Страница календаря


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



// Тело программы после авторизации
	
	# Кнопка заказа

include('./inc/orderbutton.php');
		
		# Левое меню
		
		$result = mysql_query("SELECT * FROM clients where clientname='".$userdata['clientname']."'") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$clientagree=$row["clientagree"];
            
        echo "<div class='client'>ПУНКТЫ ДОСТАВКИ. Договор №$clientagree</div><div class='right'>";
}






if	($_POST['path']== "Просмотр даты") {
if (isset($_POST['date1'])) {$date1 = $_POST['date1'];}

$date2 = date('Y-m-d', strtotime($date1));
echo "<p style='color:red'><b>Пункты назначения согласно <i>Календарному плану на $date1</i><br>и <i>Договору №$clientagree</i></b></p>";
echo "<div style='width:600px'><hr></div>";
	 $query = "select * from calendar where calenddate='$date2'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$calendid=$row["calendid"];
$calendcity=unserialize($row["calendcity"]);
$calendsort=sort($calendcity);


for ($i=0,$a=1; $i<count($calendcity); $i++,$a++) {

$calendaddress=explode(';', $calendcity[$i]);

$calendrec=$calendaddress[0];

		
			


$query = "select * from clients where clientname='".$userdata['clientname']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$clientid=$row["clientid"];
$clientrec=unserialize($row["clientrec"]);
$clientrecsort=sort($clientrec);


for ($z=0,$y=1,$c=2; $z<count($clientrec); $z++,$y++,$c++) {
$clientaddress=explode(':', $clientrec[$z]);
$clientrec=$clientrec;
$clientrecc=$clientaddress[0];

 if ($clientrecc==("$calendrec")){
echo "<div style='width:600px'><b>$clientrec[$z]</b><hr></div>

";
} 
}
}
}
} 
}
		












// Просмотр пкнктов доставки
$date_now = date("d-m-Y");
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

echo "";
echo "<div style='color:#666; background-color: #ECF7FC;padding:10px; width:600px'><b><i>Просмотр календарного плана на требуемую дату отправки</i></b><p>
<span style='font-size:16px; color:#666'>Сегодня: <b>$day $month_name $y,</b> $name_day</span></b>
			<script src='./js/calend.js' type='text/javascript'></script>
<form method='post' action='' style='font-size:14px; color:#666'>
<br><input style='font-size:12px' name='date1' type='text' size='30' value='$date_now' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\">
<p><input type='submit' name = 'path' value='Просмотр даты'/>
            
        </form></div>";


		
		
		
		
echo "<p><div style='width:600px; font-size:16px; color:#666;'>Полный список получателей по Договору №$clientagree<hr></div>";
$result = mysql_query("SELECT * FROM clients where clientname='".$userdata['clientname']."'") or die (mysql_error());

while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$clientid=$row["clientid"];
$clientrec=unserialize($row["clientrec"]);
$clientrecsort=sort($clientrec);


for ($z=0,$y=1,$c=2; $z<count($clientrec); $z++,$y++,$c++) {
$clientaddress=explode(':', $clientrec[$z]);
$clientrec=$clientrec;
$clientrecc=$clientaddress[0];


echo "<div style='width:600px; font-size:16px; color:#666;'>$y. <b>$clientaddress[0]</b> : <i>$clientaddress[1]</i> : $clientaddress[2] : $clientaddress[3]</div> <input type=hidden name='rec[".($z+$y+$c-3)."]' value='$clientrec[$z]'>";


}
}
echo "<div style='width:600px; font-size:16px; color:#666;'><hr></div>";
}



 

echo "</div></div>";


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