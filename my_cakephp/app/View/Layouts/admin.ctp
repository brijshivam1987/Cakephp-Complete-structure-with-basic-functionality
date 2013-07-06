<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CompanyName:');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
    <meta name="author" content="BrijeshPatel">
	<?php
		echo $this->Html->meta('icon');
		
			//Admin Theme CSS
		echo $this->Html->css('admin/theme/bootstrap-united');
        	//common css
		echo $this->Html->css('common/jquery.noty');
		echo $this->Html->css('common/noty_theme_default');
		echo $this->Html->css('common/bvalidator');
		echo $this->Html->css('common/bvalidator_themes/bvalidator.theme.red');
			
		echo $this->Html->css('admin/bootstrap-responsive');
		echo $this->Html->css('admin/charisma-app');
		echo $this->Html->css('admin/jquery-ui-1.8.21.custom');
		echo $this->Html->css('admin/fullcalendar','stylesheet');
		echo $this->Html->css('admin/fullcalendar.print', array('media' => 'print'));
		echo $this->Html->css('admin/chosen');
		echo $this->Html->css('admin/uniform.default');
		echo $this->Html->css('admin/colorbox');
		echo $this->Html->css('admin/jquery.cleditor');
		echo $this->Html->css('admin/elfinder.min');
		echo $this->Html->css('admin/elfinder.theme');
		echo $this->Html->css('admin/jquery.iphone.toggle');
		echo $this->Html->css('admin/opa-icons');
		echo $this->Html->css('admin/uploadify');

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
    <!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <?php
    	//Jquery
		echo $this->Html->script('admin/jquery-1.7.2.min');
			
			//common js 
    	echo $this->Html->script('common/jquery.noty');
		echo $this->Html->script('common/jquery.bvalidator');
		
		echo $this->Html->script('admin/jquery-ui-1.8.21.custom.min');
		echo $this->Html->script('admin/bootstrap-transition');
		echo $this->Html->script('admin/bootstrap-alert');
		echo $this->Html->script('admin/bootstrap-modal');
		echo $this->Html->script('admin/bootstrap-dropdown');
		echo $this->Html->script('admin/bootstrap-scrollspy');
		echo $this->Html->script('admin/bootstrap-tab');
		echo $this->Html->script('admin/bootstrap-tooltip');
		echo $this->Html->script('admin/bootstrap-popover');
		echo $this->Html->script('admin/bootstrap-button');
		echo $this->Html->script('admin/bootstrap-collapse');
		echo $this->Html->script('admin/bootstrap-carousel');
		echo $this->Html->script('admin/bootstrap-typeahead');
		echo $this->Html->script('admin/bootstrap-tour');
		echo $this->Html->script('admin/jquery.cookie');
		echo $this->Html->script('admin/fullcalendar.min');
		echo $this->Html->script('admin/jquery.dataTables.min');
		echo $this->Html->script('admin/excanvas');
		echo $this->Html->script('admin/jquery.flot.min');
		echo $this->Html->script('admin/jquery.chosen.min');
		echo $this->Html->script('admin/jquery.uniform.min');
		echo $this->Html->script('admin/jquery.colorbox.min');
		echo $this->Html->script('admin/jquery.cleditor.min');
		echo $this->Html->script('admin/jquery.flot.pie.min');
		echo $this->Html->script('admin/jquery.flot.stack');
		echo $this->Html->script('admin/jquery.flot.resize.min');
		echo $this->Html->script('admin/jquery.elfinder.min');
		echo $this->Html->script('admin/jquery.raty.min');
		echo $this->Html->script('admin/jquery.iphone.toggle');
		echo $this->Html->script('admin/jquery.autogrow-textarea');
		echo $this->Html->script('admin/jquery.uploadify-3.1.min');
		echo $this->Html->script('admin/jquery.history');
		echo $this->Html->script('admin/charisma');
		
		echo $this->fetch('script');
    ?>
    <style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
    <!-- Below javascript code used for bValidation theme selection -->
	<script type="text/javascript">   
	var optionsRed = {
        classNamePrefix: 'bvalidator_red_'
    };
    </script>
</head>
<body>
    <!-- topbar starts -->
        <?php echo $this->element('admin/top'); ?>
    <!-- topbar ends -->
    <div class="container-fluid">
        <div class="row-fluid">
            <!-- left menu starts -->
                <?php echo $this->element('admin/left');?>
                <!--/span--> 
            <!-- left menu ends -->
            <noscript>
                <div class="alert alert-block span10">
                  <h4 class="alert-heading">Warning!</h4>
                  <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
            </noscript>
            <!-- content starts -->
            <div id="content" class="span10">
            	<div>
                	<ul class="breadcrumb">
                        <li> <a href="<?php echo ADMIN_URL; ?>">Home</a> <span class="divider">/</span> </li>
                        <li> <a href="#"><?php echo ucfirst( $this->params['controller'] ); ?></a>
                        	 <span class="divider">/</span> 
                        </li>
                        <li> <a href="#"><?php echo ucfirst( substr($this->params['action'],6) ); ?></a></li>
                  	</ul>
                </div> 
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            <!-- content ends --> 
            </div><!--/#content.span10--> 
        </div>    
        <hr>
        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
        </div>
        <footer>
        <!-- Footer -->
            <?php echo $this->element('admin/footer');?>
        <!-- /Footer -->
        </footer>
    </div><!--/.fluid-container-->    
</body>
</html>
