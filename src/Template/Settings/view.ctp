<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Setting'), ['action' => 'edit', $setting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Setting'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= h($setting->name) ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($setting->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Value') ?></th>
                            <td><?= h($setting->value) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($setting->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($setting->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($setting->modified) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="widget-toolbox padding-8 clearfix">
                <a href="<?= $this->request->webroot ?>settings" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <a href="<?= $this->request->webroot ?>settings/edit/<?=$setting->id?>" class="btn btn-info pull-right">
                    <i class="ace-icon fa fa-pencil-square-o"></i>
                    <?= __('Edit') ?>
                </a>
            </div>
        </div>
    </div>
</div>
