<?php /* Выше этой строки в файле ничего не должно быть */

   global $_s,$turl,$folder,$action,$page,$unix,$uri,$null,$oslen;
   list($unix,$null,$oslen)=array(time(),array(),"\n");
   $_s['config']['main']='./data/settings/nano_settings.db';
   $_s['config']['default']='./data/settings/default_settings.php';
   include './data/settings.php';

   if (get_magic_quotes_gpc()) {
      function stripslashes_deep($value) {
         return is_array($value) ? array_map('stripslashes_deep',$value): stripslashes($value);
      }
      $_POST=array_map('stripslashes_deep',$_POST);
      $_COOKIE=array_map('stripslashes_deep',$_COOKIE);
   }

#  Модули. Идут поблочно. Сам код, и сразу же все необходимые типовые функции к нему.
#  Что-то может показаться излишне сложным, но это лишь частный случай масштабируемого решения.

### Задание всех необходимых настроек движка:

   $_s=array_merge($_s,default_config($_s['config']['default']),disk2arr($_s['config']['main']));
   list($folder,$action,$page,$uri)=get_location(); get_authentication();

function default_config($default_config) {
   global $_s,$oslen,$null;
   file_exist_or_not($default_config); include ($default_config);
   $c=array_keys($ptn);
   $arr=$null;
   for ($i=0; $i < count($c); $i++) {
      $sub=$keys='';
      $key=array_keys($ptn[$c[$i]]);
      for ($j=0; $j < count($key); $j++) {
         $level=$c[$i]==$key[$j] ? true: false;
         if (stristr($key[$j],'subkey_')) { $sub=$ptn[$c[$i]][$key[$j]]; continue; }
         if (stristr($key[$j],'keysval_')) { $keys=$ptn[$c[$i]][$key[$j]]; continue; }
         $input=false;
         $input=!isset($ptn[$c[$i]][$key[$j]]['ta']) ? $input: 'ta';
         $input=!isset($ptn[$c[$i]][$key[$j]]['v']) ? $input: 'v';
         if ($input==false) continue;
         $n=explode($oslen,$ptn[$c[$i]][$key[$j]][$input]);
         $k=$v=array();
         for ($l=0; $l < count($n); $l++) {
            $n[$l]=str_replace("\r",'',$n[$l]);
            $n[$l]=explode('•••',$n[$l]);
            if (count($n[$l])==2) list ($k[],$v[])=array(trim($n[$l][0]),$n[$l][1]);
         }
         switch ($input) {
            case 'ta':
               for ($l=0, $z=$input=='v' ? min(1,count($k)): count($k); $l < $z; $l++) {
                  if ($level) $arr[$c[$i]][$k[$l]]=$v[$l]; else $arr[$c[$i]][$key[$j]][$k[$l]]=$v[$l];
               }
               if ($keys=='on') {
                  if ($level) $arr[$c[$i]]=array_keys($arr[$c[$i]]); else $arr[$c[$i]][$key[$j]]=array_keys($arr[$c[$i]][$key[$j]]);
               }
            break;
            case 'v':
               $val=false;
               switch (count($k)) {
                  case '0': break 2;
                  case '1': $val=$v[0]; break;
                  default:
                     if ($k[0]=='ok') $val=true;
                     elseif ($k[0]=='no') $val=false;
                     else $val=$k[0];
               }
               $key[$j]=explode('-',$key[$j]);
               $key[$j]=trim($key[$j][0]);
               if ($sub=='') $arr[$c[$i]][$key[$j]]=$val; else $arr[$c[$i]][$sub][$key[$j]]=$val;
            break;
            default;
         }
      }
   }
   return $arr;
}

