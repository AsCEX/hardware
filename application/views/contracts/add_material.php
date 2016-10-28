<div class="row" style="padding:10px;margin:0px;">
    <div class="col-md-6">
        <div class="form-group">
            <label>Qty</label>
            <input type="text" class="easyui-numberbox" groupSeparator="," value="" prompt="0" precision="2" style="width:100%;" required="required"/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label >Unit</label>
            <input class="easyui-combobox" style="width:100%;" value="pcs"
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
            <label >Category</label>
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
            <label >Product</label>
            <input id="products" class="easyui-combobox  input-sm" style="width:100%;"
                   url="<?php echo site_url('products/getProductsByCategoryComboBox/0'); ?>"
                   method="get"
                   valueField="id"
                   textField="text"
                   editable="false"
                   prompt="Select Product"
                />
        </div>

        <div class="form-group">
            <label>Measurement</label>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="easyui-numberbox" prompt="0" precision="2" style="width:100%;text-align:right;"/>
                    <!--<input id="thickness" class="easyui-combobox  input-sm" style="width:100%;"
                           url="<?php /*echo site_url('products/getProductThicknessComboBox/0'); */?>"
                           method="get"
                           valueField="id"
                           textField="text"
                           editable="false"
                           prompt="T"
                        />-->
                </div>
                <div class="col-md-4">
                    <input type="text" class="easyui-numberbox" prompt="0" precision="4" style="width:100%;text-align:right;"/>
                    <!--<input id="width" class="easyui-combobox  input-sm" style="width:100%;"
                           url="<?php /*echo site_url('products/getProductWidthComboBox/0'); */?>"
                           method="get"
                           valueField="id"
                           textField="text"
                           editable="false"
                           prompt="W"
                        />-->
                </div>
                <div class="col-md-4">
                    <input type="text" class="easyui-numberbox" prompt="0" precision="3" style="width:100%;text-align:right;"/>
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

        <div class="form-group">
            <label>Price</label>
            <input type="text" class="easyui-numberbox" value="1756" precision="2" groupSeparator="," style="width:100%;text-align:right;"/>
        </div>
    </div>
</div>

<script>
    $(function(){
        //$("#product_category").combobox('onChange')
    });

    function changeCategory(newValue, oldValue){
        $("#products").combobox('reload', site_url + 'products/getProductsByCategoryComboBox/' + newValue).combobox('setValue', '');
    }
</script>