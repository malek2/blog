<?php

App::uses('AppModel', 'Model');

class PostTag extends AppModel {

    //public $recursive = -1;
    public $useTable = 'posts_tags';
    public $belongsTo = array(
        'Post',
        'Tag' => array(
            'counterCache' => 'counter'
        )
    );

    public function afterDelete() {
        parent::afterDelete();
        $this->Tag->deleteAll(array(
            'Tag.counter' => 0
        ));
    }

}
