
    $(document).ready( function() {
        // Активируем все чекбоксы
        //При клике на ссылку "Отметить все чекбоксы", активируем checkbox
        $("a[href='#select_all']").click( function() {
 
           $("#" + $(this).attr('rel') + " input:checkbox:enabled").attr('checked', true);
          //Если вам нужно отмечать и неактивные чекбоксы (disabled), то предыдущая строчка должна выглядеть так:  
          //$("#" + $(this).attr('rel') + " input:checkbox").attr('checked', true);  
            return false;
        });
 
        // Снимаем все отметки
        $("a[href='#select_none']").click( function() {
             $("#" + $(this).attr('rel') + " input:checkbox:enabled").attr('checked', false);
            //Если должны обрабатываться неактивные чекбоксы, опять исключаем параметр :enabled
            //$("#" + $(this).attr('rel') + " input:checkbox").attr('checked', true);   
            return false;
        });
    });
