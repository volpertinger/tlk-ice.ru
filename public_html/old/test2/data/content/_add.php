<?php /* Выше этой строки в файле ничего не должно быть */

   $banner_left=<<<bannerleft
      <div class="reklams_160 bord">
         Я баннер, падающий на дно левой колонки.
         Живу в _add.php
      </div>
bannerleft;

   $banner_right=<<<bannerright
      <div class="reklams_160 bord">
         Я баннер, падающий на дно правой колонки.
         Живу в _add.php
      </div>
bannerright;





# Код баннера боковой панели. 160*600 или близко к этому:

   switch($action) {

      case 'index': $add=<<<add
   <div class="reklams_160 bord">
      Я баннер для морды сайта, живу в _add.php
   </div>
add;
      break;

      case "email": 
         $banner_right=$banner_left='';
         $add=<<<add
   <div class="reklams_160 bord">
      Я баннер для страницы обратной связи.
      Живу в _add.php
   </div>
add;
      break;

      default: $add=<<<add
   <div class="reklams_160 bord">
      Я баннер для обычных страниц, живу в _add.php
   </div>
add;
   }





# Выбиралка размера шрифта

   $font=in_array($action,array('email','stat','login')) ? '': <<<font

<script type="text/javascript">
<!--//<![CDATA[
var szs=new Array( '11px','12px','13px','14px','15px','16px' );
var startSz=0;
function ts (trgt,inc) {
   if (!document.getElementById) return;
   var d=document,cEl=null,sz=startSz,i,j,cTags;
   sz+=inc;
   if (sz < 0) sz=0;
   if (sz > 11) sz=11;// от этих значений меняется отсчет размера шрифта
   startSz=sz;
   if (cEl=d.getElementById(trgt)) cEl.style.fontSize=szs[sz];
}
if (window.top!==window.self) window.top.location=window.self.location;
//]]>-->
</script>

   <ul class="fonts">
      <li class="nolink"><em><em>Шрифт:&nbsp;&nbsp;
      <a title="минус" onclick="javascript:ts('changefont',-1);" href="#">меньше</a>&nbsp;
      <a title="плюс" onclick="javascript:ts('changefont',1);" href="#">больше</a></em></em></li>
   </ul>

font;

/* Ниже этой строки в файле ничего не должно быть. */ ?>