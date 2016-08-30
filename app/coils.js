var coils = {
  init: function() {
    this.datagrid();
    this.dialog();
  },

  datagrid: function() {
    using('plugins/jquery.client.paging.js', function() {
      $('#dg-coils').datagrid({
        url: site_url + "coils/getCoilsGrid",
        toolbar: [
          {
            text: 'Add Coil',
            iconCls: 'icon-add',
            handler: function() {
              coils.create();
            }
          },
          '-',
          {
            text: 'Edit Coil',
            iconCls: 'icon-edit',
            handler: function() {
              coils.update();
            }
          },
          '-',
          {
            text: 'Delete Coil',
            iconCls: 'icon-remove',
            handler: function() {
              coils.delete();
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
            {field:'coil_code',title:'Coil Code',width:'15%'},
            {field:'coil_length',title:'Length',width:'10%'},
            {field:'coil_height',title:'Height',width:'10%'},
            {field:'coil_width',title:'Width',width:'10%'},
            {field:'clr_name',title:'Color',width:'20%'},
            {field:'coil_created_by',title:'Created By',width:'20%'},
            {field:'coil_created_date',title:'Date Created',width:'20%'}
          ]
        ]
      }).datagrid('clientPaging');
    })
  },

  dialog: function() {
    $("#dlg-coils").dialog({
      resizable: true,
      modal: true,
      closed: true,
      buttons:[{
        text:'Save',
        handler:function() {
          coils.save();
        }
      },{
        text:'Close',
        handler:function() {
          $("#dlg-coils").dialog('close');
        }
      }]
    });
  },

  create: function() {
    $('#dlg-coils').dialog('open').dialog('refresh', site_url + 'coils/dialog').dialog('center').dialog('setTitle','New');
    $('#fm-coils').form('clear');
  },

  save: function() {
    $('#fm-coils').form('submit', {
      url: site_url + 'coils/saveCoil',
      onSubmit: function() {
        return $(this).form('validate');
      },
      success: function(response) {
        $.messager.alert('Message','Successful', 'info', function() {
          $('#dlg-coils').dialog('close');
          $('#dg-coils').datagrid('reload');
        });
      }
    });
  },

  update: function() {
    var row = $('#dg-coils').datagrid('getSelected');
    if (row) {
      $('#dlg-coils').dialog('open').dialog('refresh', site_url + 'coils/dialog/' + row.coil_id).dialog('center').dialog('setTitle','Edit');
      $('#fm-coils').form('load',row);
    }
  },

  delete: function() {
    var row = $('#dg-coils').datagrid('getSelected');
    if ( row ) {
      $.messager.confirm('Confirm', 'Delete Coil?', function(r) {
        if ( r ) {
          $.post( site_url + 'coils/deleteCoil', { coil_id: row.coil_id }, function(response) {
            if ( response.status == 'success' ) {
              $.messager.alert('Message', 'Success', 'info', function() {
                $('#dg-coils').datagrid('reload');
              })
            }
          }, 'json');
        }
      })
    }
  }
}