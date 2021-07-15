

<?

// Скрипт проверки


# Соединямся с БД

@ $db=mysql_pconnect('u205995.mysql.masterhost.ru', 'u205995_leole', 'unha7edne3lass');


$hostname = "u205995.mysql.masterhost.ru";
$username = "u205995_leole";
$password = "unha7edne3lass";
$dbName = "u205995_2";
mysql_select_db("u205995_2");

$link = mysql_connect('u205995.mysql.masterhost.ru', 'u205995_leole', 'unha7edne3lass') or die("Не могу соединиться");
mysql_select_db($dbName, $link) or die("Не могу выбрать базу");
mysql_query("SET NAMES 'cp1251';"); 
mysql_query("SET CHARACTER SET 'cp1251';"); 
mysql_query("SET SESSION collation_connection = 'cp1251_general_ci';"); 
?>