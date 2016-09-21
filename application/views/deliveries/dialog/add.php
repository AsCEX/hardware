<form id="fm-deliveries" method="post" novalidate>
    <form id="pr-fm" method="post" novalidate>
        <input type="hidden" name="dr_id" id="dr_id" value="<?php echo isset($delivery->dr_id) ? $delivery->dr_id : ''; ?>" />
        <div id="cc" class="easyui-layout" fit="true" style="height:450px">
            <div data-options="region:'south',title:'Delivery Details',split:true" style="height:320px;">
                <!--<table id="drd-grid" title="" class="easyui-datagrid" fit="true"></table>-->
                <?php $dr_id =  isset($delivery->dr_id) ? $delivery->dr_id : 0; ?>
                <div id="drd-content-deliveries" class="easyui-panel" title="" fit="true" border="false" style="" href="<?php echo site_url('coils?dr_id=' . $dr_id); ?>"></div>
            </div>

            <div data-options="region:'center',title:'Deliveries'" style="padding:5px;">

                <div class="fitem">
                    <label>Supplier:</label>
                    <select id="dr_supp_id" class="easyui-combobox" style="width:180px;" name="dr_supp_id" editable="false" >
                        <option value="" disabled selected>Select Supplier</option>
                        <?php if($suppliers) { ?>
                            <?php foreach ($suppliers as $supplier) {
                                $selected = ($supplier->supp_id === $delivery->dr_supp_id)? "selected": "";
                                ?>
                                <option value="<?php echo $supplier->supp_id; ?>" <?php echo $selected;?> ><?php echo $supplier->supp_company; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="fitem">
                    <label>Delivery Date:</label>
                    <input id="dr_delivery_date" editable="false" type="text" name="dr_delivery_date" class="easyui-datebox" required="required" value="<?php echo isset($delivery->dr_delivery_date) ? $delivery->dr_delivery_date : ''; ?>">
                </div>

                <input type="hidden" id="dr_coil_ids" name="dr_coil_ids" value="" />
            </div>
        </div>

    </form>

</form>
<style>
    #fm-deliveries .fitem label { width: 122px; }
</style>

<script>
    //delivery_details.init();
</script>