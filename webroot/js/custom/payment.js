$(document).on('change', '#payments-0-amount', function () {
	var balAmt = parseFloat($('#balance').val());
	var amt = parseFloat($('#payments-0-amount').val());
	var balance = 0;
	var newBalance = 0;

	if (balAmt < orderTotal) {
		balance = balAmt;
	} else {
		balance = orderTotal;
	}

	if (amt >= balance) {
		amt = balance;
		$('#payments-0-amount').val(amt);
	}

	newBalance = balance - amt;

	if (newBalance == 0) {
		$('#payment-status-id').val(2);
	} else if (newBalance < balance) {
		$('#payment-status-id').val(3);
	} else {
		$('#payment-status-id').val(curPayStatus);
	}
});
$('form').on('submit', function (argument) {
	if (parseFloat($('#payments-0-amount').val())) {
		return true;
	} else {
		alert('Please enter amount...');
		return false;
	}
})