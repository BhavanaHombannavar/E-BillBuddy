<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<?= $this->Html->meta('icon') ?>
	    <?= $this->Html->css('custom/invoice.css') ?>
    </head>

    <body class="no-skin">
    	<?php echo $this->fetch('content'); ?>
    </body>
</html>