<h1><?php echo __("<u>Demo Payment</u>"); ?></h1>

<p><?php echo __('PayPal Express'); ?></p>
<p><?php //echo $this->Html->link('PayPal Express' , array('action' => 'express_checkout')); ?></p>

<?php
	echo $this->Html->image("https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif", 
		array(
			"alt" => "PayPal Express",
			'url' => array('controller' => 'payments', 'action' => 'express_checkout')
		)
	);
?>

<p><?php echo __('Direct Payment'); ?></p>
<p><?php //echo $this->Html->link('Direct Payment' , array('action' => 'charge_card')); ?></p>

<?php
	echo $this->Html->image("http://www.credit-card-logos.com/images/multiple_credit-card-logos-1/paypal_mc_visa_amex_disc_210x80.gif", 
		array(
			"alt" => "Direct Payment",
			'url' => array('controller' => 'payments', 'action' => 'charge_card')
		)
	);
?>
