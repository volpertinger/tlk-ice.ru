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
// �������� ����������� ������ ������������


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


$to = "artem@neskorodov.ru"; /*������� ���� �����!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "ACTIVATION. Client - $orderclient";
$subject=convert_cyr_string($sub,'w','k');
$date = "����: ".date("Y-m-d (H:i:s)",time())."\r\n";
$message = "$date
\n1. ���������� �� ��������� ������ ��� �������: $orderclient �� $orderdate
\n2. ��� ����� ������ � ���������� �� ����: $ordertransdate
\n3. ������ �������� �����: $number
\n4. ����� ������ ���������� ��������: http://tlk-ice.ru/clients/
";

$send = mail ($to, $subject, $message, $headers);
		
		
       

		if ($send == 'true')
{
print "<b><span style='font-size:16px'>����������� ���������� �� ".$row['clientmail']."</span></b><br><hr>";
}
else 
{
echo "<p><b><span style='font-size:16px'>������. ��������� �� ����������!</span></b><br><hr>";
}
		
		

    }

    else {

    

        print "<b><span style='font-size:16px'>��� ����������� ��������� ��������� ������:</b><br>";

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

    print "�������� ����";
header("Location: login.php"); exit();
}

?>



<?php
include('./inc/end.php')
?>