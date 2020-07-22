<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaxRule $taxRule
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tax Rules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tax Groups'), ['controller' => 'TaxGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax Group'), ['controller' => 'TaxGroups', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="taxRules form col-md-6 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Add Tax Rule') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?= $this->Form->create($taxRule) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('tax_group_id', ['options' => $taxGroups, 'class' => 'form-control']);
                    echo $this->Form->control('name', ['class' => 'form-control']);
                    echo $this->Form->control('percentage', ['class' => 'form-control']);
                    ?>
                </fieldset>
                <div class="widget-toolbox padding-10 clearfix">
                    <a href="<?= $this->request->webroot ?>taxRules" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <?= $this->Form->button(__('Add Tax Rule'), ['class' => 'btn btn-info pull-right']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
