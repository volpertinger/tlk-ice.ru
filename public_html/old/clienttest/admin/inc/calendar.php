<?
// Страница редактирования списка получателей


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


# Кнопка выхода

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


// Просмотр последней записи
if (empty($_POST['submit'])){
$client = $_POST['client'];

$result = mysql_query("SELECT DISTINCT `reccity` FROM recipients") or die (mysql_error());


while ($row = mysql_fetch_array ($result)){

$reccity=$row['reccity'];

print "<div class='right'>$reccity<br>";

}


 



$result = mysql_query("SELECT * FROM calendar order by calenddate limit 1")or die (mysql_error());
while ($row = mysql_fetch_array ($result)){
$calenddate=$row['calenddate'];
}
if (empty($calenddate)){

echo "База не содержит записей";

} else {
echo "$calenddate";
}
echo "</div>";
}
}
} 
else

{

    print "Включите куки";
header("Location: login.php"); exit();
}

?>