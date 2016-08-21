<form id="fm-suppliers" method="post" novalidate>

    <input type="hidden" name="supp_id" value="<?php echo isset($supplier->supp_id) ? $supplier->supp_id : ""; ?>" />
    <input type="hidden" name="supp_ui_id" value="<?php echo isset($supplier->supp_ui_id) ? $supplier->supp_ui_id : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'User Info'" style="padding:5px;">
            <div class="fitem">
                <label>Firstname:</label>
                <input name="ui_firstname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($supplier->ui_firstname) ? $supplier->ui_firstname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Middle Name:</label>
                <input name="ui_middlename" class="easyui-textbox" required="true" align="right" value="<?php echo isset($supplier->ui_middlename) ? $supplier->ui_middlename : ""; ?>">
            </div>
            <div class="fitem">
                <label>Lastname:</label>
                <input name="ui_lastname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($supplier->ui_lastname) ? $supplier->ui_lastname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Ext. Name:</label>
                <input name="ui_extname" class="easyui-textbox" align="right" value="<?php echo isset($supplier->ui_extname) ? $supplier->ui_extname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Address:</label>
                <input name="ui_address" class="easyui-textbox" required="true" align="right" multiline="true" style="width: 160px; height: 100px;" value="<?php echo isset($supplier->ui_address) ? $supplier->ui_address : ""; ?>">
            </div>
            <div class="fitem">
                <label>Address 2:</label>
                <input name="ui_address2" class="easyui-textbox" align="right" multiline="true" style="width: 160px; height: 100px;" value="<?php echo isset($supplier->ui_address2) ? $supplier->ui_address2 : ""; ?>">
            </div>
            <div class="fitem">
                <label>Zip:</label>
                <input name="ui_zip" class="easyui-textbox" required="true" align="right" value="<?php echo isset($supplier->ui_zip) ? $supplier->ui_zip : ""; ?>">
            </div>
            <div class="fitem">
                <label>Contact:</label>
                <input name="ui_contact_number" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($supplier->ui_contact_number) ? $supplier->ui_contact_number : ""; ?>">
            </div>
        </div>
        <div data-options="region:'east',title:'Supplier Info',split:false,hideCollapsedContent:false" style="padding:5px;width:50%;">
            <div class="fitem">
                <label>Company:</label>
                <input name="supp_company" class="easyui-textbox" required="true" align="right" value="<?php echo isset($supplier->supp_company) ? $supplier->supp_company : ""; ?>">
            </div>
        </div>
    </div>

</form>
<style>
    #fm-suppliers .fitem label { width: 122px; }
</style>