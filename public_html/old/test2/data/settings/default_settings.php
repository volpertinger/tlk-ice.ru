<?php

# ���� ���������� ��������.
# ����� ������ ���������� �� ����.
# ���������� � ����� setup.htm ������ ����� (��� ������������) � ������������ �� ���.

   global $rndstr;
   
   $ptn=array(

"settings"=>array(
   "t"=>"��������� ��������� CMS",
   "lang"=>array(
      "t"=>"
         ���� ����������:",
      "v"=>"
         ru����������
         en�������������",
   ),
   "title"=>array(
      "t"=>"
         �������� �����:",
      "v"=>"
         title���Lasto Nano CMS <span>����������� ������</span>",
   ),
   
   strrnd("abs")=>"�����������: �����, ������, �����.",
   "login"=>array(
      "t"=>"
         ����� ��������������:",
      "v"=>"
         login���no",
   ),
   "passw"=>array(
      "t"=>"
         ������ ��������������:",
      "v"=>"
         passw���no",
   ),
   "auth_http"=>array(
      "t"=>
         "������ ����������� ������.
         ��������:
         HTTP: ��� �� ������� ������ ���� ������� ��� ������ �����.
         ���� - ������� �� ������ ������������, � �������� ����������.",
      "v"=>"
         no���HTTP �����������
         ok�������������� ���",
   ),

   strrnd("abs")=>"��������������� ������ ��� ��������� ��������:",
   "master"=>array(
      "t"=>"
         ��� ��������������",
      "v"=>"
         master������� ���",
   ),
   "email"=>array(
      "t"=>"
         e-mail �������������� (����� �� �����):",
      "v"=>"
         email���my@email.ru",
   ),
   "pepetun"=>array(
      "t"=>"
         ��������� ���� ��������:",
      "v"=>"
         pepetun���qqqqqqqqq",
   ),
),




"lang"=>array(
   "t"=>"�������� ��������� ����",
   "ru"=>array(
      "t"=>
         "�������� ��������� � ������� ����=��������
               
         ���� ����� �������� ��������� �����, �����, �������.
         ������� �� �����������.
               
         ��������- ����� �������, �������������� �� ����������.
         ��� ������� ����� ������������ � ��� ����� � � ���� HTML :)
               
         ���� ����=�������� ������������ � ���� ������.
         ����� ����� � �������� ������ ����� ������� ��������� ������, 
         �� ������� ���������� ��������� ����� �� ��������� �� ������.
               
         ����� �� ������������� ����������� ��� ����������� ��������� ����������- 
         ��� ��������� �� ����������� ���������� � ������������.
      ",
      "ta"=>"
         lang���ru
         panel���<h1 class='panel'>===h1===</h1>
         document_not_found���<h1 class='panel'>�������� �� ������.</h1>
         module_not_found��������� ===mod=== �� ������.
         login_no_title��������� �����������.
         login_no_content���<h1 class='panel'>�� �� ������������.</h1>
         login_no_http_h1���<h1 class='panel'>����������� �� ������.</h1>
         login_first��������� <a href='Login.htm'>������������</a>
         login_title�������������� ��� ������:
         login_login��������:
         login_password���������:
         login_submit�����������������
         login_ok_title�������������� ������������.
         login_ok_content���<h1 class='panel'>�� ������������.</h1>
         logout_ok_title�������������� �������.
         logout_ok_content���<h1 class='panel'>����������� ���������.</h1>
         logout_http_title������������� ����������� ����������.
         logout_http_content���<h1 class='panel'>��� ������������ ����������� �������� <u>���</u> ���� ��������.</h1>",

   ),
   "en"=>array(
      "t"=>"
         �� �� �����, ��� ����������� ������:",
      "ta"=>"
         lang���en
         panel���<h1 class='panel'>===h1===</h1>
         document_not_found���<h1 class='panel'>Document not found.</h1>
         module_not_found���Module ===mod=== not found.
         login_no_title���Access absent.
         login_no_content���<h1 class='panel'>You are not authorized.</h1>
         login_no_http_h1���<h1 class='panel'>Authorization failed.</h1>
         login_first���<a href='Login.htm'>Login</a> first.
         login_title���Login to admin:
         login_login���Login:
         login_password���Password:
         login_submit���Authorize
         login_ok_title���Authorization implemented.
         login_ok_content���<h1 class='panel'>You are logged.</h1>
         logout_ok_title���Authorization closed.
         logout_ok_content���<h1 class='panel'>Authorization completed.</h1>
         logout_http_title���Completion of authorization impossible.
         logout_http_content���<h1 class='panel'>For resorption authorization <u>close all</u> browser window.</h1>",
   ),

   strrnd("abs")=>"����� �������� �����, ������� ����:",         
   "connect_ru"=>array(
      "t"=>"��������� ����� �������� �����:",
      "ta"=>"
         title�������� � ������� ����� 
         email_wrong���<script>alert('���������� email');</script><p><span style='color:red'>Email ��������� ��� ����������.</span></p><br>
         hacker��������� ����� ������� �� ��������������.
         nohost�������� ����������� ���� �� ���� ������.
         limit���<h1 class='panel'>����� � ������������.</h1><p>����� ������� ����������� ��������� ����������� ������ ����� ����������.</p>
         send���<h1 class='panel'>���� ��������� ������� � ���������� ��������:</h1>
         h1�������� �������� ����� � ������������ �����:
         name������� ��� :
         email������ email :
         subject������� ������:
         message�������� :
         code������ :
         submit�����������
         warning���<dt style='font-weight:bold;text-align:center;'>��� ���� ����������� ��� ����������!</dt>",
   ),

   "connect_ru_fields"=>array(
      "t"=>"
         ����������� ��������� ����� �������� �����:",
      "ta"=>"
         UserName�������������, ������� ���� ���.
         UserEmail����� ������ ������� ���� email �����.
         Subject��������������� � ����� ������ ���������.
         UserComments����� �� ��������� ���� �����������.
         secretcode�������� ������������ � ���� ����� ���������� ������� � ��������.",
   ),

   strrnd("abs")=>"����� �������� �����, ���������� ����:",      
   "connect_en"=>array(
      "t"=>"��������� ����� �������� �����:",
      "ta"=>"
         title���Contacts with Admin of 
         comment���Contacts with Autor of Comment in 
         email_wrong���<script>alert('email is not valid');</script><p><span style='color:red'>Email rejected as invalid.</span></p><br>
         hacker���This method is not supported.
         nohost���This form is valid only from blog directory.
         limit���<h1 class='panel'>Number of attempts is limited.</h1>
         send���<h1 class='panel'>Your message is send to:</h1>
         h1���Contact form :
         name���Name:
         email���email:
         subject���Subject:
         message���Message:
         code���Code:
         submit���submit
         warning���All fields are required!",
   ),

   "connect_en_fields"=>array(
      "t"=>"
         ����������� ��������� ����� �������� �����:",
      "ta"=>"
         UserName���Enter your Name.
         UserEmail���You must enter your email.
         Subject���Subject of your letter.
         UserComments���Textfield is empty.
         secretcode���Tape numerics into box.",
   ),

   strrnd("abs")=>"��������� ����� ����������:",    
   "stats_ru"=>array(
      "t"=>"������� ����:",
      "ta"=>"
         title������������� ������� ��������� �� ����.
         no_stats������������� ��������.
         no_logs������ �������, ���������������� �������� �� ��������.
         camouflage�������������� ���
         sw��������� ������������ [web], �����:
         visitors������������� �����.
         bots����������� ��� ����.
         se����������, ��������� � �����������.
         rss����������� ������� �� RSS ������, �����:
         users��������������� RSS �������.
         agregators������������ RSS ����.
         sm����������� ������ ����� [web], ���������:
         email_hits����������� �� ��������� �������� �������� (email ������).
         main������������� ���������� �������:
         table��������===��������===���������
         pages��������������� �������:
         source������� ������ (����� ������� � ���� ��������):
         agent����������������� ��������� ����� � ���������:
         rss_agent����������������� RSS ����������� � ��������� �����:
         se_trafic������������� ������� �
         se_hits��������:
         total��������:
         positions����������:
         shown�����������:
         failed���<h1 class='panel'>������ � ������� ��������� �����������.</h1>
         stat_https������������ ������",
   ),

   "stats_en"=>array(
      "t"=>"
         ���������� ����:",
      "ta"=>"
         title���Statistics of outdoors visits to blog.
         no_stats���Statmodule is off.
         no_logs���Filtred traffic is empty.
         camouflage���camouflated as
         sw���Logs of visits [web], hits:
         visitors���visitors.
         bots���recognized as bots.
         se���visitors from search engines.
         rss���Dinamic of RSS traffic, hits:
         users���users of RSS readers.
         agregators���search RSS bots.
         sm���mail traffic [web], transfers:
         email_hits���transfer from email servers accounts (email traffic).
         main���Statistics of SE traffic:
         table���hits===quiries===search engine
         pages���Page popularity :
         source���Our friends (transfers from these sites):
         agent���IDs of search bots and user agents:
         rss_agent���IDs of search bots and RSS agregators:
         se_trafic���Statistic of transfers from
         se_hits���hits:
         total���Total:
         positions���Positions:
         shown���Shown:
         failed���<h1 class='panel'>Access to this document is missing.</h1>
         stat_https���not provided",
   ),
),





