<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItemsTaxRule $orderItemsTaxRule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Order Items Tax Rules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tax Rules'), ['controller' => 'TaxRules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax Rule'), ['controller' => 'TaxRules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderItemsTaxRules form large-9 medium-8 columns content">
    <?= $this->Form->create($orderItemsTaxRule) ?>
    <fieldset>
        <legend><?= __('Add Order Items Tax Rule') ?></legend>
        <?php
            echo $this->Form->control('order_item_id', ['options' => $orderItems]);
            echo $this->Form->control('tax_rule_id', ['options' => $taxRules, 'multiple' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
