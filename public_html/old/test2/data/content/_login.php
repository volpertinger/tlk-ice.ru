<?php /* Выше этой строки в файле ничего не должно быть */

# Форма авторизации без использования HTTP-аутентификации.

   $l_title=$_s['lang'][$_s['settings']['lang']]['login_title'];
   $l_login=$_s['lang'][$_s['settings']['lang']]['login_login'];
   $l_password=$_s['lang'][$_s['settings']['lang']]['login_password'];
   $l_submit=$_s['lang'][$_s['settings']['lang']]['login_submit'];
   
   $content=<<<loginform

<form id="login_form" title="Login" target="_self" method="POST">
   <h3>$l_title</h3>
   <label>$l_login</label><input type="text" name="login" class="text" title="$l_login">
   <label>$l_password</label><input type="password" name="passw" class="text" title="$l_password">
   <input type="submit" class="submit" value="$l_submit" title="$l_submit">
</form>

loginform;

   unset($l_title,$l_login,$l_password,$l_submit);

/* Ниже этой строки в файле ничего не должно быть. */ ?>