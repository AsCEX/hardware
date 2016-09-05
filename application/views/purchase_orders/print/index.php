<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	
	<title>Metal for a Change</title>

	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print/print.css') ?>">
	<!-- 
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	-->

</head>

<body>

	<div id="page-wrap">

		<p id="header">INVOICE</p>

		<div class="right">
			<p>Date: <?php echo date('F d, Y'); ?></p>
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <p id="customer-title"><?php echo $cust_company; ?></p>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><p><?php echo $po->po_id; ?></p></td>
                </tr>
                <tr>

                    <td class="meta-head">PO Date</td>
                    <td><p id="date"><?php echo $po->po_date; ?></p></td>
                </tr>
            </table>
		
		</div>
		
		<table id="items">
		
			<tr>
				<th>Code</th>
				<th>Coil</th>
				<th>Length</th>
				<th>Height</th>
				<th>Width</th>
				<th>Qty</th>
				<th>Price</th>
			</tr>

			<?php $price = ""; ?>

			<?php foreach($sheets as $sheet): $price += $sheet->sht_price; ?>

			<tr class="item-row">
				<td><?php echo $sheet->coil_code; ?></td>
				<td><?php echo $sheet->sht_code; ?></td>
				<td><?php echo $sheet->sht_length; ?></td>
				<td><?php echo $sheet->sht_height; ?></td>
				<td><?php echo $sheet->sht_width; ?></td>
				<td><?php echo $sheet->sht_qty; ?></td>
				<td><?php echo $sheet->sht_price; ?></td>
			</tr>

			<?php endforeach; ?>
		  
			<tr id="subtotal">
				<td colspan="4" class="blank"> </td>
				<td colspan="2" class="total-line">Subtotal</td>
				<td class="total-value"><div id="subtotal">P <?php echo number_format($price, 2); ?></div></td>
			</tr>

			<tr>
				<td colspan="4" class="blank"> </td>
				<td colspan="2" class="total-line">Total</td>
				<td class="total-value total"><div id="total">P <?php echo number_format($price, 2); ?></div></td>
			</tr>
		
		</table>
		<!--
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
		-->
	</div>
	
</body>

</html>