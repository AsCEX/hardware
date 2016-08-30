<form id="fm-colors" method="post" novalidate>

    <input type="hidden" name="clr_id" value="<?php echo isset($color->clr_id) ? $color->clr_id : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'Color'" style="padding:5px;">
            <div class="fitem">
                <label>Name:</label>
                <input name="clr_name" class="easyui-textbox" required="true" align="right" value="<?php echo isset($color->clr_name) ? $color->clr_name : ""; ?>">
            </div>
            <div class="fitem">
                <label>Hex:</label>
                <input name="clr_hex" type="color" class="easyui-textbox" required="true" align="right" value="<?php echo isset($color->clr_hex) ? $color->clr_hex : ""; ?>">
            </div>
    </div>

</form>
<style>
    #fm-colors .fitem label { width: 100px; }
</style>