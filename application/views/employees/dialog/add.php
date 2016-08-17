<form id="fm-employees" method="post" novalidate>

    <input type="hidden" name="emp_id" value="<?php echo isset($employee->emp_id) ? $employee->emp_id : ""; ?>" />
    <input type="hidden" name="emp_ui_id" value="<?php echo isset($employee->emp_ui_id) ? $employee->emp_ui_id : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'User Info'" style="padding:5px;">
            <div class="fitem">
                <label>Firstname:</label>
                <input name="ui_firstname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($employee->ui_firstname) ? $employee->ui_firstname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Middle Name:</label>
                <input name="ui_middlename" class="easyui-textbox" required="true" align="right" value="<?php echo isset($employee->ui_middlename) ? $employee->ui_middlename : ""; ?>">
            </div>
            <div class="fitem">
                <label>Lastname:</label>
                <input name="ui_lastname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($employee->ui_lastname) ? $employee->ui_lastname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Ext. Name:</label>
                <input name="ui_extname" class="easyui-textbox" required="true" align="right" value="<?php echo isset($employee->ui_extname) ? $employee->ui_extname : ""; ?>">
            </div>
            <div class="fitem">
                <label>Address:</label>
                <input name="ui_address" class="easyui-textbox" required="true" align="right" multiline="true" style="width: 160px; height: 100px;" value="<?php echo isset($employee->ui_address) ? $employee->ui_address : ""; ?>">
            </div>
            <div class="fitem">
                <label>Address 2:</label>
                <input name="ui_address2" class="easyui-textbox" required="true" align="right" multiline="true" style="width: 160px; height: 100px;" value="<?php echo isset($employee->ui_address2) ? $employee->ui_address2 : ""; ?>">
            </div>
            <div class="fitem">
                <label>Zip:</label>
                <input name="ui_zip" class="easyui-textbox" required="true" align="right" value="<?php echo isset($employee->ui_zip) ? $employee->ui_zip : ""; ?>">
            </div>
            <div class="fitem">
                <label>Contact:</label>
                <input name="ui_contact_number" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($employee->ui_contact_number) ? $employee->ui_contact_number : ""; ?>">
            </div>
        </div>
        <div data-options="region:'east',title:'Employee Info',split:false,hideCollapsedContent:false" style="padding:5px;width:50%;">
            <div class="fitem">
                <label>Username:</label>
                <input name="emp_username" class="easyui-textbox" required="true" align="right" value="<?php echo isset($employee->emp_username) ? $employee->emp_username : ""; ?>">
            </div>
            <div class="fitem">
                <label>Password:</label>
                <input name="emp_password" class="easyui-textbox" required="true" align="right" value="<?php echo isset($employee->emp_password) ? $employee->emp_password : ""; ?>">
            </div>
            <div class="fitem">
                <label>Rate:</label>
                <input name="emp_rate" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($employee->emp_rate) ? $employee->emp_rate : ""; ?>">
            </div>
        </div>
    </div>

</form>
<style>
    #fm-employees .fitem label { width: 122px; }
</style>