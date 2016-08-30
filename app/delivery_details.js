
var delivery_details = {

    init: function() {
        this.datagrid();
        //this.dialog();
    },

    datagrid: function() {
        using('plugins/jquery.client.paging.js', function(){
            $('#drd-grid').datagrid({
                url: site_url + "deliveries/getDeliveriesGrid",
                toolbar: [
                    {
                        text: 'Add Delivery',
                        iconCls: 'icon-add',
                        handler: function() {
                            deliveries.create();
                        }
                    },
                    '-',
                    {
                        text: 'Edit Delivery',
                        iconCls: 'icon-edit',
                        handler: function() {
                            deliveries.update();
                        }
                    },
                    '-',
                    {
                        text: 'Delete Delivery',
                        iconCls: 'icon-remove',
                        handler: function() {
                            deliveries.delete();
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
                        {field:'dr_id',title:'Delivery Number',width:'10%'},
                        {field:'supp_company',title:'Company',width:'10%'},
                        {field:'fullname',title:'Owner',width:'10%'},
                        {field:'ui_address',title:'Address',width:'20%'},
                        {field:'ui_address2',title:'Address 2',width:'20%'},
                        {field:'ui_zip',title:'Zip',width:'5%'},
                        {field:'ui_contact_number',title:'Contact',width:'10%'}
                    ]
                ]
            }).datagrid('clientPaging');
        })
    },

    dialog: function() {
        var deliveries = this;
        $("#dlg-deliveries").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    deliveries.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-deliveries").dialog('close');
                }
            }]
        });
    },

    create: function(){
        $('#dlg-deliveries').dialog('open').dialog('refresh', site_url + 'deliveries/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-deliveries').form('clear');
    },

    save: function() {
        $('#fm-deliveries').form('submit',{
            url: site_url + 'deliveries/saveEmployee',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-deliveries').dialog('close');
                    $('#drd-grid').datagrid('reload');
                });
            }
        });
    },

    update: function(){

        var row = $('#drd-grid').datagrid('getSelected');
        console.log(row);
        if (row){
            $('#dlg-deliveries').dialog('open').dialog('refresh', site_url + 'deliveries/dialog/' + row.emp_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-deliveries').form('load',row);
        }
    },

    delete: function() {

        var row = $('#drd-grid').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Employee?', function(r) {
                if ( r ) {
                    $.post( site_url + 'deliveries/deleteEmployee', { emp_id: row.emp_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#drd-grid').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }

}