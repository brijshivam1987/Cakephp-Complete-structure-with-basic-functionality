<?php
App::import('Controller', 'Newsletter.Subscriptions');

/**
* Controller mock class.
**/ 
class TestSubscriptionsController extends SubscriptionsController {
    var $name = 'Subscriptions';
    var $autoRender = false;
    var $sentEmail = 0;
 
    function redirect($url, $status = null, $exit = true) {
        $this->redirectUrl = $url;
    }
 
    function render($action = null, $layout = null, $file = null) {
        $this->renderedAction = $action;
    }
    
    #mock
    function sendEmail($subject, $view, $to=null, $from = null, $fromName = null) {
      $this->sentEmail = $this->sentEmail+1;
    }
    
    function paginate($object = null, $scope = array(), $whitelist = array()) {
      return $this->Subscription->find('all', array('conditions' => $scope));
    }
 
    function _stop($status = 0) {
        $this->stopped = $status;
    }
}
 
class SubscriptionsControllerTestCase extends CakeTestCase {

    var $fixtures = array('plugin.newsletter.groups_subscriptions', 'plugin.newsletter.group', 'plugin.newsletter.subscription');
 
    function startTest() {
      $this->Subscriptions = new TestSubscriptionsController();
      $this->Subscriptions->constructClasses();
      $this->Subscriptions->Component->initialize($this->Subscriptions);
    }
    
    function testAdminIndex() {
      Configure::write('Newsletter.siteGroup', 1);
    
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_index();
      
      $this->assertNotNull($this->Subscriptions->viewVars['subscriptions']);
      
      //with filter
      $this->Subscriptions->data = array('Filter' => array('value' => 'someone@subscribed.com')); 
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_index();
      
      $this->assertNotNull($this->Subscriptions->viewVars['subscriptions']);
      $this->assertEqual('1', $this->Subscriptions->viewVars['subscriptions'][0]['Subscription']['id']);
      $this->assertNotNull($this->Subscriptions->viewVars['groups']);
      $this->assertEqual(1, $this->Subscriptions->viewVars['siteGroup']);
    }
    
    function testAdminAdd() {
      Configure::write('Newsletter.siteGroup', 1);
      $this->Subscriptions->data = array(
        'Subscription' => array(
            'name' => 'Fake Subscription',
            'email' => 'fake@subscription.com',
        ),
      );
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_add();
      
      $this->assertNotNull($this->Subscriptions->viewVars['groups']);
    
      //assert the record was changed
      $result = $this->Subscriptions->Subscription->read(null, $this->Subscriptions->Subscription->id);
      $this->assertEqual($result['Subscription']['name'], 'Fake Subscription');
      $this->assertEqual($result['Subscription']['email'], 'fake@subscription.com');
      
      //assert that some sort of session flash was set.
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      $this->assertEqual($this->Subscriptions->redirectUrl, array('action' => 'index'));
      $this->assertEqual(1, $this->Subscriptions->viewVars['siteGroup']);
    }
    
    function testAdminEdit() {
      $this->Subscriptions->data = array(
        'Subscription' => array(
            'id' => 1,
            'name' => 'Fake Subscription',
            'email' => 'fake@subscription.com',
        ),
      );
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_edit();
      
      $this->assertNotNull($this->Subscriptions->viewVars['groups']);
    
      //assert the record was changed
      $result = $this->Subscriptions->Subscription->read(null, 1);
      $this->assertEqual($result['Subscription']['name'], 'Fake Subscription');
      $this->assertEqual($result['Subscription']['email'], 'fake@subscription.com');
    
      //assert that some sort of session flash was set.
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      $this->assertEqual($this->Subscriptions->redirectUrl, array('action' => 'index'));
      
      //test for edit without data
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_edit(1);
      
      $this->assertNotNull($this->Subscriptions->data);
    }
    
    function testAdminDelete() {
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_delete(1);
    
      //assert the record was changed
      $result = $this->Subscriptions->Subscription->read(null, 1);
      $this->assertFalse($result);
    
      //assert that some sort of session flash was set.
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      $this->assertEqual($this->Subscriptions->redirectUrl, array('action' => 'index'));
    }
    
    function testInvertOptOut() {
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_invert_opt_out(1);
      
      //assert the record was changed
      $result = $this->Subscriptions->Subscription->read(null, 1); //not into opt_out
      $this->assertNotNull($result['Subscription']['opt_out_date']);
      
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->admin_invert_opt_out(5);
      
      $this->assertNotNull($this->Subscriptions->viewVars['subscription']);
      $this->assertEqual('clean', $this->Subscriptions->layout);
      
      //assert the record was changed
      $result = $this->Subscriptions->Subscription->read(null, 5); //already in opt_out
      $this->assertNull($result['Subscription']['opt_out_date']);
    }
    
