<?php /* Выше этой строки в файле ничего не должно быть */

# Шаблон формы обратной связи.

   $pattern=<<<connect_form

===cashe===
<script type="text/javascript">
function Form_Validator(theForm) {
===script_heart===
    return true;
}
</script>

<div class="prima">===title===</div>
<form id="connect" method="post" onsubmit="return Form_Validator(this);">
   <input name="session" type="hidden" value="===key_code===">
   <label>===name===</label>
      <input class="name" type="text" class="but" name="===name_field===" value="===name_value===">
      <br class="clear">
   <label>===email===</label>
      <input class="email" type="text" class="but" name="===email_field===" value="===email_value===">
      <br class="clear">
   <label>===subject===</label>
      <input class="tema" type="text" class="but" name="===subject_field===" value="===subject_value===">
      <br class="clear">
   <label>===code===</label>
      <input class="cod" type="text" class="but" maxlength="7" name="===code_value===">
      <img src="email.htm?k====key===&" alt="cod">
      <br class="clear">
   <textarea name="===message===" rows="5" cols="7" class="but" wrap="virtual">===message_value===</textarea>
      <br class="clear">
   <input class="submit" type="submit" class="but" value="===submit===">
      <br class="clear">
   <dl class="prim">===warning===</dl>
</form>

connect_form;



#  Шаблон письма админу:

   $email_to_admin=<<<email

<div style="text-indent:1em;margin:0;font-family:verdana,arial,sans-serif;font-size:11;font-weight:normal;">
   <br>Subject: ===subject===
   <br>From:      ===from===
   <br>Email:     ===email===
   <br>Date:      ===date===
   <br>
   <br>===message===
   <br>
   <br>IP-Adresse: ===ip===
   <br>Browser: ===user_agent===
   <br>SendPage: ===refer===
</div>

email;



# Шаблон рапорта на экран:

   $report=<<<report

<p>===send===</p>
	
<pre style="font:11px/1.18 verdana,arial,helvetica,sans-serif;">

   Subject: ===subject===
   From:    ===from===
   Email:   ===email===
   Date:    ===date===


</pre>

<ul>
   <ul>===message===</ul>
</ul>

report;

/* Ниже этой строки в файле ничего не должно быть. */ ?>