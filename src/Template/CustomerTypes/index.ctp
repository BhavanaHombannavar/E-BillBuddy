<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerType[]|\Cake\Collection\CollectionInterface $customerTypes
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<div class="customerTypes index col-md-12 columns content">
  <div class="widget-box widget-color-blue">
    <div class="widget-header">
        <h5 class="widget-title">
          <?= __('Customer Types') ?></h5>
          <div class="widget-toolbar">
            <a href="<?= $this->request->webroot ?>customer-types/add" class="btn btn-info">
                <i class="ace-icon fa fa-plus"></i>
                <?= __('Add Customer Type') ?>
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
            <?php foreach ($customerTypes as $customerType): ?>
                <tr>
                    <td><?= $this->Number->format($customerType->id) ?></td>
                    <td><?= h($customerType->name) ?></td>
                    <td><?= h($customerType->created) ?></td>
                    <td><?= h($customerType->modified) ?></td>
                    <td class="actions">
                        <div class="hidden-sm hidden-xs btn-group">
                            <a href="<?= $this->request->webroot ?>customer-types/view/<?=$customerType->id?>" class="btn btn-grey btn-white">
                                <i class="ace-icon fa fa-search-plus"></i>
                                <?= __('View') ?>
                            </a>
                            <a href="<?= $this->request->webroot ?>customer-types/edit/<?=$customerType->id?>" class="btn btn-grey btn-white">
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
                                        <a href="<?= $this->request->webroot ?>customerTypes/view/<?=$customerType->id?>" class="btn btn-success">
                                            <i class="ace-icon fa fa-search-plus"></i>
                                            <?= __('View') ?>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= $this->request->webroot ?>customerTypes/edit/<?=$customerType->id?>" class="btn btn-info">
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