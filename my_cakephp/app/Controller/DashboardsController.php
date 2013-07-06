<?php
App::uses('AppController', 'Controller');


class DashboardsController extends AppController {

	/**
	 * Controller name
	 *
	 * @var string
	*/
	public $name = 'Dashboards';

	public $uses = array('Admin','User');
	public $components = array('RequestHandler');
	public $helpers = array('Html','Form','Js');
	var $paginate = array('limit' => 10);
	var $layout;
	
	/*********** Admin Theme Method ************/
	public function admin_index() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_ui() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_form() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_chart() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_typography() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_gallery() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_table() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_calendar() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_grid() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_file_manager() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_tour() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_icon() {
		parent::checkAdminLogin();
		$this->layout = "admin";
	}
	public function admin_error() {
		parent::checkAdminLogin();
		$this->layout = "error";
	}
	
	/*********** /Admin Theme Method ************/
	
	public function admin_profile() {
		parent::checkAdminLogin();
		$this->layout = "admin";
			
		$admin = $this->Admin->findById($this->Session->read('Admin.Admin.id'));

		if (!$admin) {
			throw new NotFoundException(__('Invalid admin'));
		}
	
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if($this->request->data['Admin']['profile_image']['name'] != ""){
				
				if($admin['Admin']['profile_image'] != ""){
					$oldimg = "../webroot/img/admin/profile_img/".$admin['Admin']['profile_image'];
					@unlink($oldimg);
				}
				$filename = $this->Session->read('Admin.Admin.id').'_'.$this->request->data['Admin']['profile_image']['name'];
				move_uploaded_file($this->request->data['Admin']['profile_image']['tmp_name'],
		  "../webroot/img/admin/profile_img/" . $filename);
		  
		  	}else{
				$filename = $admin['Admin']['profile_image'];
			}
	  		
			$this->request->data['Admin']['profile_image'] = $filename;
			
			$this->Admin->id = $this->Session->read('Admin.Admin.id');
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash('Your information has been updated.','message',array('class' => 'success','position' => 'top'));
				$this->redirect(array('action' => 'profile'));
			} else {
				$this->Session->setFlash('Unable to update your information.','message',array('class' => 'success','position' => 'top'));
			}
		}
	
		if (!$this->request->data) {
			$this->request->data = $admin;
			$this->set('admin',$admin);
		}
	}

}
