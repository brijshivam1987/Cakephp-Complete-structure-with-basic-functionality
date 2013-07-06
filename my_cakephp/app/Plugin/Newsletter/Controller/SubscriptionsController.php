<?php
/**
* Copyright (c) 2009, Fabio Kreusch
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
* @copyright            Copyright (c) 2009, Fabio Kreusch
* @link                 fabio.kreusch.com.br
* @license              http://www.opensource.org/licenses/mit-license.php The MIT License
*/

App::uses('CakeEmail','Network/Email');

class SubscriptionsController extends NewsletterAppController {
  var $name = 'Subscriptions';
  var $uses = array('Newsletter.Group', 'Newsletter.Subscription','Newsletter.GroupSubscription');
  var $helpers = array('Time');
  var $layout;
  var $paginate = array(
    'Subscription' => array(
	    'limit' => 40,
	    'order' => array('Subscription.email' => 'asc')
	  )
  );
  
 function beforeFilter() {
    parent::beforeFilter();
    #$this->Auth->allow('unsubscribe', 'subscribe', 'confirm_subscription');
  }
  
  #Public
  
  function unsubscribe() {
	$this->layout = "front";  
    if($this->isNotEmpty('Subscription.email')) {
      $subscribed = $this->Subscription->find('first', array('conditions' => array('email' => $this->data['Subscription']['email'], 'opt_out_date' => null)));
      if($subscribed) {
        $this->Subscription->id = $subscribed['Subscription']['id'];
        $this->Subscription->saveField('opt_out_date', date('Y-m-d H:i:s'));
        
        #send email
        /*$subscription = $this->Subscription->read(); 
        
        $name 		= $subscription['Subscription']['name'];
		$link 		= "<a href='".BASE_URL."/newsletter/subscriptions/subscribe'>click here</a>";
		
		$mailContent= "Hello '".$name."',<br /> You are successfully unsubscribed from our website";
		
		$email 		= $subscription['Subscription']['email'];
		
		$CakeEmail  = new CakeEmail();
		
		$CakeEmail->emailFormat('html');
		$CakeEmail->to($email);
		$CakeEmail->from("rlogicaltestmail1@gmail.com");
		$CakeEmail->subject("Newsletter unsubscribe");
		if($CakeEmail->send($mailContent)){
			$this->Session->setFlash("A confirmation message was sent to your email",'message',array('class' => 'success','position' => 'top'));
		}*/
		
			//remove below line when open above comment
		$this->Session->setFlash('successfully unsubscribed','message',array('class' => 'success','position' => 'top'));
      } else {
        $message = Configure::read('Newsletter.unsubscribe_not_found_site_message');
        if(!$message) {
			$this->Session->setFlash('Email not in subscription list','message',array('class' => 'error','position' => 'top'));
		}
        
      }
    }
  }
  
