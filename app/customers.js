
var customers = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    initForms: function() {

    },

    datagrid: function() {
        using('plugins/jquery.client.paging.js', function(){
            $('#dg-customers').datagrid({
                url: site_url + "Customers/getCustomersGrid",
                toolbar: [
                    {
                        text: 'Add Customer',
                        iconCls: 'icon-add',
                        handler: function() {
                            customers.create();
                        }
                    },
                    '-',
                    {
                        text: 'Edit Customer',
                        iconCls: 'icon-edit',
                        handler: function() {
                            customers.update();
                        }
                    },
                    '-',
                    {
                        text: 'Delete Customer',
                        iconCls: 'icon-remove',
                        handler: function() {
                            customers.delete();
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
                        {field:'ui_lastname',title:'Lastname',width:'10%'},
                        {field:'ui_firstname',title:'Firstname',width:'10%'},
                        {field:'ui_middlename',title:'Middle Name',width:'10%'},
                        {field:'ui_extname',title:'Ext. Name',width:'5%'},
                        {field:'ui_address',title:'Address',width:'20%'},
                        {field:'ui_address2',title:'Address 2',width:'20%'},
                        {field:'ui_zip',title:'Zip',width:'5%'},
                        {field:'ui_contact_number',title:'Contact',width:'10%'},
                        {field:'cust_company',title:'Company',width:'5%'},
                    ]
                ]
            }).datagrid('clientPaging');
        })
    },

    dialog: function() {
        var customers = this;
        $("#dlg-customers").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    customers.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-customers").dialog('close');
                }
            }]
        });
    },

    create: function(){
        $('#dlg-customers').dialog('open').dialog('refresh', site_url + 'customers/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-customers').form('clear');
    },

    save: function() {
        $('#fm-customers').form('submit',{
            url: site_url + 'customers/saveCustomer',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-customers').dialog('close');
                    $('#dg-customers').datagrid('reload');
                });
            }
        });
    },

    update: function(){

        var row = $('#dg-customers').datagrid('getSelected');
        console.log(row);
        if (row){
            $('#dlg-customers').dialog('open').dialog('refresh', site_url + 'customers/dialog/' + row.cust_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-customers').form('load',row);
        }
    },

    delete: function() {

        var row = $('#dg-customers').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Customer?', function(r) {
                if ( r ) {
                    $.post( site_url + 'customers/deleteCustomer', { cust_id: row.cust_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-customers').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }

}