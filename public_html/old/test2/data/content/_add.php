<?php /* ���� ���� ������ � ����� ������ �� ������ ���� */

   $banner_left=<<<bannerleft
      <div class="reklams_160 bord">
         � ������, �������� �� ��� ����� �������.
         ���� � _add.php
      </div>
bannerleft;

   $banner_right=<<<bannerright
      <div class="reklams_160 bord">
         � ������, �������� �� ��� ������ �������.
         ���� � _add.php
      </div>
bannerright;





# ��� ������� ������� ������. 160*600 ��� ������ � �����:

   switch($action) {

      case 'index': $add=<<<add
   <div class="reklams_160 bord">
      � ������ ��� ����� �����, ���� � _add.php
   </div>
add;
      break;

      case "email": 
         $banner_right=$banner_left='';
         $add=<<<add
   <div class="reklams_160 bord">
      � ������ ��� �������� �������� �����.
      ���� � _add.php
   </div>
add;
      break;

      default: $add=<<<add
   <div class="reklams_160 bord">
      � ������ ��� ������� �������, ���� � _add.php
   </div>
add;
   }





# ��������� ������� ������

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
   if (sz > 11) sz=11;// �� ���� �������� �������� ������ ������� ������
   startSz=sz;
   if (cEl=d.getElementById(trgt)) cEl.style.fontSize=szs[sz];
}
if (window.top!==window.self) window.top.location=window.self.location;
//]]>-->
</script>

   <ul class="fonts">
      <li class="nolink"><em><em>�����:&nbsp;&nbsp;
      <a title="�����" onclick="javascript:ts('changefont',-1);" href="#">������</a>&nbsp;
      <a title="����" onclick="javascript:ts('changefont',1);" href="#">������</a></em></em></li>
   </ul>

font;

/* ���� ���� ������ � ����� ������ �� ������ ����. */ ?>