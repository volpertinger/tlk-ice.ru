<?php

   $n=extract($_GET,EXTR_OVERWRITE);
   if ($n==1 and isset($k)) {
      show_antichiter_code(
         (isset($_s['antichiter_code_width']) ? $_s['antichiter_code_width']: 120),
         (isset($_s['antichiter_code_height']) ? $_s['antichiter_code_height']: 19),
         array(
            html2rgb((isset($_s['antichiter_code_back']) ? $_s['antichiter_code_back']: 'FDFDFD')),
            (isset($_s['antichiter_code_color']) ? html2rgb($_s['antichiter_code_color']):html2rgb(mt_rand(51,91).mt_rand(51,99).mt_rand(51,99)))
         ),
         (strlen($k)==21 ? get_key_code($k): 'ERROR')
      );
      exit;
   }

   include module('email');
   session_name('email');
   session_start();
   $_SESSION['counter']=empty($_SESSION['counter']) ? 0: $_SESSION['counter'];
   $content=$oslen;

   list ($send_max,$title,$fields,$k,$v,$tmp,$mess,$key)=array(2,
      $_s['lang']['connect_'.$_s['settings']['lang']]['title'],
      $null,
      array_keys($_POST),
      array_values($_POST),
      array_keys($_s['lang']['connect_'.$_s['settings']['lang'].'_fields']),
      array_values($_s['lang']['connect_'.$_s['settings']['lang'].'_fields']),
      set_key_code(),
   );
   for ($i=0; $i < count($tmp); $i++) $fields[$tmp[$i]]='';
   for ($i=0; $i < count($k); $i++) if (isset($fields[$k[$i]])) $fields[$k[$i]]=$v[$i];
   $field=array_keys($fields);
   $value=array_values($fields);

   $go=(array_search('',$fields)) ? 'error': 'form';
   $go=(isset($_SERVER['REQUEST_METHOD']) and $_SERVER['REQUEST_METHOD']!='POST' and $go!='error') ? 'hacker': $go;
   if (isset($_SERVER['HTTP_REFERER'])) {
      preg_match("/^(http:\/\/)?([^\/]+)/i",$_SERVER['HTTP_REFERER'],$ref);
      preg_match("/^(http:\/\/)?([^\/]+)/i",$turl,$url);
      $go=(isset($ref[2]) and isset($url[2]) and $ref[2]==$url[2]) ? $go: 'nohost';
      unset($ref,$url);
   }
   $go=($go=='form' and !email_ok($value[1])) ? 'nomail': $go;
   if (!in_array($go,array('error','hacker','nohost','nomail'))) {
      $go=(isset($_POST['session']) and $fields['secretcode']==get_key_code($_POST['session'])) ? 'send': $go;
      $go=(isset($_SESSION['counter']) and $send_max < $_SESSION['counter']) ? 'limit': $go;
   } else $_SESSION['counter']=666;
   $cashe=($go=='nomail') ? $_s['lang']['connect_'.$_s['settings']['lang']]['email_wrong']: '';

   switch ($go) {

      case "hacker":
         $content.='<p>'.$_s['lang']['connect_'.$_s['settings']['lang']]['hacker'].'</p>';
      break 1;

      case "nohost":
         $content.='<p>'.$_s['lang']['connect_'.$_s['settings']['lang']]['nohost'].' ==> <a href="email.htm">Go</a></p>';
       # meta_redirect('email.htm');
      break 1;

      case "limit":
         $content.='<p>'.$_s['lang']['connect_'.$_s['settings']['lang']]['limit'].'</p>';
      break 1;

      case "send":
         mail(
            $_s['settings']['email'],
            $value[2],
            str_replace(
               array(
                  '===subject===','===from===','===email===','===date===','===message===',
                  '===ip===','===user_agent===','===refer===',
               ),
               array(
                  $value[2],$value[0],$value[1],date("d.m.Y H:i:s",$unix),str_replace($oslen,'<br>',$value[3]),
                  $_SERVER['REMOTE_ADDR'],$_SERVER['HTTP_USER_AGENT'],$_SERVER['HTTP_REFERER'],
               ),
            $email_to_admin),
            'Content-Type: text/html; charset=windows-1251'.$oslen.
            'From: '.$value[1].$oslen.
            'X-Mailer: NanoCMS'
         );
         $content.=str_replace(
            array(
               '===send===',
               '===subject===','===from===','===email===','===date===','===message===',
            ),
            array(
               $_s['lang']['connect_'.$_s['settings']['lang']]['send'],
               $value[2],$value[0],$value[1],date("d.m.Y H:i:s",$unix),str_replace($oslen,'<br>',$value[3]),
            ),
         $report);
         $_SESSION['counter']=666;
      break 1;

      default:
         $tt='';
         for ($i=0; $i < min(count($field),count($mess)); $i++) {
            if ($mess[$i]!='') $tt.="   if (theForm.$field[$i].value=='') { alert('$mess[$i]'); theForm.$field[$i].focus(); return false; } \n";
         }
         $_SESSION['counter']=0;
         $content.=str_replace(
         	array(
               '===cashe===',
               '===script_heart===',
               '===title===',
               '===key_code===',
               '===name===','===name_field===','===name_value===',
               '===email===','===email_field===','===email_value===',
               '===subject===','===subject_field===','===subject_value===',
               '===code===','===code_value===','===key===',
               '===message===','===message_value===',
               '===submit===',
               '===warning===',
            ),
            array(
               $cashe,
               $tt,
               $title,
               $key,
               $_s['lang']['connect_'.$_s['settings']['lang']]['name'],$field[0],$value[0],
               $_s['lang']['connect_'.$_s['settings']['lang']]['email'],$field[1],$value[1],
               $_s['lang']['connect_'.$_s['settings']['lang']]['subject'],$field[2],$value[2],
               $_s['lang']['connect_'.$_s['settings']['lang']]['code'],$field[4],$key,
               $field[3],$value[3],
               $_s['lang']['connect_'.$_s['settings']['lang']]['submit'],
               $_s['lang']['connect_'.$_s['settings']['lang']]['warning'],
            ),
         $pattern);
      break;
   }

