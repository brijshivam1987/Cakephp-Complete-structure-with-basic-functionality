<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Error');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <?php
			echo $this->Html->meta('icon');
			echo $this->fetch('meta');
			echo $this->Html->css('error/pageNotFound');
			echo $this->fetch('css');
			//echo $this->fetch('script');
		?>
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="http://www.magentocommerce.com/magento-connect/media/css/467dcd9b068f051dd048da95514f4947.css?v=108" media="all" />
        <![endif]-->
        <!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="http://www.magentocommerce.com/magento-connect/media/css/1e4bb5d232d68447c60e6ee20b2307ca.css?v=108" media="all" />
        <![endif]-->
        <!--[if IE 9]>
        <link rel="stylesheet" type="text/css" href="http://www.magentocommerce.com/magento-connect/media/css/8ea70d068a1d679f4e35173d5b0718f4.css?v=108" media="all" />
        <![endif]-->
    </head>
    <body class=" cms-index-noroute cms-connect-404 layout-col1">
        <nav id="global-nav">
            <div class="g-align">
                
            </div>
        </nav>
        <div id="g-body" class="g-align clearfix">
          <div id="g-content">
            <div class="std">
              <div class="page-error">
                  <div class="page-error-text">
                      <h1 class="page-error-title">Page not found <i>(404)</i></h1>
                      <p class="page-error-description">
                            <?php echo $this->Session->flash(); ?>
    						<?php echo $this->fetch('content'); ?>
    						<?php echo $this->element('sql_dump'); ?>
                      </p>
                  </div>
                  <span class="page-error-code">404</span>
                  <button class="ui-button ui-button-back" onclick="history.back(); return false;" title="Take Me Back"><span class="icon"></span>Take Me Back</button>
              </div>
            </div>
          </div>
        </div>
        <footer id="footer" class="g-align">
            <div class="footer-wrapper">
                <strong>Copyright © 2013, All rights reserved.</strong>
                <ul>
                <li><a href="" title="Home"> Magento Home</a><span class="pipe">|</span></li>
                <li> <a href="privacy" title="Privacy Policy">Privacy Policy</a>
                <span class="pipe">|</span></li>
                <li><a href="terms" title="Terms of Service"> Terms of Service</a></li>
                </ul>
            </div>
        </footer>
    </body>
</html>