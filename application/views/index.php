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
        <div region="west" split="false" width="20%" style="padding:0 5px;"><?php echo $this->session->userdata('ui_firstname') . " " . $this->session->userdata('ui_lastname'); ?></div>
        <div region="center" split="false" style="padding:0 5px;"></div>
        <div region="east" split="false" width="20%" style="padding:0 5px;"><span id="system-clock" style="float:right;"></span></div>
    </div>
</div>


<div data-options="region:'center',title:'Bakal Para Sa Pagbabago'">

    <div class="easyui-layout" fit="true" style="height:250px;">
        <div region="north" style="height:32px;">

            <div id="mm" style="padding:2px 5px;">
                <a href="/" class="easyui-linkbutton" data-options="plain:true">Home</a>
                <a href="" class="easyui-menubutton" data-options="plain:true,menu:'#setup'">Setup</a>
            </div>
            <div id="setup" style="width:250px;">
                <div onclick="routes.customers()" >Customers</div>
                <div onclick="routes.employees()" >Employees</div>
                <div onclick="routes.suppliers()" >Suppliers</div>
                <div class="menu-sep"></div>
                <div onclick="routes.coils()" >Coils</div>
                <div onclick="routes.colors()" >Colors</div>
                <div onclick="routes.underconstruction()" >Sheets</div>

            </div>
        </div>

        <div region="center">
            <div id="main-content" class="easyui-panel" title="" fit="true" border="false" style="" ></div>
        </div>


    </div>


</div>


<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/jquery.maskedinput.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.easyui.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.edatagrid.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/easyloader.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/accounting.min.js') ?>"></script>

<!-- App JS files -->

<script type="text/javascript" src="<?php echo site_url('app/clock.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('app/login.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('app/router.js') ?>"></script>

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