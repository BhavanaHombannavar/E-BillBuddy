var fields = ['product', 'quantity', 'price', 'taxes'];
var totalRows = 1;

function toINR(num) {
    return parseFloat(num).toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        style: 'currency',
        currency: 'INR'
    });
}

function updateAmounts() {
    var totalAmt = 0;
    var netAmt = 0;
    var totalTax = 0;
    var paidAmt = parseFloat($('#amount-paid').val());
    var shipAmt = parseFloat($('#shipping-amt').val());

    for (var row = 0; row < totalRows; row++) {
        var qty = parseFloat($('#order-item-quantity-' + row).val());
        var price = parseFloat($('#order-item-price-' + row).val());
        var discount = parseFloat($('#order-item-discount-' + row).val());
        var percentTax = 0;
        var taxAmt = 0;
        var discountAmt = 0;
        var subtotal = 0;

        $("#order-item-taxes-" + row + " option:selected").each(function (i, el) {
            percentTax += $(el).data('tax_rule').percentage;
        });

        subtotal = qty * price;

        discountAmt = subtotal * discount / 100;

        subtotal -= discountAmt;

        taxAmt = subtotal * percentTax / 100;

        subtotal += taxAmt;

        $('#subtotal-' + row).text(toINR(subtotal));

        totalAmt += subtotal;
        totalTax += taxAmt;
    }

    $('#total-amt').text(toINR(totalAmt));
    
    netAmt = totalAmt + shipAmt;

    $('#net-amt').text(toINR(netAmt));

    if (paidAmt == 0) {
        $('#payment-status-id').val(1);
    } else if (paidAmt >= netAmt) {
        paidAmt = netAmt;
        $('#amount-paid').val(paidAmt);
        $('#payment-status-id').val(2);
    } else {
        $('#payment-status-id').val(3);
    }

    $('#total-amount').val(netAmt);
    $('#balance-amt').text(toINR(netAmt - paidAmt));
}

function addItem(afterRow) {
    var newRow = afterRow + 1;
    var trRow = $('<tr>').attr('id', 'order-item-' + newRow);

    var tdProduct = $('<td>');
    var tdQty = $('<td>');
    var tdPrice = $('<td>');
    var tdTaxes = $('<td>');
    var tdDiscount = $('<td>');
    var tdSubTotal = $('<td><span id="subtotal-' + newRow + '"></span></td>').attr('align', 'right');
    var tdActions = $('<td><a id="add-item-' + newRow + '" href="javascript:addItem(' + newRow + ')" class="btn btn-white"><i class="ace-icon fa fa-plus"></i></a><a id="remove-item-' + newRow + '" href="javascript:removeItem(' + newRow + ')" class="btn btn-white"><i class="ace-icon fa fa-trash"></i></a>');

    var selProduct = $('<select>')
    .attr('id', 'order-item-product-' + newRow)
    .attr('name', 'order_items[' + newRow + '][product_id]')
    .attr('class', 'chosen-select form-control')
    .attr('data-placeholder', 'Choose or Search Product...')
    .append($('<option>'));

    var txtQty = $('<input type="number" id="order-item-quantity-' + newRow + '" name="order_items[' + newRow + '][quantity]" min="1" value="1">');
    var txtPrice = $('<input type="number" id="order-item-price-' + newRow + '" name="order_items[' + newRow + '][price]" min="0" step=".01" value="0">');
    var selTaxes = $('<select id="order-item-taxes-' + newRow + '" name="order_items[' + newRow + '][tax_rules][_ids][]" multiple="true" size="2" class="form-control">');
    var txtDiscount = $('<div class="input-group"><input type="number" name="order_items[' + newRow + '][discount]" min="0" step=".01" id="order-item-discount-' + newRow + '" class="form-control" value="0"/><span class="input-group-addon">%</span></div>');

    tdQty.append(txtQty);
    tdPrice.append(txtPrice);
    tdTaxes.append(selTaxes);
    tdDiscount.append(txtDiscount);

    tdProduct.append(selProduct);
    trRow.append(tdProduct, tdQty, tdPrice, tdTaxes,tdDiscount, tdSubTotal, tdActions);

    trRow.insertAfter('#order-item-' + afterRow);

    totalRows++;

    selProduct.chosen().change(onProductChange).trigger('resize.chosen');
    loadProducts(newRow);

    if (totalRows > 2) {
        $('#order-items tr').each(function (idx, el) {
            if (idx > newRow) {
                var el = $(el);
                var targetid = el.attr('id');
                var curRow = targetid.substring(targetid.lastIndexOf('-') + 1, targetid.length);

                el.attr('id', 'order-item-' + idx);
                el.find('#order-item-product-' + curRow)
                .attr('name', 'order_items[' + idx + '][product_id]' )
                .attr('id', 'order-item-product-' + idx);
                el.find('#order_item_product_' + curRow + '_chosen')
                .attr('id', 'order_item_product_' + idx + '_chosen');
                el.find('#order-item-quantity-' + curRow)
                .attr('name', 'order_items[' + idx + '][quantity]' )
                .attr('id', 'order-item-quantity-' + idx);
                el.find('#order-item-price-' + curRow)
                .attr('name', 'order_items[' + idx + '][price]' )
                .attr('id', 'order-item-price-' + idx);
                el.find('#order-item-taxes-' + curRow)
                .attr('name', 'order_items[' + idx + '][tax_rules][_ids][]' )
                .attr('id', 'order-item-taxes-' + idx);
                el.find('#order-item-discount-' + curRow)
                .attr('name', 'order_items[' + idx + '][discount]' )
                .attr('id', 'order-item-discount-' + idx);
                el.find('#subtotal-' + curRow)
                .attr('id', 'subtotal-' + idx);
                el.find('#add-item-' + curRow)
                .attr('href', 'javascript:addItem(' + idx + ')')
                .attr('id', 'add-item-' + idx);
                el.find('#remove-item-' + curRow)
                .attr('href', 'javascript:removeItem(' + idx + ')')
                .attr('id', 'remove-item-' + idx);
            }

         //   console.log(idx, newRow);
     })
    }
}

