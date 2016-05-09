<?php
App::uses('SendMail', 'Vendor');

class MypagesController extends AppController {
    public $helpers = array('Html', 'Form');
    public $uses = array('Post','User');
    public $components = array('Paginator');
    public function beforeFilter() {
        parent::beforeFilter();
        // login,add,logout,verifyを許可
        $this->Auth->allow('login', 'add', 'logout');
    }
     // ログイン後(マイページ)
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
        $user = $this->Auth->user();

        $userData = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
        $this->set('userData', $userData);
        $this->set('posts', $this->Post->find('all', 
            array(
                    'conditions'=>array(
                            'Post.user_id' => $user['id'],
                            'Post.status_id' => '0'
                    )
        )));
        }
    // ログイン
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $userId = $this->Auth->user('id');
                $this->User->updateLastLogin($userId);
                $this->User->updateLoginActive($userId);
                $user = $this->Auth->user();
            } else {
                $this->Session->setFlash('ユーザー名またはパスワードをご確認ください');
            }
        }
    }
    // ログアウト
    public function logout() {
         $this->redirect($this->Auth->logout());
        $userId = $this->Auth->user('id');
        $this->User->updateLogoutActive($userId);
        $this->Session->destroy();
        $this->Session->setFlash('ログアウトしました', 'default', array('class' => 'flash_success '));
        $this->redirect($this->Auth->logout());
    }
       
    // 自分の投稿の編集
    public function edit($id = null) {
        $this->Post->id = $id;
        if($this->request->is('get')) {
            $this->request->data=$this->Post->read();   //更新画面の表示
        }
        else {
            if($this->Post->save($this->request->data)) {
                $this->Session->setFlash('更新完了');
                $this->redirect(array('action'=>'index'));
            }
            else {
                $this->Sessin->setFlash('更新失敗');
            }
        }
    }

}