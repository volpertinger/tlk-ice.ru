<?if (isset($_POST['go'])):?>
<?
if (isset($_POST['name'])) {$name = $_POST['name'];}
?>
������, <?=$name?>!
<?else:?>
<form action='test.php' method=post>
���� ���: <input type=text name='name'><br>
<input type=submit name=go value="��������!">
<?endif?>