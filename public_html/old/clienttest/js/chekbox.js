
    $(document).ready( function() {
        // ���������� ��� ��������
        //��� ����� �� ������ "�������� ��� ��������", ���������� checkbox
        $("a[href='#select_all']").click( function() {
 
           $("#" + $(this).attr('rel') + " input:checkbox:enabled").attr('checked', true);
          //���� ��� ����� �������� � ���������� �������� (disabled), �� ���������� ������� ������ ��������� ���:  
          //$("#" + $(this).attr('rel') + " input:checkbox").attr('checked', true);  
            return false;
        });
 
        // ������� ��� �������
        $("a[href='#select_none']").click( function() {
             $("#" + $(this).attr('rel') + " input:checkbox:enabled").attr('checked', false);
            //���� ������ �������������� ���������� ��������, ����� ��������� �������� :enabled
            //$("#" + $(this).attr('rel') + " input:checkbox").attr('checked', true);   
            return false;
        });
    });
