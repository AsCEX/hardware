<script type="text/javascript" src="<?php echo site_url('app/job_order_details.js') ?>"></script>


<div class="easyui-layout" fit="true" data-options="collapsible:false" >
    <div region="north" title="Contract Details" style="height:120px;" collapsible="false">
        <form id="contract-forms" method="POST">
            <div class="row" style="padding:10px;margin:0px;">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Job Order #:</label>
                        <input type="text" name="c_id" class="easyui-textbox" value="<?php echo $jo_id; ?>" readonly="true" style="width:100%">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Sales Contract #:</label>
                        <input type="text" class="easyui-combobox input-sm"  name="jo_c_id" style="width:100%"
                               url="<?php echo site_url('job_orders/getAvailableContractCombobox/' . $contract_id); ?>"
                               method="get"
                               valueField="id"
                               textField="text"
                               editable="false"
                               value="<?php echo $contract_id; ?>" />
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div region="east" title="Contract Charges" style="width:300px;" collapsible="false">
        <table id="dg-job-order-charges" class="easyui-datagrid" fit="true"></table>
    </div>

    <div region="center" title="Materials">
        <table id="dg-job-order-details" class="easyui-datagrid" fit="true"></table>
    </div>

</div>


<div id="breakdown-menu" class="easyui-menu">
    <div class="menu-links" onclick="" >View Break Down</div>
</div>

<script>
    job_order_details.init(<?php echo $jo_id; ?>, <?php echo $contract_id; ?>);
</script>