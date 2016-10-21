<script type="text/javascript" src="<?php echo site_url('app/job_orders.js') ?>"></script>

<table id="dg-job-orders" title="Job Orders" class="easyui-datagrid" fit="true"></table>
<div id="dlg-job-order-details" style="width:750px;height:650px;"></div>

<div id="job-orders-menu" class="easyui-menu">
    <div class="menu-links" onclick="job_orders.order_details()" >Order Details</div>
    <div class="menu-links" data-url="" >Create Job Order</div>
    <div class="menu-links" data-url="" >Purchased Orders</div>
    <div class="menu-sep"></div>
    <div class="menu-links" data-url="<?php echo site_url('productions'); ?>" >Production</div>
</div>

<script>
    job_orders.init();
</script>