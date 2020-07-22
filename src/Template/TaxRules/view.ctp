<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaxRule $taxRule
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tax Rule'), ['action' => 'edit', $taxRule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tax Rule'), ['action' => 'delete', $taxRule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taxRule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tax Rules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax Rule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tax Groups'), ['controller' => 'TaxGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax Group'), ['controller' => 'TaxGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= h($taxRule->name) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($taxRule->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Tax Group') ?></th>
                            <td><?= $taxRule->has('tax_group') ? $this->Html->link($taxRule->tax_group->name, ['controller' => 'TaxGroups', 'action' => 'view', $taxRule->tax_group->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($taxRule->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Percentage') ?></th>
                            <td><?= $this->Number->format($taxRule->percentage) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($taxRule->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($taxRule->modified) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="widget-toolbox padding-8 clearfix">
                <a href="<?= $this->request->webroot ?>taxRules" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <!-- <a href="<?= $this->request->webroot ?>taxRules/edit/<?=$taxRule->id?>" class="btn btn-info pull-right">
                    <i class="ace-icon fa fa-pencil-square-o"></i>
                    <?= __('Edit') ?>
                </a> -->
            </div>
        </div>
    </div>
</div>

