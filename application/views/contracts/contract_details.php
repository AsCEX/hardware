<script type="text/javascript" src="<?php echo site_url('app/contract_details.js') ?>"></script>


<div class="easyui-layout" fit="true" data-options="collapsible:false" >

    <div region="north" title="Contract Details" style="height:200px;" collapsible="false">
        <form id="contract-forms" method="POST">
        <div class="row" style="padding:10px;margin:0px;">
            <div class="col-md-1">
                <div class="form-group">
                    <label>SC</label>
                    <input type="text" name="c_id" class="easyui-textbox" value="<?php echo @$contract_details->c_id; ?>" readonly="true" style="width:100%">
                    <input type="hidden" name="c_cust_id" value="<?php echo @$contract_details->c_cust_id; ?>" />
                    <input type="hidden" name="c_status" value="1" />
                </div>
                <div class="form-group">
                    <label >Status</label>
                    <input class="easyui-combobox" style="width:100px;" name="c_status" required="required"
                           data-options="
                            valueField: 'label',
                            textField: 'value',
                            data: [{id: '0',text: 'Pending'},{id: '1',text: 'Completed'}]"
                           editable="false"
                           valueField="id"
                           textField="text"
                           value="<?php echo isset($contract_details->c_status) ? $contract_details->c_status : 0; ?>"
                        />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >Company</label>
                    <input class="easyui-combobox" style="width:100%;" name="c_cust_id" required="required"
                           url="<?php echo site_url('customers/getCustomersCombobox'); ?>"
                           editable="false"
                           valueField="id"
                           textField="text"
                           value="<?php echo @$contract_details->c_cust_id; ?>"
                        />
                </div>
                <div class="form-group">
                    <label >Date</label>
                    <input type="text" name="c_date" class="easyui-datebox date-masked" value="<?php echo @$contract_details->c_date; ?>" style="width:100%" required="required">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >Project</label>
                    <input type="text" class="easyui-textbox"  name="c_project" value="<?php echo @$contract_details->c_project; ?>" style="width:100%" required="required">
                </div>
                <div class="form-group">
                    <label >Location</label>
                    <input type="text" class="easyui-textbox"  name="c_location" value="<?php echo @$contract_details->c_location; ?>" style="width:100%" required="required">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >Sales Rep</label>
                    <input type="text"  name="c_sales_rep" class="easyui-textbox" value="<?php echo @$contract_details->c_sales_rep; ?>" style="width:100%" required="required">
                </div>
                <div class="form-group">
                    <label >Reference</label>
                    <input type="text"  name="c_reference" class="easyui-textbox" value="<?php echo @$contract_details->c_reference; ?>" style="width:100%" required="required">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Color</label>
                    <input type="text" class="easyui-combobox input-sm"  name="c_clr_id" style="width:100%" required="required"
                           url="<?php echo site_url('colors/getColorsComboBox'); ?>"
                           method="get"
                           valueField="id"
                           textField="text"
                           editable="false"
                           value="<?php echo @$contract_details->c_clr_id; ?>" />
                </div>
                <div class="form-group">
                    <label >Delivery Instructions</label>
                    <input type="text" class="easyui-textbox" name="c_delivery_instruction" value="<?php echo @$contract_details->c_delivery_instruction; ?>" style="width:100%" required="required">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label style="display:block;">Terms of Payment</label>
                    <textarea name="c_terms_of_payment" class="easyui-textbox" rows="5" style="width:100%;height:90px;" multiline="true" required="required"><?php echo @$contract_details->c_terms_of_payment; ?></textarea>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div region="east" title="Contract Charges" style="width:300px;" collapsible="false">
        <table id="dg-contract-charges" class="easyui-datagrid" fit="true"></table>
    </div>

    <div region="center" title="Materials">
        <table id="dg-contract-details" class="easyui-datagrid" fit="true"></table>
    </div>

</div>


<div id="breakdown-menu" class="easyui-menu">
    <div class="menu-links" onclick="" >View Break Down</div>
    <div class="menu-links" onclick="contract_details.updateMaterial()" >Edit Material</div>
</div>

<div id="material-form-dialog" style="height: 500px;width: 375px;"></div>
<div id="charges-form-dialog" style="height: 250px;width: 350px;"></div>

<script>
    $(function(){
    });
    contract_details.init(<?php echo $contract_id; ?>);
</script>