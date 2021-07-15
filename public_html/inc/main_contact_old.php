<td valign="top" class='main'><p class="headliner">Контакты
      <br><!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту  (начало) -->
<script src="http://api-maps.yandex.ru/1.1/?key=ALuYgU4BAAAA3tRuYgIAnvBwuOK8m6Ki_qySZFrvyoBeG2gAAAAAAAAAAABgoiAF706cSPMqmUo1dNTDeJ04Dw==&modules=pmap&wizard=constructor" type="text/javascript"></script>
<script type="text/javascript">
    YMaps.jQuery(window).load(function () {
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID-3449")[0]);
        map.setCenter(new YMaps.GeoPoint(37.760289,55.811445), 15, YMaps.MapType.MAP);
        map.addControl(new YMaps.Zoom());
        map.addControl(new YMaps.ToolBar());
        YMaps.MapType.PMAP.getName = function () { return "Народная"; };
        map.addControl(new YMaps.TypeControl([
            YMaps.MapType.MAP,
            YMaps.MapType.SATELLITE,
            YMaps.MapType.HYBRID,
            YMaps.MapType.PMAP
        ], [0, 1, 2, 3]));

        YMaps.Styles.add("constructor#pmlbmPlacemark", {
            iconStyle : {
                href : "http://izeberg.ru/images/pmlbm.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });

       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(37.762435,55.80869), "constructor#pmlbmPlacemark", "<b>ООО \"ЛК Айсберг\"</b>. <br/>Все виды транспортно-логистических услуг<br/>Склад и офис<br/>Тел./факс: +7 (495) 730-1222"));
        
        function createObject (type, point, style, description) {
            var allowObjects = ["Placemark", "Polyline", "Polygon"],
                index = YMaps.jQuery.inArray( type, allowObjects),
                constructor = allowObjects[(index == -1) ? 0 : index];
                description = description || "";
            
            var object = new YMaps[constructor](point, {style: style, hasBalloon : !!description});
            object.description = description;
            
            return object;
        }
    });
</script>
      <div id="YMapsID-3449" style="width:450px;height:350px"></div>
<div style="width:450px;text-align:right;font-family:Arial;font-size:9px"><a href="http://api.yandex.ru/maps/tools/constructor/" style="color:#1A3DC1">Создано с помощью инструментов Яндекс.Карт</a></div>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) --></p>
      <p><strong>ООО «ЛК Айсберг»</strong> </p>
      <p>Адрес: 107497, Москва, ул. Амурская, д. 3/1, стр. 19</p>
      <p> Тел./факс: +7(495)730-12-22</p>
      <p>Склад и офис. Въезд на территорию с ул. Тагильская </p>
      <p>
      <p class="headliner">&nbsp;</p>
    </td>
  </tr>
</table>