"stats"=>array(
   "t"=>"��������� ������ ����������",
   strrnd("subkey")=>"visibility",
   "popingues"=>array(
      "t"=>"
         ���������� ������:",
      "v"=>"
         ok��� �����������
         no������������",
   ),
   "http_in"=>array(
      "t"=>"������ http �������:",
      "v"=>"
         ok��� ����������
         no���������",
   ),
   "rss_in"=>array(
      "t"=>"
         ������ ������� �� RSS ������ (�� ������������):",
      "v"=>"
         no��� ����������
         ok���������",
   ),
   "email_in"=>array(
      "t"=>"
         ������ ������� � �������� ��������:",
      "v"=>"
         no��� ����������
         ok���������",
   ),
   "search_engines"=>array(
      "t"=>"
         ����������� �� ������ �� ���������� �� ��������� �����������.
         ��� ������������ � ������� ������ ������ �������:",
      "v"=>"
         no��� �����������
         ok������������",
   ),

   strrnd("abs")=>"Noindex � Nofollow ��� ��������� ����� ������ � �������� �����:",
   "statmodule_noindex"=>array(
      "t"=>"
         �������� ������ �� ������� �� ����������:",
      "v"=>"
         ok��� ��������� � noindex
         no����������� ��������",
   ),
   "statmodule_nofollow"=>array(
      "t"=>"
         �� ��, ��� ������ �����������:",
      "v"=>"
         ok��� ��������� nofollow
         no����������� ��������",
   ),

   strrnd("abs")=>"������ ���������� �������:",
   strrnd("keysval")=>"on",
   "noshowpages"=>array(
      "t"=>"��������� ����� �������, ������� �� ���������� � ���������� ���������:",
      "ta"=>"
         connect����� ���������� ��������� � ����� �������� �����.
         login����������� ��� ������������� � ���������� ������ ������
         stat������� �� �� ������� ����� ����� :)
         _Remark������������ �������� ������� ���������������
         index��� ",
   ),
   strrnd("keysval")=>"off",

   strrnd("abs")=>"������ ��� ������ ��������� ��������:",      
   strrnd("subkey")=>"se",
   "min_hits"=>array(
      "t"=>"����������� ���������� <u>�����</u> � ����������, ����������� ��� ������������ ���������� �� ����:",
      "v"=>"
         min_hits���3",
   ),
   "min_requests"=>array(
      "t"=>"
         ����� <u>��������� ��������</u>, ����������� ��� ���������� ���� ��������� ������� � �������:",
      "v"=>"
         min_requests���3",
   ),

   strrnd("abs")=>"�������������� ������� ���������� ��� <u>������</u>:",
   strrnd("subkey")=>"table_length_admin",
   "pages-a"=>array(
      "t"=>"������ ���������� �������",
      "v"=>"
         pages���20",
   ),
   "source-a"=>array(
      "t"=>"
         ������ ������ �����",
      "v"=>"
         source���20",
   ),
   "agent-a"=>array(
      "t"=>"
         ���������� http ������",
      "v"=>"
         agent���20",
   ),
   "rss_agent-a"=>array(
      "t"=>"
         ���������� RSS ������",
      "v"=>"
         rss_agent���20",
   ),
   "se_requests-a"=>array(
      "t"=>"
         ������ ���������� ��������",
      "v"=>"
         se_requests���30",
   ),

   strrnd("abs")=>"�������������� ������� ���������� ��� <u>�������</u>:",
   strrnd("subkey")=>"table_length_seffer",
   "pages-s"=>array(
      "t"=>"������ ���������� �������",
      "v"=>"
         pages���0",
   ),
   "source-s"=>array(
      "t"=>"
         ������ ������ �����",
      "v"=>"
         source���0",
   ),
   "agent-s"=>array(
      "t"=>"
         ���������� http ������",
      "v"=>"
         agent���20",
   ),
   "rss_agent-s"=>array(
      "t"=>"
         ���������� RSS ������",
      "v"=>"
         rss_agent���0",
   ),
   "se_requests-s"=>array(
      "t"=>"
         ������ ���������� ��������",
      "v"=>"
         se_requests���20",
   ),

   strrnd("abs")=>"��������� ��� ������� �������:",
   strrnd("subkey")=>"periods",
   "se_log"=>array(
      "t"=>"�� ������� ���� ������ ����������:",
      "v"=>"
         se_log���30",
   ),
   "se_reindex"=>array(
      "t"=>"
         ������ ������������ ����������, � �����:",
      "v"=>"
         se_reindex���1",
   ),
   "pages_cash_time"=>array(
      "t"=>"
         ����� ����������� ���������� ���������� � �����.
         ���� ������� ����, ����������� �� �����.",
      "v"=>"
         pages_cash_time���0",
   ),
   strrnd("subkey")=>"time_limit",
   "max_se_execute"=>array(
      "t"=>"
         ��������������� �������:
         ���� ����� ���������� ������� ���������� ���������� ��������� �������� (� ��������), ������� ���� ��������, �������� <u>�������</u> �������� ����� ��������.",
      "v"=>"
         max_se_execute���20",
   ),
   strrnd("subkey")=>"options",
   "type"=>array(
      "t"=>"
         ��� ���������� (�� ��������):",
      "v"=>"
         type���Nano",
   ),
   "threshold_filter"=>array(
      "t"=>"
         ������ ��������� ��������� ��������.
         ������� �� ������� �������� ������ � ���� �� ���������� ������� ���������� ��� �� �������� ����������� ����������. 
         ���� ������� �������, ����� �������� �������� ���� ��������� � ���� �������. ���� ������- ������ �� ��������, �� ������� �� ��������� ����� ���� ��� � ����� ���������. � ��� �����.",
      "v"=>"
         threshold_filter���1",
   ),

   strrnd("abs")=>"��������� ��������� ���� ����������:",
   "stat_log"=>array(
      "t"=>"���� ����� �� �����������:",
      "ta"=>"
         cashe���./data/logs/
         rss���hits.rss.db
         log���hits.http.db
         me���hits.mem.db
         se_log���search.db
         sim_sim���update",
   ),

   strrnd("abs")=>"��� ���� ����� ���� ������ ��� ���������� �����:",
   "files"=>array(
      "t"=>
         "������ ���� ����� ������� �� ������� ����� CMS, ������� <u>���������</u> 
         ���� �� ����, � ������������ ������������ ��� ��������� �����, 
         ������� �� ����� ��������, ��������, � ������ �������.
         
         �������� ��������, ���� ������ ���������, �� ����������:",
      "ta"=>"
         signatures���./data/settings/stat_signatures.php",
   ),
),




