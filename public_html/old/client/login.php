<?php
include('./inc/head.php')
?>


<?

// Страница авторизации



# Функция для генерации случайной строки

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}

?>

<?php
include('./inc/connect.php')
?>
<?
if(isset($_POST['submit']))

{

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysql_query("SELECT clientid, clientpass FROM clients WHERE clientname='".mysql_real_escape_string($_POST['login'])."' and clientrank='0' LIMIT 1");

    $data = mysql_fetch_assoc($query);

    

    # Соавниваем пароли

    if($data['clientpass'] === md5(md5($_POST['password'])))

    {

        # Генерируем случайное число и шифруем его

        $hash = md5(generateCode(10));

            

        if(!@$_POST['not_attach_ip'])

        {

            # Если пользователя выбрал привязку к IP

            # Переводим IP в строку

            $insip = ", clientip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";

        }

        

        # Записываем в БД новый хеш авторизации и IP

        mysql_query("UPDATE clients SET clienthash='".$hash."' ".$insip." WHERE clientid='".$data['clientid']."'");

        

        # Ставим куки

        setcookie("id", $data['clientid'], time()+60*60*24*30);
		setcookie("rank", $rank['clientrank'], time()+60*60*24*30);

        setcookie("hash", $hash, time()+60*60*24*30);

        

        # Переадресовываем браузер на страницу проверки нашего скрипта

        header("Location: index.php"); exit();

    }

    else

    {

        print "<div class='auth' align='center'>Вы ввели неправильный логин/пароль</div>";

    }

}

?>
<div class='client'><span style='font-size:30px; color:#DFE3F0'>АВТОРИЗАЦИЯ</span></div>
<div class='auth'><div align='center'><form id='form' method="POST">

<span style='color:#666'>Логин </span><input name="login" type="text" style='font-size:24px'><br />

<span style='color:#666'>Пароль</span> <input name="password" type="password" style='font-size:24px'><br />

<span style='font-size:18px; color:#999'>Чужой компьютер</span> <input type="checkbox" name="not_attach_ip" style='font-size:24px'><br />

<input name="submit" type="submit" value="Войти" style='font-size:20px'>

</form></div></div>