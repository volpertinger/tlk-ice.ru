<?

// Скрипт проверки




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
	
	// Тело программы после авторизации
	
	# Кнопка заказа

$day = date("w");
$time = date("H:i:s");
if (($day<6)&&($day>0)) {
echo "<div class='order'><form method='post' action='./makeorder.php'>
            <input type='submit' name = 'path' value='Сделать заказ'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>Сделать заказ</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>добро пожаловать!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='Выход'/>
            
        </form></div>";
		
		# Левое меню
		
		include('./inc/menu_left.php');


echo "<div class='client'>ШАГ 1. Дата отгузки на склад ЛК</div><div class='right'><i>Пожалуйста, правильно указывайте дату желаемой отгрузки</i><p>";

$datetime_today = date("d-m-Y H:i:s");
$datesimple_today = date("Y-m-d");
$today = date("d-m-Y");
echo "<script src='./js/calend.js' type='text/javascript'></script>
<form method='post' action='./makeorder2.php' style='font-size:14px; color:#666'>
            <i>Дата <input style='font-size:12px' disabled='disabled' name='date' type='text' size='30' value='".$datetime_today."'><br>
			<span style='color:red'>Дата отгрузки на склад ЛК </span><input type='text' name='date1' value='".$today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\"><br>
			<input name='orderdate' type='hidden' value='".$datetime_today."'>
			<input name='orderdatesimple' type='hidden' value='".$datesimple_today."'>
			Клиент <input style='font-size:12px' name='orderclient' type='text' value='".$userdata['clientname']."' size='40'><br>
			Тип перевозки <input style='font-size:12px' name='ordertype' type='text' value='Продукты питания' size='35'><br>
			t режим <input style='font-size:12px' name='orderterm' type='text' value='+2С-+6С'><br>
			
			Склад (наименование) <input style='font-size:12px' name='orderstore' type='text' value='Айсберг-Амурская'  size='30'><br>
			<p><input type='submit' name = 'path' value='Выбор получателей груза'/>";
	

header("Location: ./makeorder.php");
# Закрываем основное поле
echo "</div>";
echo "</div>";



} } 
else

{

    print "Включите куки";
header("Location: login.php"); exit();
}
		
		?>