"softbans"=>array(
   "t"=>"������ ����",
   strrnd("keysval")=>"on",
   "host"=>array(
      "t"=>"�������� �� \"������ �����\" ���������� ������ �� �����/IP.
      
         ������ ������, ������� �� ������������ � \"������� �����\".
         ��� �� �����, �� ������� �� �� ������ ���������.
         ��� ������� ������ ������� ������� � \"������� �����\".
         
         ���������: ����� � ���� ��������� �� �����.",
      "ta"=>"
         badsite.ru���
         clck.yandex.ru���",
   ),
   "ip"=>array(
      "t"=>"
         ��������� ������, ������� �� ������������ � \"������� �����\".
         ������ ��������� �������� ������ �������� �� ���� ������� �������.
         �������, ��� ��� ��� ����� � ����� ���������.
         � ������� ����� ���������� ��� � ������� ������� <a href='http://2ip.ru/lookup.php' target='_blank'>2ip.ru</a> � ��������� ����, ��� �������� ��� ������ � ���� ���������, � ������������������� � ���������� ������.
         
         ���������: �������� � ���� ��������� �� �����.",
      "ta"=>"
         255.255.255.255���",
   ),
   "userid"=>array(
      "t"=>"
         �������������� (���������), ���� ������� �� �������� � ����������.
         ��������, ���� ��� ������� �� ������� ������ �� ������������� ��������, � � ������� ���������� �������������� ���� ����� ������� �� ������� ������, �� ����� ��� ������� � ����������?
         
         ���������: ��������� � ���� ��������� �� �����.",
      "ta"=>"
         LinkFeed���
         PROPAGE���
         SAPE.BOT���
         promotext���",
   ),
   "keyword"=>array(
      "t"=>"
         ������������ �������� ����� (� ��������� ����������), ����������� � ����������� � ����������.
         
         ���������: �������� ����� �� ������ ��������� �� �����.",
      "ta"=>"
         �������
         �������
         ����񕕕
         ����畕�
         ������񕕕
         ������畕�
         ����압�
         �����
         ���������
         ��������
         �����󕕕
         ��������򕕕
         ���񕕕",
   ),
   strrnd("keysval")=>"off",
),




