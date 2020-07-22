<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
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
<div class="orders form col-md-6 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Add Order') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?= $this->Form->create($order) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('customer_id', ['options' => $customers, 'class' => 'form-control']);
                    echo $this->Form->control('order_status_id', ['options' => $orderStatuses, 'class' => 'form-control']);
                    echo $this->Form->control('payment_status_id', ['options' => $paymentStatuses, 'class' => 'form-control']);
                    echo $this->Form->control('shipped_date', ['class' => 'form-control']);
                    echo $this->Form->control('delievery_date', ['class' => 'form-control']);
                    echo $this->Form->control('shipping_cost', ['class' => 'form-control']);
                    echo $this->Form->control('total_amount', ['class' => 'form-control']);
                    echo $this->Form->control('due_date', ['class' => 'form-control']);
                    echo $this->Form->control('order_number', ['class' => 'form-control']);
                    echo $this->Form->control('notes', ['class' => 'form-control']);
                    ?>
                </fieldset>
            </div>
            <div class="widget-toolbox padding-10 clearfix">
                <a href="<?= $this->request->webroot ?>order" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <?= $this->Form->button(__('Add Order'), ['class' => 'btn btn-info pull-right']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
