<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="addresses form large-9 medium-8 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Add Address') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
             <?= $this->Form->create($address) ?>
             <fieldset>
                <?php
                echo $this->Form->control('customer_id', ['options' => $customers],['class'=>'form-control']);
                echo $this->Form->control('name',['class'=>'form-control']);
                echo $this->Form->control('address_line_1',['class'=>'form-control']);
                echo $this->Form->control('address_line_2',['class'=>'form-control']);
                echo $this->Form->control('state_id',['options' => $states],['class'=>'form-control']);
                echo $this->Form->control('city',['class'=>'form-control']);
                echo $this->Form->control('pincode',['class'=>'form-control']);
                echo $this->Form->control('phone',['class'=>'form-control']);
                ?>
            </fieldset>
            <div class="widget-toolbox padding-10 clearfix">
                <a href="<?= $this->request->webroot ?>addresses" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <?= $this->Form->button(__('Add Address'), ['class' => 'btn btn-info pull-right']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>
