
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

var routes = {

    underconstruction: function(){
        $.messager.alert('Under Construction', 'This module is under construction', 'info');
    },

    coils: function(){
        $('#main-content').panel('refresh', site_url + 'coils');
    },

    customers: function(){
        $('#main-content').panel('refresh', site_url + 'customers');
    },

    employees: function(){
        $('#main-content').panel('refresh', site_url + 'employees');
    },

    suppliers: function(){
        $('#main-content').panel('refresh', site_url + 'suppliers');
    },

    colors: function() {
        $('#main-content').panel('refresh', site_url + 'colors');
    },

    deliveries: function(){
        $('#main-content').panel('refresh', site_url + '');
    }
}