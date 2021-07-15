<?
 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
 $client = $_POST['client'];
 $clientname = $_POST['clientname'];
 $num = $_POST['num'];
$sendmoder = $_POST['sendmoder'];
$status = $_POST['status'];
$orderid = $_POST['orderid'];
$clientid = $_POST['clientid'];
$dateout= $_POST['dateout'];


$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$orderid' and orderstatus>'0' 
") or die (mysql_error());


		
while ($row = mysql_fetch_array ($result)){
$ordercsv=$row['ordercsv'];
$orderclient=$row['clientname'];
$orderid=$row['orderid'];
$orderstatus=$row['orderstatus'];

echo "<div class='row'><div class='field' style='width:40px; height:auto'>".$row['clientname']."</div>";

echo "<div class='field' style='width:40px; height:auto'>".$row['orderid']."</div>";


echo "<div class='field' style='width:60px; height:auto'>".$row['datein']."</div>
<div class='field' style='width:60px; height:auto'>".$row['dateout']."</div>
<div class='field' style='width:250px; height:auto'>";
echo "<a href='../csv/".$row['ordercsv']."'><img src='../images/icon_excel.png' border=0 alt='скачать заказ' title='скачать заказ' height=30 align='absmiddle'> - ".$row['ordercsv']."</a>";
echo "</div>";


if ($orderstatus=="10") {
echo "<div class='field' style='width:120px; height:auto'><form action='' method='post'>
<input type='hidden'  name='status' value='20'>
<input type='hidden'  name='date1' value='$date1'>
<input type='hidden'  name='date2' value='$date2'>
<input type='hidden'  name='client' value='$client'>
<input type='hidden'  name='clientname' value='$clientname'>
<input type='hidden'  name='num' value='$num'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
<input type='submit' name='premod' value='Принять'>
<br>Принять заказ на премодерацию
</form></div>";
}
if ($orderstatus=="20") {
echo "<div class='field' style='width:120px; height:auto'><form action='' method='post'>

<input type='hidden'  name='status' value='30'>
<input type='hidden'  name='date1' value='$date1'>
<input type='hidden'  name='date2' value='$date2'>
<input type='hidden'  name='client' value='$client'>
<input type='hidden'  name='clientname' value='$clientname'>
<input type='hidden'  name='num' value='$num'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>

<input type='submit' name='endpremod' value='Завершить'>
<br>Заказ в состоянии премодерации. Завершить премодерацию или
<input type='submit' name='deny' value='Отклонить'>
</form></div>";
}
if ($orderstatus=="30") {
echo "<div class='field' style='width:120px; height:auto; color:red'>

Заказ принят к исполнению ".$row['statusdate']."</div>";
}

if (empty($orderstatus)){
echo "<div class='field' style='width:80px; height:auto'></div>";
}else {

echo "<div class='field' style='width:80px; height:auto'><a href='../csv/$ordercsv'><img src='../images/icon_doc.png' border=0 alt='скачать заказ' title='скачать заказ'></a></div>";
}




if (empty($orderstatus)) {
echo "<div class='field' style='width:40px; height:auto'><input type='hidden' name='orderid' value='$orderid'><input type='hidden' name='orderclient' value='$orderclient'>
<input type='submit' class='sendok' name='path' value='1' alt='Подтвердить' title='Подтвердить' /></div>";
} else {
echo "<div class='field' style='width:40px; height:auto'></div>";
}
echo "<div class='field' style='width:40px; height:auto'><form action='' method='post'><input type='submit' class='senddel' name='del' value='$orderid' alt='Удалить' title='Удалить'/></form></div>
</div>";
}
 
echo "</div>";
?>