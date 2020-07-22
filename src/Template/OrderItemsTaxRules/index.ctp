<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItemsTaxRule[]|\Cake\Collection\CollectionInterface $orderItemsTaxRules
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Items Tax Rule'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tax Rules'), ['controller' => 'TaxRules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax Rule'), ['controller' => 'TaxRules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderItemsTaxRules index large-9 medium-8 columns content">
    <h3><?= __('Order Items Tax Rules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_rule_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderItemsTaxRules as $orderItemsTaxRule): ?>
            <tr>
                <td><?= $this->Number->format($orderItemsTaxRule->id) ?></td>
                <td><?= $orderItemsTaxRule->has('order_item') ? $this->Html->link($orderItemsTaxRule->order_item->id, ['controller' => 'OrderItems', 'action' => 'view', $orderItemsTaxRule->order_item->id]) : '' ?></td>
                <td><?= $orderItemsTaxRule->has('tax_rule') ? $this->Html->link($orderItemsTaxRule->tax_rule->name, ['controller' => 'TaxRules', 'action' => 'view', $orderItemsTaxRule->tax_rule->id]) : '' ?></td>
                <td><?= h($orderItemsTaxRule->created) ?></td>
                <td><?= h($orderItemsTaxRule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderItemsTaxRule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderItemsTaxRule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderItemsTaxRule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItemsTaxRule->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
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
