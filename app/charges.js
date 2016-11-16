
var charges = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    initForms: function() {

    },

    datagrid: function() {
        using('plugins/jquery.client.paging.js', function(){
            $("#dg-charges").datagrid({
                url: site_url + "charges/getChargesGrid",
                toolbar: [
                    {
                        text: 'Add Charge',
                        iconCls: 'icon-add',
                        handler: function() {
                            charges.create();
                        }
                    },
                    '-',
                    {
                        text: 'Edit Charge',
                        iconCls: 'icon-edit',
                        handler: function() {
                            charges.update();
                        }
                    },
                    '-',
                    {
                        text: 'Delete Charge',
                        iconCls: 'icon-remove',
                        handler: function() {
                            charges.delete();
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
                        {field:'chrg_name',title:'Name',width:'10%'},
                        {field:'chrg_type_name',title:'Type',width:'10%'},
                    ]
                ]
            }).datagrid('clientPaging');
        });
    },

    dialog: function() {
        var charges = this;
        $("#dlg-charges").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    charges.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-charges").dialog('close');
                }
            }]
        });
    },

    create: function() {
        $('#dlg-charges').dialog('open').dialog('refresh', site_url + 'charges/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-charges').form('clear');
    },

    save: function() {
        $('#fm-charges').form('submit',{
            url: site_url + 'charges/saveCharge',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-charges').dialog('close');
                    $('#dg-charges').datagrid('reload');
                });
            }
        });
    },

    update: function() {
        var row = $('#dg-charges').datagrid('getSelected');
        if (row){
            $('#dlg-charges').dialog('open').dialog('refresh', site_url + 'charges/dialog/' + row.chrg_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-charges').form('load',row);
        }
    },

    delete: function() {
        var row = $('#dg-charges').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Charge?', function(r) {
                if ( r ) {
                    $.post( site_url + 'charges/deleteCharge', { chrg_id: row.chrg_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-charges').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }
}