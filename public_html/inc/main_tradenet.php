<?

if (empty($item)) {
echo "<td valign='top' class='main'><p class='headliner'>��������� ��������������� ������
      
<!-- ���� ���� ���� ����� �������� � �� ����� ��������, ��� �� ������ ���������� �����  (������) -->
<script  src='https://api-maps.yandex.ru/1.1/?key=AFWiulIBAAAAUGfORAIA60M0ZHBUc6qW4b1KzT4pAYxuS4wAAAAAAAAAAACwl1-Oo6404P4JeTedKN_9hdqg3A==&modules=pmap&wizard=constructor'  type='text/javascript'></script>
<script type='text/javascript'>
    YMaps.jQuery(window).load(function () {
        var map = new YMaps.Map(YMaps.jQuery('#YMapsID-1050')[0]);
        map.setCenter(new YMaps.GeoPoint(38.774281,56.622104), 5, YMaps.MapType.MAP);
        map.addControl(new YMaps.Zoom());
        map.addControl(new YMaps.ToolBar());
        YMaps.MapType.PMAP.getName = function () { return '��������'; };
        map.addControl(new YMaps.TypeControl([
            YMaps.MapType.MAP,
            YMaps.MapType.SATELLITE,
            YMaps.MapType.HYBRID,
            YMaps.MapType.PMAP
        ], [0, 1, 2, 3]));

        YMaps.Styles.add('constructor#pmlbmPlacemark', {
            iconStyle : {
                href : 'https://tlk-ice.ru/images/pmlbm.png',
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add('constructor#FF3732c85Polyline', {
            lineStyle : {
                strokeColor : 'FF3732c8',
                strokeWidth : 5
            }
        });
      
  map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(49.122853,55.786764), 'constructor#pmlbmPlacemark', '������<br><b>METRO C&C (1029)</b><br><i>620072, �.   ������������, ��. ������ ���������� ������, �. 21</i><br><b>REAL</b><br><i>420126, �.������, ��-� �������, 46/33</i><br><b>����</b><br><i>�. ������, �������� ������, �.  1</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(52.407911,55.741678), 'constructor#pmlbmPlacemark', '���������� �����<br><b>METRO C&C</b><br><i>423822, ���������� ���������, �. ���������� �����, ��-� ������, �. 33</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(49.418084,53.511311), 'constructor#pmlbmPlacemark', '��������<br><b>METRO C&C</b><br><i>445047, ���������  ���., �. ��������, ����� �����, 2-�</i><br><b>REAL</b><br><i>445004, ��������, ������������� �., 6</i><br><b>����</b><br><i>��. ����������, �.81</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(55.09735,51.768099), 'constructor#pmlbmPlacemark', '��������<br><b>METRO C&C</b><br><i>460000, �. ��������, ��-�. ������, 155</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(48.41216,54.306953), 'constructor#pmlbmPlacemark', '���������<br><b>METRO C&C</b><br><i>432071, �.  ���������, ��. ��������, �. 100-�'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(37.915238,59.128893), 'constructor#pmlbmPlacemark', '���������'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(39.744918,47.227163), 'constructor#pmlbmPlacemark', '������-��-����<br><b>METRO C&C</b><br><i>(1024) 344090, �. ������-��-����, ��. ��������, 255</i><br><i>(1053) 344111, �. ������-��-����, ��-� 40-����� ������, �. 340</i><br><b>����</b><br><i>��. �������������</i><br><i>�. �����</i><br><b>REAL</b><br><i>344068, ���������� ���., �.������-��-����, ��.������, 2�</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(41.965167,45.042935), 'constructor#pmlbmPlacemark', '����������<br><b>METRO C&C</b><br><i>355042, �.  ����������, ��. ����� �����, 13</i><br><b>�� �������</b><br><i>355042, �. ����������, ��.4-�� ������������, �. 7 �'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(38.976032,45.034942), 'constructor#pmlbmPlacemark', '���������<br><b>METRO C&C</b><br><i>350087, �.  ���������,  ���������� �����, �. 30</i><b>�� �������</b><br><i>�. ���������, ��. �������-����������, 178/180, ���. 1</i><b>����</b><br><i>������</i><br><i>��.  ��������������</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(43.02596,44.052845), 'constructor#pmlbmPlacemark', '���������<br><b>METRO C&C</b><br><i>�������������� ����, �. ���������, ������������� �����, 94</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(37.7767,44.720479), 'constructor#pmlbmPlacemark', '������������'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(61.40082,55.160324), 'constructor#pmlbmPlacemark', '���������<br><b>METRO C&C</b><br><i>456620,  ����������� ���., �. �������, ��. ������, �. 76</i><br/><b>������� ���������</b><br/><i>��. ��������������, � 136</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(60.59734,56.837982), 'constructor#pmlbmPlacemark', '������������<br><b>METRO C&C (1029)</b><br><i>620072, �.   ������������, ��. ������ ���������� ������, �. 21</i><br><b>METRO C&C (1030)</b><br><i>620043, �. ������������, ��. �����������, �. 85</i><br><b>METRO C&C  (1065)</b><br><i>620135, �. ������������, �������� �����������, �. 102�</i><br><b>����</b><br><i>��. �����������</i><br><b>���� ����</b><br><i>��.  ���������</i><br><b>��������</b><br><i>���������� ���., �. 1, ����� 12</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(65.558412,57.182631), 'constructor#pmlbmPlacemark', '������<br><b>METRO C&C</b><br><i>625062, �. ������,  ��. �����������, 141'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(55.983161,54.738437), 'constructor#pmlbmPlacemark', '���<br><b>METRO C&C</b><br><i>450018, �. ���, ��.  ��������, 170</i><br/><b>����</b><br/><i></i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(56.241077,58.00849), 'constructor#pmlbmPlacemark', '�����<br><b>METRO C&C</b><br><i>614065, �. �����, ����� �����������, 393</i><br><b>������� ���������</b><br><i>��. ������ ������</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(35.89225,56.855526), 'constructor#pmlbmPlacemark', '�����<br><b>METRO C&C</b><br><i>170028, �. �����, ��.  ���������, 122'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(31.270337,58.522711), 'constructor#pmlbmPlacemark', '������� ��������'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(30.313622,59.93772), 'constructor#pmlbmPlacemark', '�����-���������<br><b>METRO C&C</b><br><i>(1015)  197227, �. �����-���������, ������������� ��-�., �. 3 ���. �</i><br><i>(1016) 195279, �. �����-���������, ��-� ��������, �. 4, ���. �</i><br><i>(1020) 196240, �. �����-���������,  ���������� �����, �. 23, ���. �</i><br><b>����</b><br><i>������� (��. �������)</i><br><i>������ (���. �����)</i><br><i>���� (���������� �����</i><br><i>�������  (���������� �-��)</i><br><i>�������� (�������� ������))</i><br><i>������ (��. ������)</i><br><b>REAL</b><br><i>(8012) 195276, �.�����-���������, ��-� ��������,   �.41</i><br><i>(8013) 196244, �����-���������, ���������� �����, ��-� �����������, �. 14</i><br><b>���������</b><br><i>�. �����-���������, �. ������, ���. ����������, �. 5  �, ������ �'));

       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(33.077819,68.963322), 'constructor#pmlbmPlacemark', '��������'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(44.997376,53.183188), 'constructor#pmlbmPlacemark', '�����<br><b>METRO C&C</b><br><i>440513, ����. ���., ����. �����, �. �������� ��. �������, �. 1</i><br/><b>����</b><br/><i>�. �����, ������������ �-��, ��. �����������, �. 1</i><br/><b>�����</b><br/><i>440066, �. �����, �������� ����������, �.2�</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(46.004459,51.537775), 'constructor#pmlbmPlacemark', '�������<br><b>METRO C&C</b><br><i>410010 �. �������,  ��. ��������, �. 14</i><br/><b>�����</b><br/><i>410050, �.�������, ���.���������, ��.����������, 2�</i><br/><b>����</b><br/><i>�. �������, ��. �������, �. 17</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(44.515942,48.707793), 'constructor#pmlbmPlacemark', '���������<br><b>METRO C&C</b><br><i>400075, �.   ���������, ��. ������������, �. 164�</i><br><b>REAL</b><br><i>400075, �.���������, ��.������������,175</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(48.03034,46.349636), 'constructor#pmlbmPlacemark', '���������<br><b>METRO C&C</b><br><i>414021, �.   ���������, ��. ���������, �. 54/��. <br>���������� ���� ����, �. 83</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(37.619028,54.193802), 'constructor#pmlbmPlacemark', '����<br><b>METRO C&C</b><br><i>300903 �������� ���.,  ��������� �-��, ��������� �., �. �������, �. 104'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(39.597603,52.603587), 'constructor#pmlbmPlacemark', '������<br><b>METRO C&C</b><br><i>398059, �. ������, ��. 50 ��� ����, 6</i><br><b>REAL</b><br><i>398036, �.������, ��.����� ����� ������ ������� ������, 26</i><br><b>����</b><br><i>�. ������, ��. ���������, �. 66'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(41.442401,52.719785), 'constructor#pmlbmPlacemark', '������<br><b>REAL</b><br><i>392036, �.������, ��.  ���������, �.194'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(39.204096,51.662496), 'constructor#pmlbmPlacemark', '�������<br><b>METRO C&C</b><br><i>394042, �. �������,   ��. ��������, �. 56�</i><br><b>����</b><br><i>����������� ���, ��������� �-��, <br>��������� �, ��. ��������, �. 3</i><br><b>O���</b><br><i>�������, ��. �����������,  �. 35</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(36.237041,54.533832), 'constructor#pmlbmPlacemark', '������<br><b>METRO C&C</b><br><i>248033, �. ������, �������� �., 51</i><br><b>����</b><br><i>248033, �. ������, �������� �., 51</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(34.376235,53.281039), 'constructor#pmlbmPlacemark', '������'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(36.181714,51.717189), 'constructor#pmlbmPlacemark', '�����<br><b>METRO C&C</b><br><i>630049, �. �����, ��. ����� ������, �. 85'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(40.420325,56.13445), 'constructor#pmlbmPlacemark', '��������<br><b>GLOBUS</b><br><i>600027, �. ��������, ����������� ��-��, �.28'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(40.996702,57.008607), 'constructor#pmlbmPlacemark', '�������<br><b>METRO C&C</b><br><i>153009, ����������   ���., ���������� �����, ����� �. ��������, ���. 1</i><br><b>REAL</b><br><i>153013, �.�������, ��.����������, �.141</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(39.887714,57.622506), 'constructor#pmlbmPlacemark', '���������<br><b>METRO C&C</b><br><i>150022, �.���������, ��-� ������, 32</i><br><b>REAL</b><br><br><b>������ ��</b><br><i>��-� ���������, �. 159</i><br><b>GLOBUS</b><br><i>150158, ����������� �������,  ����������� �-�, ���. ������� ���, ���. �1</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(39.731039,54.619427), 'constructor#pmlbmPlacemark', '������<br><b>METRO C&C</b><br><i>390044, �. ������, ���������� �., �. 25</i><br><b>��������</b><br><i></i><br><b>GLOBUS</b><br><i>390507, ��������� ���., ��������� �-�, �.��������</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(73.365364,54.990302), 'constructor#pmlbmPlacemark', '����<br><b>METRO C&C</b><br><i>644070, �. ����, �������� ��������� ��������, �.15, ����. 1</i><br><b>����</b><br><i>������� ������������</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(87.22009,53.796826), 'constructor#pmlbmPlacemark', '�����������<br><b>METRO C&C</b><br><i>654018, �. �����������, ���������� �����, 19</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(92.870412,56.008711), 'constructor#pmlbmPlacemark', '����������<br><b>METRO C&C</b><br><i>660015, ��, ������������ ����, �. �������, �������� ������������, 1</i><br><b>�� �������</b><br><i>�. ����������, ��. ������, 175</i>'));
map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(94.07049,55.007731), 'constructor#pmlbmPlacemark', '������������ ����<br><b>����</b><br><i>��. 9 ���<br><i>��. ��������� ���������, �. 23<br><i>��. �������������, �. 40 �, ���. 4</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(82.906928,55.028739), 'constructor#pmlbmPlacemark', '�����������<br><b>METRO C&C</b><br><i>(1044) 630028, �. �����������, ��. ��������������, 290</i><br><i>(1060) 630049, �. �����������, ����������� �����, ��. ��������, 11</i><br><b>����</b><br><i>��. ��������</i><br><i>���������, �. 1</i><br><b>����</b><br><i>��. �������</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(44.002672,56.324117), 'constructor#pmlbmPlacemark', '������ ��������<br><b>METRO C&C</b><br><i>(1021) 603070, �. ������ ��������, ��������� �������, �. 3 �</i><br><i>(1050) 603057, �. ������ ��������, ��. �������, �. 4 �</i><br><b>����</b><br><i>�. ��������</i><br><b>REAL</b><br><i>603126, �.������ ��������, ��.���������, �.187�</i><br><b>������� ���������</b><br><i>��. ����������, �. 11</i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(20.500803,54.7197), 'constructor#pmlbmPlacemark', '�����������<br><b>METRO C&C</b><br><i>�. �����������, ���������� ��-�, �. 279</i><br><b>������� ���������</b><br/><i>�. ����������, ��. ������������� �. 14</i><br/><i>�. ����������, ��. ��������, �. 1</i><br/><i>�. ����������,  ��. ���������, �. 18</i><br/><i>���������������� ���., �. ��������, ��. �������, �. 2 �</i><br/><i>�. ����������, ��. ���������, �. 91-91 �</i><br/><i>�. ����������, ��.  ���������, �. 62 �</i><br/><i>�. ����������, ��. ������, �. 15 �</i><br/><i>�. ����������, ��. ������������, �. 1-7</i><br/><i>�. ����������, ���. ����������, ��. ������������,  �. 9 �</i><br/><i>�. ����������, ��. ������������� ����������, �. 215</i><br><b>�� ��������</b><br/><i></i>'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(49.662283,58.581576), 'constructor#pmlbmPlacemark', '�����<br><b>METRO C&C</b><br><i>610000, �. �����, ��. ����������, 205'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(86.087781,55.359594), 'constructor#pmlbmPlacemark', '��������<br><b>METRO C&C</b><br><i>��. �������������, �. 58'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(85.018822,56.515662), 'constructor#pmlbmPlacemark', '�����<br><b>METRO C&C</b><br><i>634061, �.�����, ��.��������, �.57'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(83.74962,53.356132), 'constructor#pmlbmPlacemark', '�������'));
map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(59.046955,53.402375), 'constructor#pmlbmPlacemark', '������������<br><b>METRO C&C</b><br><i>�. ������������, ��.50-�� ����� ��������, �. 69'));
       map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(50.191184,53.205226), 'constructor#pmlbmPlacemark', '������<br><b>METRO C&C</b><br><i>443072, �. ������, 18  �� ����������� �����, �. 5 �</i><br><b>����</b><br><i>��. �������</i>'));
map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(36.598155,50.600486), 'constructor#pmlbmPlacemark', '��������<br/><b>������� ���������</b><br/><i>��-��   �.������������ �.164</i>'));
map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(34.376235,53.281039), 'constructor#pmlbmPlacemark', '������<br><b>METRO C&C</b><br><i>241029, �. ������,   ��������� �����, ���������� ��-�., �. 1 �</i>'));
map.addOverlay(createObject('Placemark', new YMaps.GeoPoint(39.883869,59.223043), 'constructor#pmlbmPlacemark', '�������<br/><b>������� ���������</b><br/><i>��������  �����  � 12</i>'));
       map.addOverlay(createObject('Polyline', [], 'constructor#FF3732c85Polyline', ''));
       map.addOverlay(createObject('Polyline', [], 'constructor#FF3732c85Polyline', ''));


        function createObject (type, point, style, description) {
            var allowObjects = ['Placemark', 'Polyline', 'Polygon'],
                index = YMaps.jQuery.inArray( type, allowObjects),
                constructor = allowObjects[(index == -1) ? 0 : index];
                description = description || '';
            
            var object = new YMaps[constructor](point, {style: style, hasBalloon : !!description});
            object.description = description;
            
            return object;
        }
    });
