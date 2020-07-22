<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tax Groups'), ['controller' => 'TaxGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax Group'), ['controller' => 'TaxGroups', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="products form col-md-6 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Edit Product') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?= $this->Form->create($product) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('tax_group_id', ['options' => $taxGroups, 'class' => 'form-control']);
                    echo $this->Form->control('name', ['class' => 'form-control']);
                    echo $this->Form->control('sku', ['class' => 'form-control']);
                    echo $this->Form->control('price', ['class' => 'form-control']);
                    echo $this->Form->control('unit', ['class' => 'form-control']);
                    echo $this->Form->control('active');
                    ?>
                </fieldset>
                <div class="widget-toolbox padding-10 clearfix">
                    <a href="<?= $this->request->webroot ?>products" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <?= $this->Form->button(__('Update'), ['class' => 'btn btn-info pull-right']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>