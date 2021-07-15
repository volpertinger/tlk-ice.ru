<?if (isset($_POST['go'])):?>
<?
if (isset($_POST['name'])) {$name = $_POST['name'];}
?>
Привет, <?=$name?>!
<?else:?>
<form action='test.php' method=post>
Ваше имя: <input type=text name='name'><br>
<input type=submit name=go value="Отослать!">
<?endif?>