<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <td width="240" height="400" valign="top" class='left_doc'>
<?
$file=stat("./doc/agreement_standart.doc");
$agreeKb=round($file[7]/ 1048576 * 100) / 100 . " ��";

$file2=stat("./doc/pallet_list.doc");
$palletKb=round($file2[7]/ 1048576 * 100) / 100 . " ��";

$file3=stat("./doc/ustav.pdf");
$file3Kb=round($file3[7]/ 1048576 * 100) / 100 . " ��";

$file4=stat("./doc/ucard.pdf");
$file4Kb=round($file4[7]/ 1048576 * 100) / 100 . " ��";

$file5=stat("./doc/nalog.pdf");
$file5Kb=round($file5[7]/ 1048576 * 100) / 100 . " ��";

$file6=stat("./doc/gosreg.pdf");
$file6Kb=round($file6[7]/ 1048576 * 100) / 100 . " ��";



echo "<p class='headblue'><u>����������� ������������</u>
<p><span class='link'><a href='doc/agreement_standart.doc' target='_blank'><img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> ������� �� �������� �����������-�������������� �����
������������� ����������� ($agreeKb)</a></span></p>
<p><span class='link'><a href='doc/order.doc' target='_blank'>
<img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> ������ (������� ��� ����������)</a></span></p>

<p><span class='link'><a href='doc/pallet_list.doc' target='_blank'>
<img src='images/doc.png' width=30 height=30 border=0 align='absbottom'> ��������� ���� ($palletKb)</a></span></p>

<p class='headblue'><u>�������� ��������� ��� �������</u>
    
<p><span class='link'><a href='doc/ustav.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> ����� ($file3Kb)</a></span></p>

<p><span class='link'><a href='doc/ucard.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> ������� �������� ($file4Kb)</a></span></p>

<p><span class='link'><a href='doc/nalog.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> ������������� � ���������� �� ���� � ��������� ������ ($file5Kb)</a></span></p>

<p><span class='link'><a href='doc/gosreg.pdf' target='_blank'>
<img src='images/pdf.png' width=30 height=30 border=0 align='absbottom'> ����������� � ��������������� ����������� ($file6Kb)</a></span></p>


</td>";

?>