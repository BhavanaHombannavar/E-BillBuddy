<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customer Types'), ['controller' => 'CustomerTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Type'), ['controller' => 'CustomerTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= h($customer->name) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($customer->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Customer Type') ?></th>
                            <td><?= $customer->has('customer_type') ? $customer->customer_type->name : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($customer->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Email') ?></th>
                            <td><?= h($customer->email) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Gstin') ?></th>
                            <td><?= h($customer->gstin) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($customer->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($customer->modified) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Active') ?></th>
                            <td><?= $customer->active ? __('Yes') : __('No'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="widget-toolbox padding-8 clearfix">
                    <a href="<?= $this->request->webroot ?>customers" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <a href="<?= $this->request->webroot ?>customers/edit/<?=$customer->id?>" class="btn btn-info pull-right">
                        <i class="ace-icon fa fa-pencil-square-o"></i>
                        <?= __('Edit') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="related">
    <div class="col-xs-12 col-md-12 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title"><?= __('Related Addresses') ?></h5>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?php if (!empty($customer->addresses)): ?>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Customer Id') ?></th>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Address Line 1') ?></th>
                                <th scope="col"><?= __('Address Line 2') ?></th>
                                <th scope="col"><?= __('State Id') ?></th>
                                <th scope="col"><?= __('City') ?></th>
                                <th scope="col"><?= __('Pincode') ?></th>
                                <th scope="col"><?= __('Phone') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($customer->addresses as $addresses): ?>
                                <tr>
                                    <td><?= h($addresses->id) ?></td>
                                    <td><?= h($addresses->customer_id) ?></td>
                                    <td><?= h($addresses->name) ?></td>
                                    <td><?= h($addresses->address_line_1) ?></td>
                                    <td><?= h($addresses->address_line_2) ?></td>
                                    <td><?= h($addresses->state_id) ?></td>
                                    <td><?= h($addresses->city) ?></td>
                                    <td><?= h($addresses->pincode) ?></td>
                                    <td><?= h($addresses->phone) ?></td>
                                    <td><?= h($addresses->created) ?></td>
                                    <td><?= h($addresses->modified) ?></td>
                                    <td class="actions">
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a href="<?= $this->request->webroot ?>addresses/view/<?=$addresses->id?>" class="btn btn-grey btn-white">
                                                <i class="ace-icon fa fa-search-plus"></i>
                                                <?= __('View') ?>
                                            </a>
                                            <a href="<?= $this->request->webroot ?>addresses/edit/<?=$addresses->id?>" class="btn btn-grey btn-white">
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
                                                        <a href="<?= $this->request->webroot ?>addresses/view/<?=$addresses->id?>" class="btn btn-white btn-grey">
                                                            <i class="ace-icon fa fa-search-plus"></i>
                                                            <?= __('View') ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $this->request->webroot ?>addresses/edit/<?=$addresses->id?>" class="btn btn-white btn-grey">
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
                        </table>
                    <?php else: ?>
                        <div style="padding: 5px 10px;">-- No Related Addresses --</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="related">
    <div class="col-xs-12 col-md-12 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title"><?= __('Related Orders') ?></h5>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?php if (!empty($customer->orders)): ?>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <!-- <th scope="col"><?= __('Customer Id') ?></th> -->
                                <th scope="col"><?= __('Order Status') ?></th>
                                <th scope="col"><?= __('Payment Status') ?></th>
                                <th scope="col"><?= __('Shipped Date') ?></th>
                                <th scope="col"><?= __('Delievery Date') ?></th>
                                <th scope="col"><?= __('Shipping Cost') ?></th>
                                <th scope="col"><?= __('Total Amount') ?></th>
                                <th scope="col"><?= __('Due Date') ?></th>
                                <th scope="col"><?= __('Order Number') ?></th>
                                <th scope="col"><?= __('Notes') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($customer->orders as $orders): ?>
                                <tr>
                                    <td><?= h($orders->id) ?></td>
                                    <!-- <td><?= h($orders->customer_id) ?></td> -->
                                    <td><?= $orders->has('order_status') ? $orders->order_status->name : '' ?></td>
                                    <td><?= $orders->has('payment_status') ? $orders->payment_status->name : '' ?></td>
                                    <!-- <td><?= h($orders->payment_status_id) ?></td> -->
                                    <td><?= h($orders->shipped_date) ?></td>
                                    <td><?= h($orders->delievery_date) ?></td>
                                    <td><?= h($orders->shipping_cost) ?></td>
                                    <td><?= h($orders->total_amount) ?></td>
                                    <td><?= h($orders->due_date) ?></td>
                                    <td><?= h($orders->order_number) ?></td>
                                    <td><?= h($orders->notes) ?></td>
                                    <td><?= h($orders->created) ?></td>
                                    <td><?= h($orders->modified) ?></td>
                                    <td class="actions">
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a href="<?= $this->request->webroot ?>orders/view/<?=$orders->id?>" class="btn btn-grey btn-white">
                                                <i class="ace-icon fa fa-search-plus"></i>
                                                <?= __('View') ?>
                                            </a>
                                            <a href="<?= $this->request->webroot ?>orders/view/<?=$orders->id?>.pdf" class="btn btn-grey btn-white">
                                                <i class="ace-icon fa fa-file"></i>
                                                <?= __('View PDF') ?>
                                            </a>
                                            <?php if ($orders->payment_status->name != 'Paid') { ?>
                                                <a href="<?= $this->request->webroot ?>orders/new-payment/<?=$orders->id?>" class="btn btn-grey btn-white">
                                                    <i class="ace-icon fa fa-pencil-square-o"></i>
                                                    <?= __('Payment') ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <div class="hidden-md hidden-lg">
                                            <div class="inline pos-rel">
                                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                    <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                    <li>
                                                        <a href="<?= $this->request->webroot ?>orders/view/<?=$orders->id?>" class="btn btn-white btn-grey">
                                                            <i class="ace-icon fa fa-search-plus"></i>
                                                            <?= __('View') ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $this->request->webroot ?>orders/view/<?=$orders->id?>.pdf" class="btn btn-white btn-grey">
                                                            <i class="ace-icon fa fa-file"></i>
                                                            <?= __('View PDF') ?>
                                                        </a>
                                                    </li>
                                                    <?php if ($orders->payment_status->name != 'Paid') { ?>
                                                    <li>
                                                        <a href="<?= $this->request->webroot ?>orders/new-payment/<?=$orders->id?>" class="btn btn-grey btn-white">
                                                            <i class="ace-icon fa fa-pencil-square-o"></i>
                                                            <?= __('Payment') ?>
                                                        </a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <div style="padding: 5px 10px;">-- No Related Orders --</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


