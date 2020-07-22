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
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Dashboard</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?= $this->Html->meta('icon') ?>

   <!-- bootstrap & fontawesome -->
        
        <?= $this->Html->css('assets/css/bootstrap.min.css') ?>
        <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>

        <!-- page specific plugin styles -->

        <!-- text fonts 
        <?= $this->Html->css('assets/css/fonts.googleapis.com.css') ?>-->

        <!-- ace styles -->
        <?= $this->Html->css('assets/css/ace.min.css') ?>

        <!--[if lte IE 9]>
            <?= $this->Html->css('assets/css/ace-part2.min.css') ?>
        <![endif]-->
        <?= $this->Html->css('assets/css/ace-skins.min.css') ?>
        <?= $this->Html->css('assets/css/jquery-ui.min.css') ?>
        <?= $this->Html->css('assets/css/chosen.min.css') ?>

        <!--[if lte IE 9]>
          <?= $this->Html->css('assets/css/ace-ie.min.css') ?>
        <![endif]-->

        <?= $this->Html->css('custom/styles.css') ?>

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
        <?= $this->Html->script('jquery-ui.min.js') ?>
        <?= $this->Html->script('jquery.ui.touch-punch.min.js') ?>
        <?= $this->Html->script('chosen.jquery.min.js') ?>
        
        <!-- ace scripts -->
        <?= $this->Html->script('ace-elements.min.js') ?>
        <?= $this->Html->script('ace.min.js') ?>

        <script type="text/javascript">
            var baseUrl = <?= $this->request->webroot ?>;
        </script>
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left col-md-2">
                    <a href="index.html" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            BillBuddy
                        </small>
                    </a>
                </div>

                <nav class="navbar-menu pull-left" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?= $this->request->webroot ?>orders/quick-order">
                                <i class="ace-icon fa fa-plus"></i>
                                <?= __('New Order') ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->request->webroot ?>customers/add">
                                <i class="ace-icon fa fa-plus"></i>
                                <?= __('New Customer') ?>
                            </a>
                        </li>
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                Reports
                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="<?= $this->request->webroot ?>reports/sales-by-customer">
                                        <i class="ace-icon fa fa-user"></i>
                                        Sales By Customer
                                    </a>
                                </li>

                                 <li>
                                    <a href="<?= $this->request->webroot ?>reports/sales-by-date">
                                        <i class="ace-icon fa fa-calendar"></i>
                                        Sales By Date
                                    </a>
                                </li>

                               <!-- <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-key"></i>
                                        Sales By Something else
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">

                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?= $this->request->webroot ?>img/avatars/user.jpg" alt="<?php echo $this->request->session()->read('Auth.User.name'); ?>'s Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $this->request->session()->read('Auth.User.name'); ?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="<?= $this->request->webroot ?>settings">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= $this->request->webroot ?>users/edit/<?= $this->request->session()->read('Auth.User.id'); ?>">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= $this->request->webroot ?>users/change-password/">
                                        <i class="ace-icon fa fa-key"></i>
                                        Change Password
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="<?= $this->request->webroot ?>users/logout">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar responsive ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <ul class="nav nav-list">
                    
                    <li><?= $this->Html->link(__('Dashboard'), ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
                    <li><?= $this->Html->link(__('Products'), ['controller'=>'Products','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Orders'), ['controller'=>'Orders','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Customers'), ['controller'=>'Customers','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Tax Groups'), ['controller'=>'TaxGroups','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Tax Rules'), ['controller'=>'TaxRules','action' => 'index']) ?> </li>
                   <!--  <li><?= $this->Html->link(__('Payments'), ['controller'=>'Payments','action' => 'index']) ?> </li> -->

                    <!-- <li><?= $this->Html->link(__('Order Statuses'), ['controller'=>'OrderStatuses','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Payment Statuses'), ['controller'=>'PaymentStatuses','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Payment Methods'), ['controller'=>'PaymentMethods','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Addresses'), ['controller'=>'Addresses','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('Customer Types'), ['controller'=>'CustomerTypes','action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('States'), ['controller'=>'States','action' => 'index']) ?> </li> -->
                </ul><!-- /.nav-list -->
            </div>

            <div class="main-content">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder"></span>
                            Copyright &copy;  Math2Tech Solutions, Hubli. All rights reserved.
                        </span>

                        &nbsp; &nbsp;
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        
        
    </body>
</html>
