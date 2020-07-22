<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Product $product
*/
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tax Groups'), ['controller' => 'TaxGroups', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tax Group'), ['controller' => 'TaxGroups', 'action' => 'add']) ?> </li>
</ul>
</nav> -->
<div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-2 vertical-table" >
    <div class="widget-box widget-color-blue" id="widget-box-2">
        
        <div class="widget-header">
            <h5 class="widget-title"><?= h($product->name) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($product->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Tax Group') ?></th>
                            <td><?= $product->has('tax_group') ? $this->Html->link($product->tax_group->name, ['controller' => 'TaxGroups', 'action' => 'view', $product->tax_group->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($product->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Sku') ?></th>
                            <td><?= h($product->sku) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Unit') ?></th>
                            <td><?= h($product->unit) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Price') ?></th>
                            <td><?= $this->Number->format($product->price) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($product->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($product->modified) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Active') ?></th>
                            <td><?= $product->active ? __('Yes') : __('No'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="widget-toolbox padding-8 clearfix">
                <a href="<?= $this->request->webroot ?>products" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <a href="<?= $this->request->webroot ?>products/edit/<?=$product->id?>" class="btn btn-info pull-right">
                    <i class="ace-icon fa fa-pencil-square-o"></i>
                    <?= __('Edit') ?>
                </a>
            </div>
        </div>
    </div>
</div>