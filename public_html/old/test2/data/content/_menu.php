<?php /* Выше этой строки в файле ничего не должно быть */

# Левая менюха навигации. Может отсутствовать.
   $left_menu=array(
      'О Нано-CMS кратко:' => array(
         array('http://nanocms.name/index.htm','Бенефициары этого движка','Кому "Нана" адресована?'),
         array('http://nanocms.name/assignment.htm','Когда скрипт данной CMS будет Вам полезен...','Где и как применяется?'),
      ),
      'Установка Нано-CMS:' => array(
         array('http://nanocms.name/server.htm','Что должно быть разрешено Вашим сервером','Требования к серверу'),
         array('http://nanocms.name/structure.htm','Пофайловый состав дистрибутива','Перенос файлов на сервер'),
         array('http://nanocms.name/settings.htm','Что и как необходимо настраивать','Настройка settings.php'),
      ),
      'Наполнение контентом:' => array(
         array('http://nanocms.name/admin.htm','Первое проникновение в админку','Админка, авторизация'),
         array('http://nanocms.name/files.htm','Где расположены файлы?','Файловая структура'),
         array('http://nanocms.name/content.htm','Как построен документ?','Структура документа'),
         array('http://nanocms.name/design.htm','Тонкости дизайнопостроения','Шаблон дизайна'),
         array('http://nanocms.name/menu.htm','','Меню CMS'),
         array('http://nanocms.name/connect.htm','Email','Форма обратной связи'),
         array('http://nanocms.name/login.htm','Login','Форма авторизации'),
         array('http://nanocms.name/blocks.htm','Дополнительные блоки CMS','О рекламных блоках'),
      ),
      'Масштабируемость:' => array(
         array('http://nanocms.name/folders.htm','Если хочется сделать большой сайт','Структурирование наны'),
      ),
      'Даун Лоад:' => array(
         array('http://nanocms.name/bay.htm','Получение дистрибутива','Скачать нано-CMS'),
         array('http://nanocms.name/design/','Получите три разных варианта дизайна','Скачать дизайны'),
      ),
      'Сопутствующее:' => array(
         array('http://nanocms.name/support.htm','','Про саппорт'),
         array('http://nanocms.name/denwer.htm','','Про Денвер'),
      ),
   );

# Правая менюха навигации. Может отсутствовать.
   $right_menu=array(
      'Важные кнопки:' => array(
         array('http://nanocms.name/','Базовая nano-CMS','Базовая Нано-CMS'),
         array('http://nanocms.name/simple/','Simple nano-CMS','Крошечная Нано-CMS'),
         array('http://nanocms.name/remark/','nano-CMS с комментариями','Общительная Нана'),
         array('http://nanocms.name/statmodule/','nano-CMS + StatModule','Любопытствующая Нана'),
         array('http://nanocms.name/transfer/','nano-CMS + редиректор','Посылающая Нана'),
         array('http://nanocms.name/secrecy/','nano-CMS + MemberArea','Скрытная Нана'),
         array('http://nanocms.name/email.htm rel="nofollow" ','Написать письмо автору','Связь с разработчиком'),
      ),
      'Апгрейды тут:' => array(
         array('http://nanocms.name/upgrade/','Обновить версию модуля','Проапгрейдить модуль'),
      ),
      'Явно полезное:' => array(
         array('http://nanocms.name/blog.htm','','Новости нашего блога'),
      ),
   );

# Верхняя менюха навигации. Может отсутствовать.
# Примечание: верхняя навигация на любителя. Колонок по бокам вполне хватает...
   $top_menu=array(
      'top' => array(
         array('index.htm','Home','Home'),
         array('email.htm rel="nofollow" ','Connection','Email'),
#        array('stat.htm','Stat','Stat'),
         array('Login.htm','Login','Login'),
      ),
   );
# Под авторизацией топменю изменяет свой вид:
   if (true==$_s['admin']) 
   $top_menu=array(
      'top' => array(
         array('setup.htm','Setup','Setup'),
#        array('stat.htm','Stat','Stat'),
         array('Logout.htm','Logout','Logout'),
      ),
   );

/* Ниже этой строки в файле ничего не должно быть. */ ?>