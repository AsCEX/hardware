<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>San Josue Realty and Development Corp.</title>

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/bootstrap.scaffolding.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/bootstrap.forms.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/themes/bootstrap/easyui.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/themes/color.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/themes/icon.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/main.css') ?>">

    <script type="text/javascript">
        var site_url = "<?php echo site_url(); ?>";
    </script>

</head>

<body class="easyui-layout">

<div region="south" split="false" style="height:32px;line-height:27px;">
    <div class="easyui-layout" fit="true" split="false">
        <div region="west" split="false" width="20%" style="padding:0 5px;"><?php echo $this->session->userdata('ui_firstname') . " " . $this->session->userdata('ui_lastname'); ?></div>
        <div region="center" split="false" style="padding:0 5px;"></div>
        <div region="east" split="false" width="20%" style="padding:0 5px;"><span id="system-clock" style="float:right;"></span></div>
    </div>
</div>


<div data-options="region:'center',title:'San Josue Realty and Development Corp.'" id="wrapper">

    <div class="easyui-layout" fit="true" style="height:250px;">
        <div region="north" style="height:32px;">

            <div id="mm" style="padding:2px 5px;">
                <a href="/" class="easyui-linkbutton" data-options="plain:true">Home</a>
                <a href="" class="easyui-menubutton" data-options="plain:true,menu:'#transactions'">Transactions</a>
                <a href="" class="easyui-menubutton" data-options="plain:true,menu:'#inventory'">Inventory</a>
                <a href="" class="easyui-menubutton" data-options="plain:true,menu:'#setup'">Setup</a>
                <a href="<?php echo site_url('auth/logout'); ?>" class="easyui-linkbutton" data-options="plain:true">Logout</a>
            </div>
            <div id="setup" style="width:250px;">
                <div class="menu-links" data-url="<?php echo site_url('customers'); ?>" >Customers</div>
                <div class="menu-links" data-url="<?php echo site_url('employees'); ?>" >Employees</div>
                <div class="menu-links" data-url="<?php echo site_url('suppliers'); ?>" >Suppliers</div>
                <div class="menu-sep"></div>
                <div class="menu-links" data-url="<?php echo site_url('colors'); ?>" >Colors</div>

            </div>
            <div id="transactions" style="width:250px;">
                <div class="menu-links" data-url="<?php echo site_url('contracts'); ?>" data-options="iconCls:'fa fa-calendar-check-o'" >Sales Contract</div>
                <div class="menu-links" data-url="<?php echo site_url('job_orders'); ?>" data-options="iconCls:'fa fa-list-alt'" >Job Orders</div>
                <div class="menu-links" data-url="<?php echo site_url('job_orders'); ?>" data-options="iconCls:'fa fa-check-square-o'" >Ammendments</div>
                <div class="menu-links" data-url=""  data-options="iconCls:'fa fa-truck'">Deliveries</div>
            </div>
            <div id="inventory" style="width:250px;">
                <div class="menu-links" data-url="<?php echo site_url('materials'); ?>" data-options="iconCls:'fa fa-home'" >Materials</div>
                <div class="menu-sep"></div>
                <div class="menu-links" data-url="" data-options="iconCls:'fa fa-home'" >Roofing &amp; Bended Panels</div>
                <div class="menu-links" data-url="" data-options="iconCls:'fa fa-cogs '" >Hardware Accessories</div>
            </div>
        </div>

        <div region="center">
            <div id="main-content" class="easyui-panel" title="" fit="true" border="false" style="position:relative;overflow:hidden;" ></div>
        </div>


    </div>


</div>


<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/jquery.maskedinput.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.easyui.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.edatagrid.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/datagrid-groupview.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/datagrid-detailview.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/easyloader.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/accounting.min.js') ?>"></script>

<!-- App JS files -->

<script type="text/javascript" src="<?php echo site_url('app/clock.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('app/login.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('app/router.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('app/functions.js') ?>"></script>


<script type="text/javascript" src="<?php echo site_url('app/print.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('app/suppliers.js') ?>"></script>


<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(showBody, 100);
        clock();
    });

    function showBody(){
        $('body').css('visibility', 'visible');
    }
</script>

</body>

</html>