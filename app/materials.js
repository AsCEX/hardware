
var materials = {

    init: function() {
        this.datagrid();
        this.dialog();
    },

    datagrid: function() {
        that = this;
        $('#dg-materials').datagrid({
            url: site_url + "materials/getMaterials",
            pagination:true,
            pageSize:10,
            rownumbers:true,
            /*fitColumns:"true",*/
            singleSelect:"true",
            columns:[
                [
                    {field:'mat_id',title:'ID',width:'5%'},
                    {field:'clr_name',title:'Color',width:'10%'},
                    {field:'mat_thickness',title:'Thickness',width:'10%',align:'right'},
                    {field:'mat_width',title:'Width',width:'10%',align:'right'},
                    {field:'mat_code',title:'Coil No.',width:'20%'},
                    {field:'mat_net_weight',title:'New Weight',width:'15%',align:'right'},
                    {field:'mat_gross_weight',title:'Gross Weight',width:'15%',align:'right'},
                    {field:'mat_actual_weight',title:'Actual Weight',width:'15%',align:'right'},
                ]
            ]
        });
    },

    dialog: function() {    },

}