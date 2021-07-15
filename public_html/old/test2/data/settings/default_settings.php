<?php

# Файл дефолтовых настроек.
# Здесь ничего исправлять не надо.
# Обратитесь к файлу setup.htm своего сайта (под авторизацией) и настраивайте всё там.

   global $rndstr;
   
   $ptn=array(

"settings"=>array(
   "t"=>"Важнейшие настройки CMS",
   "lang"=>array(
      "t"=>"
         Язык интерфейса:",
      "v"=>"
         ru•••русский
         en•••английский",
   ),
   "title"=>array(
      "t"=>"
         Название сайта:",
      "v"=>"
         title•••Lasto Nano CMS <span>Стандартная версия</span>",
   ),
   
   strrnd("abs")=>"Авторизация: Логин, пароль, метод.",
   "login"=>array(
      "t"=>"
         Логин Администратора:",
      "v"=>"
         login•••no",
   ),
   "passw"=>array(
      "t"=>"
         Пароль Администратора:",
      "v"=>"
         passw•••no",
   ),
   "auth_http"=>array(
      "t"=>
         "Способ авторизации админа.
         Варианты:
         HTTP: РНР на сервере должен быть запущен как модуль Апача.
         Куки - браузер их должен поддерживать, а файервол пропускать.",
      "v"=>"
         no•••HTTP авторизация
         ok•••Посредством кук",
   ),

   strrnd("abs")=>"Вспомогательные данные для различных сервисов:",
   "master"=>array(
      "t"=>"
         Имя Администратора",
      "v"=>"
         master•••Ваше Имя",
   ),
   "email"=>array(
      "t"=>"
         e-mail Администратора (нигде не виден):",
      "v"=>"
         email•••my@email.ru",
   ),
   "pepetun"=>array(
      "t"=>"
         Приватный ключ шифрации:",
      "v"=>"
         pepetun•••qqqqqqqqq",
   ),
),




"lang"=>array(
   "t"=>"Языковой интерфейс Наны",
   "ru"=>array(
      "t"=>
         "Языковой интерфейс в формате ключ=значение
               
         Ключ может включать латинские буквы, цифры, подчерк.
         Пробелы не допускаются.
               
         Значение- любые символы, присутствующие на клавиатуре.
         Эти символы могут складываться в том числе и в теги HTML :)
               
         Пара ключ=значение записывается в одну строку.
         Форма ввиду её конечной ширины может условно перенести строку, 
         но никаких физических переносов строк Вы допускать не должны.
               
         Очень не рекомендуется извращаться над сообщениями языкового интерфейса- 
         они подобраны из соображений уместности и адекватности.
      ",
      "ta"=>"
         lang•••ru
         panel•••<h1 class='panel'>===h1===</h1>
         document_not_found•••<h1 class='panel'>Документ не найден.</h1>
         module_not_found•••Модуль ===mod=== не найден.
         login_no_title•••Доступ отсутствует.
         login_no_content•••<h1 class='panel'>Вы НЕ авторизованы.</h1>
         login_no_http_h1•••<h1 class='panel'>Авторизация не прошла.</h1>
         login_first•••Сперва <a href='Login.htm'>залогиньтесь</a>
         login_title•••Авторизация для Админа:
         login_login•••Логин:
         login_password•••Пароль:
         login_submit•••Авторизоваться
         login_ok_title•••Авторизация осуществлена.
         login_ok_content•••<h1 class='panel'>Вы авторизованы.</h1>
         logout_ok_title•••Авторизация закрыта.
         logout_ok_content•••<h1 class='panel'>Авторизация завершена.</h1>
         logout_http_title•••Завершение авторизации невозможно.
         logout_http_content•••<h1 class='panel'>Для рассасывания авторизации закройте <u>все</u> окна браузера.</h1>",

   ),
   "en"=>array(
      "t"=>"
         То же самое, для аглоязычной версии:",
      "ta"=>"
         lang•••en
         panel•••<h1 class='panel'>===h1===</h1>
         document_not_found•••<h1 class='panel'>Document not found.</h1>
         module_not_found•••Module ===mod=== not found.
         login_no_title•••Access absent.
         login_no_content•••<h1 class='panel'>You are not authorized.</h1>
         login_no_http_h1•••<h1 class='panel'>Authorization failed.</h1>
         login_first•••<a href='Login.htm'>Login</a> first.
         login_title•••Login to admin:
         login_login•••Login:
         login_password•••Password:
         login_submit•••Authorize
         login_ok_title•••Authorization implemented.
         login_ok_content•••<h1 class='panel'>You are logged.</h1>
         logout_ok_title•••Authorization closed.
         logout_ok_content•••<h1 class='panel'>Authorization completed.</h1>
         logout_http_title•••Completion of authorization impossible.
         logout_http_content•••<h1 class='panel'>For resorption authorization <u>close all</u> browser window.</h1>",
   ),

   strrnd("abs")=>"Форма обратной связи, русский язык:",         
   "connect_ru"=>array(
      "t"=>"Интерфейс формы обратной связи:",
      "ta"=>"
         title•••Связь с автором сайта 
         email_wrong•••<script>alert('Невалидный email');</script><p><span style='color:red'>Email отвергнут как невалидный.</span></p><br>
         hacker•••Данный метод запроса не поддерживается.
         nohost•••Форма исполняется лишь на этом домене.
         limit•••<h1 class='panel'>Отказ в обслуживании.</h1><p>Число попыток отправления сообщения посредством данной формы ограничено.</p>
         send•••<h1 class='panel'>Ваше сообщение принято и отправлено адресату:</h1>
         h1•••Форма обратной связи с администором блога:
         name•••Ваше имя :
         email•••Ваш email :
         subject•••Тема письма:
         message•••Текст :
         code•••Код :
         submit•••Отослать
         warning•••<dt style='font-weight:bold;text-align:center;'>Все поля обязательны для заполнения!</dt>",
   ),

   "connect_ru_fields"=>array(
      "t"=>"
         Всплывающие подсказки формы обратной связи:",
      "ta"=>"
         UserName•••Пожалуйста, укажите Ваше имя.
         UserEmail•••Вы должны указать свой email адрес.
         Subject•••Определитесь с темой Вашего сообщения.
         UserComments•••Вы не заполнили поле комментария.
         secretcode•••Нужно перерисовать в поле формы кривенькие циферки с картинки.",
   ),

   strrnd("abs")=>"Форма обратной связи, английский язык:",      
   "connect_en"=>array(
      "t"=>"Интерфейс формы обратной связи:",
      "ta"=>"
         title•••Contacts with Admin of 
         comment•••Contacts with Autor of Comment in 
         email_wrong•••<script>alert('email is not valid');</script><p><span style='color:red'>Email rejected as invalid.</span></p><br>
         hacker•••This method is not supported.
         nohost•••This form is valid only from blog directory.
         limit•••<h1 class='panel'>Number of attempts is limited.</h1>
         send•••<h1 class='panel'>Your message is send to:</h1>
         h1•••Contact form :
         name•••Name:
         email•••email:
         subject•••Subject:
         message•••Message:
         code•••Code:
         submit•••submit
         warning•••All fields are required!",
   ),

   "connect_en_fields"=>array(
      "t"=>"
         Всплывающие подсказки формы обратной связи:",
      "ta"=>"
         UserName•••Enter your Name.
         UserEmail•••You must enter your email.
         Subject•••Subject of your letter.
         UserComments•••Textfield is empty.
         secretcode•••Tape numerics into box.",
   ),

   strrnd("abs")=>"Интерфейс блока статистики:",    
   "stats_ru"=>array(
      "t"=>"Русский язык:",
      "ta"=>"
         title•••Статистика внешних переходов на сайт.
         no_stats•••Статмодуль отключен.
         no_logs•••Нет трафика, удовлетворяющего фильтрам на кейворды.
         camouflage•••маскируется под
         sw•••График посещаемости [web], хитов:
         visitors•••посетители сайта.
         bots•••опознаны как боты.
         se•••серферы, пришедшие с поисковиков.
         rss•••Динамика трафика на RSS канале, хитов:
         users•••пользователи RSS ридеров.
         agregators•••Поисковые RSS боты.
         sm•••почтовый трафик сайта [web], переходов:
         email_hits•••переходы из аккаунтов почтовых серверов (email трафик).
         main•••Статистика поискового трафика:
         table•••хитов===запросов===поисковик
         pages•••Популярность страниц:
         source•••Наши друзья (число заходов с этих ресурсов):
         agent•••Идентификаторы поисковых ботов и браузеров:
         rss_agent•••Идентификаторы RSS агрегаторов и поисковых ботов:
         se_trafic•••Статистика заходов с
         se_hits•••хитов:
         total•••Всего:
         positions•••Позиций:
         shown•••Показано:
         failed•••<h1 class='panel'>Доступ к данному документу отсутствует.</h1>
         stat_https•••неведомый запрос",
   ),

   "stats_en"=>array(
      "t"=>"
         Английский язык:",
      "ta"=>"
         title•••Statistics of outdoors visits to blog.
         no_stats•••Statmodule is off.
         no_logs•••Filtred traffic is empty.
         camouflage•••camouflated as
         sw•••Logs of visits [web], hits:
         visitors•••visitors.
         bots•••recognized as bots.
         se•••visitors from search engines.
         rss•••Dinamic of RSS traffic, hits:
         users•••users of RSS readers.
         agregators•••search RSS bots.
         sm•••mail traffic [web], transfers:
         email_hits•••transfer from email servers accounts (email traffic).
         main•••Statistics of SE traffic:
         table•••hits===quiries===search engine
         pages•••Page popularity :
         source•••Our friends (transfers from these sites):
         agent•••IDs of search bots and user agents:
         rss_agent•••IDs of search bots and RSS agregators:
         se_trafic•••Statistic of transfers from
         se_hits•••hits:
         total•••Total:
         positions•••Positions:
         shown•••Shown:
         failed•••<h1 class='panel'>Access to this document is missing.</h1>
         stat_https•••not provided",
   ),
),





