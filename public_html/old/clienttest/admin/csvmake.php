<?header( 'Content-Type: text/html; charset=windows-1251' );?>
<?php
include('./inc/head.php')
?>
<?php
include('./inc/connect.php')
?>
<?php
include('./inc/menu_left.php')
?>



<?
// �������� ���������


# ���������� � ��





// ������ ��������
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   
if(isset($_POST['sum_exit'])){
setcookie("id", "", time() - 3600);

        
		setcookie("hash", "", time() - 3600);
                header("Location: login.php"); exit();
				
				return false;
            }
    $query = mysql_query("SELECT *,INET_NTOA(clientip) FROM clients WHERE clientid = '".intval($_COOKIE['id'])."' and clientrank='777' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);


   if(($userdata['clienthash'] !== $_COOKIE['hash']) or ($userdata['clientid'] !== $_COOKIE['id'])
   )


    {

        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        print "";
		header("Location: login.php"); exit();
    }

    else

    {



# ������ ������

		# ������ ������

$day = date("w");
$time = date("H:i:s");
if (($day<8)&&($day>0)) {
echo "<div class='order'><form method='post' action='./register.php'>
            <input type='submit' name = 'path' value='�������������� ������ ������������'/>
            
        </form></div>";
		}
		else {
		echo "<div class='order'><button disabled='disabled' style='width:150px'/>�������������� ������ ������������</button></div>";
		}
		

        print "<div class='client_enter'>".$userdata['clientname'].", <i><span style='font-size:18px'>����� ����������!</span></i></div>";
echo "<div class='exit'><form method='post' action=''>
            <input type='submit' name = 'sum_exit' value='�����'/>
            
        </form></div><div class='client'>���� ���� �������</div><div class='right'>";


// ��������� ����� ���� ������ �� �������




$res = mysql_query("SELECT * FROM orderlist order by ol_dateout desc"); 


 $uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$umploaddir = "../csv";  
 $newname = date("dmYHis");

$name = ('order_baze');
 $filen=("$uploaddir/$name".".csv");
  $file=("$umploaddir/$name".".csv");
   $ordercsv=("$name".".csv");
  copy($filen, $filen);
$f = fopen($filen, 'w'); 

$num = mysql_num_rows($res);
for ($x=0; $x<$num; $x++) {		
$ol=mysql_fetch_array ($res);

$rec="".$ol['ol_clientid'].";".$ol['ol_clientname'].";".$ol['ol_orderid'].";".$ol['ol_dateout'].";".$ol['ol_city'].";".$ol['ol_name'].";".$ol['ol_address'].";".$ol['ol_num'].";".$ol['ol_pallet'].";".$ol['ol_box'].";".$ol['ol_ves'].";".$ol['ol_summa'].";".$ol['ol_invoice'].";".$ol['ol_invoicedate']."";
$arrec=array($rec);


foreach ($arrec as $line) {

fputcsv($f, split(';',$line), ';');

}
}
 fclose($f); 
$file=stat('../csv/order_baze.csv');
$filename = '../csv/order_baze.csv';
if (file_exists($filename)) {
   

echo "<span style='font-size:18px'><a href='../csv/order_baze.csv'><img src='../images/icon_excel.png' border=0> ������� ����� �������</a></span><br>";
 echo "<i>� ��������� ��� ���� <b>order_baze.csv</b> ��� �������: </i>" . date ("d F Y H:i:s.",
filemtime($filename));
} 
 
 echo "</div></div>";

}




}
 
else

{

    print "�������� ����";
header("Location: login.php"); exit();
}

?>




<?php
include('./inc/end.php')
?>