function email_ok($email) {
   return (preg_match("/^[^\s()<>@,;:\"\/\[\]?=]+@\w[\w-]*(\.\w[\w-]*)*\.[a-z]{2,}$/i",$email)) ? true: false;
}

function set_key_code() {
   global $_s;
   list ($k,$start,$stop,$key,$n)=array(7,48,57,$_s['settings']['pepetun'],array(date('myz')));
   for ($i=1; $i <= $k; $i++) {
      $n[$i]=substr(md5(mt_rand($start,$stop).md5($key).$n[($i-1)]),$i,3);
   }
   unset($n[0]);
   return implode('',array_values($n));
}

function get_key_code($a) {
   global $_s;
   list ($k,$start,$stop,$key,$n,$div)=array(7,48,57,$_s['settings']['pepetun'],date('myz'),"\r\n");
   $in=explode($div,$n.$div.chunk_split($a,3));
   unset($in[count($in)-1]);
   $out=array();
   for ($i=1; $i <= $k; $i++) {
      for ($j=$start; $j < $stop+1; $j++) {
         if (substr(md5($j.md5($key).$in[($i-1)]),$i,3)==$in[$i]) $out[]=chr($j);
      }
   }
   return implode('',array_values($out));
}

function show_antichiter_code($x,$y,$sc,$tt) {
   header ('Content-type: image/png');
   $im=@imagecreate($x,$y);
   $background_color=imagecolorallocate ($im,$sc[0][0],$sc[0][1],$sc[0][2]);
   $text_color=imagecolorallocate ($im,$sc[1][0],$sc[1][1],$sc[1][2]);
   for ($i=0; $i < strlen($tt); $i++) imagestring ($im,5,2+$i*17,rand(0,4),substr($tt,$i,1),$text_color);
   for ($i=0; $i < 135; $i++) imagesetpixel($im,rand(0,$x),rand(0,$y),$background_color);
   imagepng ($im);
   ImageDestroy($im);
   return;
}

?>