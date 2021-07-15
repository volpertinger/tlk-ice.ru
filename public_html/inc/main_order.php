
    <td valign="top" class='main'><p class="headliner">Анкета-заявка on-line</p>
    
      





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


$to = "devman@tlk-ice.ru"; /*УКАЗАТЬ СВОЙ АДРЕС!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$sub = "Анкета клиента. $name";
$subject=convert_cyr_string($sub,'w','k');
$date = "Дата: ".date("Y-m-d (H:i:s)",time())."\r\n";

$message = "$date
\n1. От: $name
\n2. Адрес: $mess
\n3. Контактное лицо: $fio
\n4. $email
\nТелефон: $tel
\n5. Магазины (сети): $net 
\n6. Города поставки: $city 
\n7. Характер товара: $srok 
\n8. Количество наименований: $kolvo 
\n9. Средняя стоимость за кг: $price
\n10. Предполагаемый расчет за логистику: $acount
\n11. Необходимость мерчендайзинга: $merch
\n12. Частота поставок: $freq
\n13. Объем поставок: $vol
\n14. Температурный режим: $temp
\n15. Средний вес паллета: $weight";





$view = "$date<br>Ваша компания: $name <br>E-mail: $email <br>Телефон: $tel";
$send = mail ($to, $subject, $message, $headers);
if ($send == 'true')
{
echo "$fio, cпасибо за отправку Вашего сообщения!<br>В ближайшее время мы отреагируем на Вашу заявку и вышлем 
информацию по тарифам на Ваш груз и условиям транспортировки<p>";
echo "<br>$view";
}
else 
{
echo "<p><b>Ошибка. Сообщение не отправлено!";
}
}

?>
<?else:?>
<p>Предлагаем Вам заполнить анкету для уточнения ключевых моментов, 
<br> необходимых для более точного расчёта ставок и успешного сотрудничества. </p>
      <p>

<p style='color:#FF0000'>* поля, обязательные для заполнения</p>



<form method='post' action='order.php' onsubmit='return checkForm(this);'>
<strong>Наименование организации:</strong><br />
<input type='text' name='name' size='40'/>*
<br />
Адрес:<br />
<textarea name='mess' rows='2' cols='30'></textarea>*<br />

Контактное лицо (ФИО, должность):<br />
<input type='text' name='fio' size='40'/>
<br />

Контактный телефон:<br />
<input type='text' name='tel' size='30'/><br />

Контактный e-mail:<br />
<input name='email' type='text' size='30' />*
<br />

Торговая сеть:</u><br />

<select size='1' name='net'>
<option value=''></option>
<option value='Метро Кэш энд Керри'>Метро Кэш энд Керри</option>
<option value='Метро Кэш энд Керри'>Ашан</option>
<option value='Метро Кэш энд Керри'>Зельгрос</option>
<option value='Метро Кэш энд Керри'>Гиперглобус</option>
</select>
<br />

В какие города предполагаются поставки:<br />
<textarea name='city' rows='2' cols='30'></textarea><br />

Характер товара (минимальный срок годности):<br />
<input type='text' name='srok' size='30'/>
<br />

Температурный режим (от и до &deg;С):<br />
<input type='text' name='temp' size='30'/>
<br />

Количество наименований товара:<br />
<input type='text' name='kolvo' size='30'/>
<br />

Частота поставок:<br />
<input type='text' name='freq' size='30'/>
<br />
Средняя стоимость продукции за 1 кг:<br />
<input type='text' name='price' size='30'/>
<br />


Предполагаемый месячный объем кг и паллет:</strong><br />
<input type='text' name='vol' size='30'/>
<br />

Средний вес паллета:<br />
<input type='text' name='weight' size='30'/>
<br />

Необходимость мерчендайзинга:<br />

<select size='1' name='merch'>
<option value=''></option>
<option value='да, нужна услуга'>да, нужна услуга</option>
<option value='нет необходимости'>нет необходимости</option>
</select>


<br />


Предполагаемый расчет услуг за логистику:<br />
<select size='1' name='acount'>
<option value=''></option>
<option value='за 1 кг'>за 1 кг</option>
<option value='за 1 паллет'>за 1 паллет</option>
<option value='% от счета-фактуры'>% от счета-фактуры</option>
<option value='иное'>иное</option>
</select>


<p>
<input type='submit' name=go value='Отправить анкету'/>
</p>
</form>
<?endif?>






      <p class="headliner">&nbsp;</p>
    </td>
  </tr>
</table>