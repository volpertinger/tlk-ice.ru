<?header( 'Content-Type: text/html; charset=windows-1251' );?>
<?php
include('./inc/head.php')
?>
<?php
include('./inc/connect.php')
?>

<?

// ������ ��������




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
	
	// ���� ��������� ����� �����������
	
	# ������ ������

include('./inc/orderbutton.php');
		
		# ����� ����
		
		include('./inc/menu_left.php');


if (isset($_POST['del'])){
 {$recid = $_POST['del'];

 }
 
 $query = "select * from orderlist where ol_id ='$recid'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$ol_city=$row["ol_city"];
$ol_num=$row["ol_num"];

 }
$query="delete from orderlist where ol_id ='$recid'
		";

		 $result=mysql_query ($query);

if ($result)
{
echo "<b><span style='font-size:16px'>������� - $ol_city:$ol_num $recid</span></b><br><hr width='500' align='left'>";

} else {
echo "<p><b><span style='font-size:16px'>������!$ol_city:$ol_num $recid</span></b><br><hr width='500' align='left'>";
}

}






if (isset($_POST['pallet'])) {$pallet = ($_POST['pallet']);}
if (isset($_POST['ves'])) {$ves = ($_POST['ves']);}
if (isset($_POST['summa'])) {$summa= ($_POST['summa']);}
if (isset($_POST['box'])) {$box = ($_POST['box']);}
if (isset($_POST['invoice'])) {$invoice = ($_POST['invoice']);}
if (isset($_POST['invoicedate'])) {$invoicedate = ($_POST['invoicedate']);}
if (isset($_POST['reccity'])) {$reccity = trim(strip_tags($_POST['reccity']));}
if (isset($_POST['recname'])) {$recname = trim(strip_tags($_POST['recname']));}
if (isset($_POST['recaddress'])) {$recaddress = trim(strip_tags($_POST['recaddress']));}

if (isset($_POST['orderdate2'])) {$orderdate2 = $_POST['orderdate2'];

$query = "select * from orderlist where ol_datein='$orderdate2' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)){
$ol_datein=$row["ol_datein"];
}	
}
if (isset($_POST['path'])) {};
if (isset($_POST['date2'])) {$date2 = $_POST['date2'];
$date22 = date('Y-m-d', strtotime($date2));}
if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['td'])) {$td = $_POST['td'];}

if (isset($_POST['orderdate'])) {$orderdate = $_POST['orderdate'];}
if (isset($_POST['date'])) {$date = $_POST['date'];}
if (isset($_POST['orderclient'])) {$orderclient = trim(strip_tags($_POST['orderclient']));}
if (isset($_POST['orderid'])) {$orderid = trim(strip_tags($_POST['orderid']));}
if (isset($_POST['ordertype'])) {$ordertype = trim(strip_tags($_POST['ordertype']));}
if (isset($_POST['orderterm'])) {$orderterm = trim(strip_tags($_POST['orderterm']));}
if (isset($_POST['ordertransdate'])) {$ordertransdate = trim(strip_tags($_POST['ordertransdate']));}
if (isset($_POST['orderstore'])) {$orderstore = trim(strip_tags($_POST['orderstore']));}
if (isset($_POST['ordercomment'])) {$ordercomment = trim(strip_tags($_POST['ordercomment']));}
if (isset($_POST['orderrec'])) {$orderrec = trim(strip_tags($_POST['orderrec']));}
if (isset($_POST['clientmail'])) {$clientmail = trim(strip_tags($_POST['clientmail']));}

