<form id="fm-employees" method="post" novalidate>
    <form id="pr-fm" method="post" novalidate>

        <input type="hidden" name="pr_id" id="pr_id" value="" />
        <div id="cc" class="easyui-layout" fit="true" style="height:450px">
            <div data-options="region:'south',title:'Delivery Details',split:true,hideCollapsedContent:false" style="height:320px;">
                <table id="drd-grid" title="" class="easyui-datagrid" fit="true"></table>
            </div>

            <div data-options="region:'center',title:'Deliveries'" style="padding:5px;">

                <div class="fitem">
                    <label>Suppliers:</label>
                    <input id="quarter" name="pr_quarter" class="easyui-textbox" value="<?php echo isset($pr->pr_quarter) ? $pr->pr_quarter : ''; ?>" style="width:200px"/>

                </div>

                <div class="fitem">
                    <label>Delivery Date:</label>
                    <input name="pr_section" class="easyui-textbox" align="right" value="<?php echo isset($pr->pr_section) ? $pr->pr_section : ''; ?>">
                </div>

                <input type="hidden" id="pr_item_json" name="pr_item_json" value="" />
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