<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->

<div class="payments col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= h($payment->id) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Order') ?></th>
                            <td><?= $payment->has('order') ? $this->Html->link($payment->order->order_number, ['controller' => 'Orders', 'action' => 'view', $payment->order->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($payment->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Amount') ?></th>
                            <td><?= $this->Number->format($payment->amount) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Payment Date') ?></th>
                            <td><?= h($payment->payment_date) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($payment->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($payment->modified) ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="widget-toolbox padding-8 clearfix">
                    <a href="<?= $this->request->webroot ?>payments" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <a href="<?= $this->request->webroot ?>payments/edit/<?=$payment->id?>" class="btn btn-info pull-right">
                        <i class="ace-icon fa fa-pencil-square-o"></i>
                        <?= __('Edit') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>