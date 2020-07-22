<div class="taxRules form col-md-6 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('Change your password') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?= $this->Form->create() ?>
                <fieldset>
                	<?= $this->Form->input('current_password', ['type' => 'password', 'class' => 'form-control'])?>
                	<?= $this->Form->input('new_password', ['type' => 'password', 'class' => 'form-control']) ?>
                	<?= $this->Form->input('confirm_password', ['type' => 'password', 'class' => 'form-control'])?>
                </fieldset>
                <div class="widget-toolbox padding-10 clearfix">
                    <a href="<?= $this->request->webroot ?>users/dashboard/" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a>
                    <?= $this->Form->button(__('Change password'), ['class' => 'btn btn-info pull-right']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