if (empty($_POST['orderdate2']) 
or empty($_POST['orderdate']) 
or isset($_POST['ol_datein']) 
or isset($_POST['del'])
or isset($_POST['choose'])){

} else {



	



if (isset($_POST['recnum'])) {$recnum = ($_POST['recnum']);


$query = "select * from recipients where recnum='$recnum' limit $td";

 $result=mysql_query ($query);
 while ($row=mysql_fetch_array ($result)) {
 $num = mysql_num_rows($result);
$recaddress=$row["recaddress"];
$reccity=$row["reccity"];
$recname=$row["recname"];
} if (empty($reccity)) {
} else {	
for ($i=0; $i<count($num); $i++) {	

mysql_query("INSERT INTO orderlist SET 
ol_orderid='".$orderid."', 
ol_clientid='".$userdata['clientid']."',
ol_datein='".$orderdate2."',
ol_dateout='".$date22."',
ol_clientname='".$userdata['clientname']."',
ol_city='".$city."',
ol_name='".$recname."',
ol_address='".$recaddress."',
ol_num='".$recnum[$i]."',
ol_invoce='".$invoice[$i]."',
ol_invocedate='".$invoicedate[$i]."',
ol_summa='".$summa[$i]."',
ol_type='".$ordertype[$i]."',
ol_term='".$orderterm[$i]."',
ol_store='".$orderstore[$i]."',
ol_ves='".$ves[$i]."',
ol_pallet='".$pallet[$i]."',
ol_box='".$box[$i]."'") or die ("������ ����������� � ����");

}} 
} else {

}
}

$today1 = date("d-m");
$today2 = date("Y");
$date1 = $_POST['date1'];
$date11=  date('d-m', strtotime($date2));
$date12=  date('Y', strtotime($date2));
 if (strtotime(date("d.m.Y"))>=strtotime($date2)&&($today2>=$date12)) {
 echo "���� ����� �� ��������� ��� �� �������� ��� ������, ��������� ������!";
 } else {
$orderterm = $_POST['orderterm'];
$orderstore = $_POST['orderstore'];
$ordertype = $_POST['ordertype'];
$orderdate = $_POST['orderdate'];
$orderdatesimple = $_POST['orderdatesimple'];	
$orderclient = $_POST['orderclient'];

$date222 = date('d-m-Y', strtotime($date2));
$orderdate2 = date('Y-m-d H:i:s', strtotime($orderdate));

$query = "select * from orderid where dateout='$date22' and clientid='".$userdata['clientid']."'";

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
dateout='".$date22."',
orderstore='".$orderstore."',
clientid='".$userdata['clientid']."'") or die ("������ ����������� � ����");

$query = "select * from orderid where datein='$orderdate2' and dateout='$date22' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}			
			echo "<div class='client'>��� 2. ����� ������ ��������</div>
			<div class='right'><b>������ ����� �$orderid.</b> <br>
			
";
		} else {



$query = "select * from orderid where datein='$orderdate2' and dateout='$date22' and clientid='".$userdata['clientid']."'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {

$orderid=$row["orderid"];
}			
			echo "<div class='client'>��� 2. ����� ������ ��������</div>
			<div class='right'><b>��� �����</b> (�� ���� �������� $date2) <b>�$orderid.</b> 
			<br>
";

echo "<div id='orderbox'>";

$query = mysql_query("select * from orderlist where ol_clientid='".$userdata['clientid']."' and ol_orderid='$orderid' and ol_dateout='$date22' order by ol_city");

$num = mysql_num_rows($query);
for ($n=0; $n<$num; $n++) {		
$ol=mysql_fetch_array ($query);
	

	echo "
<form method='post' action='' style='font-size:14px; color:#666'>
".($n+1).". ".$ol['ol_city'].":".$ol['ol_name'].":".$ol['ol_address'].":".$ol['ol_num'].":".$ol['ol_ves']." ��:".$ol['ol_pallet']." ��:".$ol['ol_box']." �������:".$ol['ol_summa']."���.

<input name='orderdate2' type='hidden' value='$orderdate2'>
<input name='orderdate' type='hidden' value='$orderdate'>
<input name='date2' type='hidden' value='$date2'>
<input type='submit' class='senddel20' name='del' value='".$ol['ol_id']."' alt='�������' /></form>
";

		
}
echo "</div><hr>";			
}

echo "<form method='POST' action='' enctype='multipart/form-data'>
<label>������� �����: <select size='1' name='city'><option value=''></option>";
$query = "select * from calendar where calenddate='$date22'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$calendid=$row["calendid"];
$calendcity=unserialize($row["calendcity"]);
$calendsort=sort($calendcity);
for ($i=0; $i<count($calendcity); $i++) {
$calendaddress=explode(';', $calendcity[$i]);
$calendrec=htmlspecialchars($calendaddress[0]);
echo "<option value='$calendrec'>$calendrec</option>";
}		
}
echo "</select></label>

