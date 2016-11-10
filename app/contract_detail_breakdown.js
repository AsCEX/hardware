
var breakdown = {

    cd_id: 0,

    init: function(cd_id) {
        this.cd_id = cd_id;
        this.datagrid();
    },

    datagrid: function() {
        self = this;
        $('#order-breakdown').datagrid({
            url: site_url + "job_orders/getBreakdown/" + self.cd_id,
            rownumbers:true,
            fitColumns: true,
            showFooter: true,
            singleSelect: false,
            ctrlSelect: true,
            toolbar: [
                {
                    text: 'Add Breakdown',
                    iconCls: 'fa fa-plus',
                    handler: function(){

                    }
                },
            ],
            columns:[
                [
                    {field:'cdb_qty',title:'Qty',width:'20%',align:'right',
                        formatter: function(value,row,index){

                            if(row.footer){
                                return value
                            }else{
                                return accounting.formatMoney(row.cd_qty, "");
                            }
                        }
                    },
                    {field:'cd_unit',title:'Unit',width:'10%'},
                    {field:'cdb_thickness',title:'Thickness',width:'35%'},
                    {field:'total',title:'Sub Total',width:'35%',
                        formatter: function(value,row,index){
                            var tot = row.cdb_qty * row.cdb_thickness;
                            return accounting.formatMoney(tot, "");
                        }
                    },
                ]
            ],
            onRowContextMenu: function(e, index, row){
                e.preventDefault();
            }
        });

    }

}