</script>

<div id='YMapsID-1050' style='width:98%;height:450px'></div>
<div style='width:600px;text-align:right;font-family:Arial'><a href='http://api.yandex.ru/maps/tools/constructor/' style='color:#1A3DC1; font-size:10px'>������� � ������� ������������  ������.����</a></div>
<!-- ���� ���� ���� ����� �������� � �� ����� ��������, ��� �� ������ ���������� ����� (�����) -->


<p>������� �������� <b>�� �������</b> ������������ ������������ �������� ������ � ����������� �������������� ������ �� +2 �� +6 &deg;� �������� ����� � ����� ��� 60 ������� ������.
<table width='100%' border='0' cellspacing='0' cellpadding='0' class='city'>
  <tr valign='top'>
    <td width='20%'>
�������<br>
���������<br>
�������<br>
��������<br>
������<br>
��������<br>
���������<br>
��������<br>
�������<br>
�������<br>
���������<br>
���������<br>
������������<br>
	�������
</td>
    <td width='20%'>

������<br>
�������<br>
������<br>
������<br>
��������<br>
�����<br>
��������<br>
���������<br>
����������<br>
�������<br>
�����<br>
������<br>
������������<br>
������

</td>
    <td width='20%'>

������c��� ���.<br>
��������<br>
�.��������<br>
���. �����<br>
�����������<br>
������������<br>
�����������<br>
������������<br>
����<br>
���<br>
��������<br>
�����<br>
�����<br>
���������

	</td>
    <td width='20%'>

������-��-����<br>
������<br>
�.���������<br>
������<br>
�������<br>
�����������<br>
�����������<br>
��������<br>
����<br>
����������<br>
�����������<br>
������<br>
���������<br>
������

</td>
    <td width='20%'>
�����<br>
��������<br>
�����<br>
����<br>
������<br>
���������<br>
���<br>
���������<br>
���������<br>
���������<br>
���������<br>
�����������

	</td>
    </tr>
</table>
<p>������������ ������ ������ ������������� �����, ������� �����-������, � ��� ������������� ������������� �������� �� ������, ������������� ������������ ����������. �������������� �������������� ����� �� ������ ����������, �����-�������, ���������������. 
<p>&nbsp;</p>
      <p class='headliner'>&nbsp;</p>
    </td>
  </tr>
</table>";
} 





?>