<?

# ����� �� �����
if (isset($_POST['date1'])) {$date1 = $_POST['date1'];}
if (isset($_POST['date2'])) {$date3 = $_POST['date2'];


$n = 0;
$date2 = date('Y-m-d', strtotime($date3.'+'.$n.' day'));
$nn = 0;
$date1 = date('Y-m-d', strtotime($date1.'-'.$nn.' day'));

}
if (isset($_POST['user'])) {$user = $_POST['user'];}
if (isset($_POST['num'])) {$num = $_POST['num'];}
if (empty($_POST['num'])){

$result = mysql_query("SELECT * 
FROM `orderid` 
WHERE `clientname` ='$user' and `datein`<='$date2'  and `datein`>='$date1'
") or die (mysql_error());


while ($row = mysql_fetch_array ($result)){
$date=$row['datein']; 
}
if (empty($date)){

print "<div class='field_top' style='width:300px'>�� ������ ������ ������� �� �������</div>";
include('./inc/search.php');
 

echo "</div>";
} else {
include('./inc/search.php');
include('./inc/table_top.php');

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `clientname` ='$user' and `datein`<='$date2'  and `datein`>='$date1' 
order by datein desc
") or die (mysql_error());	
while ($row = mysql_fetch_array ($result)){

$statusdate=$row['statusdate'];
$orderstatus=$row['orderstatus'];
$order=$row['orderid'];	 
	 

echo "<div class='row'><div class='field' style='width:40px'>".$row['clientname']."</div>
<div class='field' style='width:40px'>".$row['orderid']."</div>
<div class='field' style='width:60px'>".$row['datein']."</div>";
$dateout=$row['dateout'];
$actual = date("Y-m-d");
if ($dateout<=$actual) {
echo "<div class='field' style='width:60px; height:auto; color:red;'>�� ���������<br>".$row['dateout']."</div>";
} else {
echo "<div class='field' style='width:60px; height:auto'>".$row['dateout']."</div>";
}
echo "<div class='field_order'>";

$query = mysql_query("select * 
from orderlist 
where ol_orderid='$order' 
order by ol_city") 
or die (mysql_error());

$num = mysql_num_rows($query);
for ($n=0; $n<$num; $n++) {		
$ol=mysql_fetch_array ($query);

echo "".($n+1).". <b><span style='text-transform:uppercase'>".$ol['ol_city']."</span></b>:".$ol['ol_name'].":".$ol['ol_address'].":".$ol['ol_num']."<br>
<b>".$ol['ol_dateout']."</b> - ��� ".$ol['ol_ves']." ��, ����� ".$ol['ol_pallet']." ������, 
������� ".$ol['ol_box']." ��., ����� ".$ol['ol_summa']." ���.<br>
TTH � ".$ol['ol_invoice']." �� ".$ol['ol_invoicedate']."<br>";

}
echo "</div>";

if (($dateout<=$actual) and ($orderstatus=="30")) {


echo "<div class='field' style='width:120px; height:auto; color:green'>������, � ������<br> ".$row['statusdate']."</div>";



} 
if (($dateout<=$actual) and ($orderstatus!=="30")) {

echo "<div class='field' style='width:120px; height:auto; color:red;'>�� ���������<br>".$row['dateout']."</div>";




} 
if ($dateout>$actual) {
if (empty($orderstatus)) {
echo "<div class='field' style='width:120px; height:auto'>
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
<input type='submit' name='sendmoder' value='���������'>
<br>���� �� ������, ��������� ����� �� ������������. <u>�������� ��� ���������� ������ ����� ��������!</u>
</form></div>";
} 
if ($orderstatus=="5") {
echo "<div class='field' style='width:120px; height:auto; color:red;'>
����� �".$row['orderid']." �� ".$row['dateout']." �������� �����������. 
";
}

if ($orderstatus=="15") {
echo "<div class='field' style='width:120px; height:auto; color:blue;'>
����� �".$row['orderid']." �� ".$row['dateout']." ��� ������� $statusdate. 
�������� ��� ���������� <a href='./csv/".$row['ordercsv']."'>".$row['ordercsv']."</a></div>";
}
if ($orderstatus=="10") {
echo "<div class='field' style='width:120px; height:auto; color:blue;'>
����� �".$row['orderid']." �� ".$row['dateout']." ��������� �� ������������. 
�������� ��� ���������� <a href='./csv/".$row['ordercsv']."'>".$row['ordercsv']."</a></div>";
}
if ($orderstatus=="20") {
echo "<div class='field' style='width:120px; height:auto; color:green;'>
� �������� ������������ � ".$row['statusdata']."
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
�� ������ ������ ��������� (������ ��������������) � ��������� ��������
</form></div>";
}
if ($orderstatus=="30") {
echo "<div class='field' style='width:120px; height:auto; color:red;'>
����� ������ � ����������� ".$row['statusdata']."</div>";
}
}
if (empty($orderstatus)) {
echo "<div class='field' style='width:80px; height:auto'></div>";
} else {

echo "
<div class='field' style='width:80px; height:auto'><form action='./order_for_print.php' target=_blank method='post'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input type='submit' name='' value='������' alt='������' /></form></div>";
}


if (empty($orderstatus) or ($orderstatus=="5") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'><form action='' method='post'><input type='submit' class='senddel' name='del' value='".$row['orderid']."' alt='�������' /></form></div>";
} else {
echo "<div class='field' style='width:40px; height:auto'></div>";
}
if (($orderstatus=="5") or ($orderstatus=="15") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder22.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>

<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='�������������' /></form></div>";
} else {
if (empty($orderstatus)) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder2.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>

<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='�������������' /></form></div>";
} else {

echo "<div class='field' style='width:40px; height:auto'></div>";
}
}



echo "


</div>";

}
echo "</div>";
}
		
    
# ����� ������ �� ������

} else {

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$num' and clientname='$user'
") or die (mysql_error());

while ($row = mysql_fetch_array ($result)){

$number=$row['orderid'];
}
if (empty($number)){
print "<div class='field_top' style='width:300px'>�������� ����� ������, �$num �� ������</div>";
include('./inc/search.php');
 

echo "</div>";
} else {

include('./inc/search.php');
include('./inc/table_top.php');
	
$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$num' and clientname='$user'
") or die (mysql_error());
		
while ($row = mysql_fetch_array ($result)){

echo "<div class='row'><div class='field' style='width:40px'>".$row['clientname']."</div>
<div class='field' style='width:40px'>".$row['orderid']."</div>
<div class='field' style='width:60px'>".$row['datein']."</div>";
$actual = date("Y-m-d");
$dateout=$row['dateout'];
if ($dateout<=$actual) {
echo "<div class='field' style='width:60px; height:auto; color:red;'>�� ���������<br>".$row['dateout']."</div>";
} else {
echo "<div class='field' style='width:60px; height:auto'>".$row['dateout']."</div>";
}
echo "<div class='field_order'>";


$query = mysql_query("select * 
from orderlist 
where ol_orderid='".$row['orderid']."' 
order by ol_city") 
or die (mysql_error());

$num = mysql_num_rows($query);
for ($n=0; $n<$num; $n++) {		
$ol=mysql_fetch_array ($query);

echo "".($n+1).". <b><span style='text-transform:uppercase'>".$ol['ol_city']."</span></b>:".$ol['ol_name'].":".$ol['ol_address'].":".$ol['ol_num']."<br>
<b>".$ol['ol_dateout']."</b> - ��� ".$ol['ol_ves']." ��, ����� ".$ol['ol_pallet']." ������, 
������� ".$ol['ol_box']." ��., ����� ".$ol['ol_summa']." ���.<br>
��� � ".$ol['ol_invoice']." �� ".$ol['ol_invoicedate']."<br>";

}
echo "</div>";


if (($dateout<=$actual) and ($orderstatus=="30")) {


echo "<div class='field' style='width:120px; height:auto; color:green'>������, � ������<br> ".$row['statusdate']."</div>";



} 
if (($dateout<=$actual) and ($orderstatus!=="30")) {

echo "<div class='field' style='width:120px; height:auto; color:red;'>�� ���������<br>".$row['dateout']."</div>";




} 
if ($dateout>$actual) {
if (empty($orderstatus)) {
echo "<div class='field' style='width:120px; height:auto'>
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
<input type='submit' name='sendmoder' value='���������'>
<br>���� �� ������, ��������� ����� �� ������������. <u>�������� ��� ���������� ������ ����� ��������!</u>
</form></div>";
} 
if ($orderstatus=="5") {
echo "<div class='field' style='width:120px; height:auto; color:red;'>
����� �".$row['orderid']." �� ".$row['dateout']." �������� �����������. 
";
}
if ($orderstatus=="10") {
echo "<div class='field' style='width:120px; height:auto; color:blue;'>
����� �".$row['orderid']." �� ".$row['dateout']." ��������� �� ������������. 
�������� ��� ���������� <a href='./csv/".$row['ordercsv']."'>".$row['ordercsv']."</a></div>";
}
if ($orderstatus=="20") {
echo "<div class='field' style='width:120px; height:auto; color:green;'>
� �������� ������������ � ".$row['statusdata']."
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
�� ������ ������ ��������� (������ ��������������) � ��������� ��������
</form></div>";
}
if ($orderstatus=="30") {
echo "<div class='field' style='width:120px; height:auto; color:red;'>
����� ������ � ����������� ".$row['statusdata']."</div>";
}
}

if (empty($orderstatus)) {
echo "<div class='field' style='width:80px; height:auto'></div>";
} else {

echo "
<div class='field' style='width:80px; height:auto'><form action='./order_for_print.php' target=_blank method='post'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input type='submit' name='' value='������' alt='������' /></form></div>";
}


if (empty($orderstatus) or ($orderstatus=="5") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'><form action='' method='post'><input type='submit' class='senddel' name='del' value='".$row['orderid']."' alt='�������' /></form></div>";
} else {
echo "<div class='field' style='width:40px; height:auto'></div>";
}
if (($orderstatus=="5") or ($orderstatus=="15") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder22.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>

<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='�������������' /></form></div>";
} else {
if (empty($orderstatus)) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder2.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>

<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='�������������' /></form></div>";
} else {

echo "<div class='field' style='width:40px; height:auto'></div>";
}
}

echo "


</div>";

}
echo "</div>";
}
		
  
}
?>