<?$day = date("w");
$time = date("H:i:s");
if (($day<7)&&($day>0)) {
echo "<div class='order'><form method='post' action='./makeorder.php'>
            <input type='submit' name = 'path' value='������� �����'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>������� �����</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>����� ����������!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='�����'/>
            
        </form></div>";?>