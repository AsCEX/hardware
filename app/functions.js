
var STATUS = {
    '0': 'Pending',
    '1': 'Completed'
};

$(function(){
    $(document).on('focus',"input[type=text]",function(){
        $(this).select();
    });
});