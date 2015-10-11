<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('lavish-bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
	
    <?= $this->Html->script('jquery-2.1.4.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	
</head>
<body>
    <nav class="navbar navbar-inverse" data-topbar role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Walk Me</a>
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#mynav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="nav navbar-nav">
                    <li class="<?= $this->fetch('title') == "Pages" || $this->fetch('title') == "Maps" ? 'active' : '' ?>"><a href="/WalkMe"><span class="fa fa-home"></span> Home</a></li>
                    <li class="<?= $this->fetch('title') == "About" ? 'active' : '' ?>"><a href="/WalkMe/About"><span class="fa fa-question-circle"></span> About</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?= $userId ? "": '<li><a href="/WalkMe/users/add"><span class="fa fa-user-plus"></span> Register</a></li>'?>
				    <li class="<?= $this->fetch('title') == "Login" ? 'active' : '' ?>"><a href="<?=$userId? "/WalkMe/users/logout" : "/WalkMe/users/login"?>" >
 <?=$userId ? '<span class="fa fa-sign-out"></span> Logout' :'<span class="fa fa-sign-in"></span> Login' ?></a></li>
				</ul>  
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?= $this->Flash->render() ?>
    <section class="container-fluid clearfix main">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
</body>
</html>
