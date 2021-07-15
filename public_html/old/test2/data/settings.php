<?php /* Выше этой строки в файле ничего не должно быть */

   error_reporting(E_ALL|E_STRICT);

# Дань РНР 5, чтобы не было варнингов.
# Список поддерживаемых зон: http://www.php.net/manual/en/timezones.php

   date_default_timezone_set('Asia/Novosibirsk');

# Полный путь до директории скрипта.
# Например, http://test.ru
# Сразу определяйтесь, будет в домене сайта www. или не будет.
# Объяснялки: http://nanocms.name/settings.htm
# Слэш на конце НЕ НУЖЕН !!!

   $turl='http://tlk-ice.ru/test2';

# Какие модули нужно включить (должны быть в наличии):

   $_s['modul']=array(
      'design',
   );

/* Ниже этой строки в файле ничего не должно быть. */ ?>