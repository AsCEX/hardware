<style>
    table.striped, th, td {
        border: none;
    }
    table.striped {
        display: table;
        border-collapse: collapse;
        border-spacing: 0;
        font-size: 14px;
    }
    table.striped > tbody > tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    table.striped > tbody > tr > td {
        border-radius: 0;
    }
    table.striped > thead {
        border-bottom: 1px solid #d0d0d0;
    }

    table.striped > thead > tr > th,
    table.striped > tbody > tr > td {
        padding: 8px 5px;
        display: table-cell;
        text-align: left;
        vertical-align: middle;
        border-radius: 2px;
    }
</style>
<?php
$totalLength = 0;
$totalHeight = 0;
$totalWidth = 0;
$totalQty = 0;
$totalPrice = 0;
?>
<table class="striped" width="35%">
    <thead style="border-bottom: none;">
         <tr>
             <td><b>Delivery Date</b></td>
             <td><?php echo $delivery->dr_delivery_date;?></td>
         </tr>
         <tr>
             <td><b>Supplier</b></td>
             <td><?php echo $supplier->supp_company;?></td>
         </tr>
         <tr>
             <td><b>Initiator</b></td>
             <td>
                 <?php
                   $fullname = $supplier->ui_firstname ." ". $supplier->ui_middlename ." ". $supplier->ui_lastname;
                   echo ucfirst($fullname);
                 ?>
             </td>
         </tr>
    </thead>
</table>
<table class="striped" width="100%">
    <thead style="border-top: 1px solid #d0d0d0;">
        <tr>
            <th colspan="7" style="text-align: center">Coil Details</th>
            <th colspan="1" style="text-align: center">Creator Info</th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th>Coil Code</th>
            <th>Length</th>
            <th>Height</th>
            <th>Width</th>
            <th>Color</th>
            <th>Qty</th>
            <th>Price</th>
            <th style="border-left: 1px solid #d0d0d0;">Full Name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($coils as $coil) {
                $totalLength += $coil->coil_length;
                $totalHeight += $coil->coil_height;
                $totalWidth += $coil->coil_width;
                $totalQty += $coil->coil_qty;
                $totalPrice += $coil->coil_price;
            ?>
            <tr>
                <td><?php echo isset($coil->coil_code)? $coil->coil_code: ""; ?></td>
                <td><?php echo isset($coil->coil_length)? $coil->coil_length: ""; ?></td>
                <td><?php echo isset($coil->coil_height)? $coil->coil_height: ""; ?></td>
                <td><?php echo isset($coil->coil_width)? $coil->coil_width: ""; ?></td>
                <td>
                    <i class='fa fa-square' style='color: <?php echo $coil->clr_hex; ?>;'></i>
                    <?php echo isset($coil->clr_name)? $coil->clr_name: ""; ?>
                </td>
                <td><?php echo isset($coil->coil_qty)? $coil->coil_qty: ""; ?></td>
                <td><?php echo isset($coil->coil_price)? $coil->coil_price: ""; ?></td>
                <td style="border-left: 1px solid #d0d0d0;">
                    <?php
                        $fullname = $coil->ui_firstname ." ". $coil->ui_middlename ." ". $coil->ui_lastname;
                        echo ucfirst($fullname);
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <thead style="border-top: 1px solid #d0d0d0; border-bottom: none;">
        <tr>
            <td style="padding: 8px 0 0 5px"><b>Total</b></td>
            <td style="padding: 8px 0 0 5px"><?php echo $totalLength;?>.00</td>
            <td style="padding: 8px 0 0 5px"><?php echo $totalHeight;?>.00</td>
            <td style="padding: 8px 0 0 5px"><?php echo $totalWidth;?>.00</td>
            <td></td>
            <td style="padding: 8px 0 0 5px"><?php echo $totalQty;?>.00</td>
            <td style="padding: 8px 0 0 5px"><?php echo $totalPrice;?>.00</td>
        </tr>
    </thead>
</table>