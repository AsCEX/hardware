<form id="fm-materials" method="post" novalidate>

    <input type="hidden" id="mat_id" name="mat_id" value="<?php echo isset($material->mat_id) ? $material->mat_id : ''; ?>">

    <div class="row" style="padding:10px;margin:0px;">
        <div class="col-md-12">
            <div class="form-group ">
                <div class="row">
                    <div class="col-md-12 form-inline" style="margin-bottom: 5px;">
                        <label style="width:120px;">Color</label>
                        <div class="form-group">
<!--                            <input type="color" id="mat_clr_id" name="mat_clr_id" class="easyui-textbox" style="width:100%;text-align:right;" value="--><?php //echo isset($material->mat_clr_id) ? $material->mat_clr_id : ''; ?><!--" />-->
                            <?php $mat_clr_id = isset($material->mat_clr_id) ? $material->mat_clr_id : ''; ?>
                            <input id="mat_clr_id" name="mat_clr_id" class="input-sm" style="width:100%;" value="<?php echo $mat_clr_id; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-12 form-inline" style="margin-bottom: 5px;">
                        <label style="width:120px;">Thickness</label>
                        <div class="form-group">
                            <input type="text" id="mat_thickness" name="mat_thickness" class="easyui-numberbox" prompt="0" precision="3" style="width:100%;text-align:right;" value="<?php echo isset($material->mat_thickness) ? $material->mat_thickness : ''; ?>" />
                        </div>
                    </div>

                    <div class="col-md-12 form-inline">
                        <label style="width:120px;">Width</label>
                        <div class="form-group">
                            <input type="text" id="mat_width" name="mat_width" class="easyui-numberbox" prompt="0" precision="3" style="width:100%;text-align:right;" value="<?php echo isset($material->mat_width) ? $material->mat_width : ''; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Coil No.</label>
                <input type="text" id="mat_code" name="mat_code" class="easyui-textbox" style="width:100%;" value="<?php echo isset($material->mat_code) ? $material->mat_code : ''; ?>"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group ">
                <div class="row">
                    <div class="col-md-12 form-inline" style="margin-bottom: 5px;">
                        <label style="width:120px;">Net Weight</label>
                        <div class="form-group">
                            <input type="text" id="mat_net_weight" name="mat_net_weight" class="easyui-numberbox" prompt="0" precision="3" style="width:100%;text-align:right;" value="<?php echo isset($material->mat_net_weight) ? $material->mat_net_weight : ''; ?>" />

                        </div>
                    </div>
                    <div class="col-md-12 form-inline" style="margin-bottom: 5px;">
                        <label style="width:120px;">Gross Weight</label>
                        <div class="form-group">
                            <input type="text" id="mat_gross_weight" name="mat_gross_weight" class="easyui-numberbox" prompt="0" precision="3" style="width:100%;text-align:right;" value="<?php echo isset($material->mat_gross_weight) ? $material->mat_gross_weight : ''; ?>" />
                        </div>
                    </div>

                    <div class="col-md-12 form-inline">
                        <label style="width:120px;">Actual Weight</label>
                        <div class="form-group">
                            <input type="text" id="mat_actual_weight" name="mat_actual_weight" class="easyui-numberbox" prompt="0" precision="3" style="width:100%;text-align:right;" value="<?php echo isset($material->mat_actual_weight) ? $material->mat_actual_weight : ''; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function init_cb(){

        $("#mat_clr_id").combobox({
            url: "<?php echo site_url('colors/getColorsComboBox/' . $mat_clr_id); ?>",
            method: 'get',
            valueField: 'id',
            textField: 'text',
            editable: false,
            prompt: 'Select Color'
        });
    }

    init_cb();
</script>
</script>