    function testUnsubscribe() {
      #test for subscribed user
      $this->Subscriptions->data = array('Subscription' => array('email' => 'someone@subscribed.com'));
    
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->unsubscribe();
      
      $result = $this->Subscriptions->Subscription->read(null, 1);
      $this->assertNotNull($result['Subscription']['opt_out_date']);
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      
      #assert email sent
      $this->assertEqual(1, $this->Subscriptions->sentEmail);
      
      #test for not yet subscribed user
      $this->Subscriptions->data = array('Subscription' => array('email' => 'notfound'));
    
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->unsubscribe();
      
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      
      #test for subscribed user already in opt_out
      $this->Subscriptions->data = array('Subscription' => array('email' => 'opt@out.com'));
    
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->unsubscribe();
      
      $result = $this->Subscriptions->Subscription->read(null, 1);
      $this->assertNotNull($result['Subscription']['opt_out_date']);
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
    }
    
    function testSubscribe() {
      #test for new subscriptions
      $this->Subscriptions->data = array('Subscription' => array('name' => 'New Subscription', 'email' => 'new@subscription.com'));
      
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->subscribe();
      
      $result = $this->Subscriptions->Subscription->read(null, $this->Subscriptions->Subscription->id);
      $this->assertNotNull($result);
      $this->assertEqual($result['Subscription']['name'], 'New Subscription');
      $this->assertEqual($result['Subscription']['email'], 'new@subscription.com');
      $this->assertNotNull($result['Subscription']['confirmation_code']);
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      
      #assert email sent
      $this->assertEqual(1, $this->Subscriptions->sentEmail);
      
      #test if the user is added to the site group
      $site_group = Configure::read('Newsletter.siteGroup');
      if(!$site_group) {$site_group = 1;}
        
      $this->assertNotNull($result['Group']);
      $this->assertEqual($site_group, $result['Group'][0]['id']);
      
      #test for existing subscription currently in opt_out
      $this->Subscriptions->data = array('Subscription' => array('name' => 'New Name', 'email' => 'group3@subscription.com'));
      
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->subscribe();
      
      $result = $this->Subscriptions->Subscription->read(null, 5);
      $this->assertNotNull($result);
      $this->assertEqual($result['Subscription']['name'], 'New Name');
      $this->assertEqual($result['Subscription']['email'], 'group3@subscription.com');
      $this->assertNotNull($result['Subscription']['confirmation_code']);
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      
      #assert email sent
      $this->assertEqual(2, $this->Subscriptions->sentEmail);
      
      #test for existing subscription currently waiting confirmation
      $this->Subscriptions->data = array('Subscription' => array('name' => 'New Name', 'email' => 'someone@waiting.com'));
      
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->subscribe();
      
      $result = $this->Subscriptions->Subscription->read(null, 2);
      $this->assertNotNull($result);
      $this->assertEqual($result['Subscription']['name'], 'New Name');
      $this->assertEqual($result['Subscription']['email'], 'someone@waiting.com');
      $this->assertNotNull($result['Subscription']['confirmation_code']);
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      
      #assert email sent
      $this->assertEqual(3, $this->Subscriptions->sentEmail);
      
      #test for existing subscription currently in opt_in
      $this->Subscriptions->data = array('Subscription' => array('name' => 'Any Name', 'email' => 'someone@subscribed.com'));
      
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->subscribe();
      
      $result = $this->Subscriptions->Subscription->read(null, 1);
      $this->assertNotNull($result);
      $this->assertEqual($result['Subscription']['name'], 'Subscribed');
      $this->assertEqual($result['Subscription']['email'], 'someone@subscribed.com');
      $this->assertNull($result['Subscription']['confirmation_code']);
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
    }
    
    function testConfirmSubscription() {
      #test for existing subscription currently waiting confirmation
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->confirm_subscription('some_code');
      
      $result = $this->Subscriptions->Subscription->read(null, 2);
      $this->assertNotNull($result);
      $this->assertNull($result['Subscription']['confirmation_code']);
      $this->assertNull($result['Subscription']['opt_out_date']);
      $this->assertNotNull($this->Subscriptions->viewVars['subscribed']);
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      
      #test for invalid confirmation code
      $this->Subscriptions->beforeFilter();
      $this->Subscriptions->Component->startup($this->Subscriptions);
      $this->Subscriptions->confirm_subscription('invalid_code');
      
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
    }
    
    function testValidateCSVLine() {
      #test for valid line
      $line = array();
      array_push($line, 'valid@email.com');
      array_push($line, 'Valid Name');
      
      $errors = $this->Subscriptions->validateCSVLine($line, 1);
      $this->assertTrue(empty($errors));
      
      #test for invalid line
      $line = array();
      array_push($line, '');
      array_push($line, 'Valid Name');
      
      $errors = $this->Subscriptions->validateCSVLine($line, 1);
      $this->assertTrue(!empty($errors));
    }
    
    function testAdminImportCsv() {
      $this->Subscriptions->admin_import_csv();
      $this->assertTrue($this->Subscriptions->Session->check('Message.flash.message'));
      $this->assertEqual($this->Subscriptions->redirectUrl, array('action' => 'index'));
    }
 
    function endTest() {
      $this->Subscriptions->Session->destroy();
      unset($this->Subscriptions);
      ClassRegistry::flush();
    }
}
?>
