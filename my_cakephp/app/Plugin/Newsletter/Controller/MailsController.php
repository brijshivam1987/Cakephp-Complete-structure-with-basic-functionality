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
class MailsController extends NewsletterAppController {
  var $name = 'Mails';
  var $uses = array('Newsletter.Mail', 'Newsletter.MailView', 'Newsletter.Group', 'Newsletter.GroupSubscription');
  var $helpers = array('Time');
  var $layout;
  var $paginate = array(
    'Mail' => array(
	    'limit' => 40,
	    'order' => array('Mail.created' => 'desc')
	  )
  );
  
 function beforeFilter() {
    parent::beforeFilter();
	parent::checkAdminLogin();
    //$this->Auth->allow('read');
  }
  
  #Public
  function read($id) {
	$this->layout = "front";  
    $mail = $this->Mail->find('first', array('conditions' => array('read_confirmation_code' => $id)));
    if($mail) {
      $data = array('MailView' => array(
        'newsletter_mail_id' => $mail['Mail']['id'],
        'ip' => $this->RequestHandler->getClientIP(),
      ));
      $this->MailView->set($data);
      $this->MailView->save();
    }
    $this->redirect(Configure::read('Newsletter.emptyImagePath'));
  }
  
  #Admin
  
  function admin_index() {
	  $this->layout = "admin";
	  $this->set('mails', $this -> paginate('Mail'));
  }
  
  function admin_statistics($id) {
	$this->layout = "admin";  
    $mail = $this->Mail->read(null, $id);
    $count = $this->MailView->countViews($id);
    $countUnique = $this->MailView->countUniqueViews($id);
    
    $rest = $this->GroupSubscription->restingSubscriptions($id, array('count' => true));
    
    $this->set(compact('mail', 'count', 'countUnique', 'rest'));
  }
  
  function admin_show($id) {
	$this->layout = "admin";  
    $this->set('mail', $this->Mail->findById($id));
    $this->layout = 'clean';
  }
  
  function admin_add() {
	  
	  $this->layout = "admin";
	  if(!empty($this->data)) {
          $this->data['Mail']['read_confirmation_code'] = md5(date('Y-m-d H:i:s').$this->data['Mail']['subject']);
          $this->Mail->set($this->data);
          if($this->Mail->save()) {
              $this->Session->setFlash('Mail successfully added','message',array('class' => 'success','position' => 'top'));
              $this->redirect(array('action' => 'index'));
          }
      }
      $this->set('groups', $this->Group->find('list'));
  }

  function admin_edit($id = null) {
	  $this->layout = "admin";
      if(!$id) {
          $this->Session->setFlash('Invalid mail id','message',array('class' => 'error','position' => 'top'));
          $this->redirect(array('action' => 'index'));
      }
      
      if( empty($this->data) ) {
          $this->data = $this->Mail->read(null, $id);
      } else {
          $this->Mail->set($this->data);
          if( $this->Mail->save() ) {
              $this->Session->setFlash('Mail successfully saved','message',array('class' => 'success','position' => 'top'));
          }
      }
      $this->set('groups', $this->Group->find('list'));
  }

  function admin_delete($id) {
    $this->autoRender = false;
    
    if($this->Mail->delete($id)) {
        $this->Session->setFlash('Mail deleted','message',array('class' => 'success','position' => 'top'));
    } else {
        $this->Session->setFlash('Deleting failed','message',array('class' => 'error','position' => 'top'));
    }
    $this->redirect(array('action' => 'index'));
  }
  
  function admin_reset($mail_id) {
	 $this->layout = "admin"; 
    $mail = $this->Mail->read(null, $mail_id);
    
    $this->Mail->id = $mail['Mail']['id'];
    $this->Mail->saveField('last_sent_subscription_id', 0);
    $this->Mail->saveField('sent', 0);
    
    $this->Session->setFlash('Mail reseted','message',array('class' => 'success','position' => 'top'));
    $this->redirect(array('action' => 'index'));
  }
  
  function admin_send($id) {
	$this->layout = "admin";  
    $mail = $this->Mail->read(null, $id);
    $last_sent = $mail['Mail']['last_sent_subscription_id'];
  
    $limit = Configure::read('Newsletter.sendX'); #the number of emails to send
    if(!$limit) {$limit = 10;} #sets default value
      
    $interval = Configure::read('Newsletter.sendInterval'); #the interval time before send next batch
    if(!$interval) {$interval = 10;} #sets default value
      
    $rest = $this->GroupSubscription->restingSubscriptions($id, array('count' => true));
      
    $this->set('mail', $mail);   
    $this->set('sent', $mail['Mail']['sent']);  
    $this->set('limit', $limit);
    $this->set('interval', $interval);
    $this->set('rest', $rest);
  }
  
  /**
  * This action sends the next x emails for this mail.
  * @param $mail_id The Mail id. 
  **/
  function admin_send_mail($id) {
	$this->layout = "admin";  
    $this->layout = 'clean';
  
    $mail = $this->Mail->read(null, $id);
    $sent = $mail['Mail']['sent'];
    
    #find next subscriptions to send email
    $limit = Configure::read('Newsletter.sendX'); #the number of emails to send
    if(!$limit) {$limit = 10;} #sets default value
    
    $subscriptions = $this->GroupSubscription->restingSubscriptions($id, array('limit' => $limit));
    
    if(!empty($subscriptions)) {      
      $this->set('content', $mail['Mail']['content']);
      $this->set('readConfirmationCode', $mail['Mail']['read_confirmation_code']);
      $this->set('url', Configure::read('Newsletter.unsubscribe_url'));
      $this->sendEmail($mail['Mail']['subject'], 'mail', $this->extractEmailAndName($subscriptions), $mail['Mail']['from_email'], $mail['Mail']['from']);
      
      #updated 'last_sent_subscription_id' and 'sent'
      $last_element = end($subscriptions);
      $last_sent = $last_element['Subscription']['id'];
      $sent = ($mail['Mail']['sent'] + count($subscriptions));

      $this->Mail->id = $mail['Mail']['id'];
      $this->Mail->saveField('last_sent_subscription_id', $last_sent);
      $this->Mail->saveField('sent', $sent);
    }
    
    $rest = $this->GroupSubscription->restingSubscriptions($id, array('count' => true));
    
    $this->set('sent', $sent);  
    $this->set('limit', $limit);
    $this->set('rest', $rest); 
  }
  
  function extractEmailAndName($data) {
    $list = array();
    
    if(!empty($data)) { 
      foreach ($data as $key => $subscription) {
        $list[$subscription['Subscription']['email']] = $subscription['Subscription']['name'];
      }
    }
    return $list;
  }
  
}
?>
