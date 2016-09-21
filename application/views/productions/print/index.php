<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print/style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print/print.css') ?>">
	<div id="page-wrap">

		<p id="header">Purchase Order</p>

		<div class="right">
			<p>Date: <?php echo date('F d, Y'); ?></p>
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
			<div style="float:left;width:30%">
				<p id="customer-title"><?php echo $cust_company; ?></p><div style="clear:both;"></div>
				<div id="customer-name"><?php echo $customer->ui_firstname . ' ' . $customer->ui_lastname; ?></div>
			</div>

            <table id="meta" border="1" style="border-collapse: collapse;">
                <tr>
                    <td class="meta-head">PO Number:</td>
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
				<td align="right"><?php echo $sheet->sht_length; ?></td>
				<td align="right"><?php echo $sheet->sht_height; ?></td>
				<td align="right"><?php echo $sheet->sht_width; ?></td>
				<td align="right"><?php echo $sheet->sht_qty; ?></td>
				<td align="right"><?php echo number_format($sheet->sht_price, 2); ?></td>
			</tr>

			<?php endforeach; ?>
		  
			<tr id="subtotal">
				<td colspan="4" class="blank"> </td>
				<td colspan="2" class="total-line">Subtotal</td>
				<td class="total-value" align="right"><div id="subtotal">P <?php echo number_format($price, 2); ?></div></td>
			</tr>

			<tr>
				<td colspan="4" class="blank"> </td>
				<td colspan="2" class="total-line">Total</td>
				<td class="total-value total" align="right"><div id="total">P <?php echo number_format($price, 2); ?></div></td>
			</tr>
		
		</table>
		<!--
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
		-->
	</div>