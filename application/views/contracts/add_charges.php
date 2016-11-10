<form id="fm-contract-charges" method="post" novalidate>
    <input type="hidden" id="cc_c_id" name="cc_c_id" value="<?php echo isset($contract_charge->cc_c_id) ? $contract_charge->cc_c_id : "";?>">
    <input type="hidden" id="cc_id" name="cc_id" value="<?php echo isset($contract_charge->cc_id) ? $contract_charge->cc_id : "";?>">
    <div class="row" style="padding:10px;margin:0px;">
        <div class="col-md-12">
            <div class="form-group">
                <label>Type</label>
                <input id="chrg_type" name="chrg_type" class="easyui-combobox input-sm" style="width:100%;" required="required" value="<?php echo isset($contract_charge->chrg_type) ? $contract_charge->chrg_type : "";?>"
                   url="<?php echo site_url('charge_types/getChargeTypesComboBox'); ?>"
                   method="get"
                   valueField="id"
                   textField="text"
                   editable="false"
                   prompt="Select Type",
                   data-options="onChange: changeChargeType"
                />
            </div>
            <div class="form-group">
                <label>Name</label>
                <?php $chrg_type = isset($contract_charge->chrg_type) ? $contract_charge->chrg_type : 0;  ?>
                <input id="chrg_name" name="chrg_name" class="easyui-combobox input-sm" value="<?php echo isset($contract_charge->cc_chrg_id) ? $contract_charge->cc_chrg_id : "";?>" style="width:100%;" required="required"
                   url="<?php echo site_url('charges/getChargesByChargeTypeComboBox/' . $chrg_type); ?>"
                   method="get"
                   valueField="id"
                   textField="text"
                   editable="false"
                   prompt="Select Name"
                />
            </div>
            <div class="form-group">
                <label >Amount</label>
                <input type="text" id="cc_amount" name="cc_amount" class="easyui-numberbox input-sm" value="<?php echo isset($contract_charge->cc_amount) ? $contract_charge->cc_amount : ""; ?>" precision="2" groupSeparator="," style="width:100%;" required>
            </div>

        </div>
    </div>
</form>

<script>
    function changeChargeType(newValue, oldValue){
        $("#chrg_name").combobox('reload', site_url + 'charges/getChargesByChargeTypeComboBox/' + newValue).combobox('setValue', '');
    }
</script>