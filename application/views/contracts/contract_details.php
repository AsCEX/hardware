<script type="text/javascript" src="<?php echo site_url('app/contract_details.js') ?>"></script>


<div class="easyui-layout" fit="true" data-options="collapsible:false" >

    <div region="north" title="Contract Details" style="height:200px;" collapsible="false">
        <div class="row" style="padding:10px;margin:0px;">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Sales Contract ID</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_id; ?>" disabled="disable">
                </div>
                <div class="form-group">
                    <label >Status</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_status; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >Company</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->cust_company; ?>">
                </div>
                <div class="form-group">
                    <label >Date</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_date; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >Project</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_project; ?>">
                </div>
                <div class="form-group">
                    <label >Location</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_location; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >Sales Rep</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_sales_rep; ?>">
                </div>
                <div class="form-group">
                    <label >Reference</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_reference; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Color</label>
                    <input type="text" class="form-control input-sm" value="">
                </div>
                <div class="form-group">
                    <label >Delivery Instructions</label>
                    <input type="text" class="form-control input-sm" value="<?php echo $contract_details->c_delivery_instruction; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Terms of Payment</label>
                    <textarea class="form-control input-sm" rows="5"><?php echo $contract_details->c_terms_of_payment; ?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div region="east" title="Contract Charges" style="width:300px;" collapsible="false">
        <table id="dg-contract-charges" class="easyui-datagrid" fit="true"></table>
    </div>

    <div region="center" title="Materials">
        <table id="dg-contract-details" class="easyui-datagrid" fit="true"></table>
    </div>

</div>


<div id="breakdown-menu" class="easyui-menu">
    <div class="menu-links" onclick="" >View Break Down</div>
</div>

<div id="material-form-dialog" style="height: 450px;width: 350px;"></div>
<div id="charges-form-dialog" style="height: 250px;width: 350px;"></div>

<script>
    contract_details.init(<?php echo $contract_id; ?>);
</script>