<?
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
WHERE `clientname` ='$user' and `dateout`<='$date2'  and `dateout`>='$date1' and orderstatus='30'
") or die (mysql_error());


while ($row = mysql_fetch_array ($result)){
$date=$row['orderdate']; 
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
WHERE `clientname` ='$user' and `dateout`<='$date2'  and `dateout`>='$date1'  and orderstatus='30' order by dateout desc
") or die (mysql_error());

	
while ($row = mysql_fetch_array ($result)){
$orderstatus=$row['orderstatus'];
$order=$row['orderid'];	 
	 

echo "<div class='row'><div class='field' style='width:40px'>".$row['clientname']."</div>
<div class='field' style='width:40px'>".$row['orderid']."</div>
<div class='field' style='width:60px'>".$row['datein']."</div>
<div class='field' style='width:60px'>".$row['dateout']."</div>
<div class='field' style='width:220px; height:auto'>";

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
� ����. ".$ol['ol_invoice']." �� ".$ol['ol_invoicedate']."<br>";

}
echo "</div>";

if (empty($orderstatus)) {
echo "<div class='field' style='width:120px; height:auto'>
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
<input type='submit' name='sendmoder' value='���������'>
<br>���� ����� ��������, �� ������ ��������� ��� �� ������������, ����� ���� ��� ����� ����� �������� ��� ����������
</form></div>";
} 
if ($orderstatus=="5") {
echo "<div class='field' style='width:120px; height:auto'>
����� �".$row['orderid']." �� ".$row['dateout']." �������� �����������. 
";
}
if ($orderstatus=="10") {
echo "<div class='field' style='width:120px; height:auto'>
����� �".$row['orderid']." �� ".$row['dateout']." ��������� �� ������������. 
�������� ��� ���������� <a href='./csv/".$row['ordercsv']."'>".$row['ordercsv']."</a></div>";
}
if ($orderstatus=="20") {
echo "<div class='field' style='width:120px; height:auto'>
� �������� ������������ � ".$row['statusdata']."
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
��� ������������� �� ������ ������ ��������� � ����� � ������ ��������������, ����� ���� ��������� ��������
<input type='submit' name='sendmoder' value='���������'>
</form></div>";
}
if ($orderstatus=="30") {
echo "<div class='field' style='width:120px; height:auto'>
����� ������ � ����������� ".$row['statusdata']."</div>";
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
if (empty($orderstatus) or ($orderstatus=="5") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder2.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>
<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='�������������' /></form></div>";
} 

if ($orderstatus=="30") {
echo "<div class='field' style='width:40px; height:auto'>�������������� ���������� � ������ �������</div>";
}

echo "


</div>";

}
echo "</div>";

		
    }
# ����� ������

} else {

$result = mysql_query("SELECT* 
FROM `orderid` 
WHERE `orderid` ='$num' and clientname='$user'  and orderstatus='30' order by dateout desc
") or die (mysql_error());

while ($row = mysql_fetch_array ($result)){

$number=$row['ordernum'];
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
WHERE `orderid` ='$num' and clientname='$user'  and orderstatus='30'
") or die (mysql_error());


		
while ($row = mysql_fetch_array ($result)){

echo "<div class='row'><div class='field' style='width:40px'>".$row['clientname']."</div>
<div class='field' style='width:40px'>".$row['orderid']."</div>
<div class='field' style='width:60px'>".$row['datein']."</div>
<div class='field' style='width:60px'>".$row['dateout']."</div>
<div class='field' style='width:220px; height:auto'>";


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
� ����. ".$ol['ol_invoice']." �� ".$ol['ol_invoicedate']."<br>";

}
echo "</div>";

if (empty($orderstatus)) {
echo "<div class='field' style='width:120px; height:auto'>
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
<input type='submit' name='sendmoder' value='���������'>
<br>���� ����� ��������, �� ������ ��������� ��� �� ������������, ����� ���� ��� ����� ����� �������� ��� ����������
</form></div>";
} 
if ($orderstatus=="5") {
echo "<div class='field' style='width:120px; height:auto'>
����� �".$row['orderid']." �� ".$row['dateout']." �������� �����������. 
";
}
if ($orderstatus=="10") {
echo "<div class='field' style='width:120px; height:auto'>
����� �".$row['orderid']." �� ".$row['dateout']." ��������� �� ������������. 
�������� ��� ���������� <a href='./csv/".$row['ordercsv']."'>".$row['ordercsv']."</a></div>";
}
if ($orderstatus=="20") {
echo "<div class='field' style='width:120px; height:auto'>
� �������� ������������ � ".$row['statusdata']."
<form action='' method='post'>
<input type='hidden'  name='status' value='10'>
<input name='dateout' type='hidden' value='".$row['dateout']."'>
<input type='hidden'  name='orderid' value='".$row['orderid']."'>
<input name='clientid' type='hidden' value='".$row['clientid']."'>
��� ������������� �� ������ ������ ��������� � ����� � ������ ��������������, ����� ���� ��������� ��������
<input type='submit' name='sendmoder' value='���������'>
</form></div>";
}
if ($orderstatus=="30") {
echo "<div class='field' style='width:120px; height:auto'>
����� ������ � ����������� ".$row['statusdata']."</div>";
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
if (empty($orderstatus) or ($orderstatus=="5") or  ($orderstatus=="10") or ($orderstatus=="20")) {
echo "<div class='field' style='width:40px; height:auto'>
<form action='./makeorder2.php' method='post' id=".($n+1).">
<input name='orderdate2' type='hidden' value='".$row['datein']."'>
<input name='date2' type='hidden' value='".$row['dateout']."'>
<input name='orderclient' type='hidden' value='".$row['clientname']."'>
<input type='submit' class='sendedit' name='orderid' value='".$row['orderid']."' alt='�������������' /></form></div>";
} 

if ($orderstatus=="30") {
echo "<div class='field' style='width:40px; height:auto'>�������������� ���������� � ������ �������</div>";
}

echo "


</div>";

}
echo "</div>";
}
}
?>