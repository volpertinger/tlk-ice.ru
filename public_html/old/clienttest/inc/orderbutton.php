<?$day = date("w");
$time = date("H:i:s");
if (($day<7)&&($day>0)) {
echo "<div class='order'><form method='post' action='./makeorder.php'>
            <input type='submit' name = 'path' value='Сделать заказ'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>Сделать заказ</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>добро пожаловать!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='Выход'/>
            
        </form></div>";?>