
var contract_details = {

    contract_id: 0,
    status: false,

    init: function(contract_id, status) {
        this.contract_id = contract_id;
        this.status = status;
        this.datagrid();
        this.dialog();

    },

    datagrid: function() {
        self = this;
        $('#dg-contract-details').datagrid({
            url: site_url + "contracts/getContractDetails/" + self.contract_id,
            /*pagination:true,
            pageSize:10,*/
            rownumbers:true,
            fitColumns: true,
            showFooter: true,
            singleSelect: true,
            ctrlSelect: true,
            toolbar: [
                {
                    text: 'Add Material',
                    iconCls: 'fa fa-plus',
                    disabled: self.status,
                    handler: function(){
                        $('#dg-contract-details').datagrid('unselectAll');
                        $('#material-form-dialog').dialog('open').dialog('refresh', site_url + 'contracts/addMaterialView').dialog('setTitle', 'Add Material');
                    }
                },
                {
                    text: 'Edit Material',
                    iconCls: 'fa fa-edit',
                    disabled: self.status,
                    handler: function() {
                        contract_details.updateMaterial();
                    }
                }
            ],
            view: groupview,
            groupField:'cat_name',
            groupFormatter:function(value,rows){
                return value;
            },
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
                    {field:'p_name',title:'Product Name',width:'35%'},
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
                                }
                                //else{
                                //    return value.description;
                                //}
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
                $('#dg-contract-details').datagrid('selectRow', index);

                $(e.target).parents('tr').addClass('datagrid-context-menu');
                $('#breakdown-menu').menu('show', {
                    left: e.pageX,
                    top: e.pageY
                }).menu({
                    onHide: function(){
                        $(e.target).parents('tr').removeClass('datagrid-context-menu');
                    }
                });

                if(!(row && row.cat_id == 1 && !parseFloat(row.cd_length)) ){
                    var item = $('#breakdown-menu').menu('findItem', 'View Break Down');
                    $('#breakdown-menu').menu('disableItem', item.target);
                }
            }
        });


        $('#dg-contract-charges').datagrid({
            url: site_url + "contracts/getContractCharges/" + self.contract_id,
            fitColumns: true,
            singleSelect: true,
            showFooter: true,
            view: groupview,
            toolbar: [
                {
                    text: 'Add Charges',
                    iconCls: 'fa fa-plus',
                    disabled: self.status,
                    handler: function(){
                        $('#charges-form-dialog').dialog('open').dialog('refresh', site_url + 'contracts/addChargesView').dialog('setTitle', 'Add Charges');
                    }
                },
                {
                    text: 'Edit Charges',
                    iconCls: 'fa fa-edit',
                    disabled: self.status,
                    handler: function() {
                        contract_details.updateCharge();
                    }
                }
            ],
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
        self = this;
        $("#material-form-dialog").dialog({
            resizable: true,
            modal: true,
            closed: true,
            cls: 'c6',
            onLoad: function() {
            },
            buttons:[{
                text:'Save',
                iconCls: 'fa fa-save',
                handler:function(){
                    contract_details.saveContractMaterial();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#material-form-dialog").dialog('close');
                }
            }]
        });

        $("#charges-form-dialog").dialog({
            resizable: true,
            modal: true,
            closed: true,
            height: 'auto',
            cls: 'c6',
            /*onLoad: function() {
                $("form#fm-contract-charges input#cc_c_id").val(self.contract_id);
            },*/
            buttons:[{
                text:'Save',
                handler:function(){
                    contract_details.saveContractCharges();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#charges-form-dialog").dialog('close');
                }
            }]
        });
    },

    saveContractCharges: function() {
        $('#fm-contract-charges').form('submit',{
            url: site_url + 'contract_charges/saveContractCharges',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                $.messager.alert('Message','Successful', 'info', function(){
                    $("#charges-form-dialog").dialog('close');
                    $('#dg-contract-charges').datagrid('reload');
                });
            }
        });
    },

    saveContractMaterial: function() {
        $('#fm-contract-material').form('submit',{
            url: site_url + 'contract_details/saveContractMaterial',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                $.messager.alert('Message','Successful', 'info', function(){
                    $("#material-form-dialog").dialog('close');
                    $('#dg-contract-details').datagrid('reload');
                });
            }
        });
    },

    updateMaterial: function() {
        if(this.status){
            $.messager.alert('Message','Permission Denied!', 'info');
        }else{
            var row = $('#dg-contract-details').datagrid('getSelected');
            if ( row ) {
                $('#material-form-dialog').dialog('open').dialog('refresh', site_url + 'contract_details/dialog/' + row.cd_id).dialog('setTitle', 'Edit Material');
            }
        }
    },

    updateCharge: function() {
        var row = $('#dg-contract-charges').datagrid('getSelected');
        if ( row ) {
            $("#charges-form-dialog").dialog('open').dialog('refresh', site_url + 'contract_charges/dialog/' + row.cc_id).dialog('setTitle', 'Edit Charge');
        }
    }

}