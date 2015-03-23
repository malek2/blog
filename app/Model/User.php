<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('AppModel', 'Model');
App::uses('Role', 'Model');

// app/Model/User.php
class User extends AppModel {

    public $name = 'User';

    public function beforeSave($options = null) {
        parent::beforeSave($options = null);
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    public function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
        foreach ($results as $k => $result):
            //debug($result);
            $role_id = $result['User']['role_id'];
            $role = new Role();
            $roleName = $role->find('first',array('conditions'=>array('Role.id'=>$role_id)));
            $result['Role']['name'] = $roleName['Role']['role'];
            $results[$k] = $result;
        endforeach;
//debug($results); die();
        return $results;
    }

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Un nom d\'user est requis'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Un mot de passe est requis'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'responsable')),
                'message' => 'Merci de rentrer un rôle valide',
                'allowEmpty' => false
            )
        )
    );
    public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}

?>
