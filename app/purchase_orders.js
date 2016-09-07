
var po = {
    print_url: "WALA",
    init: function() {
        this.datagrid();
        this.dialog();
    },

    datagrid: function() {
        using('plugins/jquery.client.paging.js', function(){
            $('#dg-po').datagrid({
                url: site_url + "purchase_orders/getPOGrid",
                toolbar: [
                    {
                        text: 'Add Order',
                        iconCls: 'icon-add',
                        handler: function() {
                            po.create();
                        }
                    },
                    '-',
                    {
                        text: 'Edit Order',
                        iconCls: 'icon-edit',
                        handler: function() {
                            po.update();
                        }
                    },
                    '-',
                    {
                        text: 'Delete Order',
                        iconCls: 'icon-remove',
                        handler: function() {
                            po.delete();
                        }
                    },
                    '-',
                    {
                        text: 'View Order',
                        iconCls: 'icon-search',
                        handler: function () {
                            po.view();
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
                        {field:'po_id',title:'PO Number',width:'10%'},
                        {field:'cust_company',title:'Company',width:'10%'},
                        {field:'fullname',title:'Owner',width:'10%'},
                        {field:'po_date',title:'Purchase Order Date',width:'20%'},
                    ]
                ]
            }).datagrid('clientPaging');
        })
    },

    dialog: function() {
        var po = this;
        $("#dlg-po").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    po.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-po").dialog('close');
                }
            }]
        });

        $("#dlg-print-po").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    print.start(po.print_url);
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-print-po").dialog('close');
                }
            }]
        });
    },

    create: function(){
        $('#dlg-po').dialog('open').dialog('refresh', site_url + 'purchase_orders/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-po').form('clear');
    },

    save: function() {

        var sheets = $("#dg-sheets").datagrid('getRows');
        var sheet_ids = [];
        for(var i=0;i<sheets.length;i++){
            sheet_ids.push(sheets[i].sht_id);
        }

        $("#po_sheet_ids").val(JSON.stringify(sheet_ids));

        $('#fm-po').form('submit',{
            url: site_url + 'purchase_orders/savePO',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-po').dialog('close');
                    $('#dg-po').datagrid('reload');
                });
            }
        });
    },

    update: function(){

        var row = $('#dg-po').datagrid('getSelected');
        console.log(row);
        if (row){
            $('#dlg-po').dialog('open').dialog('refresh', site_url + 'purchase_orders/dialog/' + row.po_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-po').form('load',row);
        }
    },

    delete: function() {

        var row = $('#dg-po').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Delivery?', function(r) {
                if ( r ) {
                    $.post( site_url + 'purchase_orders/deletePO', { dr_id: row.dr_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-po').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    },

    view: function() {
        var row = $('#dg-po').datagrid('getSelected');
        if ( row ) {
            /*var url = site_url + 'purchase_orders/po_print/' + row.po_id;
            window.open(url, "_blank");*/
            var p_url = site_url + 'purchase_orders/po_print/' + row.po_id;
            po.print_url = p_url ;
            $('#dlg-print-po').dialog('open').dialog('refresh', p_url).dialog('center').dialog('setTitle','Print PO');
        }
    },

}