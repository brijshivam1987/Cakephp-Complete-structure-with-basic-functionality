<?php
/*
  Frint End Layout Design Structure
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="BrijeshPatel">
    <?php echo $this->Html->meta('icon'); ?>
    <?php echo $this->fetch('meta'); ?>
	<?php echo $this->Html->charset('UTF-8')?>
    
    <?php 
		echo $this->Html->css('front/cake.forms', 'stylesheet', array("media"=>"all" )); 
    	echo $this->Html->css('front/style', 'stylesheet', array("media"=>"all" )); 
			//common css
		echo $this->Html->css('common/jquery.noty');
		echo $this->Html->css('common/noty_theme_default');
		echo $this->Html->css('common/bvalidator');
		echo $this->Html->css('common/bvalidator_themes/bvalidator.theme.red');
			//fancySignup css 
    	echo $this->Html->css('front/fancy_signup/style');
	?>
    
    <?php echo $this->fetch('css'); ?>
   
    <?php 
		echo $this->Html->script('jquery-1.10.2'); 
    	echo $this->Html->script('jquery-1.10.2.min');
			//common js 
    	echo $this->Html->script('common/jquery.noty');
		echo $this->Html->script('common/jquery.bvalidator');
			//fancySignup js 
    	echo $this->Html->script('front/fancy_signup/vpb_script');
    ?>
    
    <?php echo $this->fetch('script'); ?>
	<title>CakePHP : The PHP Rapid Development Framework :: <?php echo $title_for_layout; ?></title>
    <style>
		#social_sidebar {
		  background-color:transparent;
		  float: left; /* float right for a right aligned sidebar */
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
	<div class="content">
    	<div class="header">
			<?php echo $this->element('front/header'); ?>
		</div>
		<div class="bar">
        	<?php echo $this->element('front/menu'); ?>
		</div>
        <div class="search_field_s">
			<form method="post" action="search">
				<div class="search_form_s">
                    <p>
                        Search the Web: <input type="text" name="search" class="search_s" />
                        <input type="submit" value="Search" class="submit_s" />
                        <a class="grey" id="advanceSearch" href="#">Advanced</a>
                    </p>
                </div>
            </form>
            <ul class="breadcrumb">
                <li> <a href="<?php echo BASE_URL; ?>">Home</a> <span class="divider">/</span> </li>
                <li> <a href="#"><?php echo ucfirst( $this->params['controller'] ); ?></a>
                     <span class="divider">/</span> 
                </li>
                <li> <a href="#"><?php echo ucfirst($this->params['action']); ?></a></li>
            </ul>
		</div>
		<div id="social_sidebar">
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_floating_style addthis_counter_style" style="right:1%;top:30%;">
            <a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
            <a class="addthis_button_tweet" tw:count="vertical"></a>
            <a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
            <a class="addthis_counter"></a>
            </div>
            <!--<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>-->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5195bd2f66af57c8">
            </script>
            <!-- AddThis Button END -->
  		</div>
		<div class="left" id="left">
			<?php echo $this->Session->flash(); ?>
            <?php echo $content_for_layout; ?>
		</div>	
		<div class="right">
        	<?php echo $this->element('front/right'); ?>
		</div>	
		<div class="footer" id="footer">
			<?php echo $this->element('front/footer'); ?>	
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>