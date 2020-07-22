<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaxGroup[]|\Cake\Collection\CollectionInterface $taxGroups
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tax Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tax Rules'), ['controller' => 'TaxRules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax Rule'), ['controller' => 'TaxRules', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="taxGroups index col-md-12 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Tax Groups') ?></h5>
            <div class="widget-toolbar">
                <a href="<?= $this->request->webroot ?>taxGroups/add" class="btn btn-info">
                    <i class="ace-icon fa fa-plus"></i>
                    <?= __('Add Tax Group') ?>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table id="simple-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($taxGroups as $taxGroup): ?>
                            <tr>
                                <td><?= $this->Number->format($taxGroup->id) ?></td>
                                <td><?= h($taxGroup->name) ?></td>
                                <td><?= h($taxGroup->created) ?></td>
                                <td><?= h($taxGroup->modified) ?></td>
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="<?= $this->request->webroot ?>taxGroups/view/<?=$taxGroup->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-search-plus"></i>
                                            <?= __('View') ?>
                                        </a>

                                        <!-- <a href="<?= $this->request->webroot ?>taxGroups/edit/<?=$taxGroup->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-pencil-square-o"></i>
                                            <?= __('Edit') ?>
                                        </a> -->

                                    </div>

                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                            <?= $this->Html->link(__('View'), ['action' => 'view', $taxGroup->id]) ?>
                                                        </span>
                                                    </a>
                                                </li>
                                               <!--  <li>
                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taxGroup->id]) ?>
                                                        </span>
                                                    </a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
</div>
