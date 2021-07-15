<?php

# Редактор всех настроек Nano-CMS. Не рекомендуется вмешиваться.

   $cat=$page;
   file_exist_or_not($_s['config']['default']);
   include($_s['config']['default']);
   $arr=array_merge(
      default_config($_s['config']['default']),
      (file_exists($_s['config']['main']) ? disk2arr($_s['config']['main']): $null)
   );

# Общая часть- шапка быстрой навигации.

   $title='Выбор раздела настроек';
   $tt=array(
      panel_h1($title),
      '<ol type="a" class="admin">'
   );

   $key=array_keys($ptn);
   for ($i=0; $i < count($key); $i++) {
      if (empty($ptn[$key[$i]]['t'])) continue;
      $tt[]=$key[$i]==$cat ?
         '   <li><font color="red">» <a href="setup_'.$key[$i].'.htm"><font color="red">'.trim($ptn[$key[$i]]['t']).'.</font></a> «</font></li>':
         '   <li><a href="setup_'.$key[$i].'.htm">'.trim($ptn[$key[$i]]['t']).'.</a></li>';
   }
   $tt[]='</ol>';
   $content=implode($oslen,$tt);
   $help=<<<help

<style type="text/css">
.admin {margin:10px 25px;}
.admin li b b {font-weight:normal;}
</style>
   <h1 class="panel">Обратите внимание:</h1>
   <p>При работе с данным разделом настроек, вне зависимости от выставленного языка интерфейса, Нана принудительно переключается на русский язык, поскольку сам раздел настроек общается с Вами исключительно на великом и могучем, и под вражеской кодировкой покажет только кракозябы.</p>
   <p>При выходе из данного раздела все сохранённые настройки вступят в силу.</p>
   <p>Также понимайте, что заданные этим разделом настройки для Наны есть истина в последней инстанции. Она не посмеет усомниться во вменяемости указанных Вами данных, и если Вы, например, вместо цифр вводите в поле что попало, но только не цифры, то по ту строну клика о кнопку сабмита случится "Ок, ты хотел этого- ну так получи".</p>
   <p>Если же Вы всё-таки навводили в поля формы что попало, и Нана впала в ступор, не сумев интерпретировать эти данные, то в папке <font color="blue">./data/settings</font> надо убить FTP клиентом файл <font color="blue">nano_settings.db</font>, приступив после этого к настройкам заново.<p>

help;