function removeItem(row) {
    $('#order-item-' + row).remove();
    totalRows--;

    $('#order-items tr').each(function (idx, el) {

        var el = $(el);
        var targetid = el.attr('id');
        var curRow = targetid.substring(targetid.lastIndexOf('-') + 1, targetid.length);
        if(curRow > row){

            el.attr('id', 'order-item-' + idx);
            el.find('#order-item-product-' + curRow)
            .attr('name', 'order_items[' + idx + '][product_id]' )
            .attr('id', 'order-item-product-' + idx);
            el.find('#order_item_product_' + curRow + '_chosen')
            .attr('id', 'order_item_product_' + idx + '_chosen');
            el.find('#order-item-quantity-' + curRow)
            .attr('name', 'order_items[' + idx + '][quantity]' )
            .attr('id', 'order-item-quantity-' + idx);
            el.find('#order-item-price-' + curRow)
            .attr('name', 'order_items[' + idx + '][price]' )
            .attr('id', 'order-item-price-' + idx);
            el.find('#order-item-taxes-' + curRow)
            .attr('name', 'order_items[' + idx + '][tax_rules][_ids][]' )
            .attr('id', 'order-item-taxes-' + idx);
            el.find('#order-item-discount-' + curRow)
             .attr('name', 'order_items[' + idx + '][discount]' )
             .attr('id', 'order-item-discount-' + idx);
            el.find('#subtotal-' + curRow)
            .attr('id', 'subtotal-' + idx);
            el.find('#add-item-' + curRow)
            .attr('href', 'javascript:addItem(' + idx + ')')
            .attr('id', 'add-item-' + idx);
            el.find('#remove-item-' + curRow)
            .attr('href', 'javascript:removeItem(' + idx + ')')
            .attr('id', 'remove-item-' + idx);
            console.log(curRow);
        }
    });

    updateAmounts();
}

function loadCustomers() {
    $.ajax({
        method: 'GET',
        url: baseUrl + 'api/customers/getActiveCustomers.json',
        success: function (data) {
            data.customers.forEach(function (customer) {
                $('#customer').append($('<option>').val(customer.id).text(customer.name).data('customer', customer));
            });
            $("#customer").trigger("chosen:updated");
            // console.log(data);
        },
        failure: function () {
            console.log(arguments);
        }
    });
}

function loadProducts(row) {
    $.ajax({
        method: 'GET',
        url: baseUrl + 'api/products.json',
        success: function (data) {
            data.products.forEach(function (product) {
                $('#order-item-product-' + row).append($('<option>').val(product.id).text(product.name).data('product', product));
            });
            $('#order-item-product-' + row).trigger("chosen:updated");
            // console.log(data);
        },
        failure: function () {
            console.log(arguments);
        }
    });
}

function onProductChange (evt) {
    var targetid = $(evt.target).attr('id');
    var row = targetid.substring(targetid.lastIndexOf('-') + 1, targetid.length);
    var product = $("#" + targetid + " option:selected").data('product');
    $('#order-item-price-' + row).val(product.price);

    $('#order-item-taxes-' + row + ' option').remove();

    product.tax_group.tax_rules.forEach(function (rule) {
        $('#order-item-taxes-' + row).append($('<option>').val(rule.id).text(rule.name).data('tax_rule', rule));
    });
    updateAmounts();
}

function toggleReqFields(reqState) {
    reqFields.forEach(function (id) {
        $(id).attr('required', reqState);
    });
}

$('#sw-customer').on('change', function (evt) {
    $('#sel-customer, #new-customer').toggle();
    if (evt.target.checked) {
        toggleReqFields(true);
    } else {
        toggleReqFields(false);
    }
});

var reqFields = [];

jQuery(function($) {

    $('#new-customer [required]').each(function (i, el) {
        reqFields.push('#' + $(el).attr('id'));
        $(el).attr('required', false);
    });

    $( "#order-date, #due-date" ).datepicker({
        showOtherMonths: true,
        selectOtherMonths: false,
        //isRTL:true,
    });

    if(!ace.vars['touch']) {
        $('#order-item-product-0').chosen().change(onProductChange); 
        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
            $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': '100%'});
         })
        }).trigger('resize.chosen');
    }

    $("#customer").chosen().change(function (evt) {
        var customer = $("#customer option:selected").data('customer');
        // console.log(customer);
        var address = customer.addresses[0];
        $('#cust_name').text(customer.name);
        $('#cust_add1').text(address.address_line_1);
        $('#cust_add2').text(address.address_line_2);
        $('#cust_city').text(address.city);
        $('#cust_state').text(address.state.name);
        $('#cust_pin').text(address.pincode);
        $('#cust_phone').text('Phone: ' + address.phone);
        $('#cust_email').text('Email: ' + customer.email);
    });

    // $("select[id^=order-item-product]").chosen();

    $(document).on('change', '[id^=order-item-quantity], [id^=order-item-price], [id^=order-item-taxes], [id^=order-item-discount],#shipping-amt , #amount-paid', updateAmounts);

    loadCustomers();
    loadProducts(0);
});