<td valign="top" class='main'><p class="headliner">��������
      <br><!-- ���� ���� ���� ����� �������� � �� ����� ��������, ��� �� ������ ���������� �����  (������) -->
<script src="http://api-maps.yandex.ru/1.1/?key=ALuYgU4BAAAA3tRuYgIAnvBwuOK8m6Ki_qySZFrvyoBeG2gAAAAAAAAAAABgoiAF706cSPMqmUo1dNTDeJ04Dw==&modules=pmap&wizard=constructor" type="text/javascript"></script>
<script type="text/javascript">
    YMaps.jQuery(window).load(function () {
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID-3449")[0]);
        map.setCenter(new YMaps.GeoPoint(37.760289,55.811445), 15, YMaps.MapType.MAP);
        map.addControl(new YMaps.Zoom());
        map.addControl(new YMaps.ToolBar());
        YMaps.MapType.PMAP.getName = function () { return "��������"; };
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

       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(37.762435,55.80869), "constructor#pmlbmPlacemark", "<b>��� \"�� �������\"</b>. <br/>��� ���� �����������-������������� �����<br/>����� � ����<br/>���./����: +7 (495) 730-1222"));
        
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
<div style="width:450px;text-align:right;font-family:Arial;font-size:9px"><a href="http://api.yandex.ru/maps/tools/constructor/" style="color:#1A3DC1">������� � ������� ������������ ������.����</a></div>
<!-- ���� ���� ���� ����� �������� � �� ����� ��������, ��� �� ������ ���������� ����� (�����) --></p>
      <p><strong>��� ��� �������</strong> </p>
      <p>�����: 107497, ������, ��. ��������, �. 3/1, ���. 19</p>
      <p> ���./����: +7(495)730-12-22</p>
      <p>����� � ����. ����� �� ���������� � ��. ���������� </p>
      <p>
      <p class="headliner">&nbsp;</p>
    </td>
  </tr>
</table>
