<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="states form  col-md-6 col-md-push-1 columns content">
   <div class="widget-box widget-color-blue">
    <div class="widget-header">
       <h5 class="widget-title"><?= __('Add State')?></h5>
   </div>
   <div class="widget-body">
    <div class="widget-main no-padding">
        <?= $this->Form->create($state) ?>
        <fieldset>
            <?php
            echo $this->Form->control('name');
            ?>
        </fieldset>
        <div class="widget-toolbox padding-10 clearfix">
            <a href="<?= $this->request->webroot ?>states" class="btn">
                <i class="ace-icon fa fa-arrow-left"></i>
                <?= __('Back') ?>
            </a>

            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-info pull-right']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
</div>
</div>