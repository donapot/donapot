<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
*/
class HomesController extends AppController {
public $helpers = array('Html','Form','UploadPack.Upload');
	/**
	 * Components
	 *
	 * @var array
	 */
	public $uses = array('Post','Comment','User');
	public $components = array('Paginator');

	public function index($id = null) {
		$this->layout = "";
		$latestPosts = $this->Post->find('all',
				array(
						'conditions' => array('Post.status_id' => 0),
						'order' => array('Post.create' => 'desc'),
						'limit' => 6
				));
		$this->set('latestPosts',$latestPosts);
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}


}