<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerType $customerType
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer Type'), ['action' => 'edit', $customerType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer Type'), ['action' => 'delete', $customerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->


<div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-2 vertical-table" >
    <div class="widget-box widget-color-blue" id="widget-box-2">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-table"></i>
                <?= h($customerType->name) ?>
            </h5>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($customerType->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($customerType->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($customerType->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($customerType->modified) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tableTools-container pull-right">
        <a href="<?= $this->request->webroot ?>customer-types" class="btn">
            <i class="ace-icon fa fa-arrow-left"></i>
            <?= __('Back') ?>
        </a>
        <a href="<?= $this->request->webroot ?>customer-types/edit/<?=$customerType->id?>" class="btn btn-info">
            <i class="ace-icon fa fa-pencil-square-o"></i>
            <?= __('Edit') ?>
        </a>
    </div>
</div>

<div class="related">
    <div class="col-xs-12 col-md-12 widget-container-col" id="widget-container-col-2 vertical-table" >
        <div class="widget-box widget-color-blue" id="widget-box-2">
            <div class="widget-header">
                <h5 class="widget-title bigger lighter">
                    <i class="ace-icon fa fa-table"></i>
                    <?= __('Related Customers') ?>
                </h5>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?php if (!empty($customerType->customers)): ?>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Customer Type Id') ?></th>
                                    <th scope="col"><?= __('Name') ?></th>
                                    <th scope="col"><?= __('Email') ?></th>
                                    <th scope="col"><?= __('Gstin') ?></th>
                                    <th scope="col"><?= __('Active') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($customerType->customers as $customers): ?>
                                    <tr>
                                        <td><?= h($customers->id) ?></td>
                                        <td><?= h($customers->customer_type_id) ?></td>
                                        <td><?= h($customers->name) ?></td>
                                        <td><?= h($customers->email) ?></td>
                                        <td><?= h($customers->gstin) ?></td>
                                        <td><?= h($customers->active) ?></td>
                                        <td><?= h($customers->created) ?></td>
                                        <td><?= h($customers->modified) ?></td>
                                        <td class="actions">
                                            <div class="widget-toolbox padding-8 clearfix">
                                                <a href="<?= $this->request->webroot ?>customer-types" class="btn">
                                                    <i class="ace-icon fa fa-arrow-left"></i>
                                                    <?= __('Back') ?>
                                                </a>
                                                <a href="<?= $this->request->webroot ?>customer-types/edit/<?=$customerType->id?>" class="btn btn-info pull-right">
                                                    <i class="ace-icon fa fa-pencil-square-o"></i>
                                                    <?= __('Edit') ?>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
