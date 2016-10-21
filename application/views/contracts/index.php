<script type="text/javascript" src="<?php echo site_url('app/contracts.js') ?>"></script>

<table id="dg-contracts" title="Sales Quotation/Contracts" class="easyui-datagrid" fit="true"></table>
<div id="dlg-order-details" style="width:750px;height:650px;"></div>

<div id="contracts-menu" class="easyui-menu">
    <div class="menu-links" onclick="contracts.order_details()" >Order Details</div>
    <div class="menu-links" data-url="" >Create Job Order</div>
    <div class="menu-links" data-url="" >Purchased Orders</div>
    <div class="menu-sep"></div>
    <div class="menu-links" data-url="<?php echo site_url('productions'); ?>" >Production</div>
</div>

<script>
    contracts.init();
</script>