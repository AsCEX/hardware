<form id="fm-charges" method="post" novalidate>

    <input type="hidden" name="chrg_id" value="<?php echo isset($charge->chrg_id) ? $charge->chrg_id : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'Charges'" style="padding:5px;">
            <div class="fitem">
                <label>Name:</label>
                <input name="chrg_name" class="easyui-textbox" required="true" align="right" value="<?php echo isset($charge->chrg_name) ? $charge->chrg_name : ""; ?>">
            </div>
            <div class="fitem">
                <label>Type:</label>
                <input name="chrg_type" id="chrg_type" class="" required="true" align="right" value="<?php echo isset($charge->chrg_type) ? $charge->chrg_type : ""; ?>">
            </div>
        </div>

</form>
<style>
    #fm-charges .fitem label { width: 100px; }
</style>
<script>
    function init_combobox() {

        $("#chrg_type").combobox({
            url: "<?php echo site_url('charge_types/getChargeTypesComboBox/'); ?>",
            method: 'get',
            valueField: 'id',
            textField: 'text',
            editable: false,
            prompt: 'Select Type'
        });
    }

    init_combobox();
</script>