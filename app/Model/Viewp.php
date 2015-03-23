<?php

App::uses('AppModel', 'Model');

/**
 * View Model
 *
 * @property Post $Post
 */
class Viewp extends AppModel {

    public $useTable = 'views';
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
            'counterCache' => 'view_count'
        )
    );

}
