<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->


<div class="col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">

            <h5 class="widget-title"><?= h($state->name) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($state->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($state->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($state->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($state->modified) ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="widget-toolbox padding-8 clearfix">
                    <a href="<?= $this->request->webroot ?>states" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <a href="<?= $this->request->webroot ?>states/edit/<?=$state->id?>" class="btn btn-info pull-right">
                        <i class="ace-icon fa fa-pencil-square-o"></i>
                        <?= __('Edit') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related">
  <div class="col-xs-12 col-md-12 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title">
                <?= __('Related Addresses') ?></h5>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?php if (!empty($state->addresses)): ?>
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
                            <?php foreach ($state->addresses as $addresses): ?>
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
                                         <a href="<?= $this->request->webroot ?>Addresses/view/<?=$addresses->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-search-plus"></i>
                                            <?= __('View') ?>
                                        </a>
                                        <a href="<?= $this->request->webroot ?>Addresses/edit/<?=$addresses->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-pencil-square-o"></i>
                                            <?= __('Edit') ?>
                                        </a>
                                    </div>

                                           <!--  <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                                        -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="related">
            <div class="col-xs-12 col-md-12 widget-container-col">
                <div class="widget-box widget-color-blue">
                    <div class="widget-header">
                        <h5 class="widget-title">
                            <?= __('Related Users') ?></h5>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <?php if (!empty($state->users)): ?>
                                 <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th scope="col"><?= __('Id') ?></th>
                                        <th scope="col"><?= __('Name') ?></th>
                                        <th scope="col"><?= __('Username') ?></th>
                                        <th scope="col"><?= __('Password') ?></th>
                                        <th scope="col"><?= __('Email') ?></th>
                                        <th scope="col"><?= __('Gstin') ?></th>
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
                                    <?php foreach ($state->users as $users): ?>
                                        <tr>
                                            <td><?= h($users->id) ?></td>
                                            <td><?= h($users->name) ?></td>
                                            <td><?= h($users->username) ?></td>
                                            <td><?= h($users->password) ?></td>
                                            <td><?= h($users->email) ?></td>
                                            <td><?= h($users->gstin) ?></td>
                                            <td><?= h($users->address_line_1) ?></td>
                                            <td><?= h($users->address_line_2) ?></td>
                                            <td><?= h($users->state_id) ?></td>
                                            <td><?= h($users->city) ?></td>
                                            <td><?= h($users->pincode) ?></td>
                                            <td><?= h($users->phone) ?></td>
                                            <td><?= h($users->created) ?></td>
                                            <td><?= h($users->modified) ?></td>
                                            <td class="actions">

                                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

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
       