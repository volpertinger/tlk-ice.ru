<?php /* ���� ���� ������ � ����� ������ �� ������ ���� */

# ����� ������ ���������. ����� �������������.
   $left_menu=array(
      '� ����-CMS ������:' => array(
         array('http://nanocms.name/index.htm','����������� ����� ������','���� "����" ����������?'),
         array('http://nanocms.name/assignment.htm','����� ������ ������ CMS ����� ��� �������...','��� � ��� �����������?'),
      ),
      '��������� ����-CMS:' => array(
         array('http://nanocms.name/server.htm','��� ������ ���� ��������� ����� ��������','���������� � �������'),
         array('http://nanocms.name/structure.htm','���������� ������ ������������','������� ������ �� ������'),
         array('http://nanocms.name/settings.htm','��� � ��� ���������� �����������','��������� settings.php'),
      ),
      '���������� ���������:' => array(
         array('http://nanocms.name/admin.htm','������ ������������� � �������','�������, �����������'),
         array('http://nanocms.name/files.htm','��� ����������� �����?','�������� ���������'),
         array('http://nanocms.name/content.htm','��� �������� ��������?','��������� ���������'),
         array('http://nanocms.name/design.htm','�������� �����������������','������ �������'),
         array('http://nanocms.name/menu.htm','','���� CMS'),
         array('http://nanocms.name/connect.htm','Email','����� �������� �����'),
         array('http://nanocms.name/login.htm','Login','����� �����������'),
         array('http://nanocms.name/blocks.htm','�������������� ����� CMS','� ��������� ������'),
      ),
      '����������������:' => array(
         array('http://nanocms.name/folders.htm','���� ������� ������� ������� ����','���������������� ����'),
      ),
      '���� ����:' => array(
         array('http://nanocms.name/bay.htm','��������� ������������','������� ����-CMS'),
         array('http://nanocms.name/design/','�������� ��� ������ �������� �������','������� �������'),
      ),
      '�������������:' => array(
         array('http://nanocms.name/support.htm','','��� �������'),
         array('http://nanocms.name/denwer.htm','','��� ������'),
      ),
   );

# ������ ������ ���������. ����� �������������.
   $right_menu=array(
      '������ ������:' => array(
         array('http://nanocms.name/','������� nano-CMS','������� ����-CMS'),
         array('http://nanocms.name/simple/','Simple nano-CMS','��������� ����-CMS'),
         array('http://nanocms.name/remark/','nano-CMS � �������������','����������� ����'),
         array('http://nanocms.name/statmodule/','nano-CMS + StatModule','��������������� ����'),
         array('http://nanocms.name/transfer/','nano-CMS + ����������','���������� ����'),
         array('http://nanocms.name/secrecy/','nano-CMS + MemberArea','�������� ����'),
         array('http://nanocms.name/email.htm rel="nofollow" ','�������� ������ ������','����� � �������������'),
      ),
      '�������� ���:' => array(
         array('http://nanocms.name/upgrade/','�������� ������ ������','������������� ������'),
      ),
      '���� ��������:' => array(
         array('http://nanocms.name/blog.htm','','������� ������ �����'),
      ),
   );

# ������� ������ ���������. ����� �������������.
# ����������: ������� ��������� �� ��������. ������� �� ����� ������ �������...
   $top_menu=array(
      'top' => array(
         array('index.htm','Home','Home'),
         array('email.htm rel="nofollow" ','Connection','Email'),
#        array('stat.htm','Stat','Stat'),
         array('Login.htm','Login','Login'),
      ),
   );
# ��� ������������ ������� �������� ���� ���:
   if (true==$_s['admin']) 
   $top_menu=array(
      'top' => array(
         array('setup.htm','Setup','Setup'),
#        array('stat.htm','Stat','Stat'),
         array('Logout.htm','Logout','Logout'),
      ),
   );

/* ���� ���� ������ � ����� ������ �� ������ ����. */ ?>