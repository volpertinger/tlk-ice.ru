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
	?>


<?
	
	// ���� ��������� ����� �����������
	
	# ������ ����������� ������������

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
            
        </form></div>";
		
		# ����� ����
		
		include('./inc/menu_left.php');
		
		
		
		
# ������� �� ������������
if (isset($_POST['premod']) or isset($_POST['endpremod'])){

 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
 $client = $_POST['client'];
 $clientname = $_POST['clientname'];
 $num = $_POST['num'];
$sendmoder = $_POST['sendmoder'];
$status = $_POST['status'];
$orderid = $_POST['orderid'];
$clientid = $_POST['clientid'];
$dateout= $_POST['dateout'];

 

 $statusdate = date("Y-m-d H:i:s");
mysql_query("UPDATE orderid SET 
orderstatus='".$status."',
statusdate='".$statusdate."'
where orderid='".$orderid."'") 
or die ("������ ����������� � ����");

$resu = mysql_query("SELECT* 
FROM `clients` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$cl=mysql_fetch_array ($resu);
$clientmail=$cl['clientmail'];
$resul = mysql_query("SELECT* 
FROM `orderid` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$od=mysql_fetch_array ($resul);



$to = "admin@pollard.ru, $clientmail"; 

$headers .= "From: $clientmail" . "\r\n";
$headers .= "Cc: $clientmail" . "\r\n";
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "PREMODERATION. Zakaz - ".$od['orderid']." ��: ".$cl['clientname']." $clientmail";
$subject=convert_cyr_string($sub,'w','k');
$date = "����: ".date("Y-m-d (H:i:s)",time())."\r\n";




$message = "$date
\n1. ".$od['orderid']." ��: ".$cl['clientname']." $clientmail
\n2. ����� ������ �� ������������ $statusdate";

$send = mail ($to, $subject, $message, $headers);

include('../inc/table_top.php');
include('../inc/mods.php');

}
# �������� ������
if(isset($_POST['del'])){ 
{$del = $_POST['del'];
$clientid = $_POST['clientid'];
$orderid = $_POST['orderid'];
}

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$del'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$clientid=$row['clientid'];
}
if ($result)
{
echo "<b><form action='' method='post'><span style='font-size:16px'>����������� �������� ������ #$orderid �� $orderdate</span></b>

<input type='submit' class='senddel' name='deltrue' value='$orderid' alt='�������' /><br><hr></form>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}
if(isset($_POST['deltrue'])){ 
{$deltrue = $_POST['deltrue'];

$comment = $_POST['comment'];
}


$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$deltrue'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$ordercsv=$row['ordercsv'];
$clientid=$row['clientid'];
$orderclient=$row['clientname'];
}
$uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$csv = ("$uploaddir/$ordercsv");
unlink($csv);

$query="delete from orderid where orderid='$orderid'
		";
		$res=mysql_query ($query);
$query="delete from orderlist where ol_orderid='$orderid'
		";

		 $result=mysql_query ($query);

if ($result&&$res)
{
echo "<b><span style='font-size:16px'>����� <i>$orderclient</i> $orderid �� $orderdate ������</span></b><br><hr width='500' align='left'>";
} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr width='500' align='left'>";
}


}
	


# ���������� ������
if(isset($_POST['deny'])){ 
{$deny = $_POST['deny'];
$clientid = $_POST['clientid'];
$orderid = $_POST['orderid'];
}

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$orderid'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$clientid=$row['clientid'];
}
if ($result)
{
echo "<b><form action='' method='post'><span style='font-size:16px'>����������� ���������� ������ �� $orderdate</span></b>
�����������<br><textarea name='comment' cols='50' rows='5'></textarea>
<input type='submit' class='senddel' name='deltrue' value='$orderid' alt='���������' /><br><hr></form>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}
if(isset($_POST['denytrue'])){ 
{$denytrue = $_POST['denytrue'];

$comment = $_POST['comment'];}
$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$denytrue'
") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$orderdate=$row['datein'];
$orderid=$row['orderid'];
$clientid=$row['clientid'];
$orderclient=$row['clientname'];
}


$resu = mysql_query("SELECT* FROM `clients` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$cl=mysql_fetch_array ($resu);
$clientmail=$cl['clientmail'];
$resul = mysql_query("SELECT* FROM `orderid` 
WHERE `clientid` ='$clientid'
") or die (mysql_error());
$od=mysql_fetch_array ($resul);

$statusdate = date("Y-m-d H:i:s");
mysql_query("UPDATE orderid SET 
orderstatus='5',
statusdate='".$statusdate."'
where orderid='".$orderid."'") 
or die ("������ ����������� � ����");

$to = "admin@pollard.ru, $clientmail"; 
$headers .= "From: $clientmail" . "\r\n";
$headers .= "Cc: $clientmail" . "\r\n";
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "OTMEHA. Zakaz - ".$od['orderid']." ".$cl['dateout']." ��: ".$cl['clientname']." $clientmail";
$subject=convert_cyr_string($sub,'w','k');
$date = "����: ".date("Y-m-d (H:i:s)",time())."\r\n";
$message = "$date
\n1. ".$od['orderid']." ��: ".$cl['clientname']." ".$cl['dateout']." $clientmail
\n2. ����� ".$od['orderid']." ".$cl['dateout']." �������� �����������
\n2. �� �������: $comment";

$send = mail ($to, $subject, $message, $headers);
if ($send == 'true') {
echo "<b><span style='font-size:16px'>����� <i>$orderclient</i> $orderid �� $orderdate ��������. ����������� ���������� �� ����� $clientmail</span></b><br><hr width='500' align='left'>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr width='500' align='left'>";
}
}		
		
		
		
		# �������
		if (empty($_POST['path'])){
		echo "<div class='client'>������ �����������������</div>";	
		include('./inc/search.php');
    }
# ����� ������
include('./inc/makecsv.php');	

if ($_POST['path']== "����� �������") {
$page = $_POST['page'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$clientname = $_POST['clientname'];
$client = $_POST['client'];
$num = $_POST['num'];

if (empty($_POST['client'])&&empty($_POST['clientname'])&&empty($_POST['num'])&&isset($_POST['date1'])) {

echo "<div class='client'>������ �� ������
 <br><span style='font-size:16px;'>�� $date1 - $date2</span>
 <form action='' method='post'>

 <input type='hidden' name='date1' value='$date1'>
 <input type='hidden' name='date2' value='$date2'>
 <input type='submit' name='path' value='������� �����' />
 </div>";
  } else {
  if (empty($_POST['client'])&&isset($_POST['clientname'])&&empty($_POST['num'])&&isset($_POST['date1'])) {

echo "<div class='client'>������ $clientname <br><span style='font-size:16px;'>�� $date1 - $date2</span>
 <form action='' method='post'>
 <input type='hidden' name='client' value='$clientname'>
 <input type='hidden' name='date1' value='$date1'>
 <input type='hidden' name='date2' value='$date2'>
 <input type='submit' name='path' value='������� ����� �������' />
 </div>";
  } else {


if (isset($_POST['client'])&&empty($_POST['clientname'])&&empty($_POST['num'])&&isset($_POST['date1'])) {


echo "<div class='client'><form action='' method='post'>������ $client
 <input type='hidden' name='client' value='$client'>
 
 <input type='submit' name='path' value='������ ����� �������' /></div>";
}  else {
if (empty($_POST['client'])&&empty($_POST['clientname'])&&isset($_POST['num'])&&isset($_POST['date1'])) {

echo "<div class='client'>�����
 <br>#$num</div>";
 }  
}}}

$page = $_POST['page'];
$lines=10;
$begin=$page*$lines;
$p=$p;
if (empty($_GET ['page'])){
$page=0;
} 	
include('./inc/ordersearchresult.php');






}

# �������� ������









# ��������� �������� ����
echo "</div>";



} } 
else

{

    print "�������� ����";
header("Location: login.php"); exit();
}


?>