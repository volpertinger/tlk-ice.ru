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


echo "<div class='client'>��� 1. ���� ������� �� ����� ��</div><div class='right'><i>����������, ��������� ���������� ���� �������� ��������</i><p>";

$datetime_today = date("d-m-Y H:i:s");
$datesimple_today = date("Y-m-d");
$today = date("d-m-Y");
echo "<script src='./js/calend.js' type='text/javascript'></script>
<form method='post' action='./makeorder2.php' style='font-size:14px; color:#666'>
            <i>���� <input style='font-size:12px' disabled='disabled' name='date' type='text' size='30' value='".$datetime_today."'><br>
			<span style='color:red'>���� �������� �� ����� �� </span><input type='text' name='date2' value='".$today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\"><br>
			<input name='orderdate' type='hidden' value='".$datetime_today."'>
			<input name='orderdatesimple' type='hidden' value='".$datesimple_today."'>
			������ <input style='font-size:12px' name='orderclient' type='text' value='".$userdata['clientname']."' size='40'><br>
			��� ��������� <input style='font-size:12px' name='ordertype' type='text' value='�������� �������' size='35'><br>
			t ����� <input style='font-size:12px' name='orderterm' type='text' value='+2�-+6�'><br>
			
			����� (������������) <input style='font-size:12px' name='orderstore' type='text' value='�������-��������'  size='30'><br>
			<p><input type='submit' name = 'path' value='����� ����������� �����'/>";
	


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