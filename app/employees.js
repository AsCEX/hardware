
var employees = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    initForms: function() {

    },

    datagrid: function() {
        using('plugins/jquery.client.paging.js', function(){
            $('#dg-employees').datagrid({
                url: site_url + "employees/getEmployeesGrid",
                toolbar: [
                    {
                        text: 'Add Employee',
                        iconCls: 'icon-add',
                        handler: function() {
                            employees.create();
                        }
                    },
                    '-',
                    {
                        text: 'Edit Employee',
                        iconCls: 'icon-edit',
                        handler: function() {
                            employees.update();
                        }
                    },
                    '-',
                    {
                        text: 'Delete Employee',
                        iconCls: 'icon-remove',
                        handler: function() {
                            employees.delete();
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
                        {field:'ui_lastname',title:'Lastname',width:'10%'},
                        {field:'ui_firstname',title:'Firstname',width:'10%'},
                        {field:'ui_middlename',title:'Middle Name',width:'5%'},
                        {field:'ui_extname',title:'Ext. Name',width:'5%'},
                        {field:'ui_address',title:'Address',width:'20%'},
                        {field:'ui_address2',title:'Address 2',width:'20%'},
                        {field:'ui_zip',title:'Zip',width:'5%'},
                        {field:'ui_contact_number',title:'Contact',width:'10%'},
                        {field:'emp_username',title:'Username',width:'5%'},
                        {field:'emp_rate',title:'Rate',width:'5%'},
                    ]
                ]
            }).datagrid('clientPaging');
        })
    },

    dialog: function() {
        var employees = this;
        $("#dlg-employees").dialog({
            resizable: true,
            modal: true,
            closed: true,
            buttons:[{
                text:'Save',
                handler:function(){
                    employees.save();
                }
            },{
                text:'Close',
                handler:function(){
                    $("#dlg-employees").dialog('close');
                }
            }]
        });
    },

    create: function(){
        $('#dlg-employees').dialog('open').dialog('refresh', site_url + 'employees/dialog').dialog('center').dialog('setTitle','New');
        $('#fm-employees').form('clear');
    },

    save: function() {
        $('#fm-employees').form('submit',{
            url: site_url + 'employees/saveEmployee',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                $.messager.alert('Message','Successful', 'info', function(){
                    $('#dlg-employees').dialog('close');
                    $('#dg-employees').datagrid('reload');
                });
            }
        });
    },

    update: function(){

        var row = $('#dg-employees').datagrid('getSelected');
        console.log(row);
        if (row){
            $('#dlg-employees').dialog('open').dialog('refresh', site_url + 'employees/dialog/' + row.emp_id).dialog('center').dialog('setTitle','Edit');
            $('#fm-employees').form('load',row);
        }
    },

    delete: function() {

        var row = $('#dg-employees').datagrid('getSelected');
        if ( row ) {
            $.messager.confirm('Confirm', 'Delete Employee?', function(r) {
                if ( r ) {
                    $.post( site_url + 'employees/deleteEmployee', { emp_id: row.emp_id }, function(response) {
                        if ( response.status == 'success' ) {
                            $.messager.alert('Message', 'Success', 'info', function(){
                                $('#dg-employees').datagrid('reload');
                            })
                        }
                    }, 'json');
                }
            })
        }
    }

}