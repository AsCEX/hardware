
var roofing_bended_panels = {

    init: function() {
        this.datagrid();
    },

    datagrid: function() {
        self = this;
        $('#roofing-bended-panels').datagrid({
            url: site_url + "products/getRoofingBendedPanels",
            toolbar: [
                {
                    text: 'Add',
                    iconCls: 'fa fa-plus',
                    handler: function(){
                        roofing_bended_panels.append();
                    }
                },
                {
                    text: 'Save',
                    iconCls: 'fa fa-save',
                    handler: function(){
                        roofing_bended_panels.accept();
                    }
                },
                {
                    text: 'Delete',
                    iconCls: 'fa fa-remove',
                    handler: function(){
                        roofing_bended_panels.removeit();
                    }
                },
                {
                    text: 'Cancel',
                    iconCls: 'fa fa-undo',
                    handler: function(){
                        roofing_bended_panels.reject();
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
                    {field:'p_name',title:'Name',width:'10%',
                        editor: {
                            type: 'textbox',
                            options: {
                                required: true
                            }
                        }
                    },
                    {field:'cat_name', title: 'Category', width: '10%', align: 'right',
                        editor: {
                            type: 'combobox',
                            options: {
                                url: 'products/getRoofingBendedPanelsCategory',
                                method: 'get',
                                valueField: 'id',
                                textField: 'text',
                                editable: false,
                                required: true,
                                prompt: 'Select Category'
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
            onLoadSuccess: function(data) {
                //console.log(data);
            }
        });
    },

    editIndex: undefined,

    endEditing: function(){
        self = this;
        if (roofing_bended_panels.editIndex == undefined){return true}
        if ($('#roofing-bended-panels').datagrid('validateRow', roofing_bended_panels.editIndex)){
            $('#roofing-bended-panels').datagrid('endEdit', roofing_bended_panels.editIndex);
            roofing_bended_panels.editIndex = undefined;
            return true;
        } else {
            return false;
        }
    },

    onClickCell: function(index, field){
        self = this;
        if (roofing_bended_panels.editIndex != index){
            if (roofing_bended_panels.endEditing()){
                $('#roofing-bended-panels').datagrid('selectRow', index)
                    .datagrid('beginEdit', index);
                var ed = $('#roofing-bended-panels').datagrid('getEditor', {index:index,field:field});
                if (ed){
                    ($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus().bind('keyup', function(e)
                    {
                        var code = e.keyCode || e.which;
                        if(code == 13) { //Enter keycode
                            $('#roofing-bended-panels').datagrid('acceptChanges');
                            roofing_bended_panels.editIndex = undefined;
                        }
                    });

                }
                roofing_bended_panels.editIndex = index;
            } else {
                setTimeout(function(){
                    $('#roofing-bended-panels').datagrid('selectRow', roofing_bended_panels.editIndex);
                },0);
            }
        }
    },

    onEndEdit: function(index, row){
        self = this;

        $.post( site_url + 'products/saveRoofingBendedPanel', { data: row }, function(response) {
            if ( response.status == 'success' ) {
                $.messager.alert('Message', 'Success', 'info', function(){
                    $('#roofing-bended-panels').datagrid('reload');
                    roofing_bended_panels.editIndex = undefined;
                })
            }
        }, 'json');
    },

    onClickRow: function(index, row) {
        self = this;

        if (roofing_bended_panels.editIndex == undefined){return}

        if($('#roofing-bended-panels').datagrid('selectRow', index)
                    .datagrid('beginEdit', index)) {
            var categoryEd = $('#roofing-bended-panels').datagrid('getEditor', {index:index,field:'cat_name'}),
                colorEd = $('#roofing-bended-panels').datagrid('getEditor', {index:index,field:'clr_name'});
            $(categoryEd.target).combobox('setValue', row.p_cat_id);
            $(colorEd.target).combobox('setValue', row.p_color_id);
        }
    },

    append: function(){
        self = this;
        if (roofing_bended_panels.endEditing()){
            $('#roofing-bended-panels').datagrid('appendRow',{p_name:'', p_in_stock: 1});
            roofing_bended_panels.editIndex = $('#roofing-bended-panels').datagrid('getRows').length-1;
            $('#roofing-bended-panels').datagrid('selectRow', roofing_bended_panels.editIndex)
                .datagrid('beginEdit', roofing_bended_panels.editIndex);
        }
    },

    removeit: function(){
        if (roofing_bended_panels.editIndex == undefined){return}
        self = this;
        var row = $('#roofing-bended-panels').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Selected?', function(r) {
                if ( r ) {
                    $.post( site_url + 'products/deleteRoofingBendedPanel', { p_id: row.p_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#roofing-bended-panels').datagrid('reload');
                            });
                            $('#roofing-bended-panels').datagrid('cancelEdit', roofing_bended_panels.editIndex)
                                .datagrid('deleteRow', roofing_bended_panels.editIndex);
                            roofing_bended_panels.editIndex = undefined;
                        }
                    }, 'json');
                }
            })
        }
        
    },

    accept: function(){
        if (roofing_bended_panels.endEditing()){
            $('#roofing-bended-panels').datagrid('acceptChanges');
        }
    },

    reject: function(){
        $('#roofing-bended-panels').datagrid('rejectChanges');
        roofing_bended_panels.editIndex = undefined;
    },
}