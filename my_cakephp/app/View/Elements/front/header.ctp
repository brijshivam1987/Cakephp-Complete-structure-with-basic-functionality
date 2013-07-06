<div class="top_info">
	<div class="top_info_right">
    	<?php if($this->Session->check('User') == false):  ?>
		<p><b>You are not Logged in!</b> <a href="javascript:void(0);" onClick="vpb_show_login_box();">Log in</a> to check your messages.<br />
        Do you want to <a href="javascript:void(0);" onClick="vpb_show_login_box();">Log in</a> or <a href="javascript:void(0);" onClick="vpb_show_sign_up_box();">register</a>?</p>
        <?php else: ?>
        <p>
        	<p>
            	<img style="margin-bottom:-7px;" src="<?php echo BASE_URL; ?>/img/front/new-messages-red.png" height="20" width="20" />
            	<a href="#" style="padding-left:2px;">Messages</a> (5)
            </p>
        	<b>Welcome, </b><?php print_r($this->Session->read('User.username')); ?>
            &nbsp;&nbsp;&nbsp; 
            <a href="<?php echo BASE_URL; ?>/logins/user_logout">Log out</a>
        </p>
        <?php endif; ?>
	</div>		
	<div class="top_info_left">
		<p><b><?php echo date('j. M, Y'); ?></b> - <?php echo date('l'); ?><br />
		Check todays <a href="#">hot topics</a> or <a href="#">new products</a></p>
	</div>
</div>
<div class="logo">
	<h1><a href="<?php echo BASE_URL; ?>" title="Campany Name"><span class="dark">Company</span>Name</a></h1>
</div>