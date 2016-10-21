<script type="text/javascript" src="<?php echo site_url('app/job_order_details.js') ?>"></script>


<div class="easyui-layout" fit="true" data-options="collapsible:false" >

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
    job_order_details.init(<?php echo $contract_id; ?>);
</script>