<?php
use Cake\I18n\Date;
use Cake\I18n\Number;

function INR($value = null)
{
	return $value !== null ? implode(explode('₹', (Number::currency($value, 'INR' ))), '₹ ') : $value;
}
?>

<table width="100%">
	<tr>
		<td width="65%">
			<h3>Customer Invoice</h3>
		</td>
		<td width="35%">
			<p>Invoice: #<?=$order->order_number?></p> 
			<p>Date: <?=(new Date($order->order_date))->format('d-M-Y')?></p> 
			<p>Due Date: <?=(new Date($order->due_date))->format('d-M-Y')?></p> 
		</td>
	</tr>
</table>

<table width="100%">
	<tr>
		<th width="50%">Company Info</th>
		<th width="50%">Customer Info</th>
	</tr>
	<tr>
		<td><?= $user->name ?></td>
		<td><?= $order->customer->name ?></td>
	</tr>
	<tr>
		<td><?= $user->gstin ?></td>
		<td><?= $order->customer->gstin ?></td>
	</tr>
	<tr>
		<td><?= $user->address_line_1 ?></td>
		<td><?= $order->customer->addresses[0]['address_line_1'] ?></td>
	</tr>
	<tr>
		<td><?= $user->address_line_2 ?></td>
		<td><?= $order->customer->addresses[0]['address_line_2'] ?></td>
	</tr>
	<tr>
		<td><?= $user->city ?>, <?= $state->name ?>, <?= $user->pincode ?></td>
		<td>
			<?= $order->customer->addresses[0]['city'] ?>, 
			<?= $order->customer->addresses[0]->state->name ?>, 
			<?= $order->customer->addresses[0]['pincode'] ?>
		</td>
	</tr>
	<tr>
		<td><?= $user->email ?></td>
		<td><?= $order->customer->email ?></td>
	</tr>
	<tr>
		<td> Phone: <?= $user->phone ?></td>
		<td> Phone: <?= $order->customer->addresses[0]['phone'] ?></td>
	</tr>
</table>

<table border="1" width="100%">
	<thead>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Discount</th>
			<th>Sub-Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$totalAmt = 0;
		$totalTax = 0;
		$taxes = [];

		foreach ($order->order_items as $item) {
			$qty = $item->quantity;
			$price = $item->price;
			$discount = $item->discount;
			$percentTax = 0;
			$subtotal = 0;
			$discountAmt = 0;
			$taxCount = 0;

			$subtotal = $qty * $price;

			$discountAmt = $subtotal * $discount / 100;

			$subtotal -= $discountAmt;

			foreach ($item->tax_rules as $taxRule) {
				$taxAmt = $subtotal * $taxRule->percentage / 100;
				$totalTax += $taxAmt;

				if (isset($taxes[$taxRule->name])) {
					$taxes[$taxRule->name] += $taxAmt;
				} else {
					$taxes[$taxRule->name] = $taxAmt;
				}
			}

			$subtotal += $totalTax;

			$totalAmt += $subtotal;
			?>

			<tr>
				<td><?= $item->product->name ?></td>
				<td><?= $item->quantity ?></td>
				<td><?= INR($item->price) ?></td>
				<td><?= $item->discount ?>%</td>
				<td><?= INR($subtotal) ?></td>
			</tr>
			
			<?php
			}

			$paid = 0;
			foreach ($order->payments as $payment) {
				$paid += $payment->amount;
			}
			$balance = $order->total_amount - $paid;
			?>
		<tr>
			<td colspan="4" align="right">Total</td>
			<td align="right"><?= INR($totalAmt) ?></td>
		</tr>
		<tr>
			<td colspan="4" align="right">Shipping</td>
			<td align="right"><?= INR($order->shipping_cost) ?></td>
		</tr>
		<tr>
			<td colspan="4" align="right">Net Amount</td>
			<td align="right"><?= INR($order->total_amount) ?></td>
		</tr>
		<tr>
			<td colspan="4" align="right">Amount Paid</td>
			<td align="right"><?= INR($paid) ?></td>
		</tr>
		<tr>
			<td colspan="4" align="right">Balance</td>
			<td align="right"><?= INR($balance) ?></td>
		</tr>
	</tbody>
</table>
<table border="1">
	<tr>
		<th>Tax Name</th>
		<th>Tax Amount</th>
	</tr>
		<?php 
			foreach ($taxes as $name => $val) {
		?>
	<tr>
		<td><?= $name ?></td>
		<td><?= INR($val) ?></td>
	</tr>
		<?php
			}
		?>
	<tr>
		<td>Total</td>
		<td><?= INR($totalTax) ?></td>
	</tr>
</table>
<div class="well">
	Thank you for choosing Our Company products.
	We believe you will be satisfied by our services.
</div>