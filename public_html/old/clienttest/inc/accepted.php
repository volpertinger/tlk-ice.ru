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
		# �������� ������
if(isset($_POST['del'])){ 
{$del = $_POST['del'];}

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$del'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['orderdate'];
$orderid=$row['orderid'];
}
if ($result)
{
echo "<b><form action='' method='post'><span style='font-size:16px'>����������� �������� ������ ������ �� $orderdate</span></b>
<input type='submit' class='senddel' name='deltrue' value='$orderid' alt='�������' /><br><hr></form>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}
if(isset($_POST['deltrue'])){ 
{$deltrue = $_POST['deltrue'];}
$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$deltrue'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['orderdate'];
$orderid=$row['orderid'];
$ordercsv=$row['ordercsv'];
$orderclient=$row['orderclient'];
}
$uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$csv = ("$uploaddir/$ordercsv");
unlink($csv);
$query="delete from orderid where orderid='$orderid'
		";

		 $result=mysql_query ($query);

if ($result)
{
echo "<b><span style='font-size:16px'><i>$orderclient</i> ��� ����� �� $orderdate ������</span></b><br><hr>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}	











		# �������
		if (empty($_POST['path'])){
		echo "<div class='client'>������,<br>�������� � ����������</div>";	
		include('./inc/search.php');
		include('./inc/table_top.php');
		
		
$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `clientname` ='".$userdata['clientname']."' and orderstatus='30'  order by dateout desc
") or die (mysql_error());

	
while ($row = mysql_fetch_array ($result)){

echo "<div class='row'><div class='field' style='width:40px'>".$row['clientname']."</div>
<div class='field' style='width:40px'>".$row['orderid']."</div>
<div class='field' style='width:60px'>".$row['datein']."</div>
<div class='field' style='width:60px'>".$row['dateout']."</div>
<div class='field' style='width:250px; height:auto'>";
$orderstatus=$row['orderstatus'];

echo "<a href='./csv/".$row['ordercsv']."'><img src='./images/icon_excel.png' border=0 alt='������� �����' title='������� �����' height=30 align='absmiddle'> - ".$row['ordercsv']."</a>";
echo "</div>";


if ($orderstatus=="30") {
echo "<div class='field' style='width:120px; height:auto'>
����� ������ � ����������� ".$row['statusdate']."</div>";
}
if (empty($orderstatus)) {
echo "<div class='field' style='width:80px; height:auto'></div>";
} else {

echo "
<div class='field' style='width:80px; height:auto'><form action='./order_for_print.php' target=_blank method='post'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input type='submit' name='' value='������' alt='������' /></form></div>";
}


if (empty($orderstatus) or ($orderstatus=="5") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'><form action='' method='post'><input type='submit' class='senddel' name='del' value='".$row['orderid']."' alt='�������' /></form></div>";
} else {
echo "<div class='field' style='width:40px; height:auto'></div>";
}


if ($orderstatus=="30") {
echo "<div class='field' style='width:40px; height:auto'></div>";
}

echo "


</div>";

}
echo "</div>";
}
# ����� ������
	

if ($_POST['path']== "����� �������") {
if (isset($_POST['date1'])) {$date1 = $_POST['date1'];}
if (isset($_POST['date2'])) {$date2 = $_POST['date2'];}

echo "<div class='client'>������,<br>�������� � ���������� <br></i>$date1 - $date2</i></div>";

include('./inc/ordersearchresultacc.php');
}
# �������� ������






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