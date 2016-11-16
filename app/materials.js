
var materials = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    datagrid: function() {
        that = this;
        $('#dg-materials').datagrid({
            url: site_url + "materials/getMaterials",
            toolbar: [
                {
                    text: 'Add Material',
                    iconCls: 'icon-add',
                    handler: function() {
                        materials.create();
                    }
                },
                '-',
                {
                    text: 'Edit Material',
                    iconCls: 'icon-edit',
                    handler: function() {
                        materials.update();
                    }
                },
                '-',
                {
                    text: 'Delete Material',
                    iconCls: 'icon-remove',
                    handler: function() {
                        materials.delete();
                    }
                }
            ],
            pagination:true,
            pageSize:10,
            rownumbers:true,
            fitColumns:"true",
            singleSelect:"true",
            columns:[
                [
                    //{field:'mat_id',title:'ID',width:'5%'},
                    {field:'clr_name',title:'Color',width:'10%'},
                    {field:'mat_thickness',title:'Thickness',width:'10%',align:'right'},
                    {field:'mat_width',title:'Width',width:'10%',align:'right'},
                    {field:'mat_code',title:'Coil No.',width:'20%'},
                    {field:'mat_net_weight',title:'Net Weight',width:'15%',align:'right'},
                    {field:'mat_gross_weight',title:'Gross Weight',width:'15%',align:'right'},
                    {field:'mat_actual_weight',title:'Actual Weight',width:'15%',align:'right'},
                ]
            ]
        });
    },

    dialog: function() {
        var materials = this;
        $("#dlg-materials").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    materials.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-materials").dialog('close');
                }
            }]
        });
    },

    create: function() {
        $('#dlg-materials').dialog('open').dialog('refresh', site_url + 'materials/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-materials').form('clear');
    },

    save: function() {
        $('#fm-materials').form('submit',{
            url: site_url + 'materials/saveMaterial',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-materials').dialog('close');
                    $('#dg-materials').datagrid('reload');
                });
            }
        });
    },

    update: function() {
        var row = $('#dg-materials').datagrid('getSelected');
        if ( row ) {
            $('#dlg-materials').dialog('open').dialog('refresh', site_url + 'materials/dialog/' + row.mat_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-materials').form('load',row);
        }
    },

    delete: function() {
        var row = $('#dg-materials').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Materials?', function(r) {
                if ( r ) {
                    $.post( site_url + 'materials/deleteMaterial', { mat_id: row.mat_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-materials').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }


}