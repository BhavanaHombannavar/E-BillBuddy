<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
	$message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');"><?= $message ?>
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
</div>



<style>
.error-message {
background-color:#a90329;
color:#fff;
}
</style>