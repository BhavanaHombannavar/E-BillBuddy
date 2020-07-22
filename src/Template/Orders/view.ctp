<?php
use Cake\I18n\Date;
use Cake\I18n\Number;

function INR($value = null)
{
    return $value !== null ? implode(explode('₹', (Number::currency($value, 'INR' ))), '₹ ') : $value;
}
?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-large">
                <h3 class="widget-title grey lighter">
                    <i class="ace-icon fa fa-leaf blue"></i>
                    Customer Invoice
                </h3>

                <div class="widget-toolbar no-border invoice-info">
                    <span class="invoice-info-label">Invoice:</span>
                    <span class="red">#<?=$order->order_number?></span>

                    <br />
                    <span class="invoice-info-label">Date:</span>
                    <span class="blue"><?=(new Date($order->order_date))->format('d-M-Y')?></span>
                    <br/>
                    <span class="invoice-info-label">Due Date:</span>
                    <span class="blue"><?=(new Date($order->due_date))->format('d-M-Y')?></span>
                </div>

                <div class="widget-toolbar hidden-480">
                    <a href="<?= $this->request->webroot ?>orders/view/<?=$order->id?>.pdf">
                        <i class="ace-icon fa fa-print"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main padding-24">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                    <b>Company Info</b>
                                </div>
                            </div>

                            <div>
                                <ul class="list-unstyled spaced">
                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i><?= $user->name ?>
                                    </li>
                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i>GSTIN: <?= $user->gstin ?>
                                    </li>
                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i><?= $user->address_line_1 ?>, <?= $user->address_line_2 ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i><?= $user->city ?>, <?= $state->name ?>, <?= $user->pincode ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i>Email:<?= $user->email ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i>
                                        Phone:
                                        <?= $user->phone ?>
                                        <!-- <b class="red"><?= $user->phone ?></b> -->
                                    </li>

                                    <li class="divider"></li>

                                </ul>
                            </div>
                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                    <b>Customer Info</b>
                                </div>
                            </div>

                            <div>
                                <ul class="list-unstyled  spaced">
                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i><?= $order->customer->name ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i>GSTIN: <?= $order->customer->gstin ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i><?= $order->customer->addresses[0]['address_line_1'] ?>, <?= $order->customer->addresses[0]['address_line_2'] ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i>
                                        <?= $order->customer->addresses[0]['city'] ?>, 
                                        <?= $order->customer->addresses[0]->state->name ?>, 
                                        <?= $order->customer->addresses[0]['pincode'] ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i>Email:
                                        <?= $order->customer->email ?>
                                    </li>

                                    <!-- <li class="divider"></li> -->

                                    <li>
                                        <i class="ace-icon fa fa-caret-right blue"></i>
                                        Phone: <?= $order->customer->addresses[0]['phone'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space"></div>

                    <div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th class="center">#</th> -->
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Sub-Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $totalAmt = 0;
                                $totalTax = 0;
                                $taxes = [];

                                foreach ($order->order_items as $item) {
                                    $qty = $item->quantity;
                                    $price = $item->price;
                                    $discount = $item->discount;
                                    $percentTax = 0;
                                    $subtotal = 0;
                                    $discountAmt = 0;
                                    $taxCount = 0;

                                    $subtotal = $qty * $price;

                                    $discountAmt = $subtotal * $discount / 100;

                                    $subtotal -= $discountAmt;

                                    foreach ($item->tax_rules as $taxRule) {
                                        $taxAmt = $subtotal * $taxRule->percentage / 100;
                                        $totalTax += $taxAmt;

                                        if (isset($taxes[$taxRule->name])) {
                                            $taxes[$taxRule->name] += $taxAmt;
                                        } else {
                                            $taxes[$taxRule->name] = $taxAmt;
                                        }
                                    }

                                    $subtotal += $totalTax;

                                    $totalAmt += $subtotal;
                                    ?>

                                    <tr>
                                        <td><?= $item->product->name ?></td>
                                        <td><?= $item->quantity ?></td>
                                        <td><?= INR($item->price) ?></td>
                                        <td><?= $item->discount ?>%</td>
                                        <td><?= INR($subtotal) ?></td>
                                    </tr>

                                    <?php
                                }

                                $paid = 0;
                                foreach ($order->payments as $payment) {
                                    $paid += $payment->amount;
                                }
                                $balance = $order->total_amount - $paid;
                                ?>
                                <tr>
                                    <td colspan="4" align="right">Total</td>
                                    <td align="right"><?= INR($totalAmt) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">Shipping</td>
                                    <td align="right"><?= INR($order->shipping_cost) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">Net Amount</td>
                                    <td align="right"><?= INR($order->total_amount) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">Amount Paid</td>
                                    <td align="right"><?= INR($paid) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">Balance</td>
                                    <td align="right"><?= INR($balance) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Tax Name</th>
                            <th>Tax Amount</th>
                        </tr>
                        <?php 
                        foreach ($taxes as $name => $val) {
                            ?>
                            <tr>
                                <td><?= $name ?></td>
                                <td><?= INR($val) ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td>Total</td>
                            <td><?= INR($totalTax) ?></td>
                        </tr>
                    </table>

                    <div class="hr hr8 hr-double hr-dotted"></div>

                    <div class="row">
                        <!-- <div class="col-sm-5 pull-right">
                            <h4 class="pull-right">
                                Total amount :
                                <span class="red">$395</span>
                            </h4>
                        </div> -->
                        <div class="col-sm-7 pull-left"> Extra Information </div>
                    </div>

                    <div class="space-6"></div>
                    <div class="well">
                        Thank you for choosing Our Company products.
                        We believe you will be satisfied by our services.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>