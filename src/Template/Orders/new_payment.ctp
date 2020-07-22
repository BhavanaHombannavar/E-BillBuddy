<?php
use Cake\I18n\Date;
use Cake\I18n\Number;
?>
<div class="payments form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <div style="margin-bottom: 30px;">
        <h5>Payment History</h5>
        <?php
            $paid = 0;

            foreach ($order->payments as $payment) {
                $paid += $payment->amount;
        ?>
        <p><?= (new Date($payment->payment_date))->format('m/d/Y') ?> &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; <?= Number::currency($payment->amount, 'INR' ) ?></p>
        <?php
            }
        ?>
        <p>Order Total: <?= Number::currency($order->total_amount, 'INR' ) ?></p>
        <p>Total Paid: <?= Number::currency($paid, 'INR' ) ?></p>
        <?php
            $balance = $order->total_amount - $paid;
        ?>
        <script type="text/javascript">
            var orderTotal = <?= $order->total_amount ?>;
            var curPayStatus = <?= $order->payment_status_id ?>;
        </script>
    </div>
    <fieldset>
        <legend><?= __('New Payment') ?></legend>
        <?php
            echo $this->Form->control('order_number', ['readonly' => true, 'class' => 'form-control']);
            echo $this->Form->control('balance', ['disabled' => true, 'class' => 'form-control', 'val' => $balance]);
            echo $this->Form->control('payments.0.amount', ['class' => 'form-control', 'val' => 0]);
            echo $this->Form->control('payments.0.payment_method_id', ['options' => $paymentMethods, 'class' => 'form-control']);
            echo $this->Form->control('payment_status_id', ['options' => $paymentStatuses, 'readonly' => true, 'class' => 'form-control']);
            echo $this->Form->control('payments.0.payment_date', ['class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('custom/payment.js') ?>