"stats"=>array(
   "t"=>"Настройки модуля статистики",
   strrnd("subkey")=>"visibility",
   "popingues"=>array(
      "t"=>"
         Паразитный трафик:",
      "v"=>"
         ok••• Блокировать
         no•••Учитывать",
   ),
   "http_in"=>array(
      "t"=>"График http трафика:",
      "v"=>"
         ok••• Отображать
         no•••Скрыть",
   ),
   "rss_in"=>array(
      "t"=>"
         График трафика на RSS канале (не задействован):",
      "v"=>"
         no••• Отображать
         ok•••Скрыть",
   ),
   "email_in"=>array(
      "t"=>"
         График трафика с почтовых серверов:",
      "v"=>"
         no••• Отображать
         ok•••Скрыть",
   ),
   "search_engines"=>array(
      "t"=>"
         Формировать ли ссылки на статистику по отдельным поисковикам.
         Под авторизацией в админке ссылки всегда активны:",
      "v"=>"
         no••• Формировать
         ok•••Запретить",
   ),

   strrnd("abs")=>"Noindex и Nofollow для различных типов ссылок в пределах сайта:",
   "statmodule_noindex"=>array(
      "t"=>"
         Закрытие ссылок от Яндекса со Статмодуля:",
      "v"=>"
         ok••• поместить в noindex
         no•••оставить видимыми",
   ),
   "statmodule_nofollow"=>array(
      "t"=>"
         То же, для других поисковиков:",
      "v"=>"
         ok••• применить nofollow
         no•••оставить видимыми",
   ),

   strrnd("abs")=>"Фильтр популярных страниц:",
   strrnd("keysval")=>"on",
   "noshowpages"=>array(
      "t"=>"Фрагменты УРЛов страниц, которые не показываем в статистике переходов:",
      "ta"=>"
         connect•••не показываем обращение к форме обратной связи.
         login•••странице для залогинивания в статистике делать нечего
         stat•••вряд ли по статсам ходят юзеры :)
         _Remark•••служебные страницы сервиса комментирования
         index••• ",
   ),
   strrnd("keysval")=>"off",

   strrnd("abs")=>"Фильтр для отсева случайных запросов:",      
   strrnd("subkey")=>"se",
   "min_hits"=>array(
      "t"=>"Минимальное количество <u>хитов</u> с поисковика, достаточное для формирования статистики по нему:",
      "v"=>"
         min_hits•••3",
   ),
   "min_requests"=>array(
      "t"=>"
         Число <u>различных запросов</u>, достаточное для упоминания этой поисковой системы в статсах:",
      "v"=>"
         min_requests•••3",
   ),

   strrnd("abs")=>"Информационная ёмкость статмодуля для <u>Админа</u>:",
   strrnd("subkey")=>"table_length_admin",
   "pages-a"=>array(
      "t"=>"Список популярных страниц",
      "v"=>"
         pages•••20",
   ),
   "source-a"=>array(
      "t"=>"
         Список друзей сайта",
      "v"=>"
         source•••20",
   ),
   "agent-a"=>array(
      "t"=>"
         Юзерагенты http канала",
      "v"=>"
         agent•••20",
   ),
   "rss_agent-a"=>array(
      "t"=>"
         Юзерагенты RSS канала",
      "v"=>"
         rss_agent•••20",
   ),
   "se_requests-a"=>array(
      "t"=>"
         Список поисковыех запросов",
      "v"=>"
         se_requests•••30",
   ),

   strrnd("abs")=>"Информационная ёмкость статмодуля для <u>Серфера</u>:",
   strrnd("subkey")=>"table_length_seffer",
   "pages-s"=>array(
      "t"=>"Список популярных страниц",
      "v"=>"
         pages•••0",
   ),
   "source-s"=>array(
      "t"=>"
         Список друзей сайта",
      "v"=>"
         source•••0",
   ),
   "agent-s"=>array(
      "t"=>"
         Юзерагенты http канала",
      "v"=>"
         agent•••20",
   ),
   "rss_agent-s"=>array(
      "t"=>"
         Юзерагенты RSS канала",
      "v"=>"
         rss_agent•••0",
   ),
   "se_requests-s"=>array(
      "t"=>"
         Список поисковыех запросов",
      "v"=>"
         se_requests•••20",
   ),

   strrnd("abs")=>"Настройки для тонкого тюнинга:",
   strrnd("subkey")=>"periods",
   "se_log"=>array(
      "t"=>"За сколько дней копить статистику:",
      "v"=>"
         se_log•••30",
   ),
   "se_reindex"=>array(
      "t"=>"
         Период реиндексации статистики, в часах:",
      "v"=>"
         se_reindex•••1",
   ),
   "pages_cash_time"=>array(
      "t"=>"
         Время кэширования документов статмодуля в часах.
         Если указать ноль, кэширования не будет.",
      "v"=>"
         pages_cash_time•••0",
   ),
   strrnd("subkey")=>"time_limit",
   "max_se_execute"=>array(
      "t"=>"
         Гарантированный таймаут:
         Если время исполнения скрипта ограничено конкретным значением таймаута (в секундах), впишите сюда значение, заведомо <u>меньшее</u> величины этого таймаута.",
      "v"=>"
         max_se_execute•••20",
   ),
   strrnd("subkey")=>"options",
   "type"=>array(
      "t"=>"
         Тип статистики (не трогайте):",
      "v"=>"
         type•••Nano",
   ),
   "threshold_filter"=>array(
      "t"=>"
         Фильтр случайных поисковых запросов.
         Начиная со скольки повторов одного и того же поискового запроса отображать его на странице конкретного поисковика. 
         Если указать единицу, будут показаны кейворды всех переходов с этой искалки. Если двойку- только те кейворды, по которым за последний месяц было два и более переходов. И так далее.",
      "v"=>"
         threshold_filter•••1",
   ),

   strrnd("abs")=>"Важнейшие локальные базы статмодуля:",
   "stat_log"=>array(
      "t"=>"Сюда лучше не вмешиваться:",
      "ta"=>"
         cashe•••./data/logs/
         rss•••hits.rss.db
         log•••hits.http.db
         me•••hits.mem.db
         se_log•••search.db
         sim_sim•••update",
   ),

   strrnd("abs")=>"Эти базы могут быть общими для нескольких Нанок:",
   "files"=>array(
      "t"=>
         "Данные базы можно вынести за пределы папки CMS, написав <u>локальные</u> 
         пути до туда, и использовать одновременно для множества Нанок, 
         живущих на Вашем хостинге, возможно, в разных доменах.
         
         Обратите внимание, пути строго локальные, не абсолютные:",
      "ta"=>"
         signatures•••./data/settings/stat_signatures.php",
   ),
),




