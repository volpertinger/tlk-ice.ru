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
// �������� �������������� ������ �����������


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
            
        </form></div>";

	
if (isset($_POST['del'])){
 {$recid = $_POST['del'];
 $rec = $_POST['rec'];}
 $query = "select * from recipients where recid='$recid'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$recid=$row["recid"];
$recname=$row["recname"];
$reccity=$row["reccity"];
$recaddress=$row["recaddress"];
$recnum=$row["recnum"];
$recnick=$row["recnick"];
 }
$query="delete from recipients where recid='$recid'
		";

		 $result=mysql_query ($query);

if ($result)
{
echo "<b><span style='font-size:16px'>������� - $recname:$reccity:$recaddress:$recnum</span></b><br><hr>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}


if (isset($_POST['loadrec'])){
if (isset($_POST['recid'])) {$recid = $_POST['recid'];}
if (isset($_POST['recname'])) {$recname = trim(htmlspecialchars($_POST['recname']));}
if (isset($_POST['recaddress'])) {$recaddress = trim(htmlspecialchars($_POST['recaddress']));}
if (isset($_POST['reccity'])) {$reccity = trim(htmlspecialchars($_POST['reccity']));}
if (isset($_POST['recnum'])) {$recnum = trim(htmlspecialchars($_POST['recnum']));}
if (isset($_POST['recnick'])) {$recnick = $_POST['recnick'];}
if (isset($_POST['recdata'])) {$recdata = $_POST['recdata'];}






    
		
        $query="INSERT INTO recipients SET 
		recname='".$recname."', 
		reccity='".$reccity."', 
		
		recaddress='".$recaddress."',
		recnum='".$recnum."',
		recnick='".$recnick."'
		";

		 $result=mysql_query ($query);

if ($result)
{
echo "<b><span style='font-size:16px'>��������� - $recname:$reccity:$recaddress:$recnum</span></b><br><hr>";

} else {
echo "<p><b><span style='font-size:16px'>������!</span></b><br><hr>";
}
}		
		
    

echo "<div class='client'>�������� ����������</div>
<div class='right'>
<form method='POST' action=''>

������������ <input name='recname' type='text' style='font-size:14px'><p>

����� <input name='reccity' type='text' style='font-size:14px'><p>

����� <input name='recaddress' type='text' style='font-size:14px'><p>

����� <input name='recnum' type='text' style='font-size:14px' size='30'><p>
��������� <input name='recnick' type='text' style='font-size:14px' size='30'><p>

<input name='loadrec' type='submit' value='��������' style='font-size:20px'>


<hr>
";
echo "<i><b>����� ������ ���� ��������� ������� ��������</b> (�� ������� � ���������� �������).</br>
����������� ��������� ������� ���������� �� ������</i><p>";
$query = "select * from recipients order by reccity";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$recid=$row["recid"];
$recname=$row["recname"];
$reccity=$row["reccity"];
$recaddress=$row["recaddress"];
$recnum=$row["recnum"];
$recnick=$row["recnick"];


echo "<div id='recipients'>$reccity:$recname:$recaddress:$recnum  <input type='submit' class='senddel' name='del' value='".$row['recid']."' alt='�������' /></div><br>";
}
echo "</div></form>";

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