"hardbans"=>array(
   "t"=>"Ƹ����� ����",
   strrnd("keysval")=>"on",
   "userid"=>array(
      "t"=>"��������� ���� �� �������������� ��������� �������.
      
         http �������, ������� �� <u>�� ���</u> ������������� ���� (������������ �������, ��������).
         �������� ��������, ��� ��������� <font color='blue'>href</font> ����������� ������ �������������� � ������ ������- �� �������� ���.
         
         ���������: ��������� � ���� ��������� �� �����.",
      "ta"=>"
         Downloader���
         Download Master���
         Emailsiphon���
         Emailwolf���
         Getright���
         Gozil���
         Htmlparser���
         Ms Frontpage���
         Msproxy���
         Offlin���
         ReGet���
         Superbot���
         Teleport���
         Teleportpro���
         Webbandit���
         Webcopier���
         Web Downloader���
         Webstr���
         Webzip���
         WGet���
         Winhttp robot���
         href���",
   ),
   "ip"=>array(
      "t"=>"
         ���������, ������� �������� ������ � ����� �� http.
         
         ��������� ���������� ����������- ������ 78.108.81.= 
         ������� ���� �������� IP 78.108.81.0-78.108.81.255
         
         ���������: �������� � ���� ��������� �� �����.",
      "ta"=>"
         78.108.81.200���
         89.108.66.161���",
   ),
   "iprss"=>array(
      "t"=>"
         ���������, ������� �������� ������ � RSS ������.
         ������������ �������� �������� ����� ����� ���������� RSS �����.
         ��� ��� ��� ��� �������...
         
         ��������� ���������� ����� ��� �� ����������.
         
         ���������: �������� � ���� ��������� �� �����.",
      "ta"=>"
         78.108.81.200���
         89.108.66.161���",
   ),
   "host"=>array(
      "t"=>"
         �����, ������ � ������� ������ �� ����������� ������.
         
         ���������: ����� � ���� ��������� �� �����.",
      "ta"=>"
         rosspoisk.ru���
         yoursuccess.ru���
         Anonymouse.org���
         anonymouse.org���",
   ),
   strrnd("keysval")=>"off",
),




