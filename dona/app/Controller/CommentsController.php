<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {
      // public $uses = array( 'User','Post');
/**
 * Components
 *
 * @var array
 */
 public $components = array('Paginator');
 public $uses = array('User','Comment','Post');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// $this->Comment->recursive = -1;

		$this->set('comment',$this->Comment->find('all'));
		$this->set('comments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$user_id = $this->Auth->user('id');
		$user = $this->User->find('all',array(
			'conditions'=>array('id'=>$user_id)));
		$this->set('user',$user);
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$post_id = $this->Post->find('first', $options);
		if ($this->request->is('post')) {
			$this->Comment->create();
			$this->request->data['Comment']['user_id'] = $this->Auth->user('id');
			$this->request->data['Comment']['post_id'] = $post_id['Post']['id'];
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('コメントしました.'));
				return $this->redirect(array('controller' => 'posts', 'action' => 'view', $id = $post_id['Post']['id']));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('コメントはありません'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				return $this->flash(__('コメントをしました'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			return $this->flash(__('The comment has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The comment could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
