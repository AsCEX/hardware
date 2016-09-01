
var sheets = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    initForms: function() {

    },

    datagrid: function() {
        using('plugins/jquery.client.paging.js', function() {
            $('#dg-sheets').datagrid({
                url: site_url + "sheets/getSheetsGrid",
                toolbar: [
                    {
                        text: 'Add Sheet',
                        iconCls: 'icon-add',
                        handler: function() {
                            sheets.create();
                        }
                    },
                    '-',
                    {
                        text: 'Edit Sheet',
                        iconCls: 'icon-edit',
                        handler: function() {
                            sheets.update();
                        }
                    },
                    '-',
                    {
                        text: 'Delete Sheet',
                        iconCls: 'icon-remove',
                        handler: function() {
                            sheets.delete();
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
                        {field:'sht_code',title:'Code',width:'10%'},
                        {field:'coil_code',title:'Coil',width:'10%'},
                        {field:'sht_length',title:'Length',width:'10%'},
                        {field:'sht_height',title:'Height',width:'10%'},
                        {field:'sht_width',title:'Width',width:'10%'},
                    ]
                ]
            }).datagrid('clientPaging');
        });
    },

    dialog: function() {
        var sheets = this;
        $("#dlg-sheets").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    sheets.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-sheets").dialog('close');
                }
            }]
        });
    },

    create: function() {
        $('#dlg-sheets').dialog('open').dialog('refresh', site_url + 'sheets/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-sheets').form('clear');
    },

    save: function () {
        $('#fm-sheets').form('submit',{
            url: site_url + 'sheets/saveSheet',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-sheets').dialog('close');
                    $('#dg-sheets').datagrid('reload');
                });
            }
        });
    },

    update: function() {
        var row = $('#dg-sheets').datagrid('getSelected');
        if (row){
            $('#dlg-sheets').dialog('open').dialog('refresh', site_url + 'sheets/dialog/' + row.sht_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-sheets').form('load',row);
        }
    },

    delete: function() {
        var row = $('#dg-sheets').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Sheet?', function(r) {
                if ( r ) {
                    $.post( site_url + 'sheets/deleteSheet', { sht_id: row.sht_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-sheets').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }


}