"remark"=>array(
   "t"=>"��������� ������ ���������������",
   "onair"=>array(
      "t"=>"
         ��������� ������ ���������������:",
      "v"=>"
         ok��� �������
         no�����������",
   ),
   "place"=>array(
      "t"=>"
         ������ ������� � ������������:",
      "v"=>"
         ok��� �� ������ � ���������
         no�������������� � ���������",
   ),
   "method"=>array(
      "t"=>"
         ������� ���������� ������������:",
      "v"=>"
         ok��� ����� �����
         no�������� ������",
   ),
   "viewer"=>array(
      "t"=>"
         ���� ����������� ����������� � ��������� URL-�,
         �� �������� ����� �������� �����������:",
      "v"=>"
         cote�������� � �����������
         comm�������������� ��� ������",
   ),
   "poster"=>array(
      "t"=>"
         �������� ����� ��������������� ��������:",
      "v"=>"
         text��������� ����� ���������
         comm��������� ������ �����������
         cote���� �����, � �����������
         none������� ����� ��� ��������",
   ),

   strrnd("abs")=>"���������� ���������� ������ � ������������:",   
   "noindex"=>array(
      "t"=>"
         ��������� �� �������������� ��������:",
      "v"=>"
         ok��� ��������� � noindex
         no��������� ������",
   ),
   "nofollow"=>array(
      "t"=>"
         �� ��, ��� ������ �����������:",
      "v"=>"
         ok��� ��������� nofollow
         no��������� ������",
   ),

   strrnd("abs")=>"��������� ����� ���������������:",    
   "lang_ru"=>array(
      "t"=>"������� ����:",
      "ta"=>"
         remark_off_t������������ ����������� �� ���� ��������.
         remark_off_b���Remark On
         remark_on_t����������� ����������� �� ���� ��������.
         remark_on_b���Remark Off
         remark_show_all���Latest
         remark_latest_no��������������������� ����������� �����������.
         remark_latest_ok���������� ������������������ �����������:
         remark_show_alt����������� ����� �����������.
         remark_link���<div style='text-align:right;padding:5px 20px;'><a href='===link==='>�������� �����������.</a></div>
         remark_show���<div style='text-align:right;padding:5px 20px;'><a href='===link==='>������������: ===num===</a></div>
         document_link���<div style='text-align:right;padding:5px 20px;'><a href='===link==='>��������� � ���������.</a></div>
         form_title����������� ����������� � ����� ���������:
         form_name������� ���:
         form_email������ email:
         form_subject�������:
         form_code��������:
         form_message������� �����:
         form_submit������������ ����������� �� ���������
         form_warning������ ���� ����������� ��� ����������!
         send_title������ ����������� ������ �� ���������.
         send_mess���<p>����� ��������� ����������� ��� ����������� ����� �������� �� ����� �����.</p><p>�� ��� ���� ��� ����������� <u>�������</u> ������������ ��� ��������������, �� ������ ��� ��������� ������ ����� ��-��� �������� �������� � ��������� �� ���� ������, �� ������ � ��� ������, ���� �������� ��������� �������� � ������, � ������������ �������- ��������� ��.</p>
         moder_off_title�������� � ������������.
         moder_off_screen���<p>����������� ��� ���� �������� ���������.</p>
         moder_su_title�������������� �������.
         moder_de_title�������������� �����.
         moder_no_title�������� � ������������.
         moder_su_screen������������ � ���������.
         moder_de_screen������������ � ���������.
         moder_no_screen���������� � ���������.</a></p><p>�������� �� ��������� ��������� ��������� �����, ���� �� ������� ������ ����������� ������ ����� ������, � �� ��������� ����������, ���� �� ��������������� ������������ �������.<a>
         edit_title����������������� �����������:
         edit_submit��������� ���������
         edit_ok_title������������ � ����������� �������.
         edit_no_title����������� ��������� � �����������:
         edit_yes���<p><font color='red'>����������� ��������������.</font> <a href='===url==='>���������.</a></p>
         delete_no_title����� ���������� ������� �����������.
         delete_no_doc������� �� �������� ����������� �� �������.	 <a href='===url==='>���������.</a>
         delete_ok_title�������������� �����.
         delete_ok_doc�������������� �����. <a href='===url==='>���������.</a>
         empty���end",
   ),

   "lang_en"=>array(
      "t"=>"
         ���������� ����:", # ���� ���������� ������, � ����� ��������� ������.
      "ta"=>"
         remark_off_t���Turn off comments on this page.
         remark_off_b���Remark On
         remark_on_t���Insert a comment on this page.
         remark_on_b���Remark Off
         remark_show_all���Latest
         remark_latest_no���Not moderated comments available.
         remark_latest_ok���Not moderated comments:
         remark_show_alt���See new comments.
         remark_link���<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Leave a comment.</a></div>
         remark_show���<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Comments: ===num===</a></div>
         document_link���<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Back to the document.</a></div>
         form_title���Add a comment to this document:
         form_name���Your name:
         form_email���Your email:
         form_subject���Subject:
         form_code���Captcha:
         form_message���Your idea:
         form_submit���Send a comment on moderation
         form_warning���All fields are required!
         send_title���Your comment accepted for moderation.
         send_mess���<p>After moderator approval Your comment will be posted on our website.</p><p>Until then, your comment <u>conditionally</u> is displayed as a published, but only when viewing our site from the current browser and specifically on this machine, but only if the browser is allowed to work with cookies, and operating system - to keep them.</p>
         moder_off_title���Denial of service.
         moder_off_screen���<p>Comments for this page are disabled.</p>
         moder_su_title���Comment approved.
         moder_de_title���Comment deleted.
         moder_no_title���Denial of service.
         moder_su_screen���Back to the document. 
         moder_de_screen���Back to the document. 
         moder_no_screen���Back to the document.</a></p><p>Moderation of document executed earlier, or from the filing comments has passed more than a month, and it is considered obsolete, or you used an incorrect reference.<a> 
         edit_title���Editing a comment:
         edit_submit���Amend
         edit_ok_title���Changes to the comment made.
         edit_no_title���Making changes in your comment: 
         edit_yes���<p> <font color='red'>Comment edited.</font> <a href='===url==='>Back.</a></p>
         delete_no_title���Failed to delete the comment.
         delete_no_doc���Link to delete the comment is not valid. <a href='===url==='>Back.</a>
         delete_ok_title���Comment deleted.
         delete_ok_doc���Comment deleted. <a href='===url==='>Back.</a>
         empty���end",
   ),
),




"nulled"=>array(
   "t"=>"����� ���� �������� � ��������",
   strrnd("subkey")=>"default",
   "safe"=>array(
      "t"=>"���� �� ���-�� ����������� � �����������, � ����� �� ������ �����������, ��� �� � ����� ����������, �� ������ ����� ������� ��������� �� ����������, ����� ���� ������ ������������ ������.
         
         �������� ��������, ��� �������� <u>���</u> ������ � ������������.
         
         ��� ����� <font color='red'>���������</font> - ����� ��������:",
      "v"=>"
         no����� ����������
         ok��� ��������",
   ),
),
   );

   if (!in_array('stat_php_5_2',$_s['modul']) and !in_array('stat_php_5_3',$_s['modul'])) 
      unset(
         $ptn['lang']['stats_ru'],
         $ptn['lang']['stats_en'],
         $ptn['stats'],
         $ptn['softbans'],
         $ptn['hardbans']
      );
   if (!in_array('remark',$_s['modul'])) unset($ptn['remark']);

?>