<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentStatus[]|\Cake\Collection\CollectionInterface $paymentStatuses
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<div class="paymentStatuses index col-md-12 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Payment Statuses') ?></h5>
            <div class="widget-toolbar">
                <a href="<?= $this->request->webroot ?>payment-statuses/add" class="btn btn-info">
                    <i class="ace-icon fa fa-plus"></i>
                    <?= __('Add PaymentStatus') ?>
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
            <?php foreach ($paymentStatuses as $paymentStatus): ?>
                <tr>
                    <td><?= $this->Number->format($paymentStatus->id) ?></td>
                    <td><?= h($paymentStatus->name) ?></td>
                    <td><?= h($paymentStatus->created) ?></td>
                    <td><?= h($paymentStatus->modified) ?></td>
                    <td class="actions">
                       <div class="hidden-sm hidden-xs btn-group">
                        <a href="<?= $this->request->webroot ?>payment-statuses/view/<?=$paymentStatus->id?>" class="btn btn-grey btn-white">
                                        <i class="ace-icon fa fa-search-plus"></i>
                                        <?= __('View') ?>
                                    </a>
                        <a href="<?= $this->request->webroot ?>payment-statuses/edit/<?=$paymentStatus->id?>" class="btn btn-grey btn-white">
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
                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $paymentStatus->id]) ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                   <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                    <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentStatus->id]) ?>
                                    </span>
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
