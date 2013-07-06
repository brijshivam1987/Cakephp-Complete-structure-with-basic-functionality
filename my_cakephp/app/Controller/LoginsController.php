<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
 
 class LoginsController extends AppController {
	 
	public $helpers = array('Html', 'Session');
	public $uses = array('Admin','User');
	var $layout;
	
	
	function login() 
    {
		$this->redirect(ADMIN_URL.'/logins/login');
	}
	function admin_login() 
    {
		$this->layout= 'adminLogin';
		
		if($this->Session->check('Admin') == true) 
		{ 
			if($this->Session->check('LastAdminUrl') == true){
				$LastAdminUrl = $this->Session->read('LastAdminUrl');
				$this->Session->delete('LastAdminUrl');	  
				$this->redirect(FULL_BASE_URL.$LastAdminUrl);  
			}else{
				$this->redirect(ADMIN_URL.'/dashboards/index'); 
			}
		}
		
		if($_POST){
			$data = $_POST;	
		}
		if(empty($data) == false){ 
			
			$conditions = array(
				'username' => $data['username'],
				'password' => md5($data['password']),
				'status' => 'Active'
			);
			$admin = $this->Admin->find('first', array('conditions' => $conditions));
			
			if($admin == true) { 
                $this->Session->write('Admin', $admin); 
                $this->Session->setFlash("You have successfully logged in.",'message',array('class' => 'success','position' => 'top'));
				if($this->Session->check('LastAdminUrl') == true){
					$LastAdminUrl = $this->Session->read('LastAdminUrl');
					$this->Session->delete('LastAdminUrl');	  
					$this->redirect(FULL_BASE_URL.$LastAdminUrl);  
				}else{
					$this->redirect(ADMIN_URL.'/dashboards/index'); 
				}
				
            }else {
				$this->Session->setFlash("Sorry,the information you have entered is incorrect.",'message',array('class' => 'error','position' => 'top'));
			} 
        } 
    }
	function admin_logout() 
    { 
		$this->Session->delete('Admin');
		$this->Session->setFlash("You have successfully logged out.",'message',array('class' => 'success','position' => 'top'));
        $this->redirect(ADMIN_URL.'/logins/login'); 
    }
	
	function user_login() 
    {
		if($this->Session->check('User') == true) 
		{
			if($this->Session->check('LastFrontUrl') == true){
				$LastFrontUrl = $this->Session->read('LastFrontUrl');
				$this->Session->delete('LastFrontUrl');	  
				$this->redirect(FULL_BASE_URL.$LastFrontUrl); 
			}else{
				$this->redirect(BASE_URL.'/users/account'); 
			}
		}
		
		if($_POST){
			$data = $_POST;	
		}
		if(empty($data) == false){ 
			$conditions = array(
				'username' => $data['username'],
				'password' => md5($data['password']),
				'status' => 'Active'
			);
			$user = $this->User->find('first', array('conditions' => $conditions));
			if($user == true) 
            { 
                $this->Session->write('User', $user['User']); 
                $this->Session->setFlash("You have successfully logged in.",'message',array('class' => 'success','position' => 'top'));
				if($this->Session->check('LastFrontUrl') == true){
					$LastFrontUrl = $this->Session->read('LastFrontUrl');
					$this->Session->delete('LastFrontUrl');	  
					$this->redirect(FULL_BASE_URL.$LastFrontUrl);  
				}else{
					$this->redirect(BASE_URL.'/users/account'); 
				}
				
            }else {
				$this->Session->setFlash("Sorry,the information you have entered is incorrect.",'message',array('class' => 'error','position' => 'top'));
				$this->redirect(BASE_URL);
			} 
        } 
    }
	function user_logout() 
    { 
		$this->Session->delete('User');
		$this->Session->setFlash("You have successfully logged out.",'message',array('class' => 'success','position' => 'top'));
        $this->redirect(BASE_URL); 
    }
}