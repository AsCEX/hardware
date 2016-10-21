
$(function(){
    $(".menu-links").on('click', function(){
        var url = $(this).data('url');
        if(url){
            $('#main-content').panel('refresh', url);
        }else{
            $.messager.alert('Under Construction', 'This module is under construction', 'info');
        }
    });
});
