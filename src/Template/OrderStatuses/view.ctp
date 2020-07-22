<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderStatus $orderStatus
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Status'), ['action' => 'edit', $orderStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Status'), ['action' => 'delete', $orderStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>

--><div class="orderStatuses view large-9 medium-8 columns content">
 <div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-2 vertical-table" >
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= h($orderStatus->name) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($orderStatus->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($orderStatus->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($orderStatus->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($orderStatus->modified) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="widget-toolbox padding-8 clearfix">
                <a href="<?= $this->request->webroot ?>orderStatuses" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <a href="<?= $this->request->webroot ?>orderStatuses/edit/<?=$orderStatus->id?>" class="btn btn-info pull-right">
                    <i class="ace-icon fa fa-pencil-square-o"></i>
                    <?= __('Edit') ?>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="related">
    <div class="col-xs-12 col-md-12 widget-container-col">
        <div class="widget-box widget-color-blue">
            <div class="widget-header">
                <h5 class="widget-title"><?= __('Related Orders') ?></h5>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?php if (!empty($orderStatus->orders)): ?>
                        <table class="table table-striped table-bordered table-hover">
                           <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Customer Id') ?></th>
                                    <th scope="col"><?= __('Order Status Id') ?></th>
                                    <th scope="col"><?= __('Payment Status Id') ?></th>
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
                            <?php foreach ($orderStatus->orders as $orders): ?>
                                <tr>
                                        <td><?= h($orders->id) ?></td>
                                        <td><?= h($orders->customer_id) ?></td>
                                        <td><?= h($orders->order_status_id) ?></td>
                                        <td><?= h($orders->payment_status_id) ?></td>
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
                                            <a href="<?= $this->request->webroot ?>orders/edit/<?=$orders->id?>" class="btn btn-grey btn-white">
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
                                                        <a href="<?= $this->request->webroot ?>orders/view/<?=$order->id?>" class="btn btn-white btn-grey">
                                                            <i class="ace-icon fa fa-search-plus"></i>
                                                            <?= __('View') ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $this->request->webroot ?>orders/edit/<?=$order->id?>" class="btn btn-white btn-grey">
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
                        <div style="padding: 5px 10px;">-- No Related Orders --</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>