"softbans"=>array(
   "t"=>"Мягкие баны",
   strrnd("keysval")=>"on",
   "host"=>array(
      "t"=>"Изгоняем из \"друзей сайта\" статмодуля домены по хосту/IP.
      
         Домены сайтов, которые не отображаются в \"друзьях сайта\".
         Это те сайты, на которые Вы не хотите ссылаться.
         Или которым просто незачем торчать в \"друзьях сайта\".
         
         Синтаксис: домен и знак равенства на конце.",
      "ta"=>"
         badsite.ru•••
         clck.yandex.ru•••",
   ),
   "ip"=>array(
      "t"=>"
         Айпишники сайтов, которые не отображаются в \"друзьях сайта\".
         Иногда множество спамовых сайтов ставятся на один аккаунт хостера.
         Понятно, что все они живут в одном айпишнике.
         И намного проще определить его с помощью сервиса <a href='http://2ip.ru/lookup.php' target='_blank'>2ip.ru</a> и прописать сюда, чем выловить все домены в этом айпишнике, и заколлекционировать в предыдущей секции.
         
         Синтаксис: айпишник и знак равенства на конце.",
      "ta"=>"
         255.255.255.255•••",
   ),
   "userid"=>array(
      "t"=>"
         Идентификаторы (юзерагент), хиты которых не попадают в статистику.
         Например, если бот конторы по продаже ссылок не прикидывается серфером, а с наивной честностью идентифицирует себя ботом конторы по продаже ссылок, то зачем его светить в статистике?
         
         Синтаксис: юзерагент и знак равенства на конце.",
      "ta"=>"
         LinkFeed•••
         PROPAGE•••
         SAPE.BOT•••
         promotext•••",
   ),
   "keyword"=>array(
      "t"=>"
         Игнорируемые ключевые слова (и фрагменты ключевиков), запрещённые к отображению в статистике.
         
         Синтаксис: фрагмент слова со знаком равенства на конце.",
      "ta"=>"
         голы•••
         гола•••
         нудис•••
         нудиз•••
         натурис•••
         натуриз•••
         интим•••
         порно•••
         порнух•••
         траха•••
         трахну•••
         проститут•••
         секс•••",
   ),
   strrnd("keysval")=>"off",
),




