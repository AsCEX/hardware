<form id="fm-coils" method="post" novalidate>

    <input type="hidden" name="coil_id" value="<?php echo isset($coils->coil_id) ? $coils->coil_id : ""; ?>" />
    <input type="hidden" name="coil_created_by" value="<?php echo isset($coils->coil_created_by) ? $coils->coil_created_by : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'Coil Info'" style="padding:5px;">
            <div class="fitem">
                <label>Coil Code:</label>
                <input name="coil_code" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_code) ? $coils->coil_code : ""; ?>">
            </div>
            <div class="fitem">
                <label>Length:</label>
                <input name="coil_length" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_length) ? $coils->coil_length : ""; ?>">
            </div>
            <div class="fitem">
                <label>Width:</label>
                <input name="coil_width" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_width) ? $coils->coil_width : ""; ?>">
            </div>
            <div class="fitem">
                <label>Height:</label>
                <input name="coi_heigth" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coi_heigth) ? $coils->coi_heigth : ""; ?>">
            </div>
            <div class="fitem">
                <label>Color:</label>
                <input name="clr_name" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->clr_name) ? $coils->clr_name : ""; ?>">
            </div>
            <div class="fitem">
                <label>Date Created:</label>
                <input name="coil_created_date" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_created_date) ? $coils->coil_created_date : ""; ?>">
            </div>
        </div>
        <div data-options="region:'east',title:'Creator Info',split:false,hideCollapsedContent:false" style="padding:5px;width:50%;">
            <div class="fitem">
                <label>Firstname:</label>
                <input name="ui_firstname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->ui_firstname) ? $coils->ui_firstname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Middle Name:</label>
                <input name="ui_middlename" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->ui_middlename) ? $coils->ui_middlename : ""; ?>">
            </div>
            <div class="fitem">
                <label>Lastname:</label>
                <input name="ui_lastname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->ui_lastname) ? $coils->ui_lastname : ""; ?>">
            </div>
        </div>
    </div>

</form>
<style>
    #fm-coils .fitem label { width: 122px; }
</style>