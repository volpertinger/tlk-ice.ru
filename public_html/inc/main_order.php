
    <td valign="top" class='main'><p class="headliner">������-������ on-line</p>
    
      





<?if (isset($_POST['go'])):{?>
<?
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['mess'])) {$mess = $_POST['mess'];}

if (isset($_POST['fio'])) {$fio = $_POST['fio'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['net'])) {$net = $_POST['net'];}
if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['srok'])) {$srok = $_POST['srok'];}
if (isset($_POST['kolvo'])) {$kolvo = $_POST['kolvo'];}
if (isset($_POST['price'])) {$price = $_POST['price'];}
if (isset($_POST['acount'])) {$acount = $_POST['acount'];}
if (isset($_POST['merch'])) {$merch = $_POST['merch'];}
if (isset($_POST['freq'])) {$freq = $_POST['freq'];}
if (isset($_POST['vol'])) {$vol = $_POST['vol'];}
if (isset($_POST['temp'])) {$temp = $_POST['temp'];}
if (isset($_POST['weight'])) {$weight = $_POST['weight'];}


$to = "devman@tlk-ice.ru"; /*������� ���� �����!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "������ �������. $name";
$subject=convert_cyr_string($sub,'w','k');
$date = "����: ".date("Y-m-d (H:i:s)",time())."\r\n";

$message = "$date
\n1. ��: $name
\n2. �����: $mess
\n3. ���������� ����: $fio
\n4. $email
\n�������: $tel
\n5. �������� (����): $net 
\n6. ������ ��������: $city 
\n7. �������� ������: $srok 
\n8. ���������� ������������: $kolvo 
\n9. ������� ��������� �� ��: $price
\n10. �������������� ������ �� ���������: $acount
\n11. ������������� ��������������: $merch
\n12. ������� ��������: $freq
\n13. ����� ��������: $vol
\n14. ������������� �����: $temp
\n15. ������� ��� �������: $weight";





$view = "$date<br>���� ��������: $name <br>E-mail: $email <br>�������: $tel";
$send = mail ($to, $subject, $message, $headers);
if ($send == 'true')
{
echo "$fio, c������ �� �������� ������ ���������!<br>� ��������� ����� �� ����������� �� ���� ������ � ������ 
���������� �� ������� �� ��� ���� � �������� ���������������<p>";
echo "<br>$view";
}
else 
{
echo "<p><b>������. ��������� �� ����������!";
}
}

?>
<?else:?>
<p>���������� ��� ��������� ������ ��� ��������� �������� ��������, 
<br> ����������� ��� ����� ������� ������� ������ � ��������� ��������������. </p>
      <p>

<p style='color:#FF0000'>* ����, ������������ ��� ����������</p>



<form method='post' action='order.php' onsubmit='return checkForm(this);'>
<strong>������������ �����������:</strong><br />
<input type='text' name='name' size='40'/>*
<br />
�����:<br />
<textarea name='mess' rows='2' cols='30'></textarea>*<br />

���������� ���� (���, ���������):<br />
<input type='text' name='fio' size='40'/>
<br />

���������� �������:<br />
<input type='text' name='tel' size='30'/><br />

���������� e-mail:<br />
<input name='email' type='text' size='30' />*
<br />

�������� ����:</u><br />

<select size='1' name='net'>
<option value=''></option>
<option value='����� ��� ��� �����'>����� ��� ��� �����</option>
<option value='����� ��� ��� �����'>����</option>
<option value='����� ��� ��� �����'>��������</option>
<option value='����� ��� ��� �����'>�����������</option>
</select>
<br />

� ����� ������ �������������� ��������:<br />
<textarea name='city' rows='2' cols='30'></textarea><br />

�������� ������ (����������� ���� ��������):<br />
<input type='text' name='srok' size='30'/>
<br />

������������� ����� (�� � �� &deg;�):<br />
<input type='text' name='temp' size='30'/>
<br />

���������� ������������ ������:<br />
<input type='text' name='kolvo' size='30'/>
<br />

������� ��������:<br />
<input type='text' name='freq' size='30'/>
<br />
������� ��������� ��������� �� 1 ��:<br />
<input type='text' name='price' size='30'/>
<br />


�������������� �������� ����� �� � ������:</strong><br />
<input type='text' name='vol' size='30'/>
<br />

������� ��� �������:<br />
<input type='text' name='weight' size='30'/>
<br />

������������� ��������������:<br />

<select size='1' name='merch'>
<option value=''></option>
<option value='��, ����� ������'>��, ����� ������</option>
<option value='��� �������������'>��� �������������</option>
</select>


<br />


�������������� ������ ����� �� ���������:<br />
<select size='1' name='acount'>
<option value=''></option>
<option value='�� 1 ��'>�� 1 ��</option>
<option value='�� 1 ������'>�� 1 ������</option>
<option value='% �� �����-�������'>% �� �����-�������</option>
<option value='����'>����</option>
</select>


<p>
<input type='submit' name=go value='��������� ������'/>
</p>
</form>
<?endif?>






      <p class="headliner">&nbsp;</p>
    </td>
  </tr>
</table>