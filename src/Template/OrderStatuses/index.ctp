<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderStatus[]|\Cake\Collection\CollectionInterface $orderStatuses
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="orderStatuses index col-md-12 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Order Statuses') ?></h5>
            <div class="widget-toolbar">
                <a href="<?= $this->request->webroot ?>orderStatuses/add" class="btn btn-info">
                    <i class="ace-icon fa fa-plus"></i>
                    <?= __('Add Order Status') ?>
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
                            <th><?= $this->Paginator->sort('name') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderStatuses as $orderStatus): ?>
                            <tr>
                                <td><?= $this->Number->format($orderStatus->id) ?></td>
                                <td><?= h($orderStatus->name) ?></td>
                                <td><?= h($orderStatus->created) ?></td>
                                <td><?= h($orderStatus->modified) ?></td>
                                <td class="actions">
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="<?= $this->request->webroot ?>orderStatuses/view/<?=$orderStatus->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-search-plus"></i>
                                            <?= __('View') ?>
                                        </a>
                                        <a href="<?= $this->request->webroot ?>orderStatuses/edit/<?=$orderStatus->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-pencil-square-o"></i>
                                            <?= __('Edit') ?>
                                        </a>
                                        <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderStatus->id)]) ?> -->
                                    </div>
                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="<?= $this->request->webroot ?>orderStatuses/view/<?=$orderStatus->id?>" class="btn btn-white btn-grey">
                                                        <i class="ace-icon fa fa-search-plus"></i>
                                                        <?= __('View') ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->request->webroot ?>orderStatuses/edit/<?=$orderStatus->id?>" class="btn btn-white btn-grey">
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