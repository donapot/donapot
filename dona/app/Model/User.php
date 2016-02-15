<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 */
class User extends AppModel {
	 
	 public $hasMany = array(
        'Profile'
    );

public function beforeSave($options = array()) {
      if (isset($this->data[$this->alias]['password'])) {
          $passwordHasher = new BlowfishPasswordHasher();
          $this->data[$this->alias]['password'] = $passwordHasher->hash(
              $this->data[$this->alias]['password']
          );
      }
      return true;
    }
public $validate = array(
	'username' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'ユーザーネームを入力してください。'
            ),
        	'too_long' => array(
        		'rule' => array('maxLength', '20'),
        		'message' => '20文字以内で入力してください。'
        	)
        ),
	'email' => array(
            'isValid' => array(
                'rule' => 'email',
                'required' => true,
                'message' => 'メールアドレスを入力してください。'
            )
        ),
	'password' => array(
            'too_short' => array(
                'rule' => array('minLength', '6'),
                'message' => '６文字以上のパスワードを入力してください。'
            ),
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'パスワードを入力してください。'
            ),
        	'too_long' => array(
        		'rule' => array('maxLength', '15'),
        		'message' => '15文字以内のパスワードを入力してください。'
        	)
        ));


}