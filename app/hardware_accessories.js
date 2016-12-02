
var hardware_accessories = {

    init: function() {
        this.datagrid();
    },

    datagrid: function() {
        self = this;
        $('#hardware-accessories').datagrid({
            url: site_url + "products/getHardwareAccessories",
            toolbar: [
                {
                    text: 'Add',
                    iconCls: 'fa fa-plus',
                    handler: function(){
                        hardware_accessories.append();
                    }
                },
                {
                    text: 'Save',
                    iconCls: 'fa fa-save',
                    handler: function(){
                        hardware_accessories.accept();
                    }
                },
                {
                    text: 'Delete',
                    iconCls: 'fa fa-remove',
                    handler: function(){
                        hardware_accessories.removeit();
                    }
                },
                {
                    text: 'Cancel',
                    iconCls: 'fa fa-undo',
                    handler: function(){
                        hardware_accessories.reject();
                    }
                },
            ],
            pagination:true,
            pageSize:20,
            rownumbers:true,
            fitColumns:"true",
            singleSelect:"true",
            columns:[
                [
                    {field:'p_name',title:'Name',width:'20%',
                        editor: {
                            type: 'textbox',
                            options: {
                                required: true
                            }
                        }
                    },
                    {field:'p_unit_price',title:'Unit Price',width:'10%',align:'right',
                        editor: {
                            type: 'numberbox',
                            options: {
                                precision: 2,
                                required: true
                            }
                        }
                    },
                    {field:'clr_name',title:'Color',width:'10%',align:'right',
                        editor: {
                            type: 'combobox',
                            options: {
                                valueField: 'id',
                                textField: 'text',
                                url: 'colors/getColorsComboBox/',
                                editable:false,
                                required: true,
                                prompt: 'Select Color'
                            }
                        }
                    },
                    {field: 'p_in_stock',title: 'In Stock', width: '10%', align: 'center',
                        editor: {
                            type: 'checkbox',
                            options: {
                                on: 1,
                                off: 0,
                                required: true
                            },
                        },
                        formatter: function(value,row,index){
                            if(value == 1) {
                                return 'In Stock';
                            } else return 'Out of Stock';
                        }
                    }
                ]
            ],
            onClickCell: self.onClickCell,
            onEndEdit: self.onEndEdit,
            onClickRow: self.onClickRow,
            onRowContextMenu: function(e, index, row){
                e.preventDefault();
            },
        });
    },

    editIndex: undefined,

    endEditing: function(){
        self = this;
        if (hardware_accessories.editIndex == undefined){return true}
        if ($('#hardware-accessories').datagrid('validateRow', hardware_accessories.editIndex)){
            $('#hardware-accessories').datagrid('endEdit', hardware_accessories.editIndex);
            hardware_accessories.editIndex = undefined;
            return true;
        } else {
            return false;
        }
    },

    onClickCell: function(index, field){
        self = this;
        if (hardware_accessories.editIndex != index){
            if (hardware_accessories.endEditing()){
                $('#hardware-accessories').datagrid('selectRow', index)
                    .datagrid('beginEdit', index);
                var ed = $('#hardware-accessories').datagrid('getEditor', {index:index,field:field});
                if (ed){
                    ($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus().bind('keyup', function(e)
                    {
                        var code = e.keyCode || e.which;
                        if(code == 13) { //Enter keycode
                            $('#hardware-accessories').datagrid('acceptChanges');
                            hardware_accessories.editIndex = undefined;
                        }
                    });

                }
                hardware_accessories.editIndex = index;
            } else {
                setTimeout(function(){
                    $('#hardware-accessories').datagrid('selectRow', hardware_accessories.editIndex);
                },0);
            }
        }
    },

    onEndEdit: function(index, row){

        row.cat_name = 3;

        $.post( site_url + 'products/saveProduct', { data: row }, function(response) {
            if ( response.status == 'success' ) {
                $.messager.alert('Message', 'Success', 'info', function(){
                    $('#hardware-accessories').datagrid('reload');
                    hardware_accessories.editIndex = undefined;
                })
            }
        }, 'json');
    },

    onClickRow: function(index, row) {
        self = this;

        if (hardware_accessories.editIndex == undefined){return}

        if($('#hardware-accessories').datagrid('selectRow', index)
                .datagrid('beginEdit', index)) {
            var colorEd = $('#hardware-accessories').datagrid('getEditor', {index:index,field:'clr_name'});
            $(colorEd.target).combobox('setValue', row.p_color_id);
        }
    },

    append: function(){
        self = this;
        if (hardware_accessories.endEditing()){
            $('#hardware-accessories').datagrid('appendRow',{p_name:'', p_in_stock: 1});
            hardware_accessories.editIndex = $('#hardware-accessories').datagrid('getRows').length-1;
            $('#hardware-accessories').datagrid('selectRow', hardware_accessories.editIndex)
                .datagrid('beginEdit', hardware_accessories.editIndex);
        }
    },

    removeit: function(){
        if (hardware_accessories.editIndex == undefined){return}
        self = this;
        var row = $('#hardware-accessories').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Selected?', function(r) {
                if ( r ) {
                    $.post( site_url + 'products/deleteByProductId', { p_id: row.p_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#hardware-accessories').datagrid('reload');
                            });
                            $('#hardware-accessories').datagrid('cancelEdit', hardware_accessories.editIndex)
                                .datagrid('deleteRow', hardware_accessories.editIndex);
                            hardware_accessories.editIndex = undefined;
                        }
                    }, 'json');
                }
            })
        }

    },

    accept: function(){
        if (hardware_accessories.endEditing()){
            $('#hardware-accessories').datagrid('acceptChanges');
        }
    },

    reject: function(){
        $('#hardware-accessories').datagrid('rejectChanges');
        hardware_accessories.editIndex = undefined;
    },
}