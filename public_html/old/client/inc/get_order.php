<? echo "<div class='row'><form action='' method='post'><div class='field' style='width:50px; height:auto'>".$row['orderclient']."</div>";
if (empty($orderstatus)) {

echo "<div class='field' style='width:50px; height:auto'><input name='number' type='text' style='font-size:12px' size='7'></div>";
}else{
echo "<div class='field' style='width:50px; height:auto'>".$row['ordernum']."</div>";
}

echo "<div class='field' style='width:70px; height:auto'>".$row['orderdate']."</div>
<div class='field' style='width:70px; height:auto'>".$row['ordertransdate']."</div>
<div class='field' style='width:200px; height:auto'>".$row['ordercomment']."</div>";
if (empty($orderstatus)) {
echo "<div class='field' style='width:80px; height:auto'><input type='' class='sendnone' name='none' value='1' alt='������� ���������' title='������� ���������' /></div>";
} else {
echo "<div class='field' style='width:80px; height:auto'><input type='' class='sendok' name='none' value='1' alt='����� ������' title='����� ������' /></div>";
}
echo "
<div class='field' style='width:80px; height:auto'></div>
<div class='field' style='width:80px; height:auto'>
";

if (empty($orderstatus)) {
echo "<input type='hidden' name='orderid' value='$orderid'><input type='hidden' name='orderclient' value='$orderclient'>
<input type='submit' class='sendok' name='path' value='1' alt='�����������' title='�����������' />";
} else {
echo "";
}

echo "<input type='submit' class='senddel' name='del' value='$orderid' alt='�������' title='�������'/>
</form>
</div>
</div>";

} 
echo "</div>";?>