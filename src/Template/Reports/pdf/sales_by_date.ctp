<?php 
// pr($orders); die();
use Cake\I18n\Date;
?>
<style type="text/css">
th {
	text-align: center;
}
th, td {
	padding: 2px 20px;
	text-align: center;
}
table {
	margin:20px;
	border-collapse: collapse;
}
	
</style>
<h3 align="center">Sales By Date</h3>
<h3 align="center"> From <?= (new Date($frmdate))->format('m-d-Y') ?> - To <?= (new Date($todate))->format('m-d-Y') ?></h3>
<table border="1" align="center">
	<tr>
		<th>Order Number</th>
		<th>Order Date</th>
		<th>Sales</th>
	</tr>
	<?php 
		$totSalesAmt = 0;
		foreach ($orders as $order) {
			$totSalesAmt += $order->total_amount;
		?>
	<tr>
		<td><?= $order->order_number ?></td>
		<td><?= (new Date($order->order_date))->format('m-d-Y'); ?></td>
		<td><?= $order->total_amount ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td>Total Sales:</td>
		<td colspan="2"><?= $totSalesAmt ?></td>
	</tr>
</table>