<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Statuses'), ['controller' => 'OrderStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Status'), ['controller' => 'OrderStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payment Statuses'), ['controller' => 'PaymentStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Status'), ['controller' => 'PaymentStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<!-- <div class="orders index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3> -->
<div class="customers index col-md-12 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Orders') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('order_status_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('payment_status_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('shipped_date') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('delievery_date') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('shipping_cost') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('due_date') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('order_number') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $this->Number->format($order->id) ?></td>
                                <td><?= $order->has('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>
                                <td><?= $order->has('order_status') ? $order->order_status->name : '' ?></td>
                                <td><?= $order->has('payment_status') ? $order->payment_status->name : '' ?></td>
                                <td><?= h($order->shipped_date) ?></td>
                                <td><?= h($order->delievery_date) ?></td>
                                <td><?= $this->Number->format($order->shipping_cost) ?></td>
                                <td><?= $this->Number->format($order->total_amount) ?></td>
                                <td><?= h($order->due_date) ?></td>
                                <td><?= h($order->order_number) ?></td>
                                <td><?= h($order->created) ?></td>
                                <td><?= h($order->modified) ?></td>
                                <td class="actions">
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="<?= $this->request->webroot ?>orders/view/<?=$order->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-search-plus"></i>
                                            <?= __('View') ?>
                                        </a>
                                        <a href="<?= $this->request->webroot ?>orders/view/<?=$order->id?>.pdf" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-file"></i>
                                            <?= __('View PDF') ?>
                                        </a>
                                        <?php if ($order->payment_status->name != 'Paid') { ?>
                                            <a href="<?= $this->request->webroot ?>orders/new-payment/<?=$order->id?>" class="btn btn-grey btn-white">
                                                <i class="ace-icon fa fa-pencil-square-o"></i>
                                                <?= __('Payment') ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="<?= $this->request->webroot ?>orders/view/<?=$order->id?>" class="btn btn-white btn-grey">
                                                        <i class="ace-icon fa fa-search-plus"></i>
                                                        <?= __('View') ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->request->webroot ?>orders/view/<?=$order->id?>.pdf" class="btn btn-white btn-grey">
                                                        <i class="ace-icon fa fa-file"></i>
                                                        <?= __('View PDF') ?>
                                                    </a>
                                                </li>
                                                <?php if ($order->payment_status->name != 'Paid') { ?>
                                                <li>
                                                    <a href="<?= $this->request->webroot ?>orders/new-payment/<?=$order->id?>" class="btn btn-grey btn-white">
                                                        <i class="ace-icon fa fa-pencil-square-o"></i>
                                                        <?= __('Payment') ?>
                                                    </a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="widget-toolbox padding-10 clearfix">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
