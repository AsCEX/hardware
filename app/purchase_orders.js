
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
                            var row = $('#dg-po').datagrid('getSelected');
                            po.update(row.po_id);
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
                pageSize:50,
                rownumbers:true,
                fitColumns:"true",
                singleSelect:"true",
                columns:[
                    [
                        {field:'po_id',title:'PO Number',width:'10%'},
                        {field:'cust_company',title:'Company',width:'10%'},
                        {field:'fullname',title:'Owner',width:'10%'},
                        {field:'po_date',title:'Purchase Order Date',width:'20%'},
                        {field:'po_fulfillment',title:'Status',width:'20%',align:'right',
                            formatter: function(value,row,index){
                                return (parseInt(row.po_fulfillment)) ?
                                    (parseInt(row.po_fulfillment)==2 ?
                                        '<span style="font-weight:bold;color:green;">Processing</span>' : '<span style="font-weight:bold;">Completed</span>')
                                    : '<span style="font-weight:bold;color:red;">Pending</span>';
                            }
                        },
                    ]
                ],
                onDblClickRow: function(index, field, value){
                    po.update(field.po_id);
                }
            }).datagrid('clientPaging');
        })
    },

    dialog: function() {
        var po = this;
        $("#dlg-po-complete").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[
                {
                    text: 'Complete',
                    iconCls: 'icon-save',
                    handler: function(){

                        $.messager.confirm('Confirm', 'Complete Order?', function(r) {
                            if ( r ) {
                                $('#fm-po-complete').form('submit',{
                                    url: site_url + 'purchase_orders/completePO',
                                    onSubmit: function(){
                                        return $(this).form('validate');
                                    },
                                    success: function(response){
                                        po.completeSave();
                                    }
                                });
                            }
                        })
                    }
                },{
                    text:'Cancel',
                    handler:function(){
                        $("#po_fulfillment").combobox('select', 0);
                        $("#dlg-po-complete").dialog('close');
                    }
                }],
            onClose: function(){
                $("#po_fulfillment").combobox('select', 0);
            }
        });
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

    complete: function(po_id){
        $('#dlg-po-complete').dialog('open').dialog('refresh', site_url + 'purchase_orders/dialogComplete/'+po_id).dialog('center').dialog('setTitle','Update Coil Weight');
    },

    create: function(){
        $('#dlg-po').dialog('open').dialog('refresh', site_url + 'purchase_orders/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-po').form('clear');
    },

    save: function() {

        var poIf = $("#po_fulfillment").combobox('getValue');
        if(poIf == 1){
            po.complete(poIf);
        }else{
            po.completeSave();
        }

    },
    completeSave: function(){

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
                    $('#dlg-po-complete').dialog('close');
                    $('#dlg-po').dialog('close');
                    $('#dg-po').datagrid('reload');
                });
            }
        });
    },

    update: function(rowId){

        //var row = $('#dg-po').datagrid('getSelected');
        if (rowId){
            $('#dlg-po').dialog('open').dialog('refresh', site_url + 'purchase_orders/dialog/' + rowId).dialog('center').dialog('setTitle','Edit');
            //$('#fm-po').form('load',row);
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