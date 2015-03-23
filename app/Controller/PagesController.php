<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {
    
    public $uses = array('Post', 'Category', 'Comment', 'Day', 'Media');
    public $components = array(
        'Paginator' => array(
            'limit' => 5,
            'paramType' => 'querystring'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('home', 'show', 'tags');
    }

    public function home() {
        $optionsSlide = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC'),
            'limit' => 6
        );
        $slide = $this->Post->find('all', $optionsSlide);
        $this->Post->contain('Category', 'Media');
        $optionsWidgets = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC'),
            'limit' => 4
        );
        $posts = $this->Post->find('all', array(
            'conditions' => array('Post.online' => 1, 'Post.type' => 'post'),
            'order' => 'Post.created DESC',
            'limit' => 5
        ));
        $this->Post->recursive = 1;
        $widgets = $this->Post->find('all', $optionsWidgets);

        $optionsAlaUne = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC'),
            'limit' => 3
        );
        $alaunes = $this->Post->find('all', $optionsAlaUne);
        $tags = $this->Post->Tag->find('all', array('limit' => 12, 'order' => 'Tag.id DESC'));
        $video = $this->Day->find('first', array(
            'conditions' => array('Day.type' => 'video')
        ));
        $image = $this->Day->find('first', array(
            'conditions' => array('Day.type' => 'image')
        ));
        $citation = $this->Day->find('first', array(
            'conditions' => array('Day.type' => 'citation'),
            'fields' => array('Day.content')
        ));
        $blings = $this->Post->find('all', array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC'),
            'limit' => 3
        ));
        $categories = $this->Category->find('all', array(
            'contain' => array(
                'Post' => array(
                    'conditions' => array(
                        'Post.type' => 'post',
                        'Post.online' => 1
                    ),
                    'limit' => 1,
                    'order' => 'Post.created DESC'
                )
            ),
            'limit' => 5
        ));
        $this->set('tags', $tags);
        $this->set(compact('categories', 'blings', 'slide', 'widgets', 'posts', 'alaunes', 'video', 'image', 'citation'));
    }

    public function tags() {
        $this->set('title_for_layout', __('Les Tags'));
        $this->set('tags', $this->paginate('Tag'));
    }

    function show($id = null, $slug = null) {
        $page = $this->Post->find('first', array(
            'conditions' => array('Post.id' => $id, 'type' => 'page')
        ));
        if (empty($page)) {
            throw new NotFoundException;
        }
        if ($slug != $page['Post']['slug']) {
            $this->redirect($page['Post']['link'], 301);
        }
        $this->set('page', $this->Post->read(null, $id));
    }

    function admin_index() {
        /**
         * Count $var
         */
        $pages = $this->Post->find('count', array(
            'conditions' => array('Post.type' => 'page')
        ));
        $posts = $this->Post->find('count', array(
            'conditions' => array('Post.type' => 'post')
        ));
        $comments = $this->Comment->find('count', array());
        $categories = $this->Category->find('count', array());
        /**
         * Preview $var
         */
        $this->Post->recursive = -1;
        $pagesp = $this->Post->find('all', array(
            'conditions' => array('Post.type' => 'page'),
            'limit' => 3
        ));
        $postsp = $this->Post->find('all', array(
            'conditions' => array('Post.type' => 'post'),
            'limit' => 3
        ));
        $this->Comment->recursive = -1;
        $commentsApp = $this->Comment->find('all', array(
            'conditions' => array('Comment.comment_approved' => 1),
            'limit' => 3
        ));
        $commentsNotApp = $this->Comment->find('all', array(
            'conditions' => array('Comment.comment_approved' => 0),
            'limit' => 3
        ));
        $this->Category->recursive = -1;

        $categoriesp = $this->Category->find('all', array('limit' => 3));
        /**
         * set All to view
         */
        $this->set(compact('pages', 'posts', 'comments', 'categories', 'pagesp', 'postsp', 'commentsApp', 'commentsNotApp', 'categoriesp'));
    }

    public function admin_pages() {

        $this->set('title_for_layout', 'Liste Des Pages');
        $this->Post->recursive = 0;
        $this->set('pagess', $this->paginate('Post', array('Post.type' => 'page')));
    }

    public function admin_add() {
        if ($this->request->is('post')) {

            $this->Post->create();


            if ($this->Post->saveAssociated($this->request->data)) {
                $this->Session->setFlash('La Page à été bien Ajoutée', 'notif');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('La Page n\'a pas pu être Ajoutée', 'notif');
            }
        }
        $categories = $this->Post->Category->find('list');
        $this->set(compact('categories'));
    }

    public function admin_edit($id = null) {

        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Article invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->Post->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('L\'article à été bien Modifiée'), 'notif');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'article n\'a pas pu être Modifiée'), 'notif', array('type' => 'error'));
            }
        } else {
            $options = array(
                'conditions' => array('Post.' . $this->Post->primaryKey => $id, 'Post.type' => 'page'));
            $this->request->data = $this->Post->find('first', $options);
        }
        $this->Post->PostTag->contain('Tag');
        $tags = $this->Post->PostTag->find('all', array(
            'conditions' => array('PostTag.post_id' => $id)
        ));
        $categories = $this->Post->Category->find('list');
        $this->set(compact('categories'));
    }

    public function admin_delete($id = null) {

        $this->Post->id = $id;

        if (!$this->Post->exists()) {
            $this->Session->setFlash('Cette Page n\'pas pu être Supprimée !', $element = 'error_msg');
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash('Page Supprimée avec Succes.', $element = 'valide_msg');
            $this->redirect($this->referer());
        }
    }

}
