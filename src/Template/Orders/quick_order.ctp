<div class="orders form col-md-12 columns content">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h5 class="widget-title"><?= __('New Order') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">
                <?= $this->Form->create($order) ?>
                <fieldset>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12 mb-10">
                                <label class="inline">
                                    <small class="muted smaller-90">New Customer</small>
                                    <input type="checkbox" id="sw-customer" class="ace ace-switch ace-switch-5" />
                                    <span class="lbl middle"></span>
                                </label>
                            </div>
                            <div class="col-md-6" id="sel-customer">
                                <select id="customer" name="customer_id" class="chosen-select form-control" data-placeholder="Choose or Search Customer...">
                                    <option value="0"></option>
                                </select>
                                <div class="col-md-6" id="address">
                                    <h4 id="cust_name">Select customer before proceeding</h4>
                                    <p id="cust_add1"></p>
                                    <p id="cust_add2"></p>
                                    <p>
                                        <span id="cust_city"></span>
                                        <span id="cust_state"></span>
                                        <span id="cust_pin"></span>
                                    </p>
                                    <p id="cust_phone"></p>
                                    <p id="cust_email"></p>
                                </div>
                            </div>
                            <div class="col-md-12" id="new-customer" style="display: none;">
                                <fieldset>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->control('customer.customer_type_id', ['options' => $customerTypes, 'class' => 'form-control']);
                                        echo $this->Form->control('customer.name', ['class' => 'form-control']);
                                        echo $this->Form->control('customer.email', ['class' => 'form-control']);
                                        echo $this->Form->control('customer.gstin', ['class' => 'form-control']);
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->control('customer.addresses.0.name', ['class' => 'form-control', 'label' => 'Address Alias']);
                                        echo $this->Form->control('customer.addresses.0.address_line_1', ['class' => 'form-control']);
                                        echo $this->Form->control('customer.addresses.0.address_line_2', ['class' => 'form-control']);
                                        echo $this->Form->control('customer.addresses.0.state_id', ['options' => $states, 'class' => 'form-control']);
                                        echo $this->Form->control('customer.addresses.0.city', ['class' => 'form-control']);
                                        echo $this->Form->control('customer.addresses.0.pincode', ['class' => 'form-control']);
                                        echo $this->Form->control('customer.addresses.0.phone', ['class' => 'form-control']);
                                        ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input text required">
                            <label for="order-date">Order Date</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="order_date" class="form-control" required="required" maxlength="50" id="order-date" value="<?=$order->order_date?>">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>

                        <div class="input text required">
                            <label for="order-number">Due Date</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="due_date" class="form-control" required="required" maxlength="50" id="due-date" value="<?=$order->due_date?>">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <?php
                            echo $this->Form->control('order_status_id', ['options' => $orderStatuses, 'class' => 'form-control']);
                            echo $this->Form->control('payment_status_id', ['options' => $paymentStatuses, 'class' => 'form-control', 'readonly' => true]);
                        ?>
                    </div>
                    <div class="col-md-12 mt-10">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="order-table" class="table  table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Taxes</th>
                                            <th>Discount</th>
                                            <th>Sub-Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order-items">
                                        <tr id="order-item-0">
                                            <td>
                                                <select id="order-item-product-0" name="order_items[0][product_id]" class="chosen-select form-control" data-placeholder="Choose or Search Product...">
                                                    <option value="0"></option>
                                                </select>
                                            </td>
                                            <td><input type="number" id="order-item-quantity-0" name="order_items[0][quantity]" min="1" value="1" /></td>
                                            <td><input type="number" id="order-item-price-0" name="order_items[0][price]" min="0" step=".01" value="0" /></td>
                                            <td>
                                                <select id="order-item-taxes-0" name="order_items[0][tax_rules][_ids][]" multiple="true" size="2" class="form-control">
                                                </select>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="number" name="order_items[0][discount]" min="0" step=".01" id="order-item-discount-0" class="form-control" value="0"/>
                                                    <span class="input-group-addon">
                                                        %
                                                    </span>
                                                </div>
                                            </td>
                                            <td align="right">
                                                <span id="subtotal-0"></span>
                                            </td>
                                            <td>
                                                <a id="add-item-0" href="javascript:addItem(0)" class="btn btn-white">
                                                    <i class="ace-icon fa fa-plus"></i>
                                                </a>
                                                <a id="remove-item-0" href="javascript:removeItem(0)" class="btn btn-white" style="visibility: hidden;">
                                                    <i class="ace-icon fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <!-- <div class="col-xs-12 mt-10">
                            <p>Tax Details</p>
                        </div> -->
                        <div class="col-xs-12 mt-10">
                            <label for="notes">Notes</label>
                            <textarea name="notes" class="form-control" id="notes" rows="5" style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="col-md-5">
                       <div class="row">
                        <div class="col-xs-12">
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th width="25%">Total</th>
                                        <td align="right">
                                            <span id="total-amt"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>
                                            <div class="pull-right col-md-6">
                                                <div class="input-group">
                                                    <input type="number" name="shipping_cost" min="0" step=".01" id="shipping-amt" class="form-control" value="0" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Net Amount</th>
                                        <td align="right">
                                            <span id="net-amt"></span>
                                            <input type="hidden" name="total_amount" id="total-amount" value="0">
                                        </td>   
                                    </tr>
                                    <tr>
                                        <th>Amount Paid</th>
                                        <td>
                                            <div class="pull-right col-md-6">
                                                <div class="input-group">
                                                    <input type="number" name="payments[0][amount]" min="0" step=".01" id="amount-paid" class="form-control" value="0" />
                                                </div>
                                            </div>
                                            <div class="pull-right col-md-6">
                                                <?php
                                                    echo $this->Form->control('payments.0.payment_method_id', ['options' => $paymentMethods, 'class' => 'form-control', 'label' => false]);
                                                ?>
                                            </div>
                                        </td>   
                                    </tr>
                                    <tr>
                                        <th>Balance </th>
                                        <td align="right">
                                            <span id="balance-amt"></span>
                                        </td>   
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="widget-toolbox padding-10 clearfix">
                    <!-- <a href="<?= $this->request->webroot ?>customers" class="btn">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        <?= __('Back') ?>
                    </a> -->
                    <?= $this->Form->button(__('Create Order'), ['class' => 'btn btn-info pull-right']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('custom/order.js') ?>
