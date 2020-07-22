<?php
// $class = 'message';
// if (!empty($params['class'])) {
//     $class .= ' ' . $params['class'];
// }
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-info" onclick="this.classList.add('hidden')"><?= $message ?>
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
</div>