<input name='ordertype' type='hidden' value='�������� �������'>
<input name='orderterm' type='hidden' value='+2�-+6�'>
<input name='orderstore' type='hidden' value='�������-��������'>
<input name='orderdate2' type='hidden' value='$orderdate2'>
<input name='orderdate' type='hidden' value='$orderdate2'>
<input name='date2' type='hidden' value='$date2'>
<input name='orderclient' type='hidden' value='$orderclient'>
<input type='hidden' name='orderid' value='$orderid'>


";
echo "<label> ���������� ��������: <select size='1' name='td'>";
echo "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>
<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option>
<option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option>
<option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option>
<option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option>
<option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>

";

echo "<br><input type='submit' name='choose' value='�������'>

</form>";
		
		if (empty($_POST['city'])&&empty($_POST['td'])){

} else {	
$city = ($_POST['city']);
$td = ($_POST['td']);	
			echo "<p>

<table width='980' height='auto' border='1' cellpadding='0' cellspacing='0' bordercolor='#333333' style='margin-left:5px'>
<tr>
    <td width='270px'><div align='center'>���������� � �. $city</div></td>
    
    <td width='70'><div align='center'>�����, ������</div></td>
    <td width='70'><div align='center'>���, ��</div></td>
	<td width='70'><div align='center'>�������</div></td>
	<td width='70'><div align='center'>�����</div></td>
	<td width='70'><div align='center'>���������</div></td>
	<td width='70'><div align='center'>���� ���������</div></td>

  </tr></table>";
echo "<div id='recbox'><form method='post' action='' style='font-size:14px; color:#666'>


<input name='ordertype' type='hidden' value='�������� �������'>
<input name='orderterm' type='hidden' value='+2�-+6�'>
<input name='orderstore' type='hidden' value='�������-��������'>
<input name='orderdate2' type='hidden' value='$orderdate2'>
<input name='orderdate' type='hidden' value='$orderdate2'>
<input name='date2' type='hidden' value='$date2'>
<input name='orderclient' type='hidden' value='$orderclient'>

<input type='hidden' name='city' value='$city'>
<input type='hidden' name='td' value='$td'>
<input type='hidden' name='orderid' value='$orderid'>



";
	 
for ($a=0,$b=1,$c=2,$d=3,$e=4,$f=5,$g=6; $a<$td; $a++,$b++,$c++,$d++,$e++,$f++,$g++) {	 
	 
	 echo "<table width='980' height='auto' border='0' cellpadding='0' cellspacing='0'><tr><td width='270px' bordercolor='#fff'><div align='left'><b>".($a+1)." 
	 <select size='1' name='recnum[$a]' style='width: 320px;'><option value=''></option>";
	 $query = "select * from recipients where reccity='$city'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$recnam=str_replace("'","`",$row["recname"]);
$rname=str_replace('"',"",$recnam);
$recname=trim($rname);
$recnum=($row["recnum"]);
$reccity= trim($row["reccity"]);

$recadd=str_replace("'","`",$row["recaddress"]);
$recaddres=str_replace('"',"",$recadd);
$recaddress=trim($recaddres);
echo "<option value='$recnum'>$recname:$recaddress:".$row['recnum']."</option>";
}		

echo "</select></b></div></td>";

echo "<td width='70'><div align='right'><input style='font-size:12px; align:right' name='pallet[$a]' type='text' size='11'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='ves[$a]' type='text' size='11'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='box[$a]' type='text' size='11'></div></td>
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='summa[$a]' type='text' size='11'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='invoce[$a]' type='text' size='12'></div></td> 
<td width='70'><div align='right'><input style='font-size:12px; align:right' name='invocedate[$a]' type='text' size='12'> </div></td>

</tr></table><p>
";

}
echo "<input type='submit' name = 'path'  style='width: 320px;' value='���������'/></form>";
 
	
			
		
echo "</div>";
echo "</div>";

}
}






















# ��������� �������� ����
echo "</div>";
echo "</div>";



 } }
else

{

    print "�������� ����";
header("Location: login.php"); exit();
}
		
		?>

<?php
include('./inc/end.php')
?>