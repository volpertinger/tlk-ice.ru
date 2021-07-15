<?
$date_today = date("d-m-Y");
		echo "
		
<div class='search'>

<script src='./js/calend.js' type='text/javascript'></script>
<form method='post' action=''>
<p><big>Показать заказы за период:</big><br>
с <input type='text' name='date1' value='".$date_today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\">
по <input type='text' name='date2' value='".$date_today."' onfocus=\"this.select();lcs(this)\"
	onclick=\"event.cancelBubble=true;this.select();lcs(this)\">
	<input type='hidden' name='user' value='".$userdata['clientname']."'>
</p>
<p><b>или искать по номеру заказа: <br><input type='text' name='num' value=''>
<input type='submit' name = 'path' value='Поиск заказов'/>
</form>

</div>
";	
?>