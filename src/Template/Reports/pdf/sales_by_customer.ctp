
<style type="text/css">
th {
	text-align: center;
}
th, td {
	padding: 2px 20px;
}
table {
	margin:20px;
	border-collapse: collapse;
}
	
</style>
<?php
use Cake\I18n\Date;
// pr($frmdate); die();
?>
<h3 align="center">Sales By Customers</h3>
<h3 align="center"> From <?= (new Date($frmdate))->format('m-d-Y') ?> - To <?= (new Date($todate))->format('m-d-Y') ?></h3>
<table width="100%" border="1">
	<thead>
		<tr>
			<th>Customers</th>
			<th>Order Count</th>
			<th>Total Amount</th>
			<th>Total Paid</th>
			<th>Balance</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($rows as $id => $orders) {
				$totsales = 0;
				$totpaid = 0;
				$cnt = 0;
				foreach ($orders as $order) {
					$totsales += $order['total_sales'];
					$totpaid += $order['total_paid'];
					$cnt++;
				}
			?>
			<tr>			
				<td><?= $order['name']; ?></td>
				<td><?= $cnt; ?></td>
				<td><?= $totsales; ?></td>
				<td><?= $totpaid; ?></td>
				<td><?= $totsales - $totpaid; ?></td>
			</tr>
			<?php } ?>
	</tbody>
</table>