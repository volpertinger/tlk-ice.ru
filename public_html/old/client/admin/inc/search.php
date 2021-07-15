<?
$date_today = date("d-m-Y");
		echo "
		
<div class='right'>

<script src='../js/calend.js' type='text/javascript'></script>
<form method='post' action=''>
<p><big>ѕоказать заказы за период:</big><br>
с <input type='text' name='date1' value='".$date_today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\">
по <input type='text' name='date2' value='".$date_today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\">";
	echo "<p>ќт клиента: <select size='1' name='clientname'>
	<option value=''></option>";
	$result = mysql_query("SELECT* 
FROM `clients` where clientrank='0' order by clientname") or die (mysql_error());
	while ($row = mysql_fetch_array ($result)){
	
	echo "
<option value='".$row['clientname']."'>".$row['clientname']."</option>";
}

echo "</select>
	
	
</p>";
echo "<p><b>или искать по номеру заказа: <input type='text' name='num' value=''></p>";
echo "<p>или показать все заказы клиента <select size='1' name='client'>
	<option value=''></option>";
	$result = mysql_query("SELECT* 
FROM `clients` where clientrank='0' order by clientname") or die (mysql_error());
	while ($row = mysql_fetch_array ($result)){
	
	echo "
<option value='".$row['clientname']."'>".$row['clientname']."</option>";
}

echo "</select>
	
	
</p>


<p><input type='submit' name = 'path' value='ѕоиск клиента'/>
</form>

</div>
";	
?>