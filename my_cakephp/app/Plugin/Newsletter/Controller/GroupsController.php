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
class GroupsController extends NewsletterAppController {
  var $name = 'Groups';
  var $uses = array('Newsletter.Group', 'Newsletter.GroupSubscription');
  var $helpers = array('Time');
  var $components = array('Session', 'RequestHandler');
  var $layout;
  var $paginate = array(
    'Group' => array(
	    'limit' => 40,
	    'order' => array('Group.name' => 'asc')
	  ),
	  'GroupSubscription' => array(
	    'limit' => 40,
	    'order' => array('Subscription.email' => 'asc')
	  )
  );
  
 function beforeFilter() {
    parent::beforeFilter();
	parent::checkAdminLogin();
    #$this->Auth->allow('');
  }
  
  #Admin
  
  function admin_index() {
	  $this->layout = "admin";
	  $this->set('groups',$this->paginate('Group'));
  }
  
  function admin_list_subscriptions($id) {
	$this->layout = "admin";  
    $subcriptions = $this->paginate('GroupSubscription', array('GroupSubscription.newsletter_group_id' => $id, 'Subscription.id <>' => null));
    $this->set('subscriptions', $subcriptions);
    $this->set('group', $this->Group->read(null, $id)); 
  }
  
  function admin_add() {
	  $this->layout = "admin";
      if(!empty($this->data)) {
          $this->Group->set($this->data);
          if($this->Group->save()) {
			  $this->Session->setFlash('Group successfully added','message',array('class' => 'success','position' => 'top'));
              $this->redirect(array('action' => 'index'));
          }
      }
  }

  function admin_edit($id = null) {
	  $this->layout = "admin";
      if(!$id) {
          $this->Session->setFlash('Invalid group id','message',array('class' => 'error','position' => 'top'));
		  
          $this->redirect(array('action' => 'index'));
      }
      
      if( empty($this->data) ) {
          $this->data = $this->Group->read(null, $id);
      } else {
          $this->Group->set($this->data);
          if( $this->Group->save() ) {
              $this->Session->setFlash('Group successfully saved','message',array('class' => 'success','position' => 'top'));
			  $this->redirect(array('action' => 'index'));
          }
		  
      }
	  
	  
  }

  function admin_delete($id) {
    $this->autoRender = false;
    
    if($this->Group->delete($id)) {
        $this->Session->setFlash('Group deleted','message',array('class' => 'success','position' => 'top'));
    } else {
        $this->Session->setFlash('Deleting failed','message',array('class' => 'error','position' => 'top'));
    }
    $this->redirect(array('action' => 'index'));
  }
  
}
?>