  function subscribe() {
	
	$this->layout= 'front';  
    
	if(!empty($this->data) && $this->isNotEmpty('Subscription.email')) {
      $subscribed = $this->Subscription->findByEmail($this->data['Subscription']['email']);
      
	  #if the email isn't yet registered or if it already exists but is into opt_out or it's waiting for confirmation, 
      #save and set the user confirmation code and send email, otherwise tell the user he already is opt_in
      if(empty($subscribed) || 
        !empty($subscribed['Subscription']['opt_out_date']) ||
        !empty($subscribed['Subscription']['confirmation_code'])
      ) {
        $confirmation_code = md5(date('Y-m-d H:i:s').$this->data['Subscription']['name'].$this->data['Subscription']['email']);
        
        if(!empty($subscribed)) {
          $this->data['Subscription']['id'] = $subscribed['Subscription']['id'];
        }

		if(empty($subscribed)) {
			$sub['Subscription']['name'] = $this->data['Subscription']['name'];
			$sub['Subscription']['email'] = $this->data['Subscription']['email'];
			$sub['Subscription']['confirmation_code'] = $confirmation_code;
			$sub['Subscription']['created'] = DATE_TIME;
			
			$this->Subscription->create();
			$this->Subscription->save($sub);
		}else{
			$this->Subscription->read(null,$subscribed['Subscription']['id']);
			$this->Subscription->set(array(
					'opt_out_date' 		=> null,
					'confirmation_code' => $confirmation_code
				)
			);
			$this->Subscription->save();
		}
        #adds subscription to default site_group
        $site_group = Configure::read('Newsletter.siteGroup');
		if(!$site_group){
			$site_group = 1;
		}
		$GroupSubscription['GroupSubscription']['newsletter_subscription_id'] = $this->Subscription->id;
		$GroupSubscription['GroupSubscription']['newsletter_group_id'] = $site_group;
		$this->GroupSubscription->create();
		$this->GroupSubscription->save($GroupSubscription);
        
        #send confirmation email
		/*$name = $this->data['Subscription']['name'];
		$mailContent ="
			Hello ".$name.",<br />Please click on link to confirm your subscription <br />
			<a href='".BASE_URL."/newsletter/subscriptions/confirm_subscription/".$confirmation_code."'>click here</a>";
		
		$email = $this->data['Subscription']['email'];
		$CakeEmail    = new CakeEmail();
		
		$CakeEmail->emailFormat('html');
		$CakeEmail->to($email);
		$CakeEmail->from("rlogicaltestmail1@gmail.com");
		$CakeEmail->subject("Newsletter confirmation");
		if($CakeEmail->send($mailContent)){
			$this->Session->setFlash("A confirmation message was sent to your email",'message',array('class' => 'success','position' => 'top'));
			$this->redirect(array('action' => 'subscribe'));
		}*/
		
			//remove  2 line when above comments open
		$this->Session->setFlash('successfully subscribed','message',array('class' => 'success','position' => 'top'));
		$this->redirect(array('action' => 'subscribe'));
	  	
      } else {
        $message = Configure::read('Newsletter.subscribe_already_in_list');
        if(!$message) {
			$this->Session->setFlash("The requested email is already into the list",'message',array('class' => 'error','position' => 'top'));
			$this->redirect(array('action' => 'subscribe'));
		}
      }
    }
  }
  
  function confirm_subscription($id) {
    $subscribed = $this->Subscription->findByConfirmationCode($id);
    
    if(!empty($id) && !empty($subscribed)) {
      $this->Subscription->set($subscribed);
      $this->Subscription->saveField('opt_out_date', null);
      $this->Subscription->saveField('confirmation_code', null);
      
      $this->set('subscribed', $subscribed);
      
      $message = Configure::read('Newsletter.subscribe_confirmation');
      if(!$message) {$message = __('Subscription confirmed','message',array('class' => 'success','position' => 'top'));}
      $this->Session->setFlash($message);
    } else {
      $message = Configure::read('Newsletter.subscribe_confirmation_invalid');
      if(!$message) {$message = __('Invalid confirmation code','message',array('class' => 'error','position' => 'top'));}
      $this->Session->setFlash($message);
    }
  } 
  
  #Admin
  
  function admin_index() {
	parent::checkAdminLogin();  
	$this->layout = "admin";  
    $conditions = null;
  
    if($this->isNotEmpty('Filter.value')) {
      $filter = $this->data['Filter']['value'];
      $conditions = array('OR' => array(
				'Subscription.name LIKE' => '%'.$filter.'%',
				'Subscription.email LIKE' => '%'.$filter.'%',
				)
			);
    }
	  $this->set('subscriptions',$this->paginate('Subscription', $conditions));
	  $this->set('groups', $this->Group->find('list'));
	  $this->set('siteGroup', Configure::read('Newsletter.siteGroup'));
  }
  
  function admin_add() {
	  parent::checkAdminLogin();
	  $this->layout = "admin";
      if(!empty($this->data)) {
          $this->Subscription->set($this->data);
          if($this->Subscription->save()) {
			  $this->Session->setFlash('Subscription successfully added','message',array('class' => 'success','position' => 'top'));
              $this->redirect(array('action' => 'index'));
          }
      }
      
      $this->set('siteGroup', Configure::read('Newsletter.siteGroup'));
      $this->set('groups', $this->Group->find('list'));
  }

