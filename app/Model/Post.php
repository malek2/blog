<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 * @property Category $Category
 * @property Media $Media
 * @property Comment $Comment
 * @property Comment $Commens
 */
class Post extends AppModel {

    public $name = 'Post';
    public $displayField = 'name';
    public $validate = array(
        'slug' => array(
            'rule' => '/^[a-z0-9\-]+$/',
            'allowEmpty' => true,
            'message' => 'invalid url, si vous avez un problème avec l\'url laissez le vide.'
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'titre obligatoire'
        )
    );
    
    

    function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
        foreach ($results as $k => $d) {
            if (isset($d['Post']['slug']) && isset($d['Post']['type'])) {
                $d['Post']['link'] = array(
                    'controller' => Inflector::pluralize($d['Post']['type']),
                    'action' => 'show',
                    'id' => $d['Post']['id'],
                    'slug' => $d['Post']['slug'],
                );
                $results[$k] = $d;
            }
        }
        return $results;
    }

    public function beforeSave($options = array()) {

        parent::beforeSave($options);


        if (empty($this->data['Post']['slug']) && isset($this->data['Post']['slug']) && !empty($this->data['Post']['name'])) {
            $this->data['Post']['slug'] = strtolower(Inflector::slug($this->data['Post']['name'], '-'));
        }

        return $this->data;
    }

    public function afterSave($created, $options = array()) {
        parent::afterSave($created, $options);
        if (!empty($this->data)) {
            $tags = explode(',', $this->data['Post']['tags']);
            echo '<meta charset="utf-8" />';
            foreach ($tags as $tag) {
                $tag = trim($tag);

                debug($tag);
                if (!empty($tag)) {
                    $res = $this->Tag->findByName($tag);
                    if (!empty($res)) {
                        $this->Tag->id = $res['Tag']['id'];
                    } else {
                        $this->Tag->create();
                        $this->Tag->save(array(
                            'name' => $tag
                        ));
                    }
                    debug($this->PostTag->save(array(
                                'id' => null,
                                'post_id' => $this->id,
                                'tag_id' => $this->Tag->id
                    )));
                }
            }
        }
        return true;
    }

    public function pagesDrop() {
        return $this->set('pagesD', $this->find('all', array(
                            'conditions' => array('Post.type' => 'page', 'Post.online' => 1)
        )));
    }

    public function popular_post() {
        $options = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC'),
            'limit' => 3
        );
        return $pop_post = $this->find('all', $options);
    }

    public $hasAndBelongsToMany = array('Tag');

    /**
     * belongsTo association
     * @var array
     */
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Media' => array(
            'className' => 'Media',
            'foreignKey' => 'post_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Comments' => array(
            'className' => 'Comment',
            'foreignKey' => 'post_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'PostTag'
    );

}
