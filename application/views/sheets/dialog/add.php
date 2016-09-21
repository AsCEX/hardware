<form id="fm-sheets" method="post" novalidate>

    <input type="hidden" name="sht_id" value="<?php echo isset($sheet->sht_id) ? $sheet->sht_id : ""; ?>" />

    <div id="cc" class="easyui-layout" fit="true" style="height:450px;">
        <div data-options="region:'center',title:'Sheet'" style="padding:5px;">

            <input type="hidden" name="sht_po_id" class="easyui-textbox" required="true" align="right" value="<?php echo isset($sheet->sht_po_id) ? $sheet->sht_po_id : $po_id; ?>">


            <div class="fitem">
                <label>Code:</label>
                <input name="sht_code" class="easyui-textbox" required="true" align="right" value="<?php echo isset($sheet->sht_code) ? $sheet->sht_code : ""; ?>">
            </div>

            <hr />


            <div class="fitem">
                <label>Coil:</label>
                <select class="easyui-combobox" editable="false" name="sht_coil_id" style="width:160px"
                        url="<?php echo site_url('coils/getCoilsComboBox'); ?>/<?php echo isset($sheet->sht_coil_id) ? $sheet->sht_coil_id : ''; ?>"
                        method="get"
                        valueField="name"
                        prompt="Select Coil"
                        textField="value"
                        required="true"
                        data-options="
                        formatter: function(row){
                            return row.value + '<i class=\'fa fa-square\' style=\'float:right;color:' + row.color + '\'></i>';
                        }"
                    >
                </select>
            </div>

            <div class="fitem">
                <label>Length:</label>
                <input name="sht_length" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($sheet->sht_length) ? $sheet->sht_length : ""; ?>">
            </div>
            <div class="fitem">
                <label>Height:</label>
                <input name="sht_height" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($sheet->sht_height) ? $sheet->sht_height : ""; ?>">
            </div>
            <div class="fitem">
                <label>Width:</label>
                <input name="sht_width" class="easyui-numberbox" required="true" align="right" value="<?php echo isset($sheet->sht_width) ? $sheet->sht_width : ""; ?>">
            </div>

            <hr />

            <div class="fitem">
                <label>Qty:</label>
                <?php $qty =  isset($sheet->sht_qty) ? $sheet->sht_qty: 1; ?>
                <input id="sht_qty" name="sht_qty" class="easyui-numberbox" precision="2" required="true" align="right" min="1" value="<?php echo $qty; ?>">
            </div>

            <div class="fitem">
                <label>Price:</label>
                <?php $price =  isset($sheet->sht_price) ? $sheet->sht_price : 0; ?>
                <input id="sht_price" name="sht_price" class="easyui-numberbox" precision="2" required="true" align="right" value="<?php echo $price; ?>">
            </div>

            <hr />
            <div class="fitem">
                <label>Total Price:</label>
                <input id="tot_price" class="easyui-numberbox" precision="2" required="true" align="right" value="<?php echo ($qty * $price); ?>">
            </div>


        </div>

</form>

<script>

    function totPrice(){
        var qty = $("#sht_qty").numberbox('getValue');
        var price = $("#sht_price").numberbox('getValue');

        $("#tot_price").numberbox('setValue', qty * price);
    }

    $(function(){

        $("#sht_price, #sht_qty").numberbox({
            onChange: function(n, o){
                totPrice();
            }
        });

    });

</script>

<style>
    #fm-sheets .fitem label { width: 100px; }
</style>