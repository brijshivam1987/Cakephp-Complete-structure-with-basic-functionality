<?php
App::import('Model', 'Cakepager');

class PaypalDPResponse extends AppModel
{
	var $name = 'paypal_direct_payment_responses';
	var $primaryKey = 'id';	    	
}