"hardbans"=>array(
   "t"=>"Жёсткие баны",
   strrnd("keysval")=>"on",
   "userid"=>array(
      "t"=>"Избавляем себя от нежелательного входящего трафика.
      
         http клиенты, которым мы <u>не даём</u> просматривать блог (всевозможные качалки, например).
         Обратите внимание, что юзерагент <font color='blue'>href</font> обязательно должен присутствовать в данном списке- не убирайте его.
         
         Синтаксис: юзерагент и знак равенства на конце.",
      "ta"=>"
         Downloader•••
         Download Master•••
         Emailsiphon•••
         Emailwolf•••
         Getright•••
         Gozil•••
         Htmlparser•••
         Ms Frontpage•••
         Msproxy•••
         Offlin•••
         ReGet•••
         Superbot•••
         Teleport•••
         Teleportpro•••
         Webbandit•••
         Webcopier•••
         Web Downloader•••
         Webstr•••
         Webzip•••
         WGet•••
         Winhttp robot•••
         href•••",
   ),
   "ip"=>array(
      "t"=>"
         Айпишники, которым запрещён доступ к сайту по http.
         
         Фрагменты айпишников понимаются- запись 78.108.81.= 
         забанит весь диапазон IP 78.108.81.0-78.108.81.255
         
         Синтаксис: айпишник и знак равенства на конце.",
      "ta"=>"
         78.108.81.200•••
         89.108.66.161•••",
   ),
   "iprss"=>array(
      "t"=>"
         Айпишники, которым запрещён доступ к RSS каналу.
         Всевозможные грабберы контента очень любят пользовать RSS канал.
         Вот для них эта радость...
         
         Фрагменты айпишников здесь так же понимаются.
         
         Синтаксис: айпишник и знак равенства на конце.",
      "ta"=>"
         78.108.81.200•••
         89.108.66.161•••",
   ),
   "host"=>array(
      "t"=>"
         Сайты, трафик с которых вообще не принимается Нанкой.
         
         Синтаксис: домен и знак равенства на конце.",
      "ta"=>"
         rosspoisk.ru•••
         yoursuccess.ru•••
         Anonymouse.org•••
         anonymouse.org•••",
   ),
   strrnd("keysval")=>"off",
),




