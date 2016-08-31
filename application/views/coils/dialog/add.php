<form id="fm-coils" method="post" novalidate>

    <input type="hidden" name="coil_id" value="<?php echo isset($coils->coil_id) ? $coils->coil_id : ""; ?>" />
    <input type="hidden" name="coil_created_by" value="<?php echo isset($coils->coil_created_by) ? $coils->coil_created_by : $userInfo['ui_id']; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'Coil Info'" style="padding:5px;">
            <input name="coil_drd_id" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_dr_id) ? $coils->coil_dr_id : $dr_id; ?>">
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
                <input name="coil_height" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_height) ? $coils->coil_height : ""; ?>">
            </div>
            <div class="fitem">
                <label>Color:</label>
                <select name="coil_clr_id" required="true">
                  <option value="" disabled selected>Select Color</option>
                  <?php if($colors) { ?>
                    <?php foreach ($colors as $color) { 
                            $selected = ($color->clr_id === $coils->coil_clr_id)? "selected": "";
                        ?>
                      <option value="<?php echo $color->clr_id; ?>" <?php echo $selected;?> ><?php echo $color->clr_name; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
            </div>
            <!--div class="fitem">
                <label>Date Created:</label>
                <input name="coil_created_date" class="easyui-textbox" required="true" align="right" value="<?php echo isset($coils->coil_created_date) ? $coils->coil_created_date : ""; ?>">
            </div-->
        </div>
    </div>

</form>
<style>
    #fm-coils .fitem label { width: 122px; }
</style>