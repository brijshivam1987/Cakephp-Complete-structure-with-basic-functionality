<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Users';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User');
	public $components = array('RequestHandler');
	public $helpers = array('Js');
	var $layout;
	var $paginate = array('limit' => 2);
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {

		if ($this->RequestHandler->isAjax()) {
			$this->set('allUsers', $this->paginate('User'));
			$this->set('isAjax', $this->RequestHandler->isAjax());
		} else {
			$this->layout = 'front';
			$this->set('allUsers', $this->paginate('User'));
			$this->set('isAjax', FALSE);
		}
	}
	public function account() {
		parent::checkUserLogin();
		$this->layout = 'front';
		
		$user = $this->User->findById($this->Session->read('User.id'));
		if (!$user) {
			throw new NotFoundException(__('Invalid user'));
		}
	
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if($this->request->data['User']['profile_image']['name'] != ""){
				
				if($user['User']['profile_image'] != ""){
					$oldimg = "../webroot/img/front/profile_img/".$user['User']['profile_image'];
					@unlink($oldimg);
				}
				$filename = $this->Session->read('User.id').'_'.$this->request->data['User']['profile_image']['name'];
				move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],
		  "../webroot/img/front/profile_img/" . $filename);
		  
		  	}else{
				$filename = $user['User']['profile_image'];
			}
	  		
			$this->request->data['User']['profile_image'] = $filename;
			
			$this->User->id = $this->Session->read('User.id');
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Your information has been updated.','message',array('class' => 'success','position' => 'top'));
				$this->redirect(array('action' => 'account'));
			} else {
				$this->Session->setFlash('Unable to update your information.','message',array('class' => 'success','position' => 'top'));
			}
		}
	
		if (!$this->request->data) {
			$this->request->data = $user;
			$this->set('user',$user);
		}
	}
	public function register() {
		if ($this->RequestHandler->isAjax()) {
			// Use data from serialized form
			//print_r($this->request->data);
			$UserData['User']['fullname'] 		= $this->request->data['fullname'];
			$UserData['User']['username'] 		= $this->request->data['username'];
			$UserData['User']['email'] 			= $this->request->data['email'];
			$UserData['User']['password'] 		= md5($this->request->data['password']);
			$UserData['User']['status'] 		= "Active";
			$UserData['User']['reg_date'] 		= DATE_TIME;
			$this->User->create();
			if ($this->User->save($UserData)) {
				$this->render('register-ajax-response', 'ajax');	
			}
		}
	}
}
