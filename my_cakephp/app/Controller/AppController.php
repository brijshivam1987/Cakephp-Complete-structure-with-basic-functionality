<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public function checkAdminLogin() 
    { 
        if($this->action != 'admin_login' && $this->action != 'admin_logout') 
        { 
            if($this->Session->check('Admin') == false) 
            {
				$this->Session->write('LastAdminUrl',$this->here); 
				$this->Session->setFlash("The URL you have followed requires you login.",'message',array('class' => 'information','position' => 'top'));
				$this->redirect(ADMIN_URL); 
            } 
        } 
    }
	public function checkUserLogin() 
    { 
        if($this->action != 'user_login' && $this->action != 'user_logout') 
        { 
            if($this->Session->check('User') == false) 
            {
				$this->Session->write('LastFrontUrl',$this->here); 
				$this->Session->setFlash("The URL you have followed requires you login.",'message',array('class' => 'information','position' => 'top'));
				$this->redirect(BASE_URL); 
            } 
        } 
    }
	
}
