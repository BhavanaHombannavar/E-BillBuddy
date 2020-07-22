<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItemsTaxRule $orderItemsTaxRule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Items Tax Rule'), ['action' => 'edit', $orderItemsTaxRule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Items Tax Rule'), ['action' => 'delete', $orderItemsTaxRule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItemsTaxRule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Items Tax Rules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Items Tax Rule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tax Rules'), ['controller' => 'TaxRules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax Rule'), ['controller' => 'TaxRules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderItemsTaxRules view large-9 medium-8 columns content">
    <h3><?= h($orderItemsTaxRule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order Item') ?></th>
            <td><?= $orderItemsTaxRule->has('order_item') ? $this->Html->link($orderItemsTaxRule->order_item->id, ['controller' => 'OrderItems', 'action' => 'view', $orderItemsTaxRule->order_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Rule') ?></th>
            <td><?= $orderItemsTaxRule->has('tax_rule') ? $this->Html->link($orderItemsTaxRule->tax_rule->name, ['controller' => 'TaxRules', 'action' => 'view', $orderItemsTaxRule->tax_rule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderItemsTaxRule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orderItemsTaxRule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($orderItemsTaxRule->modified) ?></td>
        </tr>
    </table>
</div>
