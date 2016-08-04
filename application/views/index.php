<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Inventory Management System</title>

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/bootstrap.scaffolding.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/themes/bootstrap/easyui.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/themes/icon.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/main.css') ?>">
    <style>body{ visibility: hidden; }</style>
    <script type="text/javascript">
        var site_url = "<?php echo site_url(); ?>";
    </script>

</head>

<body class="easyui-layout">

<div region="south" split="false" style="height:32px;line-height:27px;">
    <div class="easyui-layout" fit="true" split="false">
        <div region="west" split="false" width="20%" style="padding:0 5px;">AsCEX</div>
        <div region="center" split="false" style="padding:0 5px;"></div>
        <div region="east" split="false" width="20%" style="padding:0 5px;">2016-07-10 04:20 PM</div>
    </div>
</div>


<div data-options="region:'center',title:'Coil Management System'">

    <div class="easyui-layout" fit="true" style="height:250px;">
        <div region="north" style="height:32px;">

            <div id="mm" style="padding:2px 5px;">
                <a href="welcome" class="easyui-linkbutton" data-options="plain:true">Home</a>
                <a href="" class="easyui-menubutton" data-options="plain:true,menu:'#mm1'">Transactions</a>
                <a href="#" class="easyui-menubutton" data-options="plain:true,menu:'#mm2'">Inventory</a>
                <a href="#" class="easyui-linkbutton" data-options="plain:true,toggle:true">Users</a>
                <a href="#" class="easyui-linkbutton" data-options="plain:true">Setup</a>
            </div>
            <div id="mm1" style="width:250px;">
                <div onclick="javascript:routes.procurement_plan()" >Procurement Plans</div>
                <div onclick="javascript:routes.purchase_request()" >Purchase Requests</div>
                <div onclick="javascript:alert('easyui')" >Purchase Orders</div>
            </div>
            <div id="mm2" style="width:100px;">
                <div>Help</div>
                <div>Update</div>
                <div>About</div>
            </div>


        </div>


        <div region="center" >
            <div id="main-content" class="easyui-panel" title="" fit="true" border="false" ></div>
        </div>
    </div>


</div>


<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/jquery.maskedinput.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.easyui.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.edatagrid.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/easyloader.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/accounting.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('app/router.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(showBody, 100);

    });

    function showBody(){
        $('body').css('visibility', 'visible');
    }
</script>

</body>

</html>