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

	



if(isset($_POST['submit']))

if (isset($_POST['clientname'])) {$clientname = $_POST['clientname'];}
if (isset($_POST['clientaddress'])) {$clientaddress = $_POST['clientaddress'];}
if (isset($_POST['clientphone'])) {$clientphone = $_POST['clientphone'];}
if (isset($_POST['clientmail'])) {$clientmail = $_POST['clientmail'];}
if (isset($_POST['clientrekvizits'])) {$clientrekvizits = $_POST['clientrekvizits'];}
if (isset($_POST['clientfullname'])) {$clientfullname = $_POST['clientfullname'];}
if (isset($_POST['clientnum'])) {$clientnum = $_POST['clientnum'];}
if (isset($_POST['clientagree'])) {$clientnum = $_POST['clientagree'];}
if (isset($_POST['count'])) {$count = $_POST['count'];}
if (isset($_POST['recipient_stroka'])) {$recipient_stroka = $_POST['recipient_stroka'];}
if (isset($_POST['rec']))
     { 
	
          $recser=serialize($_POST['rec']); // ����� ���������� ������ �������� ������� �2
		  $recbase=sort($recser);
      $printrec=unserialize($recser);
	  for ($i=0; $i<count($printrec); $i++) {
	  echo "$printrec[$i] ";
}

		 
     }
	





{

    $err = array();


    # �������� �����

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

    {

        $err[] = "����� ����� �������� ������ �� ���� ����������� �������� � ����";

    }

    

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

    {

        $err[] = "����� ������ ���� �� ������ 3-� �������� � �� ������ 30";

    }

# ��������� ���������� �������
   
    $password = $_POST['password'];
    $pass2 = $_POST['pass2'];
 
    if (!strcmp($_POST['password'],$_POST['pass2']) == 0) // ���� ������ ���������, �� ����������
     {
 $err[] = "������ �� ���������";

    }
        
    # ���������, �� ��������� �� ������������ � ����� ������

    $query = mysql_query("SELECT COUNT(clientid) FROM clients WHERE clientname='".mysql_real_escape_string($_POST['login'])."'");

    if(mysql_result($query, 0) > 0)

    {

        $err[] = "������������ � ����� ������� ��� ���������� � ���� ������<hr>";

    }

    

    # ���� ��� ������, �� ��������� � �� ������ ������������

    if(count($err) == 0)

    {

        
        $login = $_POST['login'];

        

        # ������� ������ ������� � ������ ������� ����������

        $password = md5(md5(trim($_POST['password'])));

        $pass2 = trim($_POST['pass2']);
$cc = "admin@polard.ru";
		$to = "$clientmail"; 
$headers = "Content-type: text/plain; charset = windows-1251";
$headers .= "From: admin@polard.ru" . "\r\n";
$headers .= "Cc: admin@polard.ru" . "\r\n";/*������� ���� �����!*/
$sub = "REGISTRATION. Client - $clientfullname";
$subject=convert_cyr_string($sub,'w','k');
$date = "����: ".date("Y-m-d (H:i:s)",time())."\r\n";
$message = "$date
\n1. ����������� ������ ������������ �� ������� tlk-ice.ru: $login
\n2. ������ �������: $pass2
\n3. ����� ������ ���������� ��������: http://tlk-ice.ru/clients/
";

$send = mail ($to, $subject, $message, $headers);
		
		
        mysql_query("INSERT INTO clients SET 
		clientname='".$login."', 
		clientpass='".$password."', 
		clientdate=(NOW()), 
		clientmemo='".$pass2."',
		clientfullname='".$clientfullname."',
		clientrekvizits='".$clientrekvizits."',
		clientnum='".$clientnum."',
		clientaddress='".$clientaddress."',
		clientphone='".$clientphone."',
		clientagree='".$clientagree."',
		clientrec='".$recser."',
		clientmail='".$clientmail."'
		");

		if ($send == 'true')
{
print "<b><span style='font-size:16px'>����������� ���������� $clientmail, ����� $to</span></b><br><hr>";
}
else 
{
echo "<p><b><span style='font-size:16px'>������. ��������� �� ����������!</span></b><br><hr>";
}
		
		print "<b><span style='font-size:16px'>������������ $login ���������������.</span></b><br><hr>";
		
        

    }

    else {

    

        print "<b><span style='font-size:16px'>��� ����������� ��������� ��������� ������:</b><br>";

        foreach($err AS $error)

        {

            print $error."</span></b><br><hr>";

        }

    } 
}
echo "<div class='client'>����������� ������ ������������</div>
<div class='right'>
<script type='text/javascript' src='../js/jquery-1.3.2.js'></script>
<script src='../js/chekbox.js' type='text/javascript'>
</script><script src='../js/calend.js' type='text/javascript'></script>
<form method='post' action='' id='example_group1'>




����� <input name='login' type='text' style='font-size:14px'><p>

������ <input name='password' type='text' style='font-size:14px'><p>

������ �������� <input name='pass2' type='text' style='font-size:14px'><p>
<hr>
���������� ������� <input name='clientphone' type='text' style='font-size:14px' size='30'><p>
E-mail ������� <input name='clientmail' type='text' style='font-size:14px' size='30'><p>
����� ��������� <textarea name='clientaddress' type='textarea' style='font-size:14px' cols='50' rows='8'></textarea><p>
������������ ��-��� <input name='clientfullname' type='text' style='font-size:14px' size='50'><p>
��������� <textarea  name='clientrekvizits' style='font-size:14px' cols='50' rows='8'></textarea><p>
��� ��������� <input name='clientnum' type='text' style='font-size:14px'><p>
����� � ���� �������� <input name='clientagree' type='text' style='font-size:14px'><p>";

echo "<i>������� �� ������ �������� ��������</i><p>

	<a rel='example_group1' href='#select_all'>�������� ���</a> :
<a rel='example_group1' href='#select_none'>�������� ���</a><p>";

$query = "select *, recid as count from recipients order by reccity";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$recid=$row["recid"];
$recnam=str_replace("'","`",$row["recname"]);
$rname=str_replace('"',"",$recnam);
$recname=trim($rname);

$reccity= trim($row["reccity"]);

$recadd=str_replace("'","`",$row["recaddress"]);
$recaddres=str_replace('"',"",$recadd);
$recaddress=trim($recaddres);

$recnum=trim($row["recnum"]);
$recnick=$row["recnick"];
$cutter=(":");
$rec=($reccity .$cutter. $recname .$cutter .$recaddress .$cutter. $recnum);





echo "<input type=checkbox name='rec[$recid]' value='$rec'> $reccity:$recname:$recaddress:$recnum <br>
";
}




echo "<p><input name='submit' type='submit' value='����������������' style='font-size:20px'>

</form>
</div>
";



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