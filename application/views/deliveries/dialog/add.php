<form id="fm-deliveries" method="post" novalidate>
    <form id="pr-fm" method="post" novalidate>
        <input type="hidden" name="dr_id" id="dr_id" value="<?php echo isset($delivery->dr_id) ? $delivery->dr_id : ''; ?>" />
        <div id="cc" class="easyui-layout" fit="true" style="height:450px">
            <div data-options="region:'south',title:'Delivery Details',split:true" style="height:320px;">
                <!--<table id="drd-grid" title="" class="easyui-datagrid" fit="true"></table>-->
                <?php $dr_id =  isset($delivery->dr_id) ? $delivery->dr_id : 0; ?>
                <div id="drd-content" class="easyui-panel" title="" fit="true" border="false" style="" href="<?php echo site_url('coils?dr_id=' . $dr_id); ?>"></div>
            </div>

            <div data-options="region:'center',title:'Deliveries'" style="padding:5px;">

                <div class="fitem">
                    <label>Suppliers:</label>
                    <input id="dr_supp_id" name="dr_supp_id" class="easyui-textbox" value="<?php echo isset($delivery->dr_supp_id) ? $delivery->dr_supp_id : ''; ?>" style="width:200px"/>

                </div>

                <div class="fitem">
                    <label>Delivery Date:</label>
                    <input name="dr_delivery_date" class="easyui-textbox" align="right" value="<?php echo isset($delivery->dr_delivery_date) ? $delivery->dr_delivery_date : ''; ?>">
                </div>

                <!--<input type="hidden" id="pr_item_json" name="pr_item_json" value="" />-->
            </div>
        </div>

    </form>

</form>
<style>
    #fm-employees .fitem label { width: 122px; }
</style>

<script>
    delivery_details.init();
</script>