function get_location() {
   global $_s,$turl,$folder;
   $t=parse_url($turl);
   $u=$to=$uri=$t['scheme'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   $folder=(preg_match_all("/(\w{1,})\//Usi",str_replace($turl,'',$to),$n)==0) ? '': implode('/',$n[1]).'/';
   $u=array_merge(parse_url($u),pathinfo($u));
   $a=(isset($u['extension']) and isset($u['basename']) and $u['path']!='/') ? str_replace('.'.$u['extension'],'',$u['basename']): 'index';
   if (isset($t['host']) and isset($u['host']) and isset($u['path']) and strtolower($u['host'])!=strtolower($t['host'])) {
      header('HTTP/1.0 301 Moved Permanently');
      header('Location:'.$t['scheme'].'://'.$t['host'].$u['path']);
      die;
   }
   $a=explode('_',$a);
   return array($folder,$a[0],(isset($a[1]) ? $a[1]: 0),$uri);
}

function get_authentication() { # Проверка авторизованности.
   global $_s,$title,$content;
   $_s['admin']=(empty($_s['settings']['auth_http'])) ?
      ((  isset($_COOKIE['PHP_AUTH_USER'])
      and isset($_COOKIE['PHP_AUTH_PASS'])
      and $_COOKIE['PHP_AUTH_USER']==md5($_s['settings']['pepetun'].$_s['settings']['login'])
      and $_COOKIE['PHP_AUTH_PASS']==md5($_s['settings']['pepetun'].$_s['settings']['passw'])
      ) ? true: false):
      ((  isset($_SERVER['PHP_AUTH_USER'])
      and isset($_SERVER['PHP_AUTH_PW'])
      and $_SERVER['PHP_AUTH_USER']==$_s['settings']['login']
      and $_SERVER['PHP_AUTH_PW']==$_s['settings']['passw']
      ) ? true: false);
   if (!empty($_s['settings']['auth_http']) and $_s['admin']) {
   	  $content.=' get_authentication http ok';
   }
   return;
}

### Присоединение статмодуля (если доступен) и его сервисов:

   foreach ($_stat_mod=array(
      'stat_php_5_2',
      'stat_php_5_3'
   ) as $mod) if (in_array($mod,$_s['modul'])) include module($mod);

### Импорт контента страницы:

   list ($turl,$title,$content,$file)=array(
      preg_replace("/[\/{1,}]$/is",'',$turl),
      $_s['settings']['title'],
      $_s['lang'][$_s['settings']['lang']]['document_not_found'],
      './data/content/'.$folder.'/'.$action.'.php',
   );
   if (file_exists($file)) include $file;

### Авторизация. Двух разных видов. Вдруг зачем-нибудь понадобится.

   switch($action) {
      case 'Login':
         if ($_s['admin']) {
            $title=$_s['lang'][$_s['settings']['lang']]['login_ok_title'];
            $content=$_s['lang'][$_s['settings']['lang']]['login_ok_content'];
            break;
         }
         if (empty($_s['settings']['auth_http'])) {
            if (empty($_POST['login']) or $_POST['login']!=$_s['settings']['login']
             or empty($_POST['passw']) or $_POST['passw']!=$_s['settings']['passw']) include module('login');
         	  else {
               setcookie("PHP_AUTH_USER",md5($_s['settings']['pepetun'].$_POST['login']),$unix+60*60*48);
               setcookie("PHP_AUTH_PASS",md5($_s['settings']['pepetun'].$_POST['passw']),$unix+60*60*48);
               $title=$_s['lang'][$_s['settings']['lang']]['login_ok_title'];
               $content=$_s['lang'][$_s['settings']['lang']]['login_ok_content'];
               $_s['admin']=true;
            } 
         } else {
            header('WWW-Authenticate: Basic realm="Authentication in Nano CMS"');
            header('HTTP/1.0 401 Unauthorized');
            $title=$_s['lang'][$_s['settings']['lang']]['login_no_title'];
            $content=$_s['lang'][$_s['settings']['lang']]['login_no_http_h1'];
         }
      break;

      case 'Logout':
         if (!$_s['admin']) {
            $title=$_s['lang'][$_s['settings']['lang']]['login_no_title'];
            $content=$_s['lang'][$_s['settings']['lang']]['login_no_content'];
            break;
         }
         if (empty($_s['settings']['auth_http'])) {
            setcookie('PHP_AUTH_USER',md5(time().$_s['settings']['pepetun']),$unix-100);
            setcookie('PHP_AUTH_PASS',md5(time().$_s['settings']['pepetun']),$unix-100);
            $title=$_s['lang'][$_s['settings']['lang']]['logout_ok_title'];
            $content=$_s['lang'][$_s['settings']['lang']]['logout_ok_content'];
         } else {
            $title=$_s['lang'][$_s['settings']['lang']]['logout_http_title'];
            $content=$_s['lang'][$_s['settings']['lang']]['logout_http_content'];
         }
      break;
      default:
   }

### Умные кнопки навигации. Не обязательны.

   include module('menu');
   include module('add');
   $menu=array(
      (isset($top_menu) ? $top_menu: $null),
      (isset($left_menu) ? $left_menu: $null),
      (isset($right_menu) ? $right_menu: $null),
   );
   for ($m=0; $m < count($menu); $m++) {
      for ($div=0, $keys=array_keys($menu[$m]); $div < count($keys); $div++) {
         for ($i=0; $i < count($menu[$m][$keys[$div]]); $i++)
         $menu[$m][$keys[$div]][$i]=build_link($menu[$m][$keys[$div]][$i]);
         $menu[$m][$keys[$div]]=implode($oslen,$menu[$m][$keys[$div]]);
         $menu[$m][$keys[$div]]=
         (($m==0) ? $oslen.'<ul class="topmenu">'.$oslen: $oslen.'<ul class="nav">'.$oslen).
         ((strlen($keys[$div]) > 3 and $m > 0) ? '<li class="nolink">'.$keys[$div].'</li>'.$oslen: '').
         ((strlen($menu[$m][$keys[$div]]) > 10) ? $menu[$m][$keys[$div]]: '').$oslen.'</ul>'.$oslen;
      }
      $menu[$m]=implode("",array_values($menu[$m]));
      $menu[$m]=(stristr($menu[$m],'<a href=')) ? preg_replace("/[ +]/is"," ",$menu[$m]): '';
   }
   $a=array($menu,'a href=','a class="selected" href=');
   for ($i=0; $i < count($a[0]); $i++) {
      for ($j=0; $j < $k=preg_match_all("/<li><a href=\"(.*)\" title=\"(.*)\".*>(.*)<\/a><\/li>/Uis",$a[0][$i],$n); $j++) {
         $a[0][$i]=is_here($n[1][$j]) ? str_replace($n[0][$j],str_replace($a[1],$a[2],$n[0][$j]),$a[0][$i]): $a[0][$i];
      }
   }
   list ($topmenu,$leftmenu,$rightmenu)=$a[0];

function is_here($url) {
   global $uri;
   return implode('',parse_url(str_replace('index.htm','',$uri)))==implode('',parse_url(str_replace('index.htm','',$url))) ? true: false;
}

function build_link($arr) {
   global $turl;
   if (!is_array($arr) or count($arr)!=3) return '';
   list ($lnk,$ttl,$alt)=$arr;
   $tmp=explode(' ',$lnk);
   $lnk=array_shift($tmp);
   $lnk=str_replace(array("'","\""),'',$lnk);
   $tmp=implode(' ',$tmp);
   return (stristr($lnk,'http://') or stristr($lnk,'https://') or stristr($lnk,'mailto:')) ?
      '<li><a href="'.$lnk.'" title="'.$ttl.'" alt="'.$ttl.'" target="_blank" '.$tmp.'>'.$alt.' </a></li>':
      '<li><a href="'.$turl.'/'.$lnk.'" title="'.$ttl.'" alt="'.$ttl.'" '.$tmp.'>'.$alt.' </a></li>';
}

### Формирование потока вывода:

   if ($content==$_s['lang'][$_s['settings']['lang']]['document_not_found']) {
      header('HTTP/1.1 404 Not Found');
      include module('error_404');
   }
   header('Content-Type: text/html; charset='.(($_s['settings']['lang']=='ru' or isset($setup)) ? 'windows-1251': 'iso-8859-1'),false);
   foreach (array_diff($_s['modul'],$_stat_mod) as $modul) include module($modul);
   die ($content);

### Место финального тормоза.





### Несколько маленьких и смешных, но полезных функций:

function module($file) {
   global $_s,$folder;
   list ($path,$delim,$ext)=array('./data/content/','_','.php');
   list ($file,$main)=array($path.$folder.$delim.$file.$ext,$path.$delim.$file.$ext);
   return file_exists($file) ? 
      $file:
      (file_exists($main) ? $main: die(str_replace('===mod===',$file,$_s['lang'][$_s['settings']['lang']]['module_not_found'])));
}

function fwa($content,$file) {
   if (is_writeable($file)) {
      $tm=fopen($file,'a');
      flock($tm,LOCK_EX);
      fwrite($tm, $content);
      flock($tm,LOCK_UN);
      fclose($tm);
   } else {
      fw($content,$file);
   }
   return;
}

function fw($content,$file)  {
   $tm=(file_exists($file)) ? @fopen($file,'r+'): @fopen($file,'w');
   if ($tm) {
      set_file_buffer($tm,0);
      flock($tm,LOCK_EX);
      ftruncate($tm,0);
      fwrite($tm, $content);
      flock($tm,LOCK_UN);
      fclose($tm);
   }
   return;
}

function arr2disk($arr,$db) {
   fw(serialize($arr),$db);
   return $arr;
}

function disk2arr($db) {
   global $null;
   return is_readable($db) ? unserialize(file_get_contents($db)): $null;
}

function file_exist_or_not($file) {
   if (!file_exists($file)) die ('Not found file '.$file);
   return true;
}

function panel_h1($str) {
   global $_s;
   return str_replace('===h1===',$str,$_s['lang'][$_s['settings']['lang']]['panel']);
}

function strrnd($str) {
   global $rndstr,$unix;
   return $rndstr=$str.'_'.substr(md5($unix.(isset($rndstr) ? $rndstr: $unix)),mt_rand(0,20),10);
}

function pr($arr) {
   echo '<pre>';
   print_r($arr);
   exit;
}

function meta_redirect($url) {
   die ('<html><head><meta http-equiv="refresh" content="1; url='.$url.'"></head>');
}

function html2rgb($color) {
   $color=preg_replace("/[^a-f0-9]/is",'',$color);
   switch(strlen($color)) {
      case 6: break;
      case 3: $color=preg_replace('/(\S{1})(\S{1})(\S{1})/i','\\1\\1\\2\\2\\3\\3',$color); break;
      default: $color=mt_rand(60,90).mt_rand(60,90).mt_rand(60,90);
   }
   return array(
      hexdec(substr($color,0,2)),
      hexdec(substr($color,2,2)),
      hexdec(substr($color,4,2))
   );
}

/* Ниже этой строки в файле ничего не должно быть. */ ?>