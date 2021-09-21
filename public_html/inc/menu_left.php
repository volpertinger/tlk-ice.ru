<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <td width="240" height="400" valign="top" class='left_doc'>
<?
$file=stat("./doc/agree_tlk_iceberg.doc");
$agreeKb=round($file[7]/ 1048576 * 100) / 100 . " Мб";

$file2=stat("./doc/pallet_list.doc");
$palletKb=round($file2[7]/ 1048576 * 100) / 100 . " Мб";




echo "<p class='headblue'><u>НЕОБХОДИМАЯ ДОКУМЕНТАЦИЯ</u>
<p><span class='link'><a href='doc/agree_tlk_iceberg.doc' target='_blank'><img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> Договор об оказании транспортно-экспедиционных услуг
автомобильным транспортом ООО «ЛК Айсберг» ($agreeKb)</a></span></p>




</td>";

//<p><span class='link'><a href='doc/expedition.rtf' target='_blank'>
//<img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> Экспедиторская расписка (образец)</a></span></p>

//<p><span class='link'><a href='doc/pallet_list.doc' target='_blank'>
//<img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> Подписание конверта (образец)</a></span></p>

?>