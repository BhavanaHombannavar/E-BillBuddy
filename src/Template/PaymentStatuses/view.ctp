<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentStatus $paymentStatus
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment Status'), ['action' => 'edit', $paymentStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment Status'), ['action' => 'delete', $paymentStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= h($paymentStatus->name) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                    <!-- <div class="widget-toolbar widget-toolbar-light no-border">
                        <?= $this->Html->link(__('Edit Payment Status'), ['action' => 'edit', $paymentStatus->id]) ?>
                    </div> -->
                    <tr>
                        <th scope="row"><?= __('Payment Status') ?></th>
                        <td><?= $paymentStatus->has('paymentStatus') ? $this->Html->link($paymentStatus->paymentStatus->name, ['controller' => 'PaymentStatuses', 'action' => 'view', $paymentStatus->paymentStatus->id]) : '' ?></td>
                    </tr>

                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($paymentStatus->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($paymentStatus->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($paymentStatus->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($paymentStatus->modified) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="widget-toolbox padding-8 clearfix">
            <a href="<?= $this->request->webroot ?>payment-statuses" class="btn">
                <i class="ace-icon fa fa-arrow-left"></i>
                <?= __('Back') ?>
            </a>
            <a href="<?= $this->request->webroot ?>payment-statuses/edit/<?=$paymentStatus->id?>" class="btn btn-info pull-right">
                <i class="ace-icon fa fa-pencil-square-o"></i>
                <?= __('Edit') ?>
            </a>
        </div>

    </div>
</div>
</div>
<div class="related">
  <div class="col-xs-12 col-md-12 widget-container-col" id="widget-container-col-2 vertical-table">
    <div class="widget-box widget-color-blue" id="widget-box-2">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-table"></i>
                <?= __('Related Orders') ?></h5>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?php if (!empty($paymentStatus->orders)): ?>
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Customer Id') ?></th>
                                    <th scope="col"><?= __('Order Status Id') ?></th>
                                    <th scope="col"><?= __('Payment Status Id') ?></th>
                                    <th scope="col"><?= __('Shipped Date') ?></th>
                                    <th scope="col"><?= __('Delievery Date') ?></th>
                                    <th scope="col"><?= __('Shipping Cost') ?></th>
                                    <th scope="col"><?= __('Discount Percent') ?></th>
                                    <th scope="col"><?= __('Discount Amount') ?></th>
                                    <th scope="col"><?= __('Due Date') ?></th>
                                    <th scope="col"><?= __('Order Number') ?></th>
                                    <th scope="col"><?= __('Notes') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($paymentStatus->orders as $orders): ?>
                                    <tr>
                                        <td><?= h($orders->id) ?></td>
                                        <td><?= h($orders->customer_id) ?></td>
                                        <td><?= h($orders->order_status_id) ?></td>
                                        <td><?= h($orders->payment_status_id) ?></td>
                                        <td><?= h($orders->shipped_date) ?></td>
                                        <td><?= h($orders->delievery_date) ?></td>
                                        <td><?= h($orders->shipping_cost) ?></td>
                                        <td><?= h($orders->total_amount) ?></td>
                                        <td><?= h($orders->due_date) ?></td>
                                        <td><?= h($orders->order_number) ?></td>
                                        <td><?= h($orders->notes) ?></td>
                                        <td><?= h($orders->created) ?></td>
                                        <td><?= h($orders->modified) ?></td>
                                        <td class="actions">
                                          <div class="widget-toolbox padding-8 clearfix">
                                            <a href="<?= $this->request->webroot ?>orders" class="btn">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                <?= __('Back') ?>
                                            </a>
                                            <a href="<?= $this->request->webroot ?>orders/edit/<?=$orders->id?>" class="btn btn-info pull-right">
                                                <i class="ace-icon fa fa-pencil-square-o"></i>
                                                <?= __('Edit') ?>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        <?php endif; ?>
    </div>
</div>
</div>








