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
// �������� �������� �������


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
            
        </form></div><div class='client'>�������� �������� ������������ �����</div><div class='right'>";


// �������� ������� � ���������


if (isset($_POST['submit'])) {

$name = $_POST['name'];
if (empty($name)) {
echo "<p><span style='font-size:16px; color:red'>������� �������� �������!</span><br><hr>";
}else{

$name = $_POST['name'];

$city = serialize($_POST['city']);
$recbase=($city);
      $printrec=unserialize($city);
 // ����� ���������� ������ �������� ������� �2
		  
$result = mysql_query("SELECT * FROM stamp where stampname='$name'")or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$stampname=$row['stampname'];
}

if (isset($stampname)){
 echo "<p><span style='font-size:16px; color:red'>������ �����! ������ <b>$stampname</b> ��� �����������</span><br><hr>";
}else{

 $query="INSERT INTO stamp SET 
		stampcity='".$recbase."', 
		stampname='".$name."'
		";

		$result=mysql_query ($query);

if ($result)
{
print "<b><span style='font-size:16px'>������ ������ <b>$name</b></span></b><br><hr>";
}
else 
{
echo "<p><b><span style='font-size:16px'>������ <b>$name</b>!</span></b><br><hr>";
}
}
}
}


$client = $_POST['client'];





 



$result = mysql_query("SELECT * FROM stamp order by stampname")or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$stampname=$row['$stampname'];

echo "$stampname<br>";


}



echo "<div id='calendnote' style='width:500px'>";

echo "<script type='text/javascript' src='../js/jquery-1.3.2.js'></script>
<script src='../js/chekbox.js' type='text/javascript'>
</script><script src='../js/calend.js' type='text/javascript'></script>
<form method='post' action='' id='example_group1'>

<p><big>�������� �������:</big> <input type='text' name='name' value='' size='50'><br>
	<a rel='example_group1' href='#select_all'>�������� ���</a> :
<a rel='example_group1' href='#select_none'>�������� ���</a><br>
";
$result = mysql_query("SELECT DISTINCT `reccity` FROM recipients order by reccity") or die (mysql_error());

$numcity = mysql_num_rows($result);
for ($x=0; $x<$numcity; $x++){

$result = mysql_query("SELECT DISTINCT `reccity` FROM recipients order by reccity limit $x, 1") or die (mysql_error());
while ($row = mysql_fetch_array ($result)){

$reccity1=$row['reccity'];



print "<input type=checkbox name='city[$x]' value='$reccity1'> $reccity1<br>";


}
}

echo "<p><input name='submit' type='submit' value='�������� ������' style='font-size:18px'></div>";

echo "</div>";






echo "</div></div>";
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