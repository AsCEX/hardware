<form id="fm-coils" method="post" novalidate>
    <input type="hidden" name="coil_id" value="<?php echo isset($coils->coil_id) ? $coils->coil_id : ""; ?>" />
    <!--<input type="hidden" name="coil_created_by" value="<?php /*echo isset($coils->coil_created_by) ? $coils->coil_created_by : $userInfo['ui_id']; */?>" />-->

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'Coil Info'" style="padding:5px;">
            <input type="hidden" name="coil_dr_id" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_dr_id) ? $coils->coil_dr_id : $drd_id; ?>">
            <div class="fitem">
                <label>Coil Code:</label>
                <input name="coil_code" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_code) ? $coils->coil_code : ""; ?>">
            </div>
            <div class="fitem">
                <label>Weight:</label>
                <input name="coil_weight" class="easyui-numberbox" precision="2" required="true" align="right" value="<?php echo isset($coils->coil_weight) ? $coils->coil_weight : ""; ?>">
            </div>

            <div class="fitem">
                <label>Color:</label>
                <select class="easyui-combobox" editable="false" name="coil_clr_id" style="width:160px"
                        url="<?php echo site_url('colors/getColorsComboBox'); ?>/<?php echo isset($coils->coil_clr_id) ? $coils->coil_clr_id : ''; ?>"
                        method="get"
                        valueField="name"
                        prompt="Select Color"
                        textField="value"
                        required="true">
                </select>

            </div>

            <div class="fitem">
                <label>Qty:</label>
                <input name="coil_qty" class="easyui-numberbox" precision="2" required="true" align="right" value="<?php echo isset($coils->coil_qty) ? $coils->coil_qty : ""; ?>">
            </div>

            <div class="fitem">
                <label>Price:</label>
                <input name="coil_price" class="easyui-numberbox" precision="2" required="true" align="right" value="<?php echo isset($coils->coil_price) ? $coils->coil_price : ""; ?>">
            </div>
            <!--div class="fitem">
                <label>Date Created:</label>
                <input name="coil_created_date" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_created_date) ? $coils->coil_created_date : ""; ?>">
            </div-->
        </div>
    </div>

</form>
<style>
    #fm-coils .fitem label { width: 150px; }
</style>