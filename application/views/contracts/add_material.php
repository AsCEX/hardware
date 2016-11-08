<form id="fm-contract-material" method="post" novalidate>
    <input type="hidden" id="cd_c_id" name="cd_c_id" value="">
    <input type="hidden" id="cd_id" name="cd_id" value="<?php echo isset($contract_detail->cd_id) ? $contract_detail->cd_id : ''; ?>">

    <div class="row" style="padding:10px;margin:0px;">
        <div class="col-md-6">
            <div class="form-group">
                <label>Qty</label>
                <input type="text" id="cd_qty" name="cd_qty" class="easyui-numberbox" groupSeparator="," value="<?php echo isset($contract_detail->cd_qty) ? $contract_detail->cd_qty : ''; ?>" prompt="0" precision="2" style="width:100%;" required="required"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label >Unit</label>
                <input class="easyui-combobox" id="cd_unit" name="cd_unit" style="width:100%;" value="pcs"
                       data-options="
                            valueField: 'label',
                            textField: 'value',
                            data: [{id: 'pcs',text: 'pcs'},{id: 'Lm',text: 'Lm'}]"
                       editable="false"
                       valueField="id"
                       textField="text"
                />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Category</label>
                <input id="product_category" class="easyui-combobox  input-sm" style="width:100%;"
                       url="<?php echo site_url('categories/getCategoryComboBox'); ?>"
                       method="get"
                       valueField="id"
                       textField="text"
                       editable="false"
                       prompt="Select Category",
                       data-options="onChange: changeCategory"
                />
            </div>

            <div class="form-group">
                <label>Product</label>
                <input id="cd_p_id" name="cd_p_id" class="easyui-combobox  input-sm" style="width:100%;" required
                       url="<?php echo site_url('products/getProductsByCategoryComboBox/0'); ?>"
                       method="get"
                       valueField="id"
                       textField="text"
                       editable="false"
                       prompt="Select Product"
                />
            </div>

            <div class="form-group ">

                <div class="row">
                    <div class="col-md-12 form-inline" style="margin-bottom: 5px;">
                        <label style="width:120px;">Thickness</label>
                        <div class="form-group">
                            <input type="text" id="cd_thickness" name="cd_thickness" class="easyui-numberbox" prompt="0" precision="2" style="width:100%;text-align:right;" value="<?php echo isset($contract_detail->cd_thickness) ? $contract_detail->cd_thickness : ''; ?>" />
                            <!--<input id="thickness" class="easyui-combobox  input-sm" style="width:100%;"
                           url="<?php /*echo site_url('products/getProductThicknessComboBox/0'); */?>"
                           method="get"
                           valueField="id"
                           textField="text"
                           editable="false"
                           prompt="T"
                        />-->
                        </div>
                    </div>
                    <div class="col-md-12 form-inline" style="margin-bottom: 5px;">
                        <label style="width:120px;">Width</label>
                        <div class="form-group">
                            <input type="text" id="cd_width" name="cd_width" class="easyui-numberbox" prompt="0" precision="4" style="width:100%;text-align:right;" value="<?php echo isset($contract_detail->cd_width) ? $contract_detail->cd_width : ''; ?>" />
                            <!--<input id="width" class="easyui-combobox  input-sm" style="width:100%;"
                           url="<?php /*echo site_url('products/getProductWidthComboBox/0'); */?>"
                           method="get"
                           valueField="id"
                           textField="text"
                           editable="false"
                           prompt="W"
                        />-->
                        </div>
                    </div>

                    <div class="col-md-12 form-inline">
                        <label style="width:120px;">Length</label>
                        <div class="form-group">
                            <input type="text" id="cd_length" name="cd_length" class="easyui-numberbox" prompt="0" precision="3" style="width:100%;text-align:right;" value="<?php echo isset($contract_detail->cd_length) ? $contract_detail->cd_length : ''; ?>" />
                            <!--<input id="length" class="easyui-combobox  input-sm" style="width:100%;"
                           url="<?php /*echo site_url('products/getProductsLengthComboBox/0'); */?>"
                           method="get"
                           valueField="id"
                           textField="text"
                           editable="false"
                           prompt="L"
                        />-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" id="cd_unit_price" name="cd_unit_price" class="easyui-numberbox" value="<?php echo isset($contract_detail->cd_unit_price) ? $contract_detail->cd_unit_price : ''; ?>" precision="2" groupSeparator="," style="width:100%;text-align:right;"/>
            </div>
        </div>
    </div>
</form>

<script>
    $(function(){
        //$("#product_category").combobox('onChange')
    });

    function changeCategory(newValue, oldValue){
        $("form#fm-contract-material #cd_p_id").combobox('reload', site_url + 'products/getProductsByCategoryComboBox/' + newValue).combobox('setValue', '');
    }
</script>