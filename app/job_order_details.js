
var job_order_details = {
    jo_id: 0,
    contract_id: 0,

    init: function(jo_id, contract_id) {
        this.jo_id = jo_id;
        this.contract_id = contract_id;
        this.datagrid();
        this.dialog();
    },

    datagrid: function() {
        self = this;
        $('#dg-job-order-details').datagrid({
            url: site_url + "contracts/getContractDetails/" + self.contract_id,
            /*pagination:true,
            pageSize:10,*/
            rownumbers:true,
            fitColumns: true,
            showFooter: true,
            singleSelect: true,
            view: groupview,
            groupField:'cat_name',
            groupFormatter:function(value,rows){
                return value;
            },
            /*view: detailview,
            detailFormatter: function(index,row){
                return '<div style="padding:0px"><table class="ddv"></table></div>';
            },
            onExpandRow: function(index,row){
                if(row.cat_id == 1){
                    var ddv = $(this).datagrid('getRowDetail',index).find('table.ddv');
                    ddv.datagrid({
                        url:site_url + 'datagrid_data1.json',
                        fitColumns:false,
                        singleSelect:true,
                        rownumbers:true,
                        toolbar: [
                            {
                                text: '',
                                iconCls: 'fa fa-plus green',
                                handler: function(){
                                }
                            },
                        ],
                        loadMsg:'',
                        height:'auto',
                        columns:[[
                            {field:'orderid',title:'Qty',width:100},
                            {field:'quantity',title:'Unit',width:100},
                            {field:'quantity',title:'Thickness',width:300,align:'right'},
                            {field:'unitprice',title:'Total',width:300,align:'right'}
                        ]],
                        onResize:function(){
                            $('#dg-job-order-details').datagrid('fixDetailRowHeight',index);
                        },
                        onLoadSuccess:function(){
                            setTimeout(function(){
                                $('#dg-job-order-details').datagrid('fixDetailRowHeight',index);
                            },0);
                        }
                    });
                    $('#dg-job-order-details').datagrid('fixDetailRowHeight',index);
                }else{
                    return false;
                }
            },*/
            columns:[
                [
                    {field:'cd_qty',title:'Qty',width:'10%',align:'right',
                        formatter: function(value,row,index){

                            if(row.footer){
                                return value
                            }else{
                                return accounting.formatMoney(row.cd_qty, "");
                            }
                        }
                    },
                    {field:'cd_unit',title:'Unit',width:'5%'},
                    {field:'p_name',title:'Product Name',width:'30%'},
                    {field:'measurement',title:'Description',width:'30%',
                        formatter: function(value,row,index){
                                var m = [];
                                if(row.cat_id != 3){

                                    if(row.cd_thickness)
                                        m.push(parseFloat(row.cd_thickness).toFixed(2));

                                    if(row.cd_width)
                                        m.push(parseFloat(row.cd_width).toFixed(3));

                                    if(row.cd_length)
                                        m.push( (parseFloat(row.cd_length)) ? parseFloat(row.cd_length).toFixed(2) : 'L.S.' );

                                    return m.join(' x ');
                                }else{
                                    return value.description;
                                }
                        }
                    },
                    {field:'cd_unit_price',title:'Unit Price',width:'10%',align:'right',
                        formatter: function(value,row,index){
                            if(row.footer)
                                return value;
                            else
                                return accounting.formatMoney(row.cd_unit_price, "");
                        }
                    },
                    {field:'line_total',title:'Amount',width:'10%',align:'right',
                        formatter: function(value,row,index){
                            if(row.footer){
                                return accounting.formatMoney(value, "");
                            }else{
                                return accounting.formatMoney(row.cd_qty * row.cd_unit_price, "");
                            }
                        }
                    },
                ]
            ],
            onRowContextMenu: function(e, index, row){
                e.preventDefault();
                if(row && row.cat_id == 1 && !parseFloat(row.cd_length) ){
                    $(e.target).parents('tr').addClass('datagrid-context-menu');
                    $('#jo-breakdown-menu').menu('show', {
                        left: e.pageX,
                        top: e.pageY
                    }).menu({
                        onHide: function(){
                            $(e.target).parents('tr').removeClass('datagrid-context-menu');
                        }
                    });
                }
            }
        });


        $('#dg-job-order-charges').datagrid({
            url: site_url + "contracts/getContractCharges/" + self.contract_id,
            fitColumns: true,
            showFooter: true,
            view: groupview,
            groupField:'chrg_type_name',
            groupFormatter:function(value,rows){
                return value;
            },
            columns:[
                [
                    {field:'chrg_name',title:'Charges',width:'50%'},
                    {field:'cc_amount',title:'Amount',width:'50%',align:'right',
                        formatter: function(value,row,index){
                                return accounting.formatMoney(value, "");
                        }
                    },
                ]
            ]
        });

    },


    dialog: function(){

        $("#dlg-job-breakdown-details").dialog({
            resizable: false,
            modal: true,
            closed: true,
            cls: 'c6',
            onLoad: function() {
                $("form#fm-contract-material input#cd_c_id").val(self.contract_id);
            },
            buttons:[{
                text:'Save',
                handler:function(){
                    contract_details.saveContractMaterial();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-job-breakdown-details").dialog('close');
                }
            }]
        });

    },

    open_breakdown: function(){
        $('#dlg-job-breakdown-details').dialog('open').dialog('refresh', site_url + 'job_orders/order_breakdown').dialog('setTitle', 'Breakdown');
    }



}