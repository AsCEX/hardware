<script type="text/javascript" src="<?php echo site_url('app/contracts.js') ?>"></script>

<table id="dg-contracts" title="Sales Quotation/Contracts" class="easyui-datagrid" fit="true"></table>
<div id="dlg-order-details" style="width:750px;height:675px;"></div>

<div id="contracts-menu" class="easyui-menu">
    <div class="menu-links" onclick="contracts.order_details()" >Order Details</div>
    <div class="menu-links" data-url="" >Create Job Order</div>
    <div class="menu-links" data-url="" >Ammendments Orders</div>
    <div class="menu-sep"></div>
    <div class="menu-links" data-url="contracts.order_details()" data-options="iconCls:'fa fa-plus'" >Add New Contract</div>
</div>

<script>
    contracts.init();
</script>