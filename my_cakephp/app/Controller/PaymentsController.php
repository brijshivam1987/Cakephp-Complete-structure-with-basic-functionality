<?php
/**
* Example usuage of Paypal Component
*
*/
App::uses('AppController', 'Controller');

class PaymentsController extends AppController {

	// Include the Payapl component
	public $components = array('Paypal');
  
	public $uses = array('PaypalECPCustomerdetail','PaypalECPResponse','PaypalDPResponse');
	var $layout;
	// Example usuage
	public function index() {
		parent::checkUserLogin();
		$this->layout = 'front';
	}
	
	// Set the values and begin paypal process
  	public function express_checkout() {
		try{
			$this->Paypal->amount = 10.00;
			$this->Paypal->currencyCode = 'USD';	
			$this->Paypal->returnUrl = Router::url(array('action' => 'get_details'), true);
			$this->Paypal->cancelUrl = Router::url($this->here, true);
			$this->Paypal->orderDesc = 'A description of the thing someone is about to buy';
			$this->Paypal->itemName = 'Swedish penis enlargement kit';
			$this->Paypal->quantity = 1;
			$this->Paypal->expressCheckout();
		} catch(Exception $e) {
			$this->Session->setFlash($e->getMessage());
			return $this->redirect('index');
		}
  	}
  

	// Use the token in the return URL to fetch details
  	public function get_details() {
		try {
			$this->autoRender = false;

			// Token and PayerID will be present in URL
			$this->Paypal->token = $this->request->query['token'];
			$this->Paypal->payerId = $this->request->query['PayerID'];

			// At this point, you can let the customer review their order.
			// Use the "getExpressCheckoutDetails" method to fetch details...
			$customer_details = $this->Paypal->getExpressCheckoutDetails();
			$customer_details['created_date'] = date('Y-m-d H:i:s');
			//debug($customer_details);
			
			//Save Paypal Express Checkout Customer details to our database (PaypalECPCustomerdetail)
			$this->PaypalECPCustomerdetail->create();
			$this->PaypalECPCustomerdetail->save($customer_details);
				

			// Then you must call "doExpressCheckoutPayment" to complete the payment
			$this->Paypal->amount = 10.00;
			$this->Paypal->currencyCode = 'USD';
			$response = $this->Paypal->doExpressCheckoutPayment(); 
			$response['created_date'] = date('Y-m-d H:i:s');
			//debug($response);
			
			//Save Paypal Express Checkout Responce to our database (PaypalECPResponse)
			$this->PaypalECPResponse->create();
			$this->PaypalECPResponse->save($response);
			
			$this->Session->setFlash(__('The Payment process successfully completed'));
			$this->redirect(array('action' => 'index'));
			
    		} catch(Exception $e) {
			$this->Session->setFlash($e->getMessage());
			return $this->redirect(array('action' => 'index'));
		}
  	}

  	
  	// Do a direct credit card payment (compsetting)(mystoresetting)
  	public function charge_card() {
		try {
  			$this->autoRender = false;
	  		$this->Paypal->amount = 6.54;
			$this->Paypal->currencyCode = 'GBP';	
			$this->Paypal->creditCardNumber = '4787193385749464'; // Paypal sandbox CC (4008068706418697) (4787193385749464)
			$this->Paypal->creditCardCvv = ''; // (123)()
			$this->Paypal->creditCardExpires = '042018'; //(012020)(042018)
			$this->Paypal->creditCardType = 'Visa'; // (Visa)(Visa)
			$result = $this->Paypal->doDirectPayment();
			$result['created_date'] = date('Y-m-d H:i:s');
			//debug($result);
			
			//Save Paypal Direct Payment responce in database Table (PaypalDPResponse)
			$this->PaypalDPResponse->create();
			$this->PaypalDPResponse->save($result);
			
			$this->Session->setFlash(__('The Payment process successfully completed'));
			$this->redirect(array('action' => 'index'));
			
  		} catch(Exception $e) {
			$this->Session->setFlash($e->getMessage());
			return $this->redirect(array('action' => 'index'));
		}
  	}
	
	public function admin_index() {
		parent::checkAdminLogin();
		$this->layout = "admin";
		$this->set("PaypalDPResponses",$this->PaypalDPResponse->find("all"));
	}
	public function admin_PaypalECPResponse() {
		parent::checkAdminLogin();
		$this->layout = "admin";
		$this->set("PaypalECPResponses",$this->PaypalECPResponse->find("all"));
	}
	public function admin_PaypalECPCustomerdetail() {
		parent::checkAdminLogin();
		$this->layout = "admin";
		$this->set("PaypalECPCustomerdetails",$this->PaypalECPCustomerdetail->find("all"));
	}

}
