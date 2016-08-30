
var colors = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    initForms: function() {

    },

    datagrid: function () {
        using('plugins/jquery.client.paging.js', function() {
            $('#dg-colors').datagrid({
                url: site_url + "colors/getColorsGrid",
                toolbar: [
                    {
                        text: 'Add Color',
                        iconCls: 'icon-add',
                        handler: function() {
                            colors.create();
                        }
                    },
                    '-',
                    {
                        text: 'Edit Color',
                        iconCls: 'icon-edit',
                        handler: function() {
                            colors.update();
                        }
                    },
                    '-',
                    {
                        text: 'Delete Color',
                        iconCls: 'icon-remove',
                        handler: function() {
                            colors.delete();
                        }
                    }
                ],
                pagination:true,
                pageSize:10,
                rownumbers:true,
                fitColumns:"true",
                singleSelect:"true",
                columns:[
                    [
                        {field:'clr_name',title:'Name',width:'10%'},
                        {field:'clr_hex',title:'Hex',width:'10%'},
                    ]
                ]
            }).datagrid('clientPaging');
        })
    },

    dialog: function() {
        var colors = this;
        $("#dlg-colors").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    colors.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-colors").dialog('close');
                }
            }]
        });
    },

    create: function() {
        $('#dlg-colors').dialog('open').dialog('refresh', site_url + 'colors/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-colors').form('clear');
    },

    save: function () {
        $('#fm-colors').form('submit',{
            url: site_url + 'colors/saveColor',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-colors').dialog('close');
                    $('#dg-colors').datagrid('reload');
                });
            }
        });
    },

    update: function() {
        var row = $('#dg-colors').datagrid('getSelected');
        if (row){
            $('#dlg-colors').dialog('open').dialog('refresh', site_url + 'colors/dialog/' + row.clr_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-colors').form('load',row);
        }
    },

    delete: function() {
        var row = $('#dg-colors').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Color?', function(r) {
                if ( r ) {
                    $.post( site_url + 'colors/deleteColor', { clr_id: row.clr_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-colors').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }
}