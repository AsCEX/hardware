<form id="fm-sheets" method="post" novalidate>

    <input type="hidden" name="sht_id" value="<?php echo isset($sheet->sht_id) ? $sheet->sht_id : ""; ?>" />
    <input type="hidden" name="sht_clr_id" value="<?php echo isset($sheet->sht_clr_id) ? $sheet->sht_clr_id : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'Sheet'" style="padding:5px;">
            <div class="fitem">
                <label>Code:</label>
                <input name="sht_code" class="easyui-textbox" required="true" align="right" value="<?php echo isset($sheet->sht_code) ? $sheet->sht_code : ""; ?>">
            </div>
            <div class="fitem">
                <label>Length:</label>
                <input name="sht_length" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($sheet->sht_length) ? $sheet->sht_length : ""; ?>">
            </div>
            <div class="fitem">
                <label>Height:</label>
                <input name="sht_height" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($sheet->sht_height) ? $sheet->sht_height : ""; ?>">
            </div>
            <div class="fitem">
                <label>Width:</label>
                <input name="sht_width" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($sheet->sht_width) ? $sheet->sht_width : ""; ?>">
            </div>
            <div class="fitem">
                <label>Coil:</label>
                <select class="easyui-combobox" editable="false" name="sht_coil_id" style="width:160px"
                        url="<?php echo site_url('coils/getCoilsComboBox'); ?>/<?php echo isset($sheet->sht_coil_id) ? $sheet->sht_coil_id : ''; ?>"
                        method="get"
                        valueField="name"
                        prompt="Select Coil"
                        textField="value"
                        required="true">
                </select>
            </div>
            <div class="fitem">
                <label>Color:</label>
                <select class="easyui-combobox" editable="false" name="sht_clr_id" style="width:160px"
                        url="<?php echo site_url('colors/getColorsComboBox'); ?>/<?php echo isset($sheet->sht_clr_id) ? $sheet->sht_clr_id : ''; ?>"
                        method="get"
                        valueField="name"
                        prompt="Select Color"
                        textField="value"
                        required="true">
                </select>
            </div>
        </div>

</form>
<style>
    #fm-sheets .fitem label { width: 100px; }
</style>