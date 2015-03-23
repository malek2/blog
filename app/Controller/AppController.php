<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $uses = array('Category', 'Post', 'Tag', 'Role');
    public $helpers = array('Text', 'Form', 'Html', 'Session', 'Cache', 'Facebook.Facebook', 'Utility.OpenGraph', 'Utility.Breadcrumb');
    public $components = array(
        'RequestHandler',
        'Session',
        'Cookie',
        'Auth');

    

    public function beforeFilter() {
        parent::beforeFilter();
        $currentUser = $this->Auth->user();
        if (!empty($currentUser)) {
            $role = $this->Role->find('first', array(
                'conditions' => array('id' => $currentUser['role_id'])
            ));
            $res = array_merge($currentUser, $role);

            $this->set('loggedIn', $this->Auth->loggedIn());
            $this->set('currentUser', $res);
        }
        $optionsWidgets = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC'),
            'limit' => 4
        );
        $this->set('widgets', $this->Post->find('all', $optionsWidgets));
        $this->set('tags', $this->Tag->find('all', array('limit' => '10', 'order' => 'Tag.id DESC')));
        $this->set('categories', $this->Category->find('all', array('limit' => 7, 'order' => 'Category.position DESC')));
    }

    function beforeRender() {
        parent::beforeRender();
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin' && !$this->params['isAjax']) {
            $this->layout = 'admin_default';
        }
        // Pour le layout public
        else {
            $currentUser = $this->Auth->user();
            $role = $this->Role->find('first', array(
                'conditions' => array('id' => $currentUser['role_id'])
            ));
            $res = array_merge($currentUser, $role);
            if ($res !== null && $res['Role']['role'] === 'admin') {
                $this->set('frontLastP', $this->Post->find('all', array(
                            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
                            'order' => array('Post.created DESC')
                )));
            }
            $this->set('categoriesM', $this->Category->categoriesM());
            $this->set('categoriesD', $this->Category->categoriesD());
            $this->set('pagesD', $this->Post->pagesDrop());
            $this->set('pop_post', $this->Post->popular_post());
            $this->layout = 'default';
        }
    }

}
