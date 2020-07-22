<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaxGroup $taxGroup
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tax Group'), ['action' => 'edit', $taxGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tax Group'), ['action' => 'delete', $taxGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taxGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tax Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tax Rules'), ['controller' => 'TaxRules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax Rule'), ['controller' => 'TaxRules', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->

<div class="col-xs-12 col-sm-6 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title">
                <?= h($taxGroup->name) ?>
            </h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($taxGroup->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($taxGroup->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($taxGroup->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($taxGroup->modified) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="widget-toolbox padding-8 clearfix">
                <a href="<?= $this->request->webroot ?>taxGroups" class="btn">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    <?= __('Back') ?>
                </a>
                <!-- <a href="<?= $this->request->webroot ?>taxGroups/edit/<?=$taxGroup->id?>" class="btn btn-info pull-right">
                    <i class="ace-icon fa fa-pencil-square-o"></i>
                    <?= __('Edit') ?>
                </a> -->
            </div>
        </div>
    </div>
</div>

<div class="related">
 <div class="col-xs-12 col-md-12 widget-container-col">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title">
                <?= __('Related Products') ?>
            </h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?php if (!empty($taxGroup->products)): ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <!-- <th scope="col"><?= __('Tax Group Id') ?></th> -->
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Sku') ?></th>
                            <th scope="col"><?= __('Price') ?></th>
                            <th scope="col"><?= __('Unit') ?></th>
                            <th scope="col"><?= __('Active') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($taxGroup->products as $products): ?>
                            <tr>
                                <td><?= h($products->id) ?></td>
                                <!-- <td><?= h($products->tax_group_id) ?></td> -->
                                <td><?= h($products->name) ?></td>
                                <td><?= h($products->sku) ?></td>
                                <td><?= h($products->price) ?></td>
                                <td><?= h($products->unit) ?></td>
                                <td><?= h($products->active) ?></td>
                                <td><?= h($products->created) ?></td>
                                <td><?= h($products->modified) ?></td>
                                <td class="actions">
                                    
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="<?= $this->request->webroot ?>products/view/<?=$products->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-search-plus"></i>
                                            <?= __('View') ?>
                                        </a>


                                        <a href="<?= $this->request->webroot ?>products/edit/<?=$products->id?>" class="btn btn-grey btn-white">
                                            <i class="ace-icon fa fa-pencil-square-o"></i>
                                            <?= __('Edit') ?>
                                        </a>

                                        
                                    </div>
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
                    <?= __('Related Tax Rules') ?>
                </h5>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <?php if (!empty($taxGroup->tax_rules)): ?>
                     <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <!-- <th scope="col"><?= __('Tax Group Id') ?></th> -->
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Percentage') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($taxGroup->tax_rules as $taxRules): ?>
                            <tr>
                                <td><?= h($taxRules->id) ?></td>
                                <!-- <td><?= h($taxRules->tax_group_id) ?></td> -->
                                <td><?= h($taxRules->name) ?></td>
                                <td><?= h($taxRules->percentage) ?></td>
                                <td><?= h($taxRules->created) ?></td>
                                <td><?= h($taxRules->modified) ?></td>
                                <td class="actions">
                                  <a href="<?= $this->request->webroot ?>taxRules/view/<?=$taxRules->id?>" class="btn btn-grey btn-white">
                                    <i class="ace-icon fa fa-search-plus"></i>
                                    <?= __('View') ?>
                                </a>

                                <!-- <a href="<?= $this->request->webroot ?>taxRules/edit/<?=$taxRules->id?>" class="btn btn-grey btn-white">
                                    <i class="ace-icon fa fa-pencil-square-o"></i>
                                    <?= __('Edit') ?>
                                </a> -->

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
