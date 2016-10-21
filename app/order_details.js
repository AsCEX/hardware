
var order_details = {

    init: function() {
        this.datagrid();
    },

    datagrid: function() {

        $('#dg-order-details').datagrid({
            url: site_url + "contracts/getOrderDetails",
            pagination:true,
            pageSize:10,
            rownumbers:true,
            fitColumns: true,
            showFooter: true,
            view: groupview,
            groupField:'cat_name',
            groupFormatter:function(value,rows){
                return value;
            },
            columns:[
                [
                    {field:'od_qty',title:'Qty',width:'10%',align:'right',
                        formatter: function(value,row,index){

                            if(row.footer){
                                return value
                            }else{
                                return accounting.formatMoney(row.od_qty, "");
                            }
                        }
                    },
                    {field:'od_unit',title:'Unit',width:'5%'},
                    {field:'p_name',title:'Product Name',width:'35%'},
                    {field:'measurement',title:'Measurement',width:'30%',
                        formatter: function(value,row,index){
                                var m = [];
                                if(row.pv_width)
                                    m.push(row.pv_width);

                                if(row.pv_height)
                                    m.push(row.pv_height);

                                if(row.od_length)
                                    m.push( (parseInt(row.od_length)) ? row.od_length : (row.cat_id == 1) ? 'L.S.' : '' );

                                return m.join(' x ');
                        }
                    },
                    {field:'od_unit_price',title:'Unit Price',width:'10%',align:'right',
                        formatter: function(value,row,index){
                            if(row.footer)
                                return value;
                            else
                                return accounting.formatMoney(row.od_unit_price, "");
                        }
                    },
                    {field:'line_total',title:'Amount',width:'10%',align:'right',
                        formatter: function(value,row,index){
                            if(row.footer){
                                return accounting.formatMoney(value, "");
                            }else{
                                return accounting.formatMoney(row.od_qty * row.od_unit_price, "");
                            }
                        }
                    },
                ]
            ],
            onRowContextMenu: function(e, index, row){
                e.preventDefault();
                if(row && row.cat_id == 1 && !parseFloat(row.od_length) ){
                    $(e.target).parents('tr').addClass('datagrid-context-menu');
                    $('#breakdown-menu').menu('show', {
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
    },


}