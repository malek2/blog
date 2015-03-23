<?php

App::uses('AppModel', 'Model');

/**
 * Comment Model
 *
 * @property Post $Post
 */
class Comment extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    /**
     * 
     * @param type $options
     * @return type
     */
    public function beforeSave($options = array()) {
        $datas = $this->data;
        $this->data['Comment']['name'] = htmlentities($datas['Comment']['name']);
        $this->data['Comment']['mail'] = htmlentities($datas['Comment']['mail']);
        $this->data['Comment']['content'] = htmlentities($datas['Comment']['content']);

        return $this->data;
        parent::beforeSave($options);
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true
        )
    );

}
