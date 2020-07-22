<div class="form col-md-6 columns content">
	<div class="widget-box widget-color-blue">
		<div class="widget-header">
			<h5 class="widget-title"><?= __('Sales By Customer - Reports') ?></h5>
		</div>
		<div class="widget-body">
			<div class="widget-main no-padding">
				<?= $this->Form->create('Post', array( 'url' => '/reports/sales-by-customer.pdf' )) ?>
				<fieldset>
					<div class="input text required">
						<label>From Date</label>
						<div class="input-group input-group-sm">
							<input type="text" name="from_date" class="form-control" required="required" maxlength="50" id="from-date"/>
							<span class="input-group-addon">
								<i class="ace-icon fa fa-calendar"></i>
							</span>
						</div>
					</div>
					<div class="input text required">
						<label>To Date</label>
						<div class="input-group input-group-sm">
							<input type="text" name="to_date" class="form-control" required="required" maxlength="50" id="to-date"/>
							<span class="input-group-addon">
								<i class="ace-icon fa fa-calendar"></i>
							</span>
						</div>
					</div>
					<div class="form-actions center">
						<input type="Submit" name="Submit" value="Proceed" class="btn btn-sm btn-info">
						<!-- <button type="button" class="btn btn-sm btn-info">
							Submit
							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
						</button> -->
					</div>
				</fieldset>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(function($) {
		$( "#from-date, #to-date" ).datepicker({
			showOtherMonths: true,
			selectOtherMonths: false,
        //isRTL:true,
    });
	});

	$("#to-date").change(function () {
    var startDate = document.getElementById("from-date").value;
    var endDate = document.getElementById("to-date").value;

    if ((Date.parse(startDate) >= Date.parse(endDate))) {
        alert("To date should be greater than From date");
        document.getElementById("to-date").value = "";
    }
});
</script>