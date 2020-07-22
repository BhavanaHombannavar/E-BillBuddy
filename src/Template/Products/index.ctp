<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tax Groups'), ['controller' => 'TaxGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax Group'), ['controller' => 'TaxGroups', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="products index col-md-12 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Products') ?></h5>
            <div class="widget-toolbar">
                <a href="<?= $this->request->webroot ?>products/add" class="btn btn-info">
                    <i class="ace-icon fa fa-plus"></i>
                    <?= __('Add Product') ?>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table id="simple-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <?= $this->Paginator->sort('id') ?>
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th><?= $this->Paginator->sort('tax_group_id') ?></th>
                            <th><?= $this->Paginator->sort('name') ?></th>
                            <th><?= $this->Paginator->sort('sku') ?></th>
                            <th><?= $this->Paginator->sort('price') ?></th>
                            <th><?= $this->Paginator->sort('unit') ?></th>
                            <th><?= $this->Paginator->sort('active') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $this->Number->format($product->id) ?></td>
                                <td><?= $product->has('tax_group') ? $this->Html->link($product->tax_group->name, ['controller' => 'TaxGroups', 'action' => 'view', $product->tax_group->id]) : '' ?></td>
                                <td><?= h($product->name) ?></td>
                                <td><?= h($product->sku) ?></td>
                                <td><?= $this->Number->format($product->price) ?></td>
                                <td><?= h($product->unit) ?></td>
                                <td><?= h($product->active ? 'Yes' : 'No') ?></td>
                                <td><?= h($product->created) ?></td>
                                <td><?= h($product->modified) ?></td>
                                <td class="actions">
                                 
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="<?= $this->request->webroot ?>products/view/<?=$product->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-search-plus"></i>
                                            <?= __('View') ?>
                                        </a>
                                        <a href="<?= $this->request->webroot ?>products/edit/<?=$product->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-pencil-square-o"></i>
                                            <?= __('Edit') ?>
                                        </a>
                                    </div>
                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="<?= $this->request->webroot ?>products/view/<?=$product->id?>" class="btn btn-white btn-grey">
                                                        <i class="ace-icon fa fa-search-plus"></i>
                                                        <?= __('View') ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->request->webroot ?>products/edit/<?=$product->id?>" class="btn btn-white btn-grey">
                                                        <i class="ace-icon fa fa-pencil-square-o"></i>
                                                        <?= __('Edit') ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="widget-toolbox padding-10 clearfix">
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
   </div>
</div>