"remark"=>array(
   "t"=>"Настройки модуля комментирования",
   "onair"=>array(
      "t"=>"
         Состояние модуля комментирования:",
      "v"=>"
         ok••• Включен
         no•••Выключен",
   ),
   "place"=>array(
      "t"=>"
         Способ доступа к комментариям:",
      "v"=>"
         ok••• По ссылке с документа
         no•••Размещаются в документе",
   ),
   "method"=>array(
      "t"=>"
         Порядок сортировки комментариев:",
      "v"=>"
         ok••• Новые снизу
         no•••Новые сверху",
   ),
   "viewer"=>array(
      "t"=>"
         Если комментарии открываются в отдельном URL-е,
         то возможен выбор варианта отображения:",
      "v"=>"
         cote•••Текст и комментарии
         comm•••Комментарии без текста",
   ),
   "poster"=>array(
      "t"=>"
         Страница формы комментирования содержит:",
      "v"=>"
         text•••Только текст документа
         comm•••Только другие комментарии
         cote•••И текст, и комментарии
         none•••Лишь форму для постинга",
   ),

   strrnd("abs")=>"Управление видимостью ссылок с комментариев:",   
   "noindex"=>array(
      "t"=>"
         Закрывать от индексирования Яндексом:",
      "v"=>"
         ok••• поместить в noindex
         no•••прямая ссылка",
   ),
   "nofollow"=>array(
      "t"=>"
         То же, для других поисковиков:",
      "v"=>"
         ok••• применить nofollow
         no•••прямая ссылка",
   ),

   strrnd("abs")=>"Интерфейс блока комментирования:",    
   "lang_ru"=>array(
      "t"=>"Русский язык:",
      "ta"=>"
         remark_off_t•••Выключить комментарии на этой странице.
         remark_off_b•••Remark On
         remark_on_t•••Включить комментарии на этой странице.
         remark_on_b•••Remark Off
         remark_show_all•••Latest
         remark_latest_no•••Неотмодерированные комментарии отсутствуют.
         remark_latest_ok•••Имеются неотмодерированные комментарии:
         remark_show_alt•••Показать новые комментарии.
         remark_link•••<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Оставить комментарий.</a></div>
         remark_show•••<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Комментариев: ===num===</a></div>
         document_link•••<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Вернуться к документу.</a></div>
         form_title•••Оставьте комментарий к этому документу:
         form_name•••Ваше имя:
         form_email•••Ваш email:
         form_subject•••Тема:
         form_code•••Капча:
         form_message•••Ваша мысль:
         form_submit•••Отправить комментарий на модерацию
         form_warning•••Все поля обязательны для заполнения!
         send_title•••Ваш комментарий принят на модерацию.
         send_mess•••<p>После одобрения модератором Ваш комментарий будет размещён на нашем сайте.</p><p>До той поры Ваш комментарий <u>условно</u> показывается как опубликованный, но только при просмотре нашего сайта из-под текущего браузера и конкретно на этой машине, но только в том случае, если браузеру разрешено работать с куками, а операционной системе- сохранять их.</p>
         moder_off_title•••Отказ в обслуживании.
         moder_off_screen•••<p>Комментарии для этой страницы отключены.</p>
         moder_su_title•••Комментарий одобрен.
         moder_de_title•••Комментарий удалён.
         moder_no_title•••Отказ в обслуживании.
         moder_su_screen•••Вернуться к документу.
         moder_de_screen•••Вернуться к документу.
         moder_no_screen•••Перейти к документу.</a></p><p>Действие по модерации документа выполнено ранее, либо от момента подачи комментария прошло более месяца, и он считается устаревшим, либо Вы воспользовались некорректной ссылкой.<a>
         edit_title•••Редактирование комментария:
         edit_submit•••Внести изменения
         edit_ok_title•••Изменения в комментарий внесены.
         edit_no_title•••Внесение изменения в комментарий:
         edit_yes•••<p><font color='red'>Комментарий отредактирован.</font> <a href='===url==='>Вернуться.</a></p>
         delete_no_title•••Не получилось удалить комментарий.
         delete_no_doc•••Линк на удаление комментария не валиден.	 <a href='===url==='>Вернуться.</a>
         delete_ok_title•••Комментарий удалён.
         delete_ok_doc•••Комментарий удалён. <a href='===url==='>Вернуться.</a>
         empty•••end",
   ),

   "lang_en"=>array(
      "t"=>"
         Английский язык:", # Тупо переведено Гуглом, и может оказаться ересью.
      "ta"=>"
         remark_off_t•••Turn off comments on this page.
         remark_off_b•••Remark On
         remark_on_t•••Insert a comment on this page.
         remark_on_b•••Remark Off
         remark_show_all•••Latest
         remark_latest_no•••Not moderated comments available.
         remark_latest_ok•••Not moderated comments:
         remark_show_alt•••See new comments.
         remark_link•••<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Leave a comment.</a></div>
         remark_show•••<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Comments: ===num===</a></div>
         document_link•••<div style='text-align:right;padding:5px 20px;'><a href='===link==='>Back to the document.</a></div>
         form_title•••Add a comment to this document:
         form_name•••Your name:
         form_email•••Your email:
         form_subject•••Subject:
         form_code•••Captcha:
         form_message•••Your idea:
         form_submit•••Send a comment on moderation
         form_warning•••All fields are required!
         send_title•••Your comment accepted for moderation.
         send_mess•••<p>After moderator approval Your comment will be posted on our website.</p><p>Until then, your comment <u>conditionally</u> is displayed as a published, but only when viewing our site from the current browser and specifically on this machine, but only if the browser is allowed to work with cookies, and operating system - to keep them.</p>
         moder_off_title•••Denial of service.
         moder_off_screen•••<p>Comments for this page are disabled.</p>
         moder_su_title•••Comment approved.
         moder_de_title•••Comment deleted.
         moder_no_title•••Denial of service.
         moder_su_screen•••Back to the document. 
         moder_de_screen•••Back to the document. 
         moder_no_screen•••Back to the document.</a></p><p>Moderation of document executed earlier, or from the filing comments has passed more than a month, and it is considered obsolete, or you used an incorrect reference.<a> 
         edit_title•••Editing a comment:
         edit_submit•••Amend
         edit_ok_title•••Changes to the comment made.
         edit_no_title•••Making changes in your comment: 
         edit_yes•••<p> <font color='red'>Comment edited.</font> <a href='===url==='>Back.</a></p>
         delete_no_title•••Failed to delete the comment.
         delete_no_doc•••Link to delete the comment is not valid. <a href='===url==='>Back.</a>
         delete_ok_title•••Comment deleted.
         delete_ok_doc•••Comment deleted. <a href='===url==='>Back.</a>
         empty•••end",
   ),
),




"nulled"=>array(
   "t"=>"Сброс всех настроек к исходным",
   strrnd("subkey")=>"default",
   "safe"=>array(
      "t"=>"Если Вы что-то напортачили с настройками, и никак не можете разобраться, что же в итоге получилось, то всегда можно уронить настройки до дефолтовых, после чего начать конфигурацию заново.
         
         Обратите внимание, что теряются <u>все</u> данные о конфигурации.
         
         Ваш выбор <font color='red'>необратим</font> - сброс настроек:",
      "v"=>"
         no•••не сбрасывать
         ok••• сбросить",
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