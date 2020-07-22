<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State[]|\Cake\Collection\CollectionInterface $states
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="states index col-md-12 columns content">
 <div class="widget-box widget-color-blue">
    <div class="widget-header">
        <h5 class="widget-title"><?= __('States') ?></h5>
        <div class="widget-toolbar">
            <a href="<?= $this->request->webroot ?>states/add" class="btn btn-info">
                <i class="ace-icon fa fa-plus"></i>
                <?= __('Add State') ?>
            </a>
        </div>
    </div>
    <div class="widget-body">
        <div class="widget-main no-padding">
            <table id="simple-table" class="table table-bordered table-hover">
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
                    <?php foreach ($states as $state): ?>
                        <tr>

                            <td><?= $this->Number->format($state->id) ?></td>
                            <td><?= h($state->name) ?></td>
                            <td><?= h($state->created) ?></td>
                            <td><?= h($state->modified) ?></td>
                            <td class="actions">

                               <div class="hidden-sm hidden-xs btn-group">
                                <a href="<?= $this->request->webroot ?>states/view/<?=$state->id?>" class="btn btn-grey btn-white">
                                    <i class="ace-icon fa fa-search-plus"></i>
                                    <?= __('View') ?>
                                </a>
                                <a href="<?= $this->request->webroot ?>states/edit/<?=$state->id?>" class="btn btn-grey btn-white">
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
                                            <a href="<?= $this->request->webroot ?>states/view/<?=$state->id?>" class="btn btn-white btn-grey">
                                                <i class="ace-icon fa fa-search-plus"></i>
                                                <?= __('View') ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $this->request->webroot ?>states/edit/<?=$state->id?>" class="btn btn-white btn-grey">
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
