<?

# Создание отчета




if($_POST['path']== "Отчет") {
$id = $_POST['orderid'];
$client = $_POST['client'];

$res = mysql_query("SELECT * FROM orderlist where ol_orderid ='$id' order by ol_city"); 
 $uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$umploaddir = "../csv";  
 $newname = date("dmYHis");

$name = ($clientid."_".$orderid."_".$dateout);
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


$query="update orders set 
ordercsv='$ordercsv'
where orderid='$id'";
$result=mysql_query ($query); 
 
echo "<div class='right'><span style='font-size:18px'><a href='$file'><img src='../images/icon_excel.png' border=0> скачать отчет по заказу $id от $client</a></span><br><hr></div>";
fclose($f); 




}




























if($_POST['path']== "Полный отчет клиента") {
$id = $_POST['orderid'];
$client = $_POST['client'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$all = ('all');
$result = mysql_query("SELECT * FROM orderlist where ol_clientname='$client'"); 

$uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$umploaddir = "../csv";  
 $newname = date("dmYHis");

$name = ($clientid."_".$newname."_".$all);
 $filen=("$uploaddir/$name".".csv");
  $file=("$umploaddir/$name".".csv");
   $ordercsv=("$name".".csv");
  copy($filen, $filen);
$f = fopen($filen, 'w'); 

$num = mysql_num_rows($result);
for ($x=0; $x<$num; $x++) {		
$ol=mysql_fetch_array ($result);

$rec="".$ol['ol_clientid'].";".$ol['ol_clientname'].";".$ol['ol_orderid'].";".$ol['ol_dateout'].";".$ol['ol_city'].";".$ol['ol_name'].";".$ol['ol_address'].";".$ol['ol_num'].";".$ol['ol_pallet'].";".$ol['ol_box'].";".$ol['ol_ves'].";".$ol['ol_summa'].";".$ol['ol_invoice'].";".$ol['ol_invoicedate']."";
$arrec=array($rec);


foreach ($arrec as $line) {

fputcsv($f, split(';',$line), ';');
}
}
 fclose($f);


$query="update clients set 
clientotchet='$ordercsv'
where clientname='$client'";
$result=mysql_query ($query); 
 
echo "<div class='right'><span style='font-size:18px'><a href='$file'><img src='../images/icon_excel.png' border=0> скачать отчет по всем заказам клиента $client</a></span><br><hr></div>";
fclose($f); 




}

























if($_POST['path']== "Сводный отчет") {
$id = $_POST['orderid'];
$client = $_POST['client'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$n = 1;
$date22 = date('Y-m-d', strtotime($date2.'+'.$n.' day'));
$nn = 1;
$date11 = date('Y-m-d', strtotime($date1.'-'.$nn.' day'));

$all = ('all_clients');
$result = mysql_query("SELECT * FROM orderlist where `ol_dateout`<='$date22'  and `ol_dateout`>='$date11'"); 

$uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$umploaddir = "../csv";  
 $newname = date("dmYHis");

$name = ($all."_".$date1."-".$date2);
 $filen=("$uploaddir/$name".".csv");
  $file=("$umploaddir/$name".".csv");
   $ordercsv=("$name".".csv");
  copy($filen, $filen);
$f = fopen($filen, 'w'); 

$num = mysql_num_rows($result);
for ($x=0; $x<$num; $x++) {		
$ol=mysql_fetch_array ($result);

$rec="".$ol['ol_clientid'].";".$ol['ol_clientname'].";".$ol['ol_orderid'].";".$ol['ol_dateout'].";".$ol['ol_city'].";".$ol['ol_name'].";".$ol['ol_address'].";".$ol['ol_num'].";".$ol['ol_pallet'].";".$ol['ol_box'].";".$ol['ol_ves'].";".$ol['ol_summa'].";".$ol['ol_invoice'].";".$ol['ol_invoicedate']."";
$arrec=array($rec);


foreach ($arrec as $line) {

fputcsv($f, split(';',$line), ';');
}
}
 fclose($f);

$query="INSERT INTO otchet SET 
otchetfile='$ordercsv',
otchetclient='$all'";
$result=mysql_query ($query); 
 
echo "<div class='right'><span style='font-size:18px'><a href='$file'><img src='../images/icon_excel.png' border=0> скачать сводный отчет с $date1 по $date2</a></span><br><hr></div>";
fclose($f); 




}





















if($_POST['path']== "Сводный отчет клиента") {
$id = $_POST['orderid'];
$client = $_POST['client'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$n = 1;
$date22 = date('Y-m-d', strtotime($date2.'+'.$n.' day'));
$nn = 1;
$date11 = date('Y-m-d', strtotime($date1.'-'.$nn.' day'));


$result = mysql_query("SELECT * FROM orderlist where ol_clientname='$client' and `ol_dateout`<='$date22'  and `ol_dateout`>='$date11'"); 

$uploaddir = "/home/u205995/tlk-ice.ru/www/client/csv";
$umploaddir = "../csv";  
 $newname = date("dmYHis");

$name = ($client."_".$date1."-".$date2);
 $filen=("$uploaddir/$name".".csv");
  $file=("$umploaddir/$name".".csv");
   $ordercsv=("$name".".csv");
  copy($filen, $filen);
$f = fopen($filen, 'w'); 

$num = mysql_num_rows($result);
for ($x=0; $x<$num; $x++) {		
$ol=mysql_fetch_array ($result);

$rec="".$ol['ol_clientid'].";".$ol['ol_clientname'].";".$ol['ol_orderid'].";".$ol['ol_dateout'].";".$ol['ol_city'].";".$ol['ol_name'].";".$ol['ol_address'].";".$ol['ol_num'].";".$ol['ol_pallet'].";".$ol['ol_box'].";".$ol['ol_ves'].";".$ol['ol_summa'].";".$ol['ol_invoice'].";".$ol['ol_invoicedate']."";
$arrec=array($rec);


foreach ($arrec as $line) {

fputcsv($f, split(';',$line), ';');
}
}
 fclose($f);
 
$query="INSERT INTO otchet SET 
otchetfile='$ordercsv',
otchetclient='$client'
";
$result=mysql_query ($query); 

echo "<div class='right'><span style='font-size:18px'><a href='$file'><img src='../images/icon_excel.png' border=0> скачать отчет по заказам клиента $client с $date1 по $date2</a></span><br><hr></div>";
fclose($f); 


}