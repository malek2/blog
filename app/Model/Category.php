<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Post $Post
 */
class Category extends AppModel {

    public $displayField = 'name';

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if (empty($this->data['Category']['slug']) && isset($this->data['Category']['slug']) && !empty($this->data['Category']['name'])) {
            $this->data['Category']['slug'] = strtolower(Inflector::slug($this->data['Category']['name'], '-'));
            $this->data['Category']['name'] = Category::strUp($this->data['Category']['name']);
        }

        return true;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'slug' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'category_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function categoriesM() {
        return $this->set('categoriesM', $this->find('all', array(
                            'conditions' => array('Category.type' => 'menu'),
                            'limit' => 10
        )));
    }

    public function categoriesD() {
        return $this->set('categoriesD', $this->find('all', array(
                            'conditions' => array('Category.type' => 'drop')
        )));
    }
    public function categoriesCount() {
        return $this->set('categoriesCount', $this->find('all', array(
                            'conditions' => array('Category.type' => 'drop'),
                            'fields' => array('post_count')
        )));
    }
    function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
        foreach ($results as $k => $d) {
            if (isset($d['Category']['slug']) && isset($d['Category']['name'])) {
                $d['Category']['link'] = array(
                    'controller' => 'posts',
                    'action' => 'post_cat',
                    'cat' => $d['Category']['slug'],
                );
                $results[$k] = $d;
            }
        }
        return $results;
    }

}