# end Дальше только скрипт.





   if (isset($cat) and in_array($cat,$key) and isset($ptn[$cat]['t']) /*and isset($arr[$cat])*/ and !isset($_POST['correct'])) {
      $help='';
      $content.=<<<pattern

<style type="text/css">
.admin {margin:10px 25px;}
.admin li b b {font-weight:normal;}
#setup {margin:20px auto;width:500px;}
#setup select,#setup input,#setup options {float:right;width:200px;}
#setup select {width:204px;}
#setup textarea {margin:5px 0;width:494px;min-height:350px;}
#setup .panel {margin:0;}
#setup .end {float:none;margin:20px;width:100px;}
#tbl {margin:10px 0;}
#tbl td {border-bottom:1px silver solid;margin:0;padding:0;width:498px;}
</style>
<br>
<!-- h1 -->
<form method="post" id="setup">
<input type="hidden" name="correct" value="$cat">
<table id="tbl">
<!-- insert -->
</table>
<center><input type="submit" value="изменить" class="end"></center>
</form>
pattern;

      $nok=array('ok','no');
      $sub=$none='©~®';
      $kev=false;
      $title='Редактируем: '.$ptn[$cat]['t'].'.';
      $key=array_keys($ptn[$cat]);
      $tt=$null;
      for ($i=0; $i < count($key); $i++) {
         if (!is_array($ptn[$cat][$key[$i]])) {
            if (stristr($key[$i],'keysval_')) {
               $kev=$ptn[$cat][$key[$i]]=='on' ? true: false;
               $tt[]='<input type="hidden" name="'.$key[$i].'" value="'.$ptn[$cat][$key[$i]].'">';
            }
            if (stristr($key[$i],'abs_')) {
               $sub=$none;
               $tt[]='</table>'.panel_h1($ptn[$cat][$key[$i]]).'<table id="tbl">';
            }
            if (stristr($key[$i],'subkey_')) {
               $sub=$ptn[$cat][$key[$i]];
               $tt[]='<input type="hidden" name="'.$key[$i].'" value="'.$ptn[$cat][$key[$i]].'">';
            }
         }
         $k=explode('-',$key[$i]);
         $val=$sub==$none ? 
            (!isset($arr[$cat][$k[0]]) ? $none: $arr[$cat][$k[0]]):
            (!isset($arr[$cat][$sub][$k[0]]) ? $none: $arr[$cat][$sub][$k[0]]);
         $input=false;
         $input=!isset($ptn[$cat][$key[$i]]['ta']) ? $input: 'ta';
         $input=!isset($ptn[$cat][$key[$i]]['v']) ? $input: 'v';
         if ($input==false) continue;
         $n=explode($oslen,$ptn[$cat][$key[$i]][$input]);
         $k=$v=$null;
         for ($j=0; $j < count($n); $j++) {
            $n[$j]=str_replace("\r",'',$n[$j]);
            $n[$j]=explode('•••',$n[$j]);
            if (count($n[$j])==2) list ($k[],$v[])=array(trim($n[$j][0]),$n[$j][1]);
         }
         $tmp=$null;
         switch ($input) {
            case 'ta':
               if (isset($arr[$cat][$key[$i]])) list ($k,$v)=array(array_keys($arr[$cat][$key[$i]]),array_values($arr[$cat][$key[$i]]));
               elseif (isset($arr[$key[$i]])) list ($k,$v)=array(array_keys($arr[$key[$i]]),array_values($arr[$key[$i]]));
               $tmp[]='<textarea name="'.$key[$i].'">';
               for ($j=0; $j < count($k); $j++) $tmp[]=($kev) ? $v[$j].'=': $k[$j].'='.$v[$j];
               $tmp[]='</textarea>';
               $tt[]='<tr><td colspan="2">';
               $tt[]=trim(preg_replace("/( {1,})/is",' ',str_replace($oslen,'<br>',$ptn[$cat][$key[$i]]['t'])));
               $tt[]='<br>';
               $tt[]=implode($oslen,$tmp).'</td></tr>';
            break;
            case 'v':
               switch (count($k)) {
                  case 0:
                     continue 3;
                  break;
                  case 1:
                     $tmp[]='<input type="text" name="'.$key[$i].'" value="'.$val.'">';
                  break;
                  default:
                     $tmp[]='<select name="'.$key[$i].'">';
                     if ($v[0][0]==' ') $z0=' style="background:#FF0;"'; else $z0='';
                     if ($v[1][0]==' ') $z1=' style="background:#FF0;"'; else $z1='';
                     if (count(array_diff($k,$nok))==0) {
                        $tmp[]=($val==true) ? 
                           '<option name="'.$k[0].'" selected value="1"'.$z0.'>'.ltrim($v[0]).'</option>':
                           '<option name="'.$k[0].'" value="1"'.$z1.'>'.ltrim($v[0]).'</option>';
                        $tmp[]=($val==false) ? 
                           '<option name="'.$k[1].'" selected value="0"'.$z0.'>'.ltrim($v[1]).'</option>':
                           '<option name="'.$k[1].'" value="0"'.$z1.'>'.ltrim($v[1]).'</option>';
                     } else {
                        for ($j=0; $j < count($k); $j++) $tmp[]=($val==$k[$j]) ? 
                           '<option name="'.$k[$j].'" selected value="'.$k[$j].'">'.ltrim($v[$j]).'</option>':
                           '<option name="'.$k[$j].'" value="'.$k[$j].'">'.ltrim($v[$j]).'</option>';
                     }
                     $tmp[]='</select>';
               }
               $tt[]='<tr valign="bottom"><td>';
               $tt[]=trim(preg_replace("/( {1,})/is",' ',str_replace($oslen,'<br>',$ptn[$cat][$key[$i]]['t'])));
               $tt[]='</td><td>'.str_replace($none,$v[0],implode($oslen,$tmp)).'</td></tr>';
            break;
            default:
               continue 2;
         }
      }
      $content=str_replace(
         array(
            '<!-- h1 -->',
            '<!-- insert -->',
         ),
         array(
            panel_h1($title),
            implode($oslen,$tt),
         ),
      $content);
   }

   if (isset($cat) and in_array($cat,$key) and isset($ptn[$cat]['t']) /* and isset($arr[$cat]) */ and isset($_POST['correct'])) {
      if ($_POST['correct']=='nulled' and isset($_POST['safe']) and false==$_POST['safe']) {
         $title='Сброс всех настроек к дефолтовым ';
         $help='<br>';
         $messa=array(
            '0' => panel_h1('Протест!').'<p>Никаких настроек Вами ещё не сделано. Всё и так дефолтовое.</p>',
            'y' => panel_h1($title).'<p>Настройки сброшены до дефолтовых.</p>',
            'n' => panel_h1('Не получилось.').'<p>Нет доступа к файлу <font color="blue">'.$_s['config']['main'].'</font></p>',
         );
         $help.=!file_exists($_s['config']['main']) ? 
            $messa['0']:
            (unlink($_s['config']['main']) ? $messa['y']: $messa['n']);
      } else {
         unset($_POST['correct']);
         list ($k,$v)=array(
            array_keys($_POST),
            array_values($_POST)
         );
         $sub=$help=$keys='';
         $new=array();
         for ($i=0; $i < count($k); $i++) {
            $v[$i]=str_replace(array("\r",'<em>','</em>'),'',$v[$i]);
            if (stristr($k[$i],'subkey_')) { $sub=$v[$i]; continue; }
            if (stristr($k[$i],'keysval_')) { $keys=$v[$i]; continue; }
            $input=false;
            $input=!isset($ptn[$cat][$k[$i]]['ta']) ? $input: 'ta';
            $input=!isset($ptn[$cat][$k[$i]]['v']) ? $input: 'v';
            if ($input==false) continue;
            $level=($cat==$k[$i]) ? true: false;
            if ($level) {
               if (isset($arr[$k[$i]])) unset($arr[$k[$i]]);
            } else {
               if (isset($arr[$cat])) unset($arr[$cat]);
            }
            switch ($input) {
               case 'ta':
                  $n=explode($oslen,$v[$i].$oslen);
                  for ($j=0; $j < count($n); $j++) {
                     $n[$j]=explode('=',$n[$j]);
                     if (2 <= count($n[$j])) {
                        $key=array_shift($n[$j]);
                        if ($level) $new[$k[$i]][trim($key)]=implode('=',$n[$j]); else $new[$cat][$k[$i]][trim($key)]=implode('=',$n[$j]);
                     }
                  }
                  if ($keys=='on') {
                     if ($level) $new[$k[$i]]=array_keys($new[$k[$i]]); else $new[$cat][$k[$i]]=array_keys($new[$cat][$k[$i]]);
                  }
               break;
               case 'v':
                  $k[$i]=explode('-',$k[$i]);
                  $k[$i]=trim($k[$i][0]);
                  if ($sub=='') $new[$cat][$k[$i]]=$v[$i]; else $new[$cat][$sub][$k[$i]]=$v[$i];
               break;
               default:
            }
         }
         $arr=arr2disk(array_merge($new,$arr),$_s['config']['main']);
         $title='Раздел "'.$ptn[$cat]['t'].'" отредактирован.';
         $content.=panel_h1($title);
         header('Location:setup_'.$cat.'.htm'); exit;
      }
   }
   
   $content.=$help;

   if (!$_s['admin']) $content=panel_h1($_s['lang'][$_s['settings']['lang']]['login_first']); else $setup=true;

?>