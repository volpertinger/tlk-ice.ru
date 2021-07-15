<?php /* Выше этой строки в файле ничего не должно быть */

# Гугловый переводчик. Не обязателен.

   $google_translator='';
   foreach(
      array(
         'en' => 'English',
         'de' => 'German',
         'fr' => 'French',
         'es' => 'Spanish',
         'it' => 'Italian',
         'ja' => 'Japanese',
      ) 
      as $flag => $lang) $google_translator.='
   <a 
      href="http://www.google.com/translate?u='.urlencode($turl.'/'.$folder.$action.'_'.$page.'.htm').
      '&langpair=ru|'.$flag.'&hl=ru&ie=UTF8"
      target="_blank" rel="nofollow"
      title="Russian to '.$lang.'" alt="Russian to '.$lang.'"><img
      title="Russian to '.$lang.'" alt="Russian to '.$lang.'"
      src="'.$turl.'/i/t/'.$flag.'.png" align="absbottom" border="0" height="24" width="24"></a>';
   $google_translator=$oslen.'<noindex>'.$google_translator.$oslen.'</noindex>'.$oslen.'         ';

# Оформление кнопок и заголовков, специфичное для ЭТОЙ версии дизайна:

   $n=extract(
      preg_replace(
         array(
            '/<li><a([^>]+)>([^<]+)<\/a><\/li>/i',
            '/<li class="nolink">(.+)<\/li>/i',
            '/<h1 class="?\'?panel"?\'?>(.+)<\/h1>/Usi',
         ),
         array(
            '<li><a\\1><b>\\2</b></a></li>',
            '<li class="nolink"><em><em>\\1</em></em></li>',
            '<h1 class="panel"><em><em>\\1</em></em></h1>',
         ),
         compact('topmenu','leftmenu','rightmenu','content')
      ),
   EXTR_OVERWRITE);

# Собственно шаблон дизайна:

   $mem_usage=round(((float)memory_get_usage(true))/(1048576),2);
   $title_default=$_s['settings']['title'];
   $content=<<<template
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>$title</title>
<meta name="title" content="$title">
<link rel="stylesheet" type="text/css" href="$turl/css/nano.css">
<link rel="icon" href="$turl/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="$turl/favicon.ico" type="image/x-icon">
</head>
<body>
<div id="nano">
 <div class="nanotop">
  <div class="nanobottom">
   <div id="header">
    <div class="headtop">
     <div class="headbottom">
      <a href="$turl/" title="На главную"></a>
      <h1>$title_default</h1>
      <p>$title</p>
     </div>
    </div>
   </div>
   
   $topmenu

   <div id="middle">
    <div class="wrap bordr bordl">
     <div class="content" id="changefont">
      <!-- div class="reklams_468 bord">баннер</div -->
      
      $content
    
     </div>
     <div class="left">
      <div class="footbot">
       
       <ul class="translate">
        <li class="nolink"><em><em>Translate:</em></em></li>
        <li><em><em>$google_translator</em></em></li>
       </ul>

       $leftmenu

      </div>
     </div>
     <div class="right">
      <div class="footbot">

       $font
       $rightmenu
       $add

      </div>
     </div>
    </div>
    <div class="foot">
     <div class="footleft"> $banner_left </div>
     <div class="footright"> $banner_right </div>
    </div>
   </div>
  </div>
 </div>
</div>

<div id="nano" style="margin-top:4px;">
 <div class="nanotop">
  <div class="nanobottom" style="background-color:#fff;height:30px;">
   <p style="color:#aaa;font:11px georgia;margin:0;padding:7px 0 0;text-align:center;">
      &copy; 2008-2010 $title_default |
      Programming <a href="http://lasto.com/" style="color:#aaa;">V.Lasto</a> |
      Powered by <a href="http://nanocms.name/" style="color:#aaa;">Nano-CMS</a> |
      Designer <a href="http://trifler.ru/blog/" style="color:#aaa;">S.Gordi</a> |
      Memory consumption: $mem_usage Mb
   </p>
  </div>
 </div>
</div>
</body>
</html>

template;

/* Ниже этой строки в файле ничего не должно быть. */ ?>