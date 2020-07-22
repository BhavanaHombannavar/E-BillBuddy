<h1>Dashboard</h1>
<div class="col-md-12">
	<div class="col-md-6">
		<div class="index col-md-12 columns content">
			<div class="widget-box widget-color-blue">
				<div class="widget-header">
					<h5 class="widget-title">Recent Orders</h5>
				</div>
				<div class="widget-body">
					<div class="widget-main no-padding">
						<table id="simple-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<td scope="col">Order Number</td>
									<th scope="col">Customer</th>
									<th scope="col">Payment Status</th>
									<th scope="col">Order Status</th>
									<th scope="col">Order Date</th>
									<th scope="col">Total Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($orders as $order): ?>
								<tr>
									<td scope="col"><?= h($order->order_number) ?></td>
									<td scope="col"><?= $order->has('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>

									<td scope="col"><?= $order->has('payment_status') ? $order->payment_status->name : '' ?></td>
									<td scope="col"><?= $order->has('order_status') ? $order->order_status->name : '' ?></td>
									<td scope="col"><?= h($order->order_date) ?></td>
									<td scope="col"><?= $this->Number->format($order->total_amount) ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="index col-md-12 columns content">
			<div class="widget-box widget-color-blue">
				<div class="widget-header">
					<h5 class="widget-title">Recent Payments</h5>
				</div>
				<div class="widget-body">
					<div class="widget-main no-padding">
						<table id="simple-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th scope="col">Order Number</th>
									<th scope="col">Total Amount</th>
									<th scope="col">Amount Paid</th>
									<th scope="col">Due Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($payments as $payment): ?>
								<tr>
									<td scope="col"><?= h($payment->order->order_number) ?></td>
									<td scope="col"><?= h($payment->order->total_amount) ?></td>
									<td scope="col"><?= h($payment->amount) ?></td>
									<td scope="col"><?= h($payment->order->due_date) ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>