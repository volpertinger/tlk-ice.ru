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
// �������� ���������


# ���������� � ��





// ������ ��������
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



# ������ ������

		# ������ ������

$day = date("w");
$time = date("H:i:s");
if (($day<8)&&($day>0)) {
echo "<div class='order'><form method='post' action='./register.php'>
            <input type='submit' name = 'path' value='�������������� ������ ������������'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>�������������� ������ ������������</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>����� ����������!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='�����'/>
            
        </form></div><div class='client'>����������� ����</div><div class='right'>";

// �������� ����������� ����


if (isset($_POST['del'])){
 {$id = $_POST['del'];
 $cdate = $_POST['cdate'];
 $page = $_GET['page'];
 }
$query="delete from calendar where calendid='$id'
		";

		 $result=mysql_query ($query);

if ($result)
{
echo "<b><span style='font-size:16px'>�������</b> - <i>$cdate</i></span><br><hr>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}

// ������������� ����������� ����


if (isset($_POST['edit'])){
 {$id = $_POST['edit'];
 $cdate = $_POST['cdate'];
 $page = $_GET['page'];
 $recser=serialize($_POST['calendcity']); // ����� ���������� ������ �������� ������� �2
		  $recbase=($recser);
 
 
 
 
 }
$query="update calendar SET 
		 
		calendcity='".$recbase."' 
		
		where calendid='".$id."'
		";
		

		 $result=mysql_query ($query);

if ($result)
{
echo "<b><span style='font-size:16px'>������� ��������� �� ����</b> - <i>$cdate</i></span><br><hr>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}



// �������� ������������ �����


$date_today = date("Y-m-d");
$dayname = array("�����������","�����������","�������","�����","�������","�������","�������");
$monthnow = array("������","�������","�����","������","���","����","����","�������","��������","�������","������","�������");
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

echo "<p><b><span style='font-size:16px'>������� $day $month_name $y</b></span></b><br><hr>";
 $page = $_GET['page'];
$lines=20;
$begin=$page*$lines;
$p=$p;
if (empty($_GET ['page'])){
$page=0;
} 	
$n = 1;
$date2 = date('Y-m-d', strtotime($date_today.'-'.$n.' month'));
$date3 = date('Y-m-d', strtotime($date_today.'+'.$n.' month'));


$rsult = mysql_query("SELECT DISTINCT `reccity` FROM recipients") or die (mysql_error());
$num = mysql_num_rows($rsult);


$result = mysql_query("SELECT * FROM calendar where calenddate>'$date2' and calenddate<'$date3' order by calenddate desc limit $begin,$lines") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$calendcity=unserialize($row["calendcity"]);
$calendcitysort=sort($calendcity);
$calenddate=$row["calenddate"];
$calendid=$row["calendid"];
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

echo "<div id='calendnote'>";

echo "
$name_day<big><b><br>$cday $cmonth_name $cy</b></big>
";

echo "<script type='text/javascript' src='../js/jquery-1.3.2.js'></script>
<script src='../js/chekbox.js' type='text/javascript'></script>
<form method='post' action='' id='example_group$calendid'>
<span style='font-size:10px'><a rel='example_group$calendid' href='#select_all'>�������� ���</a> :
<a rel='example_group$calendid' href='#select_none'>�������� ���</a></span><p>";

$sult = mysql_query("SELECT reccity, recid FROM recipients group by reccity") or die (mysql_error());

while ($now = mysql_fetch_array($sult)){

$reccity=$now["reccity"];
$recid=$now["recid"];

if (in_array($reccity,$calendcity)){

print "<input type=checkbox name='calendcity[$recid]' value='$reccity' checked>$reccity<br>";
} else {
print "<input type=checkbox name='calendcity[$recid]' value='$reccity'>$reccity<br>";

}
}

echo "<hr><input type='hidden' value='$calenddate' name='cdate'>
<input type='submit' class='senddel' name='del' value='$calendid' alt='�������'  /><input type='submit' class='sendedit' name='edit' value='$calendid' alt='�������������'  /></form></div></form>";

}

$query="select COUNT(*) as count from `calendar` where calenddate>'$date2' and calenddate<'$date3'";
$result=mysql_query ($query);
$items=mysql_fetch_array ($result);
$count=$items["count"];
$pages=($count/$lines);

if ($pages>1) {
echo "<br><p style='font-family: Verdana; font-size: 10pt'><font color=#E77616><b>��������</b></font>";

for ($p=0;$p<$pages;$p++) {
echo "<font color=#E77616> | </font><a style=\"color: #E77616; text-decoration: none\" href='./calendar.php?page=".$p."' onmouseover=\"this.style.color='#521D1E' \"
 onmouseout=\"this.style.color='#E77616'\" onmousedown=\"this.style.color='#521D1E' \" align=center>
";

 if ($page == "$p") { 
echo "<font color=black><b>".($p+1)."</b></font>"; 

} else {
 
echo "<font color='#E77616'><b>".($p+1)."</b></font>";
} 

echo "</a>";

}
}

}


echo "</div>";




echo "</div></div>";


 }
else

{

    print "�������� ����";
header("Location: login.php"); exit();
}

?>




<?php
include('./inc/end.php')
?>