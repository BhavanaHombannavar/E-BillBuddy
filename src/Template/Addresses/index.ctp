<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<div class="addresses index col-md-12 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Addresses') ?></h5>
            <div class="widget-toolbar">
                <a href="<?= $this->request->webroot ?>addresses/add" class="btn btn-info">
                    <i class="ace-icon fa fa-plus"></i>
                    <?= __('Add Address') ?>
                </a>
            </div>
        </div>

    <div class="widget-body">
            <div class="widget-main no-padding">
                <table id="simple-table" class="table table-striped table-bordered table-hover">
                    <thead>
             <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pincode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $address): ?>
                <tr>
                    <td><?= $this->Number->format($address->id) ?></td>
                    <td><?= $address->has('customer') ? $this->Html->link($address->customer->name, ['controller' => 'Customers', 'action' => 'view', $address->customer->id]) : '' ?>
                        
                    </td>
                    
                    <td><?= h($address->name) ?></td>
                    <td><?= h($address->address_line_1) ?></td>
                    <td><?= h($address->address_line_2) ?></td>
                    <td><?= $address->has('state') ? $this->Html->link($address->state->name, ['controller' => 'States', 'action' => 'view', $address->state->id]) : '' ?></td>
                    <td><?= h($address->city) ?></td>
                    <td><?= h($address->pincode) ?></td>
                    <td><?= h($address->phone) ?></td>
                    <td><?= h($address->created) ?></td>
                    <td><?= h($address->modified) ?></td>
                    <td class="actions">
                       <div class="hidden-sm hidden-xs btn-group">
                           <a href="<?= $this->request->webroot ?>addresses/view/<?=$address->id?>" 
                            class="btn btn-grey btn-white">
                            <i class="ace-icon fa fa-search-plus"></i>
                            <?= __('View') ?>
                        </a>

                        <a href="<?= $this->request->webroot ?>addresses/edit/<?=$address->id?>" class="btn btn-grey btn-white">
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
                                 <a href="<?= $this->request->webroot ?>addresses/view/<?=$address->id?>" class="btn btn-success">
                                    <i class="ace-icon fa fa-search-plus"></i>
                                    <?= __('View') ?>
                                </a>
                            </li>


                            <li>
                                <a href="<?= $this->request->webroot ?>addresses/edit/<?=$address->id?>" class="btn btn-info">
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
