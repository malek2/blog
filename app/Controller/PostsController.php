<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {

    public $uses = array('Post', 'Comment', 'PostTag', 'Tag', 'Viewp');
    public $components = array(
        'Paginator' => array(
            'limit' => 8,
            'paramType' => 'querystring',
            'order' => array(
                'Post.created' => 'DESC'
            )),
        'MathCaptcha' => array('timer' => 3)
    );

    public function beforeFilter() {
        //debug($this->uses);
        parent::beforeFilter();
        //$this->Auth->allow('', 'admin_logout', 'admin_add', 'admin_liste_users', 'admin_index'); // Laissons les users d'enregistrer eux-memes
        $this->Auth->allow('jp', 'feed', 'show_feed', 'search', 'index', 'show', 'popular_post', 'post_cat', 'postByTag');

        //$this->set('role', $this->Auth->user('role'));
//        debug($this->params['admin']);
//        if (isset($this->params['admin'])) {
//            $this->Security->blackHoleCallback = 'forceSSL';
//            $this->Security->requireSecure();
//        }
    }

    public function feed() {
        $posts = $this->Post->find('all', array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => 'Post.created DESC',
            'limit' => 10
        ));
        $this->set(compact('posts'));
    }

    public function jp() {
        $this->Post->recursive = 0;
        $posts = $this->Post->find('all', array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC')
        ));
        $this->set('posts',$posts);
        
    }

    public function show_feed($id = null) {
        $post = $this->Post->find('first', array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1, 'Post.id' => $id)
        ));
        $this->set(compact('post'));
    }

    public function popular_post() {
        $options = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.comment_count DESC'),
            'limit' => 3
        );

        $pop_post = $this->Post->find('all', $options);
        $this->set(compact('pop_post'));
    }

    public function search($lang = null) {
        //debug();
        //$lang = Configure::read('Config.language');
        $crit = $this->request->data['Post']['name'];
        debug($crit);
        $dp = $this->Post->find();
        $d = $this->Post->find('first', array(
            'conditions' => array('I18n___name.content LIKE' => '%' . $crit . '%')
        ));
        $conditions = array('OR' => array());
        $fields = array('name', 'slug', 'content');
        foreach ($fields as $field) {

            $conditions = array('I18n___' . $field . '.content LIKE' => '%' . $crit . '%');
            debug($conditions);
            $results = $this->Post->find('all', array('conditions' => $conditions));
            if (!empty($results)) {
                debug($results);
                //break
            }
        }

        debug($lang);


        die();
        if ($lang === 'fra') {
            if (!empty($this->request->data['Post']['name'])) {
                $crit = $this->request->data['Post']['name'];
                $model = $this->Post->find('all', array(
                    'conditions' => array('Post.name LIKE' => '%' . $crit . '%')
                ));
                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Post.slug LIKE' => '%' . $crit . '%')
                    ));
                }
                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Post.content LIKE' => '%' . $crit . '%')
                    ));
                }
                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Category.name LIKE' => '%' . $crit . '%')
                    ));
                }

                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Category.slug LIKE' => '%' . $crit . '%')
                    ));
                }
            }
        } elseif ($lang === 'eng') {
            if (!empty($this->request->data['Post']['name'])) {
                $crit = $this->request->data['Post']['name'];
                $model = $this->i->find('all', array(
                    'conditions' => array('Post.name LIKE' => '%' . $crit . '%')
                ));
                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Post.slug LIKE' => '%' . $crit . '%')
                    ));
                }
                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Post.content LIKE' => '%' . $crit . '%')
                    ));
                }
                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Category.name LIKE' => '%' . $crit . '%')
                    ));
                }

                if (empty($model)) {
                    $crit = $this->request->data['Post']['name'];
                    $model = $this->Post->find('all', array(
                        'conditions' => array('Category.slug LIKE' => '%' . $crit . '%')
                    ));
                }
            }
        }
        //debug($model);
        //$model = $this->paginate();
        //$this->set('modeles',$this->paginate());

        $this->set('modeles', $model);
    }

    public function index() {
        $this->Post->recursive = 1;
        $postess = $this->Post->find('all', array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => 'Post.created DESC'
        ));
        $paginate = $this->paginate('Post', array('Post.type' => 'post', 'Post.online' => 1));
        $this->set('posts', $paginate);
        $options = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.comment_count DESC'),
            'limit' => 3
        );
        $pop_post = $this->Post->find('all', $options);
        $optionsSlide = array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1),
            'order' => array('Post.created DESC'),
            'limit' => 3
        );
        $slide = $this->Post->find('all', $optionsSlide);
        $this->set(compact('pop_post', 'slide'));
    }

    public function post_cat($categorie = null) {

        $this->Category->recursive = -1;
        //$this->Post->recursive = -1;
        $id = $this->Post->Category->find('first', array(
            'conditions' => array('Category.slug' => $categorie)
        ));

        $paginate = $this->paginate('Post', array('Post.category_id' => $id['Category']['id'], 'Post.type' => 'post', 'Post.online' => 1));
        $this->set('posts', $paginate);
        $this->set('name', $id['Category']['name']);
    }

    function show($id = null, $slug = null) {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if (!empty($ip)) {
            $exist_ip = $this->Viewp->find('first', array(
                'conditions' => array('Viewp.ip' => $ip, 'Viewp.post_id' => $id)
            ));
            if (empty($exist_ip)) {
                $data = array();
                $data['Viewp']['ip'] = $ip;
                $data['Viewp']['post_id'] = $id;

                $this->Viewp->save($data);
            } else {
                echo 'exist déjà';
            }
        }

        $post = $this->Post->find('first', array(
            'conditions' => array('Post.id' => $id, 'Post.type' => 'post', 'Post.online' => 1)
        ));

        $comments = $this->Comment->find('all', array('conditions' => array('Comment.rep_id' => 0, 'Comment.post_id' => $id, 'comment_approved' => true)));
        $rep = $this->Comment->find('all', array('conditions' => array('Comment.post_id' => $id, 'comment_approved' => true)));
//        debug($comments);
//        debug($rep);
//        die();

        if (empty($post)) {
            throw new NotFoundException;
        }
        if ($slug != $post['Post']['slug']) {
            $this->redirect($post['Post']['link'], 301);
        }
        $tags = $this->Post->Tag->find('all', array('limit' => 12, 'order' => 'Tag.id DESC'));
        $related = $this->Post->find('all', array(
            'conditions' => array('Post.type' => 'post', 'Post.online' => 1, 'Post.category_id' => $post['Category']['id'], 'Post.id !=' => $post['Post']['id']),
            'limit' => 3
        ));
        $this->set(compact('comments', 'rep', 'post', 'related', 'tags'));
        $this->set('captcha', $this->MathCaptcha->generateEquation());
    }

    function admin_index() {
        $this->set('title_for_layout', __('Liste Articles'));
        $this->set('posts', $this->paginate('Post', array('Post.type' => 'post')));
    }

    public function admin_pages() {
        $this->set('title_for_layout', 'Liste Des Pages');
        //$this->paginate = array('Post' => array('limit' => 1));
        $this->Post->recursive = 0;
        $this->set('posts', $this->paginate('Post', array('Post.type' => 'post')));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('L\'article à été bien Ajoutée'), 'notif');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'article n\'a pas pu être Ajoutée'), $element = 'error_msg');
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
                'conditions' => array('Post.' . $this->Post->primaryKey => $id, 'Post.type' => 'post'));
            $this->request->data = $this->Post->find('first', $options);
        }
        $this->Post->PostTag->contain('Tag');
        $tags = $this->Post->PostTag->find('all', array(
            'conditions' => array('PostTag.post_id' => $id)
        ));
        $categories = $this->Post->Category->find('list');
        $this->set(compact('categories', 'tags'));
    }

    public function postByTag($idTag = null) {
        //$this->Post->recursive = 0;
        $tag = $this->Tag->find('first', array(
            'conditions' => array('Tag.id' => $idTag),
            'fields' => array('Tag.name')
        ));
        $tagName = $tag['Tag']['name'];
        $this->PostTag->contain('Post.id', 'Post.slug', 'Post.name', 'Post.content');
        $postTags = $this->PostTag->find('all', array(
            'conditions' => array('PostTag.tag_id' => $idTag),
            'fields' => array('PostTag.post_id')
        ));
        $tags = $this->Post->Tag->find('all');
        $this->set(compact('postTags', 'tagName', 'tags'));
    }

    public function admin_delete($id = null) {

        $this->Post->id = $id;

        if (!$this->Post->exists()) {
            $this->Session->setFlash(__('Cette article n\'pas pu être Supprimée !'), 'notif', array('type' => 'error'));
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('Article Supprimée avec Succès.'), 'notif');
            $this->redirect($this->referer());
        }
    }

}
