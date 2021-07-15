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
		
		
            
        echo "<div class='client'>КАЛЕНДАРНЫЙ ПЛАН<br>Возможные города доставки</div><div class='right'>";


// Просмотр календарного плана


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

echo "<p><b><span style='font-size:16px'>Сегодня $day $month_name $y</b></span></b><br><hr>";



$lines=31;
$begin=$page*$lines;
$i=$i;
if (empty($page)){
$page=0;
} 	
$n = 1;
$date2 = date('Y-m-d', strtotime($date_today.'-'.$n.' month'));
$date3 = date('Y-m-d', strtotime($date_today.'+'.$n.' month'));
$result = mysql_query("SELECT * FROM calendar where calenddate>'$date2' and calenddate<'$date3' order by calenddate desc") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$calendcity=unserialize($row["calendcity"]);
$calendcitysort=sort($calendcity);
$calenddate=$row["calenddate"];

$temp_cdate = explode("-", "$calenddate");
//echo $temp_date[2].'-'.$temp_date[1].'-'.$temp_date[0];
$cy = $temp_cdate[0];
$cday = $temp_cdate[2];
//$num_day = $day-1;
$cnum_month = $temp_cdate[1]-1;
$cmonth_name = $monthnow[$cnum_month];

$name_day = mktime (0, 0, 0, $cnum_month+1, $cday, $temp_cdate[0]);
$name_day = strftime("%w", $name_day);
$name_day = $name_day;
$name_day = $dayname[$name_day];

echo "<div id='calendnote_client'>";

echo "
<p>$name_day<big><b><br>$cday $cmonth_name $cy</b></big><br>
";

for ($i=0; $i<count($calendcity); $i++) {
print "$calendcity[$i]<br>";

}



echo "</div>";
}
}
$query="select COUNT(*) as count from `calendar`";
$result=mysql_query ($query);
$items=mysql_fetch_array ($result);
$count=$items["count"];
$pages=($count/$lines);

if ($pages>1) {
echo "<br><p style='font-family: Verdana; font-size: 10pt'><font color=#E77616><b>страницы</b></font>";

for ($i=0;$i<$pages;$i++) {
echo "<font color=#E77616> | </font><a style=\"color: #E77616; text-decoration: none\" href='../gallery/album.php?id=5&page=".$i."' onmouseover=\"this.style.color='#521D1E' \"
 onmouseout=\"this.style.color='#E77616'\" onmousedown=\"this.style.color='#521D1E' \" align=center>
";

 if ($page == "$i") { 
echo "<font color=black><b>".($i+1)."</b></font>"; 

} else {
 
echo "<font color='#E77616'><b>".($i+1)."</b></font>";
} 

echo "</a>";

}
}




echo "</div>";




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