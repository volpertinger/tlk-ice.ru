<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="240" height="400" valign="top" class='left_doc'>
<?
$file=stat("./doc/agreement_standart.doc");
$agreeKb=round($file[7]/ 1048576 * 100) / 100 . " 提";

$file2=stat("./doc/pallet_list.doc");
$palletKb=round($file2[7]/ 1048576 * 100) / 100 . " 提";

$file3=stat("./doc/ustav.pdf");
$file3Kb=round($file3[7]/ 1048576 * 100) / 100 . " 提";

$file4=stat("./doc/ucard.pdf");
$file4Kb=round($file4[7]/ 1048576 * 100) / 100 . " 提";

$file5=stat("./doc/nalog.pdf");
$file5Kb=round($file5[7]/ 1048576 * 100) / 100 . " 提";

$file6=stat("./doc/gosreg.pdf");
$file6Kb=round($file6[7]/ 1048576 * 100) / 100 . " 提";



echo "<p class='headblue'><u>团瘟瘴娜汤� 奈视膛鸵乐冗</u>
<p><span class='link'><a href='doc/agreement_standart.doc' target='_blank'><img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> 念泐忸� 钺 铌噻囗梃 蝠囗耧铕蝽�-耧邃桷桀眄 篑塍�
噔蝾祛徼朦睇� 蝠囗耧铕蝾� ($agreeKb)</a></span></p>
<p><span class='link'><a href='doc/order.doc' target='_blank'>
<img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> 青�怅� (钺疣珏� 潆� 玎镱腠屙��)</a></span></p>

<p><span class='link'><a href='doc/pallet_list.doc' target='_blank'>
<img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> 相腚弪睇� 腓耱 ($palletKb)</a></span></p>

<p class='headblue'><u>玉蜞忭 漕牦戾眚� 挝� 耸 篱襻屦�</u>
    
<p><span class='link'><a href='doc/ustav.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> 玉蜞� ($file3Kb)</a></span></p>

<p><span class='link'><a href='doc/ucard.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> 喻弪磬� 赅痱铟赅 ($file4Kb)</a></span></p>

<p><span class='link'><a href='doc/nalog.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> 砚桎弪咫蜮� � 镱耱囗钼赍 磬 篦弪 � 磬腩泐忸� 耠箧徨 ($file5Kb)</a></span></p>

<p><span class='link'><a href='doc/gosreg.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> 砚桎咫蜮� � 泐耋溧瘃蜮屙眍� 疱汨耱疣鲨� ($file6Kb)</a></span></p>


</td>";

?>