var coils = {
  dr_id: 0,
  init: function() {
    this.datagrid();
    this.dialog();
  },

  datagrid: function() {

    that = this;

    using('plugins/jquery.client.paging.js', function() {

      $('#dg-coils').datagrid({
        url: site_url + "coils/getCoilsGrid/" + that.dr_id ,

        pagination:true,
        pageSize:10,
        rownumbers:true,
        fitColumns:"true",
        singleSelect:"true",
        rowStyler:function(index,row){
          if (row.coil_drd_id  == 0){
            //return 'background-color: #dedddd;opacity: 0.3;';
          }
        }
      }).datagrid('clientPaging');

      if(that.dr_id == -1){
        $('#dg-coils').datagrid({
          toolbar: [
            {
              text: 'View Coil',
              iconCls: 'icon-add',
              handler: function () {
                coils.view();
              }
            }
          ],

          columns:[
            [
              {field:'coil_id',title:'ID',width:'10%'},
              {field:'coil_code',title:'Coil Code',width:'15%'},
              {field:'coil_length',title:'Length',width:'10%'},
              {field:'coil_height',title:'Height',width:'10%'},
              {field:'coil_width',title:'Width',width:'10%'},
              {field:'clr_name',title:'Color',width:'20%',
                formatter: function(value,row,index){
                  return "<i class='fa fa-square' style='color: " + row.clr_hex + ";'></i> " + row.clr_name.replace(/(^|\s)[a-z]/g,function(f){return f.toUpperCase();});
                }},
              {field:'supp_company',title:'Company',width:'20%'},
            ]
          ]
        });
      }else{
        $('#dg-coils').datagrid({
          toolbar: [
            {
              text: 'Add Coil',
              iconCls: 'icon-add',
              handler: function () {
                coils.create();
              }
            },
            '-',
            {
              text: 'Edit Coil',
              iconCls: 'icon-edit',
              handler: function () {
                coils.update();
              }
            },
            '-',
            {
              text: 'Delete Coil',
              iconCls: 'icon-remove',
              handler: function () {
                coils.delete();
              }
            }
          ],

          columns:[
            [
              {field:'coil_id',title:'ID',width:'10%'},
              {field:'coil_code',title:'Coil Code',width:'15%',align:'right'},
              {field:'coil_length',title:'Length',width:'10%',align:'right'},
              {field:'coil_height',title:'Height',width:'10%',align:'right'},
              {field:'coil_width',title:'Width',width:'10%',align:'right'},
              {field:'clr_name',title:'Color',width:'15%',
                formatter: function(value,row,index){
                  return "<i class='fa fa-square' style='color: " + row.clr_hex + ";'></i> " + row.clr_name.replace(/(^|\s)[a-z]/g,function(f){return f.toUpperCase();});
                },
              },
              {field:'coil_qty',title:'Qty',width:'10%',align:'right'},
              {field:'coil_price',title:'Price',width:'15%',align:'right'},
            ]
          ],
        });
      }



    })
  },

  dialog: function() {
    $("#dlg-coils,#dlg-coils-view").dialog({
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
          $("#dlg-coils,#dlg-coils-view").dialog('close');
        }
      }]
    });
  },

  create: function() {
    that = this;
    $('#dlg-coils').dialog('open').dialog('refresh', site_url + 'coils/dialog?dr_id=' + that.dr_id).dialog('center').dialog('setTitle','New');
    $('#fm-coils').form('clear');
  },

  save: function() {
    that = this;
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
  },

  view: function() {
    var row = $('#dg-coils').datagrid('getSelected');
    if (row) {
      $('#dlg-coils-view').dialog('open').dialog('refresh', site_url + 'coils/dialog/' + row.coil_id + '/true').dialog('center').dialog('setTitle','Coil Details');
    }
  }
};