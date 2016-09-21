<form id="fm-po-complete" method="post" novalidate>

    <hr />
    <div class="fitem">
        <label>Coil Code</label>
        <input id="" name="" class="easyui-textbox" align="right" value="Previous Weight" disabled="true">
        <input id="" name="" class="easyui-textbox" precision="2"  min="0" required="true" align="right" value="New Weight" disabled="true">
    </div>
    <hr />
    <input type="hidden" name="po_id" value="<?php echo $po_id; ?>" />
    <?php foreach($coils as $coil): ?>

        <div class="fitem">
            <label style="font-weight:normal;"><?php echo $coil->coil_code; ?></label>
            <input id="" name="coil_old_weight[<?php echo $coil->coil_id; ?>]" class="easyui-numberbox" align="right" value="<?php echo $coil->coil_weight; ?>" readonly="true">
            <input id="" name="coil_weight[<?php echo $coil->coil_id; ?>]" class="easyui-numberbox" precision="2"  min="0" max="<?php echo $coil->coil_weight; ?>" required="true" align="right" value="0"/>
        </div>

    <?php endforeach; ?>

    </form>

<style>
    #fm-po-complete .fitem label { margin-left:5px;width: 122px; }
</style>