  function admin_edit($id = null) {
	  parent::checkAdminLogin();
	  $this->layout = "admin";
      if(!$id) {
		  $this->Session->setFlash('Invalid subscription id','message',array('class' => 'error','position' => 'top'));
          $this->redirect(array('action' => 'index'));
      }
      
      if( empty($this->data) ) {
          $this->data = $this->Subscription->read(null, $id);
      } else {
          $this->Subscription->set($this->data);
          if( $this->Subscription->save() ) {
			  $this->Session->setFlash('Subscription successfully saved','message',array('class' => 'success','position' => 'top'));
          }
      }
      
      $this->set('groups', $this->Group->find('list'));
  }

  function admin_delete($id) {
	parent::checkAdminLogin();  
    $this->autoRender = false;
    
    if($this->Subscription->delete($id)) {
		$this->Session->setFlash('Subscription deleted','message',array('class' => 'success','position' => 'top'));
    } else {
		$this->Session->setFlash('Deleting failed','message',array('class' => 'error','position' => 'top'));
		
    }
    $this->redirect(array('action' => 'index'));
  }
  
  # TODO tratement for if the admin is in a paginate specific page
  function admin_invert_opt_out($id) {
	parent::checkAdminLogin();  
    $this->Subscription->id = $id;
    $subscribed = $this->Subscription->read();
    
    if($subscribed['Subscription']['opt_out_date']) {
      $this->Subscription->saveField('opt_out_date', null);
    } else {
      $this->Subscription->saveField('opt_out_date', date('Y-m-d H:i:s'));
    }
    
    $subscribed = $this->Subscription->read();
    $this->layout = 'clean';
    $this->set('subscription', $subscribed);
  }
  
  function admin_import_csv() {
	parent::checkAdminLogin();  
	$this->layout = "admin";  
    if (!empty($this->data) && is_uploaded_file($this->data['Subscription']['csv']['tmp_name'])) {
	    set_time_limit(0);
	    
	    $lines = $this->readUploadedCSV($this->data['Subscription']['csv']['tmp_name']);
		  $errors = array();
		  $data = array();

		  foreach($lines as $number => $line) {
			  $error = $this->validateCSVLine($line, ($number+1));
			  if(count($error)>0) {
				  $errors = array_merge($errors, $error);
			  } else {
			    if(!array_key_exists(1, $line)) {
			      $line[1] = '';
			    }
			    array_push($data, $line);
			  }
		  }
		  $this->Subscription->importCsv($data, $this->data['Group']['Group']);
		  $this->set('errors', $errors);
		  
		  if(!empty($errors)) {
		    $message = "<ul>";
		    foreach ($errors as $error) {
		      $message .= "<li>$error</li>";        
		    }
		    $message .= "</ul>";
		    $message = __('Data imported, but there where the following errors: ', true).$message;
		  } else {
		    $message = __('Data imported', true);
		  }
		  $this->Session->setFlash($message,'message',array('class' => 'information','position' => 'top'));
      $this->redirect(array('action' => 'index'));
	  } else {
	    $this->Session->setFlash(__('No data to import', true,'message',array('class' => 'information','position' => 'top')));
	    $this->redirect(array('action' => 'index'));
	  }
  }
  
  /**
  * Reads a CSV file and returns a list with each line.
  * @param $tmp_name The CSV path.
  * @return An array with each line.
  * @access private
  **/
  function readUploadedCSV($tmp_name) {
	  $lines = array();

	  ini_set('auto_detect_line_endings',1);
	  $handle = fopen($tmp_name, "r");
	  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		  array_push($lines,$data);			 
	  }
	  return $lines;
  }
  
  /**
  * Validates a csv line, verifying if it has a valid email.
  * @param $list A csv array as returned by _read_uploaded_csv().
  * @return Array with errors, if any. False otherwise.
  * @access true
  **/
  function validateCSVLine($line, $line_number) {
	  $errors = array();

	  if(!is_array($line)) {
		  array_push($errors,'Invalid line');			 
	  }

	  if($line[0] == null || $line[0] == '') {
		  array_push($errors, "Error in line $line_number: blank email");
	  } 
	  return $errors;
  }
}
?>
