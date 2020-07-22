<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentStatus $paymentStatus
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Payment Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="paymentStatuses form col-md-6 col-md-push-1 columns content">
   <div class="widget-box widget-color-blue">
    <div class="widget-header">
        <h5 class="widget-title"><?= __('Add Payment Status') ?></h5>
    </div>
    <div class="widget-body">
        <div class="widget-main no-padding">
            <?= $this->Form->create($paymentStatus) ?>
            <fieldset>
                <?php
                echo $this->Form->control('name',['class'=>'form-control']);
                ?>
            </fieldset>
            <div class="widget-toolbox padding-10 clearfix">
                <a href="<?= $this->request->webroot ?>payment-statuses" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <?= $this->Form->button(__('Add Payment Status'), ['class' => 'btn btn-info pull-right']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>
