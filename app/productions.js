
var productions = {
    print_url: "WALA",
    init: function() {
        this.datagrid();
        this.dialog();
    },

    datagrid: function() {

            $('#dg-po').datagrid({
                url: site_url + "productions/getProductionsGrid",
                toolbar: [
                    {
                        text: 'View Order',
                        iconCls: 'icon-search',
                        handler: function() {

                            var row = $('#dg-po').datagrid('getSelected');
                            productions.update(row.po_id);
                        }
                    },
                   /* '-',
                    {
                        text: 'View Order',
                        iconCls: 'icon-search',
                        handler: function () {
                            productions.view();
                        }
                    }*/
                ],
                pagination:true,
                pageSize:10,
                rownumbers:true,
                fitColumns:true,
                singleSelect:true,
                multiSort: true,
                columns:[
                    [
                        {field:'po_id',title:'PO Number',width:'10%',sortable:true},
                        {field:'cust_company',title:'Company',width:'10%',sortable:true},
                        {field:'fullname',title:'Owner',width:'10%',sortable:true},
                        {field:'po_date',title:'Purchase Order Date',width:'20%',sortable:true},
                        /*{field:'po_fulfillment',title:'Status',width:'20%',align:'right',sortable:true,
                            formatter: function(value,row,index){
                                return (parseInt(row.po_fulfillment)  ==  2) ? '<span style="font-weight:bold;color:green;">Forwarded to PO</span>' : '<span style="font-weight:bold;color:red;">Pending</span>';
                            }
                        },*/
                    ]
                ],

                onDblClickRow: function(index, field, value){
                    productions.update(field.po_id);
                }
            });
    },

    dialog: function() {
        var po = this;
        $("#dlg-po").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
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
        $('#dlg-po').dialog('open').dialog('refresh', site_url + 'productions/dialog').dialog('center').dialog('setTitle','New');
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
            url: site_url + 'productions/savePO',
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

    update: function(rowId){


        if (rowId){
            $('#dlg-po').dialog('open').dialog('refresh', site_url + 'productions/dialog/' + rowId).dialog('center').dialog('setTitle','Edit');
            //$('#fm-po').form('load',row);
        }
    },

    delete: function() {

        var row = $('#dg-po').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Delivery?', function(r) {
                if ( r ) {
                    $.post( site_url + 'productions/deletePO', { dr_id: row.dr_id }, function(response) {
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
            productions.print_url = p_url ;
            $('#dlg-print-po').dialog('open').dialog('refresh', p_url).dialog('center').dialog('setTitle','Print PO');
        }
    },

}