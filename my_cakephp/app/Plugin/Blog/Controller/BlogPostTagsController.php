<?php
/**
 * BlogPostTags Controller
 * 
 * Just contains baked admin actions
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */
class BlogPostTagsController extends AppController {

	var $layout;
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		parent::checkAdminLogin();
		$this->layout = "admin";
		
		$this->BlogPostTag->recursive = 0;
		$this->set('blogPostTags', $this->paginate());
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
		
		$this->BlogPostTag->id = $id;
		if (!$this->BlogPostTag->exists()) {
			throw new NotFoundException(__('Invalid blog post tag'));
		}
		$this->set('blogPostTag', $this->BlogPostTag->read(null, $id));
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
			$this->BlogPostTag->create();
			if ($this->BlogPostTag->save($this->request->data)) {
				$this->Session->setFlash('Blog post tag has been saved','message',array('class' => 'success','position' => 'top'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The blog post tag could not be saved. Please, try again.','message',array('class' => 'error','position' => 'top'));
			}
		}
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
		
		$this->BlogPostTag->id = $id;
		if (!$this->BlogPostTag->exists()) {
			throw new NotFoundException(__('Invalid blog post tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BlogPostTag->save($this->request->data)) {
				$this->Session->setFlash('The blog post tag has been saved','message',array('class' => 'success','position' => 'top'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The blog post tag could not be saved. Please, try again.','message',array('class' => 'error','position' => 'top'));
			}
		} else {
			$this->request->data = $this->BlogPostTag->read(null, $id);
		}
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
		$this->BlogPostTag->id = $id;
		if (!$this->BlogPostTag->exists()) {
			throw new NotFoundException(__('Invalid blog post tag'));
		}
		if ($this->BlogPostTag->delete()) {
			$this->Session->setFlash('Blog post tag deleted','message',array('class' => 'success','position' => 'top'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Blog post tag was not deleted','message',array('class' => 'error','position' => 'top'));
		$this->redirect(array('action' => 'index'));
	}
}
