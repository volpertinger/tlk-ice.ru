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
// Страница регситрации нового пользователя


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


# Кнопка заказа

$day = date("w");
$time = date("H:i:s");
if (($day<8)&&($day>0)) {
echo "<div class='order'><form method='post' action='./register.php'>
            <input type='submit' name = 'path' value='Регистрировать нового пользователя'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>Регистрировать нового пользователя</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>добро пожаловать!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='Выход'/>
            
        </form></div>";
		
		
		
		
		
	if(isset($_POST['edit'])) {

if (isset($_POST['clientname'])) {$clientname = $_POST['clientname'];}
if (isset($_POST['clientaddress'])) {$clientaddress = $_POST['clientaddress'];}
if (isset($_POST['clientphone'])) {$clientphone = $_POST['clientphone'];}
if (isset($_POST['clientmail'])) {$clientmail = $_POST['clientmail'];}
if (isset($_POST['clientrekvizits'])) {$clientrekvizits = $_POST['clientrekvizits'];}
if (isset($_POST['clientfullname'])) {$clientfullname = $_POST['clientfullname'];}
if (isset($_POST['clientnum'])) {$clientnum = $_POST['clientnum'];}
if (isset($_POST['passwordold'])) {$passwordold = $_POST['passwordold'];}
if (isset($_POST['clientagree'])) {$clientagree = $_POST['clientagree'];}
if (isset($_POST['count'])) {$count = $_POST['count'];}
if (isset($_POST['recipient_stroka'])) {$recipient_stroka = $_POST['recipient_stroka'];}
if (isset($_POST['rec']))	{ 
	
          $recser=($_POST['rec']); // прием созданного формой готового массива №2
		 
      $recbase=serialize($recser);
	  
	  $ordernum=count($printrec);
	  
	  
	  $printrec=unserialize($recbase);
	
	 
	 
     }
	 // если не ввели новые пароли
	 if (empty($_POST['password'])) {
	 
	 $query="UPDATE clients SET 
		clientrekvizits='".$clientrekvizits."', 
		clientrec='".$recbase."',
		clientnum='".$clientnum."',
		clientagree='".$clientagree."',
		clientaddress='".$clientaddress."', 
		clientmail='".$clientmail."',
		clientphone='".$clientphone."',
		clientfullname='".$clientfullname."'
		where clientid='".$clientname."'";

		 $result=mysql_query ($query);

if ($result)
{
$query = "select *from clients where clientid='$clientname'";
$result=mysql_query ($query);
$row=mysql_fetch_array ($result);
 
 $client=$row["clientname"];
echo "<b><span style='font-size:16px'>Сохранена обновленная инфомация о клиенте - 
<span style='font-weight: bold;font-size: 22px;color: #5671AD;'>$client</span></b><br><hr>";

} else {
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr>";
}
	 
} else 	
	 // если ввели новые пароли 
if (isset($_POST['password'])) {	 
  $password = $_POST['password'];
    $pass2 = $_POST['pass2'];
 
    if (!strcmp($_POST['password'],$_POST['pass2']) == 0) // если пароли совпадают, то продолжаем
     {
 $err[] = "Пароли не совпадают";

    }
$password = md5(md5(trim($_POST['password'])));

        $pass2 = trim($_POST['pass2']);
		
		
	 mysql_query("update clients SET 
		 
		clientpass='".$password."', 
		clientdate=(NOW()), 
		clientmemo='".$pass2."'
		where clientid='".$clientname."'
		");

		if ($send == 'true')
{
print "<b><span style='font-size:16px'>Пароль доступа изменен на $pass2</span></b><br><hr>";
}
else 
{
echo "<p><b><span style='font-size:16px'>Ошибка!</span></b><br><hr>";
}	
		
	
}
}	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
// выбор клиента


if(isset($_POST['select'])) 

if (isset($_POST['clientname'])) {$clientname = $_POST['clientname'];}
if (isset($_POST['clientaddress'])) {$clientaddress = $_POST['clientaddress'];}
if (isset($_POST['clientphone'])) {$clientphone = $_POST['clientphone'];}
if (isset($_POST['clientmail'])) {$clientmail = $_POST['clientmail'];}
if (isset($_POST['clientrekvizits'])) {$clientrekvizits = $_POST['clientrekvizits'];}
if (isset($_POST['clientfullname'])) {$clientfullname = $_POST['clientfullname'];}
if (isset($_POST['clientnum'])) {$clientnum = $_POST['clientnum'];}
if (isset($_POST['passwordold'])) {$passwordold = $_POST['passwordold'];}
if (isset($_POST['clientagree'])) {$clientagree = $_POST['clientagree'];}
if (isset($_POST['count'])) {$count = $_POST['count'];}
if (isset($_POST['recipient_stroka'])) {$recipient_stroka = $_POST['recipient_stroka'];}
if (isset($_POST['rec']))
     { 
	
          $recser=serialize($_POST['rec']); // прием созданного формой готового массива №2
		  $recbase=sort($recser);
		  
      $printrec=unserialize($recser);
	 
		 
     }
	





{
$query = "select *from clients where clientid='$clientname'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
 $clientid=$row["clientid"];
 $clientname=$row["clientname"];
 $clientaddress=$row["clientaddress"];
 $clientphone=$row["clientphone"];
 $clientmail=$row["clientmail"];
 $clientrekvizits=$row["clientrekvizits"];
 $clientfullname=$row["clientfullname"];
 $clientnum=$row["clientnum"];
 $clientagree=$row["clientagree"];
 $clientrec=$row["clientrec"];
 $clientmemo=$row["clientmemo"];
 }
echo "<div class='right'>

<script type='text/javascript' src='../js/jquery-1.3.2.js'></script>
<script src='../js/chekbox.js' type='text/javascript'>
</script><script src='../js/calend.js' type='text/javascript'></script>
<form method='post' action='' id='example_group1'>



Логин: <span style='font-weight: bold;
	
	font-size: 22px;
	
	color: #5671AD;'>$clientname</span><p>

Пароль <input name='passwordold' type='text' style='font-size:14px' value='$clientmemo'><p>
<hr><input name='clientname' type='hidden' value='$clientid'>
Изменить пароль <input name='password' type='text' style='font-size:14px'><p>
Пароль повторно <input name='pass2' type='text' style='font-size:14px'><p>
<hr>
Контактный телефон <input name='clientphone' type='text' style='font-size:14px' size='30' value='$clientphone'><p>
E-mail клиента <input name='clientmail' type='text' style='font-size:14px' size='30' value='$clientmail'><p>
Адрес заказчика <br><textarea name='clientaddress' type='textarea' style='font-size:14px' cols='50' rows='8'>$clientaddress</textarea><p>
Наименование ор-ции <input name='clientfullname' type='text' style='font-size:14px' size='50' value='$clientfullname'><p>
Реквизиты <br><textarea  name='clientrekvizits' style='font-size:14px' cols='50' rows='8'>$clientrekvizits</textarea><p>
Код заказчика <input name='clientnum' type='text' style='font-size:14px' size='50' value='$clientnum'><p>
Номер и дата договора <input name='clientagree' type='text' style='font-size:14px' size='50' value='$clientagree'><p>

<i><b>Пункты назначения согласно договору</b></i><p>";
 
 $query = "select * from clients where clientname='$clientname'";

 $result=mysql_query ($query);
while ($row=mysql_fetch_assoc ($result)) {
$num = mysql_num_rows($result);
$clientid=$row["clientid"];
$clientrec=unserialize($row["clientrec"]);
$clientrecsort=sort($clientrec);
$clientfilter=array_filter($clientrec);
$cutter=(":");
}

for ($i=0,$a=1; $i<count($clientrec); $i++,$a++) {
$client=explode(':', $clientfilter[$i]);

$recipview=($client[0] .$cutter. $client[1] .$cutter .$client[2] .$cutter. $client[3]);


echo "$a. $recipview<br>
";
}

echo "<hr><p><i>Добвавить к списку <b>$clientname</b> или удалить из списка</i><p>
<a rel='example_group1' href='#select_all'>Отметить все</a> :
<a rel='example_group1' href='#select_none'>Сбросить все</a><br>";
$query = "select * from recipients";

 $result=mysql_query ($query);

$num1 = mysql_num_rows($result);


$query = "select * from recipients order by reccity";

 $result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$recid=$row["recid"];
$recnamev=str_replace("'","`",$row["recname"]);
$recnameview=htmlspecialchars($recnamev);

$reccityview=htmlspecialchars($row["reccity"]);

$recaddressv=str_replace("'","",$row["recaddress"]);
$recaddressview=htmlspecialchars($recaddressv);

$recnumview=htmlspecialchars($row["recnum"]);

$recnam=str_replace("'","`",$row["recname"]);
$rname=str_replace('"',"",$recnam);
$recname=trim($rname);

$reccity= trim($row["reccity"]);

$recadd=str_replace("'","`",$row["recaddress"]);
$recaddres=str_replace('"',"",$recadd);
$recaddress=trim($recaddres);

$recnum=trim($row["recnum"]);
$recnick=($row["recnick"]);
$cutter=(":");
$rec1=$reccity.$cutter.$recname.$cutter.$recaddress.$cutter.$recnum;
$rec=strip_tags($rec1);
$recview=($reccityview .$cutter. $recnameview .$cutter .$recaddressview .$cutter. $recnumview);

  echo "<div id='recipients'>";

  if (in_array($rec, $clientrec)){


  echo "<input type='checkbox' name='rec[$recid]' value='$reccity:$recname:$recaddress:$recnum' checked> $reccityview:$recnameview:$recaddressview:$recnumview<br></div>"; 
  } else {
  
echo "<input type='checkbox' name='rec[$recid]' value='$reccity:$recname:$recaddress:$recnum'> $reccityview:$recnameview:$recaddressview:$recnumview<br></div>"; 
}
}




			
			

echo "<p><input type='submit' name = 'edit' value='Редактировать'/>
            
        </form>";
echo "</div>";
echo "<div class='client2'>РЕДАКТИРОВАНИЕ КАРТОЧКИ КЛИЕНТА

<form method='POST' action=''><select name='clientname' style='font-size:18px'><option value='' name='' style='font-size:20px'><span style='font-size:20px'></span></option>";
$query = "select * from clients where clientrank='0'";
$result=mysql_query ($query);
while ($row=mysql_fetch_array ($result)) {
$num = mysql_num_rows($result);
$clientid=$row["clientid"];
$clientname=$row["clientname"];
echo "<option value='$clientid' name='clientname'>$clientname</option>";
}
echo "</select><input name='select' type='submit' value='Выбрать из списка' style='font-size:18px'></div>";





}
} 

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