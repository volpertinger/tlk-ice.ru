<link href="favicon.ico" type="image/x-icon" rel="icon">
<link href="favicon.ico" type="image/x-icon" rel="shortcut icon">

<link rel="stylesheet" href="css/fancy.css" type="text/css" media="screen">	

<link href="css/style.css" type="text/css" rel="StyleSheet">






<script type="text/javascript"><!--
function checkForm(obj){
var return_value = true;
// ������� �������� ���� �������� ���� � ���������� mail
var mail = obj.email.value;
// ������� �������� ���� ����������� � ���������� sender
var sender = obj.name.value;
// ������� �������� ���� ��������� � ���������� msg
var msg = obj.mess.value;
// ���������� ��������� ��� �������� ��������� ����� 
var reg_mail = /[0-9a-z_]+@[0-9a-z_^.]+.[a-z]{2,3}/i;
// ���������� ��������� ��� �������� �����������
var reg_sender = /[a-z]+/i;
// ��������� ����������, ���� ����� ���������� ����� ��������� �� ������
var error_msg = "����������� ��������� ����: ";
//�������� ���� ������������ �����������
if(reg_sender.exec(sender) == null && sender ==""){
error_msg += "���� ��� ";
return_value = false;
}
//�������� ���� �������� ����
if(reg_mail.exec(mail) == null){
error_msg += "��� e-mail ";
return_value = false;
}
//�������� ���� �����
if(msg == ""){
error_msg += "��� ����� ";
return_value = false;
}
//�������� �� ������� ������, ���� �������� ������, ������� ����� ���������
if(!return_value)
alert(error_msg); 
return return_value;
}//-->
</script>


</head>