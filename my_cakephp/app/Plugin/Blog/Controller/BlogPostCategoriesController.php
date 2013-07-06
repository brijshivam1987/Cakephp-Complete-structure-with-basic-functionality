<?php
/**
 * BlogPostCategories Controller
 *
 * Pretty much just baked admin actions except add/edit use generateTreeList()
 * for finding the parents so you see the hierarchy.
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php *
 */
class BlogPostCategoriesController extends AppController {

	var $layout;
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		
		parent::checkAdminLogin();
		$this->layout = "admin";
		
		$this->BlogPostCategory->recursive = 0;
		$this->set('blogPostCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {

		parent::checkAdminLogin();		
		$this->layout = "admin";
		
		$this->BlogPostCategory->id = $id;
		if (!$this->BlogPostCategory->exists()) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		$this->set('blogPostCategory', $this->BlogPostCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		parent::checkAdminLogin();		
		$this->layout = "admin";
		
		if ($this->request->is('post')) {
			$this->BlogPostCategory->create();
			if ($this->BlogPostCategory->save($this->request->data)) {
				$this->Session->setFlash('The blog post category has been saved','message',array('class' => 'success','position' => 'top'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The blog post category could not be saved. Please, try again.','message',array('class' => 'error','position' => 'top'));
			}
		}
		$parents = $this->BlogPostCategory->generateTreeList();
		$this->set(compact('parents'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		parent::checkAdminLogin();		
		$this->layout = "admin";
		
		$this->BlogPostCategory->id = $id;
		if (!$this->BlogPostCategory->exists()) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BlogPostCategory->save($this->request->data)) {
				$this->Session->setFlash('The blog post category has been saved','message',array('class' => 'success','position' => 'top'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The blog post category could not be saved. Please, try again.','message',array('class' => 'error','position' => 'top'));
			}
		} else {
			$this->request->data = $this->BlogPostCategory->read(null, $id);
		}
		$parents = $this->BlogPostCategory->generateTreeList();
		$this->set(compact('parents'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		parent::checkAdminLogin();
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->BlogPostCategory->id = $id;
		if (!$this->BlogPostCategory->exists()) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		if ($this->BlogPostCategory->delete()) {
			$this->Session->setFlash('Blog post category deleted','message',array('class' => 'success','position' => 'top'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Blog post category was not deleted','message',array('class' => 'error','position' => 'top'));
		$this->redirect(array('action' => 'index'));
	}
}
