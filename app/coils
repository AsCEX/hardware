var suppliers = {
  init: function() {
    this.datagrid();
    this.dialog();
  },

  datagrid: function() {
    using('plugins/jquery.client.paging.js', function() {
      $('#dg-suppliers').datagrid({
        url: site_url + "suppliers/getSuppliersGrid",
        toolbar: [
          {
            text: 'Add Supplier',
            iconCls: 'icon-add',
            handler: function() {
              suppliers.create();
            }
          },
          '-',
          {
            text: 'Edit Supplier',
            iconCls: 'icon-edit',
            handler: function() {
              suppliers.update();
            }
          },
          '-',
          {
            text: 'Delete Supplier',
            iconCls: 'icon-remove',
            handler: function() {
              suppliers.delete();
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
            {field:'supp_company',title:'Company',width:'10%'},
          ]
        ]
      }).datagrid('clientPaging');
    })
  },

  dialog: function() {
  var employees = this;
    $("#dlg-suppliers").dialog({
      resizable: true,
      modal: true,
      closed: true,
      buttons:[{
        text:'Save',
        handler:function() {
          suppliers.save();
        }
      },{
        text:'Close',
        handler:function() {
          $("#dlg-suppliers").dialog('close');
        }
      }]
    });
  },

  create: function() {
    $('#dlg-suppliers').dialog('open').dialog('refresh', site_url + 'suppliers/dialog').dialog('center').dialog('setTitle','New');
    $('#fm-suppliers').form('clear');
  },

  save: function() {
    $('#fm-suppliers').form('submit', {
      url: site_url + 'suppliers/saveSupplier',
      onSubmit: function() {
        return $(this).form('validate');
      },
      success: function(response) {
        $.messager.alert('Message','Successful', 'info', function() {
          $('#dlg-suppliers').dialog('close');
          $('#dg-suppliers').datagrid('reload');
        });
      }
    });
  },

  update: function() {
    var row = $('#dg-suppliers').datagrid('getSelected');
    if (row) {
      $('#dlg-suppliers').dialog('open').dialog('refresh', site_url + 'suppliers/dialog/' + row.supp_id).dialog('center').dialog('setTitle','Edit');
      $('#fm-suppliers').form('load',row);
    }
  },

  delete: function() {
    var row = $('#dg-suppliers').datagrid('getSelected');
    if ( row ) {
      $.messager.confirm('Confirm', 'Delete Supplier?', function(r) {
        if ( r ) {
          $.post( site_url + 'suppliers/deleteSupplier', { supp_id: row.supp_id }, function(response) {
            if ( response.status == 'success' ) {
              $.messager.alert('Message', 'Success', 'info', function() {
                $('#dg-suppliers').datagrid('reload');
              })
            }
          }, 'json');
        }
      })
    }
  }
}