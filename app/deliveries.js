
var deliveries = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    datagrid: function() {
        using('plugins/jquery.client.paging.js', function(){
            $('#dg-deliveries').datagrid({
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
                    },
                    '-',
                    {
                        text: 'View Delivery',
                        iconCls: 'icon-search',
                        handler: function () {
                            alert("VIEW DETAILS");
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
                        {field:'dr_delivery_date',title:'Delivery Date',width:'20%'},
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

        var coils = $("#dg-coils").datagrid('getRows');
        var coil_ids = [];
        for(var i=0;i<coils.length;i++){
            coil_ids.push(coils[i].coil_id);
        }

        $("#dr_coil_ids").val(JSON.stringify(coil_ids));


        $('#fm-deliveries').form('submit',{
            url: site_url + 'deliveries/saveDelivery',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-deliveries').dialog('close');
                    $('#dg-deliveries').datagrid('reload');
                });
            }
        });
    },

    update: function(){

        var row = $('#dg-deliveries').datagrid('getSelected');

        if (row){
            $('#dlg-deliveries').dialog('open').dialog('refresh', site_url + 'deliveries/dialog/' + row.dr_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-deliveries').form('load',row);
        }
    },

    delete: function() {

        var row = $('#dg-deliveries').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Delivery?', function(r) {
                if ( r ) {
                    $.post( site_url + 'deliveries/deleteDelivery', { dr_id: row.dr_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-deliveries').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }

}