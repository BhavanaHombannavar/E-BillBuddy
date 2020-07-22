<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customer Types'), ['controller' => 'CustomerTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer Type'), ['controller' => 'CustomerTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="customers form col-md-6 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Edit Customer') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?= $this->Form->create($customer) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('customer_type_id', ['options' => $customerTypes, 'class' => 'form-control']);
                    echo $this->Form->control('name', ['class' => 'form-control']);
                    echo $this->Form->control('email', ['class' => 'form-control']);
                    echo $this->Form->control('gstin', ['class' => 'form-control']);

                    echo $this->Form->control('addresses.0.name', ['class' => 'form-control', 'label' => 'Address Alias']);
                    echo $this->Form->control('addresses.0.address_line_1', ['class' => 'form-control']);
                    echo $this->Form->control('addresses.0.address_line_2', ['class' => 'form-control']);
                    echo $this->Form->control('addresses.0.state_id', ['options' => $states, 'class' => 'form-control']);
                    echo $this->Form->control('addresses.0.city', ['class' => 'form-control']);
                    echo $this->Form->control('addresses.0.pincode', ['class' => 'form-control']);
                    echo $this->Form->control('addresses.0.phone', ['class' => 'form-control']);
                    
                    echo $this->Form->control('active');
                    ?>
                </fieldset>
                <div class="widget-toolbox padding-10 clearfix">
                    <a href="<?= $this->request->webroot ?>customers" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <div class="btn-group pull-right">
                        <?= $this->Form->button(__('Update'), ['class' => 'btn btn-info', 'name' => 'update', 'val'=>'1']) ?>
                        <?= $this->Form->button(__('Update and Stay'), ['class' => 'btn btn-info', 'name' => 'update_stay', 'val'=>'1']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
