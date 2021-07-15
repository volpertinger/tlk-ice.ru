<link href="favicon.ico" type="image/x-icon" rel="icon">
<link href="favicon.ico" type="image/x-icon" rel="shortcut icon">

<link rel="stylesheet" href="css/fancy.css" type="text/css" media="screen">	

<link href="css/style.css" type="text/css" rel="StyleSheet">






<script type="text/javascript"><!--
function checkForm(obj){
var return_value = true;
// заносим значение поля почтовый ящик в переменную mail
var mail = obj.email.value;
// заносим значение поля отправитель в переменную sender
var sender = obj.name.value;
// заносим значение поля сообщение в переменную msg
var msg = obj.mess.value;
// регулярное выражение для проверки почтового ящика 
var reg_mail = /[0-9a-z_]+@[0-9a-z_^.]+.[a-z]{2,3}/i;
// регулярное выражение для проверки отправителя
var reg_sender = /[a-z]+/i;
// объявляем переменную, куда будет заноситься текст сообщения об ошибке
var error_msg = "Некорректно заполнены поля: ";
//проверка поля наименование организации
if(reg_sender.exec(sender) == null && sender ==""){
error_msg += "Ваше имя ";
return_value = false;
}
//проверка поля почтовый ящик
if(reg_mail.exec(mail) == null){
error_msg += "Ваш e-mail ";
return_value = false;
}
//проверка поля адрес
if(msg == ""){
error_msg += "Ваш адрес ";
return_value = false;
}
//проверка на наличие ошибок, если возникла ошибка, выводим текст сообщения
if(!return_value)
alert(error_msg); 
return return_value;
}//-->
</script>


</head>