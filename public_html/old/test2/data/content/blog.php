<?php

   list ($content,$title)=array(
      preg_replace(
         '/<a([^>]+)>(.+)<\/a>/Usi',
         '<a\\1 target="_blank">\\2</a>',
         file_get_contents("http://lasto.com/blog/tmp/morda.txt")
      ),
      'Новости "Блога провинциального самурая".',
   );

   $_s['settings']['title']='Новости блога Мастера Ласто';
   
   $content=<<<tott

<style type="text/css">
/* <![CDATA[ */
.postdate {color:#656565;margin:5px 10px;text-align:right;}
p img {margin:5px 10px 2px 0;}
.postbody img {margin:5px 10px 2px 10px;}
.postbody {margin:10px 0;}
.postbody span {color:#a00;}
.rightero {font-weight:normal;margin:15px 25px;text-align:right;}
.rightero a {background:url(../i/mtop.png) repeat-x #f2f2f2;border:#d5d5d5 1px solid;color:#45f;padding:4px;}
.rightero a:hover {border:#f00 1px solid;color:#f00;}
.rightero span {border:#f00 1px solid;padding:4px;}
.rightero a span {border:0;padding:0;}
 ol.br li {padding-bottom:15px;}
.ano {border-left:1px solid silver;margin:10px 20px;padding:0 20px;text-align:left;}
.ano a {color:#555;}
.ano a:hover {color:#555;}
a,a:link,a:visited {text-decoration:none;}
address {font-style:normal;margin:20px auto;width:500px;text-align:right;}
/* ]]> */
</style>

<h1 class="panel">Интересности из мира SEO:</h1>

   <p>Последние статьи <a href="http://lasto.com/blog/" target="_blank">блога Мастера Ласто:</a></p>

$content

tott;

?>