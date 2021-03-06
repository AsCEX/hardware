
var contracts = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    contract_id: 0,

    datagrid: function() {
        that = this;
        $('#dg-contracts').datagrid({
            url: site_url + "contracts/getContracts",
            pagination:true,
            toolbar: [
                {
                    text: 'Add Contract',
                    iconCls: 'fa fa-plus green',
                    handler: function(){
                        contracts.new()
                    }
                },
            ],
            pageSize:10,
            rownumbers:true,
            fitColumns:false,
            singleSelect:"true",
            columns:[
                [
                    {field:'c_id',title:'ID',width:'5%'},
                    {field:'cust_company',title:'Company',width:'15%'},
                    {field:'c_date',title:'Date',width:'6%'},
                    {field:'c_project',title:'Project',width:'20%'},
                    {field:'c_location',title:'Location',width:'20%'},
                    {field:'mat_cost',title:'Material Costs',width:'10%',align:'right',
                        formatter: function(value,row,index){
                            return accounting.formatMoney(value, "");
                        }
                    },
                    {field:'tot_charges',title:'Total Charges',width:'10%',align:'right',
                        formatter: function(value,row,index){
                            return accounting.formatMoney(value, "");
                        }
                    },
                    {field:'grand_cost',title:'Grand Total',width:'10%',align:'right',
                        formatter: function(value,row,index){
                            return accounting.formatMoney(value, "");
                        }
                    },
                ]
            ],
            onRowContextMenu: function(e, index, row){
                e.preventDefault();
                if(row){
                    that.contract_id = row.c_id;

                    $(e.target).parents('tr').addClass('datagrid-context-menu');
                    $('#contracts-menu').menu('show', {
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

    dialog: function() {
        $("#dlg-order-details").dialog({
            resizable: true,
            modal: true,
            width: window.innerWidth * 0.80,
            closed: true,
            border: 'thin',
            cls: 'c6',
            buttons:[{
                text:'Save',
                handler:function(){
                    contracts.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-order-details").dialog('close');
                }
            }]
        });
    },

    new: function(){
        this.contract_id = 0;
        this.order_details();
    },

    order_details: function(){
        $('#dlg-order-details').dialog('open').dialog('refresh', site_url + 'contracts/contractDetails/' + this.contract_id).dialog('center').dialog('setTitle','Order Details');
    },

    save: function(){

        $('#contract-forms').form('submit',{
            url: site_url + 'contracts/save',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-order-details').dialog('close');
                    $('#dg-contracts').datagrid('reload');
                });
            }
        });
    }

}