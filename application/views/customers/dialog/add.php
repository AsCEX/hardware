<form id="fm-customers" method="post" novalidate>

    <input type="hidden" name="cust_id" value="<?php echo isset($customer->cust_id) ? $customer->cust_id : ""; ?>" />
    <input type="hidden" name="cust_ui_id" value="<?php echo isset($customer->cust_ui_id) ? $customer->cust_ui_id : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'User Info'" style="padding:5px;">
            <div class="fitem">
                <label>Firstname:</label>
                <input name="ui_firstname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($customer->ui_firstname) ? $customer->ui_firstname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Middle Name:</label>
                <input name="ui_middlename" class="easyui-textbox" required="true" align="right" value="<?php echo isset($customer->ui_middlename) ? $customer->ui_middlename : ""; ?>">
            </div>
            <div class="fitem">
                <label>Lastname:</label>
                <input name="ui_lastname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($customer->ui_lastname) ? $customer->ui_lastname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Ext. Name:</label>
                <input name="ui_extname" class="easyui-textbox" align="right" value="<?php echo isset($customer->ui_extname) ? $customer->ui_extname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Address:</label>
                <input name="ui_address" class="easyui-textbox" required="true" align="right" multiline="true" style="width: 160px; height: 100px;" value="<?php echo isset($customer->ui_address) ? $customer->ui_address : ""; ?>">
            </div>
            <div class="fitem">
                <label>Address 2:</label>
                <input name="ui_address2" class="easyui-textbox" align="right" multiline="true" style="width: 160px; height: 100px;" value="<?php echo isset($customer->ui_address2) ? $customer->ui_address2 : ""; ?>">
            </div>
            <div class="fitem">
                <label>Zip:</label>
                <input name="ui_zip" class="easyui-textbox" required="true" align="right" value="<?php echo isset($customer->ui_zip) ? $customer->ui_zip : ""; ?>">
            </div>
            <div class="fitem">
                <label>Contact:</label>
                <input name="ui_contact_number" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($customer->ui_contact_number) ? $customer->ui_contact_number : ""; ?>">
            </div>
        </div>
        <div data-options="region:'east',title:'customer Info',split:false,hideCollapsedContent:false" style="padding:5px;width:50%;">
            <div class="fitem">
                <label>Company:</label>
                <input name="cust_company" class="easyui-textbox" required="true" align="right" value="<?php echo isset($customer->cust_company) ? $customer->cust_company : ""; ?>">
            </div>

        </div>
    </div>

</form>
<style>
    #fm-customers .fitem label { width: 122px; }
</style>