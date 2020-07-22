<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="users form col-md-6 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('My Profile') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <?php
                    
                    echo $this->Form->control('name', ['class' => 'form-control']);
                    echo $this->Form->control('username', ['disabled'=>'disabled', 'class' => 'form-control']);
                    // echo $this->Form->control('password', ['class' => 'form-control']);
                    echo $this->Form->control('email', ['class' => 'form-control']);
                    echo $this->Form->control('gstin', ['class' => 'form-control']);
                    echo $this->Form->control('address_line_1', ['class' => 'form-control']);
                    echo $this->Form->control('address_line_2', ['class' => 'form-control']);
                    echo $this->Form->control('state_id', ['options' => $states, 'class' => 'form-control']);
                    echo $this->Form->control('city', ['class' => 'form-control']);
                    echo $this->Form->control('pincode', ['class' => 'form-control']) ;
                    echo $this->Form->control('phone', ['class' => 'form-control']);
                    ?>
                </fieldset>
                <div class="widget-toolbox padding-10 clearfix">
                    <a href="<?= $this->request->webroot ?>users/dashboard" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <div class="btn-group pull-right">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info', 'name' => 'update', 'val'=>'1']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
