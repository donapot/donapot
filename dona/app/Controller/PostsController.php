<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {
public $helpers = array('Html','Form','UploadPack.Upload');

/**
 * Components
 *
 * @var array
 */
	public $uses = array('Post','Comment','User');
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		$this->layout = "";
		$post_id = $this->Post->find('all', array('conditions' => array('Post.user_id' => $id), 'recursive' => 3));
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('投稿がありません'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
		$post_id = $this->Post->find('first', $options);
		debug($post_id['Post']['id']);
		$this->set('comments',$this->Comment->find('all',array(
			'conditions'=>array('post_id'=>$post_id['Post']['id']))));

	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		 $this->layout = "";
		if ($this->request->is('post')) {
			$this->Post->create();
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			$this->request->data['Post']['username'] = $this->Auth->user('username');
			debug($post_id);
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('投稿を保存しました.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('投稿が保存できませんでした。'));
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
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data=$id;
			$this->set('post', $this->Post->find('first', $options));
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
