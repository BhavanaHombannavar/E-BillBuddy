<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Billbuddy
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.css') ?>
        <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <?= $this->Html->css('assets/css/fonts.googleapis.com.css') ?>

        <!-- ace styles -->
        <?= $this->Html->css('assets/css/ace.min.css') ?>

        <!--[if lte IE 9]>
            <?= $this->Html->css('assets/css/ace-part2.min.css') ?>
        <![endif]-->
        <?= $this->Html->css('assets/css/ace-skins.min.css') ?>
        <?= $this->Html->css('assets/css/ace-rtl.min.css') ?>

        <!--[if lte IE 9]>
          <?= $this->Html->css('assets/css/ace-ie.min.css') ?>
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <?= $this->Html->script('ace-extra.min.js') ?>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <?= $this->Html->script('html5shiv.min.js') ?>
        <?= $this->Html->script('respond.min.js') ?>
        <![endif]-->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!--[if !IE]> -->
        <?= $this->Html->script('jquery-2.1.4.min.js') ?>

        <!-- <![endif]-->

        <!--[if IE]>
<?= $this->Html->script('jquery-1.11.3.min.js') ?>
<![endif]-->
    <?= $this->Html->script('bootstrap.min.js') ?>

        <!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
          <?= $this->Html->script('excanvas.min.js') ?>
        <![endif]-->
        <?= $this->Html->script('jquery-ui.custom.min.js') ?>
        <?= $this->Html->script('jquery.ui.touch-punch.min.js') ?>
        
        <!-- ace scripts -->
        <?= $this->Html->script('ace-elements.min.js') ?>
        <?= $this->Html->script('ace.min.js') ?>
</head>
<body>
    
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
