<form id="fm-po" method="post" novalidate>
        <input type="hidden" name="po_id" id="po_id" value="<?php echo isset($po->po_id) ? $po->po_id : ''; ?>" />
        <div id="cc" class="easyui-layout" fit="true" style="height:620px">
            <div data-options="region:'north',title:'Purchase Orders'" style="padding:5px;height:120px;">

                <div class="fitem">
                    <label>Customer:</label>
                    <select id="po_cust_id" class="easyui-combobox" style="width:180px;" name="po_cust_id" editable="false" >
                        <option value="" disabled selected>Select Customer</option>
                        <?php if($customers) { ?>
                            <?php foreach ($customers as $customer) {
                                $selected = ($customer->cust_id === $po->po_cust_id)? "selected": "";
                                ?>
                                <option value="<?php echo $customer->cust_id; ?>" <?php echo $selected;?> ><?php echo $customer->cust_company; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>

                </div>

                <div class="fitem">
                    <label>PO Date:</label>
                    <input id="po_date" editable="false" type="text" name="po_date" class="easyui-datebox" required="required" value="<?php echo isset($po->po_date) ? $po->po_date : ''; ?>">
                </div>

                <input type="hidden" id="po_sheet_ids" name="po_sheet_ids" value="" />
            </div>

            <div data-options="region:'center',split:true">
                <?php $po_id =  isset($po->po_id) ? $po->po_id : 0; ?>
                <div id="drd-content" class="easyui-panel" title="" fit="true" border="false" style="" href="<?php echo site_url('sheets?po_id=' . $po_id); ?>"></div>
            </div>


            <div data-options="region:'south',split:true" style="height:100px;padding:5px;">
                <div class="fitem">
                    <label>Status:</label>
                    <select id="po_fulfillment" class="easyui-combobox" style="width:180px;" name="po_fulfillment" editable="false">
                        <?php
                        $ifs = array(
                            '0' => 'Pending',
                            '2' => 'Processing',
                            '1' => 'Completed',
                        );
                        ?>
                        <?php foreach ($ifs as $key=>$if) {
                            $selected = ($key == $po->po_fulfillment)? "selected": "";
                            ?>
                            <option value="<?php echo $key; ?>" <?php echo $selected;?> ><?php echo $if; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>


        </div>

    </form>

    <script>
        $(function(){
            $("#po_fulfillment").combobox({
                onChange: function(n, o){
                    //if(n == 1)
                       // po.complete(<?php echo $po_id; ?>);
                }
            });
        });
    </script>
<style>
    #fm-po .fitem label { width: 122px; }
</style>
