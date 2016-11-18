
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
            singleSelect: true,
            ctrlSelect: true,
            toolbar: [
                {
                    text: 'Add',
                    iconCls: 'fa fa-plus',
                    handler: function(){
                        breakdown.append();
                    }
                },
                {
                    text: 'Delete',
                    iconCls: 'fa fa-remove',
                    handler: function(){
                        breakdown.removeit();
                    }
                },
                {
                    text: 'Cancel',
                    iconCls: 'fa fa-undo',
                    handler: function(){
                        breakdown.reject();
                    }
                },
                {
                    text: 'End Edit',
                    iconCls: 'fa fa-save',
                    handler: function(){
                        breakdown.accept();
                    }
                },

            ],
            columns:[
                [
                    {field: 'cdb_id', hidden: true},
                    {field:'cdb_qty',title:'Qty',width:'20%',align:'right',
                        formatter: function(value,row,index){

                            if(row.footer){
                                return value
                            }else{
                                return accounting.formatMoney(row.cdb_qty, "");
                            }
                        },
                        editor: {
                            type: 'numberbox',
                            options: {
                                precision: 3,
                                required: true
                            }
                        }
                    },
                    {field:'cdb_unit',title:'Unit',width:'15%',
                        editor: {
                            type: 'combobox',
                            options: {
                                valueField: 'id',
                                textField: 'text',
                                data: [{id: 'pcs',text: 'pcs'},{id: 'Lm',text: 'Lm'}],
                                editable:false,
                                required: true
                            }
                        }
                    },
                    {field:'cdb_length',title:'Length',width:'30%',align:'right',
                        editor: {
                            type: 'numberbox',
                            options: {
                                precision: 3,
                                required: true
                            }
                        }
                    },
                    {field:'cdb_total',title:'Sub Total',width:'35%',align:'right',
                        formatter: function(value,row,index){
                            if(row.footer){
                                var dg = $('#order-breakdown').datagrid('getRows');
                                var tot = 0;
                                $.each(dg, function(key, value){
                                    tot += parseFloat(value.cdb_qty) * parseFloat(value.cdb_length);
                                });
                                return accounting.formatMoney(tot, "", 3);
                            }else{
                                var tot = row.cdb_qty * row.cdb_length;
                                return accounting.formatMoney(tot, "", 3);
                            }
                        }
                    },
                ]
            ],

            onClickCell: self.onClickCell,
            onEndEdit: self.onEndEdit,
            onRowContextMenu: function(e, index, row){
                e.preventDefault();
            }
        });

    },

    editIndex: undefined,

    endEditing: function(){
        self = this;
        if (breakdown.editIndex == undefined){return true}
        if ($('#order-breakdown').datagrid('validateRow', breakdown.editIndex)){
            $('#order-breakdown').datagrid('endEdit', breakdown.editIndex);
            breakdown.editIndex = undefined;
            return true;
        } else {
            return false;
        }
    },

    onClickCell: function(index, field){
        self = this;
        if (breakdown.editIndex != index){
            if (breakdown.endEditing()){
                $('#order-breakdown').datagrid('selectRow', index)
                    .datagrid('beginEdit', index);
                var ed = $('#order-breakdown').datagrid('getEditor', {index:index,field:field});
                if (ed){
                    ($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus();
                }
                breakdown.editIndex = index;
            } else {
                setTimeout(function(){
                    $('#order-breakdown').datagrid('selectRow', breakdown.editIndex);
                },0);
            }
        }
    },

    onEndEdit: function(index, row){
        
        $(this).datagrid('updateRow',{
            index: index,
            row: {
                cd_id: self.cd_id
            }
        });

        $.post( site_url + 'contract_detail_breakdown/saveContractDetailBreakdown', { data: row }, function(response) {
            if ( response.status == 'success' ) {
                $.messager.alert('Message', 'Success', 'info', function(){
                    $(this).datagrid('reload');
                })
            }
        }, 'json');

        $('#order-breakdown').datagrid('reloadFooter')
    },

    append: function(){
        self = this;
        if (breakdown.endEditing()){
            $('#order-breakdown').datagrid('appendRow',{cdb_unit:'pcs'});
            breakdown.editIndex = $('#order-breakdown').datagrid('getRows').length-1;
            $('#order-breakdown').datagrid('selectRow', breakdown.editIndex)
                .datagrid('beginEdit', breakdown.editIndex);
        }
    },

    removeit: function(){
        if (breakdown.editIndex == undefined){return}
        $('#order-breakdown').datagrid('cancelEdit', breakdown.editIndex)
            .datagrid('deleteRow', breakdown.editIndex);
        breakdown.editIndex = undefined;
    },

    accept: function(){
        if (breakdown.endEditing()){
            $('#order-breakdown').datagrid('acceptChanges');
        }
    },

    reject: function(){
        $('#order-breakdown').datagrid('rejectChanges');
        breakdown.editIndex = undefined;
    },

    getChanges: function(){
        var rows = $('#order-breakdown').datagrid('getChanges');
        alert(rows.length+' rows are changed!');
    }

}