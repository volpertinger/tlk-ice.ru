<?php
include('./inc/head.php')
?>


<?

// �������� �����������



# ������� ��� ��������� ��������� ������

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}

?>

<?php
include('./inc/connect.php')
?>
<?
if(isset($_POST['submit']))

{

    # ����������� �� �� ������, � ������� ����� ���������� ����������

    $query = mysql_query("SELECT clientid, clientpass FROM clients WHERE clientname='".mysql_real_escape_string($_POST['login'])."' and clientrank='0' LIMIT 1");

    $data = mysql_fetch_assoc($query);

    

    # ���������� ������

    if($data['clientpass'] === md5(md5($_POST['password'])))

    {

        # ���������� ��������� ����� � ������� ���

        $hash = md5(generateCode(10));

            

        if(!@$_POST['not_attach_ip'])

        {

            # ���� ������������ ������ �������� � IP

            # ��������� IP � ������

            $insip = ", clientip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";

        }

        

        # ���������� � �� ����� ��� ����������� � IP

        mysql_query("UPDATE clients SET clienthash='".$hash."' ".$insip." WHERE clientid='".$data['clientid']."'");

        

        # ������ ����

        setcookie("id", $data['clientid'], time()+60*60*24*30);
		setcookie("rank", $rank['clientrank'], time()+60*60*24*30);

        setcookie("hash", $hash, time()+60*60*24*30);

        

        # ���������������� ������� �� �������� �������� ������ �������

        header("Location: index.php"); exit();

    }

    else

    {

        print "<div class='auth' align='center'>�� ����� ������������ �����/������</div>";

    }

}

?>
<div class='client'><span style='font-size:30px; color:#DFE3F0'>�����������</span></div>
<div class='auth'><div align='center'><form id='form' method="POST">

<span style='color:#666'>����� </span><input name="login" type="text" style='font-size:24px'><br />

<span style='color:#666'>������</span> <input name="password" type="password" style='font-size:24px'><br />

<span style='font-size:18px; color:#999'>����� ���������</span> <input type="checkbox" name="not_attach_ip" style='font-size:24px'><br />

<input name="submit" type="submit" value="�����" style='font-size:20px'>

</form></div></div>