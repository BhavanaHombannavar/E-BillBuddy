<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->

<div class="col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title">
  <!--   <div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-2 vertical-table" >
  <div class="widget-box widget-color-blue" id="widget-box-2">
    <div class="widget-header">
      <h5 class="widget-title bigger lighter"> -->
        <?= h($address->name) ?></h5>
    </div>
    <div class="widget-body">
      <div class="widget-main no-padding">
        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <tr>
                <th scope="row"><?= __('Customer') ?></th>
                <td><?= $address->has('customer') ? $this->Html->link($address->customer->name, ['controller' => 'Customers', 'action' => 'view', $address->customer->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($address->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Address Line 1') ?></th>
                <td><?= h($address->address_line_1) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Address Line 2') ?></th>
                <td><?= h($address->address_line_2) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('State') ?></th>
                <td><?= $address->has('state') ? $this->Html->link($address->state->name, ['controller' => 'States', 'action' => 'view', $address->state->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('City') ?></th>
                <td><?= h($address->city) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Pincode') ?></th>
                <td><?= h($address->pincode) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Phone') ?></th>
                <td><?= h($address->phone) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($address->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($address->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($address->modified) ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="widget-toolbox padding-8 clearfix">
    <a href="<?= $this->request->webroot ?>addresses" class="btn">
        <i class="ace-icon fa fa-arrow-left"></i>
        <?= __('Back') ?>
    </a>
    <a href="<?= $this->request->webroot ?>addresses/edit/<?=$address->id?>" class="btn btn-info pull-right">
        <i class="ace-icon fa fa-pencil-square-o"></i>
        <?= __('Edit') ?>
    </a>
</div>
</div>
</div>
</div>

