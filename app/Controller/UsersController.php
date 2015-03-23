<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $uses = array('User');

    //public $components = array('Security');

    public function beforeFilter() {
        //debug($this->uses);
        parent::beforeFilter();
        //$this->Auth->allow('', 'admin_logout', 'admin_add', 'admin_liste_users', 'admin_index'); // Laissons les users d'enregistrer eux-memes
        $this->Auth->allow('logout', 'login', 'register');
        //$this->Security->requirePost('login','admin_login');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        //$this->set('role', $this->Auth->user('role'));
//        debug($this->params['admin']);
//        if (isset($this->params['admin'])) {
//            $this->Security->blackHoleCallback = 'forceSSL';
//            $this->Security->requireSecure();
//        }
    }

    public function forceSSL() {
        $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }

    public function admin_index() {
        
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->request->data['User']['role_id'] = 2;
            if ($this->User->save($this->request->data)) {
                $link = array('controller' => 'users', 'action' => 'activate', $this->User->id . '-' . md5($this->request->data['User']['password']));
                App::uses('CakeEmail', 'Network/Email');
                $Email = new CakeEmail();
                $Email->from('no-reply@largestinfo.pro')
                        ->to($this->request->data['User']['mail'])
                        ->emailFormat('html')
                        ->template('register')
                        ->viewVars(array('username' => $this->request->data['User']['username'], 'link' => $link))
                        ->send();

                $this->Session->setFlash(__('Un mail a été envoyé pour activer votre compte'), 'notif_front');
                $this->redirect(array('controller' => 'pages', 'action' => 'index'));
            }
        }
    }

    public function activate($token = null) {
        $token = explode('-', $token);
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $token[0], 'MD5(User.password)' => $token[1], 'User.active' => 0)
        ));
        debug($user);
        if (!empty($user)) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
            $this->Session->setFlash(__('Votre Compte a été activé.'), 'notif_front');
        } else {
            $this->Session->setFlash(__('Ce lien d\'activation n\'est pas valide.'), 'notif_front', array('type' => 'error'));
        }
    }

    public function forgotpwd() {
        if ($this->request->is('post')) {
            debug($this->request->data);
            $data = $this->request->data;
            $user = $this->User->find('first', array(
                'conditions' => array('User.username' => $data['User']['username'], 'User.mail' => $data['User']['mail'])
            ));
            if (!empty($user)) {
                $Email->from(array($this->request->data['Contact']['email'] => 'Pro Largestinfo'))
                        ->to('contact@largestinfo.pro')
                        ->template('')
                        ->emailFormat('html')
                        ->subject("contact prolargestinfo")
                        ->send('Nom : ' . $this->request->data['Contact']['nom'] . '<br>' .
                                'Email :' . $this->request->data['Contact']['email'] . '<br>' .
                                'Message :' . $this->request->data['Contact']['message']);
            }
            die();
        }
    }

    public function login() {
        if ($this->Auth->user()) {
            $this->Session->setFlash(__('Vous êtes déjà Connecté ') . $this->Auth->user('username'), 'notif_front', array('type' => 'error'));
            $this->redirect($this->referer());
        } else {
            if ($this->request->is('post')) {
                if (!empty($this->request->data)) {
                    if ($this->Auth->login()) {
                        if ($this->Auth->user('Role.name') == 'admin') {
                            $this->Session->setFlash(__('Bienvenue :)'), 'notif');
                            $this->redirect($this->Auth->redirect(array('controller' => 'pages', 'action' => 'index', 'admin' => true)));
                        } else {

                            if ($this->Auth->user('active') == false) {
                                $this->Auth->logout();
                                $this->Session->setFlash(__('Veuillez Activer votre compte, merci.'), 'notif_front', array('type' => 'error'));
                                $this->redirect($this->Auth->redirect(array('controller' => 'pages', 'action' => 'home')));
                            } else {
                                $this->Session->setFlash(__('Bienvenue :)'), 'notif_front');
                                $this->redirect($this->Auth->redirect(array('controller' => 'pages', 'action' => 'home')));
                            }
                        }
                    } else {
                        $this->Session->setFlash(__('Nom d\'user ou mot de passe invalide, réessayer'), 'notif_front', array('type' => 'error'));
                    }
                }
            }
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_liste_users() {
        $this->set('title_for_layout', 'Liste Users');
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
        //$this->set('users', $this->User->find('all'));
    }

    public function admin_add() {
        $this->set('title_for_layout', __("Ajout d'utilisteur"));
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'utilisateur a été bien sauvegardé.'), 'notif');
                return $this->redirect(array('action' => 'liste_users'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'), 'notif', array('type' => 'error'));
            }
        }
        $roles = $this->User->Role->find('list');

        $this->set(compact('roles'));
    }

    public function edit_profile() {
        $this->User->id = $this->Auth->user('id');
        $this->request->data = $this->User->find('first', array(
            'conditions' => array('User.id' => $this->User->id)
        ));
    }

    public function change_pwd() {
        
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'), 'notif');
                $this->redirect(array('action' => 'liste_users'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'), 'notif', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    public function admin_delete($id = null) {
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('L\'utilisateur avec l\'' . $id . ' a été supprimé.'), 'notif');
            $this->redirect(array('action' => 'liste_users'));
        }
    }

//data['User']['nom_user'] ['User']['mot_de_passe']
//$this->Session->read('Auth.User')    
    public function admin_login() {

        if ($this->Session->read('Auth.User') == null) {
            $this->set('title_for_layout', 'Login');
            //$this->layout = false;
            // debug($this->Auth->user('role'));
            //this->User->save(array('username' => 'hedi','password' =>$this->Auth->password('hedi'),'role' => 'admin'));
            if (!empty($this->request->data)) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect(array('controller' => 'pages', 'action' => 'index')));
                } else {
                    $this->Session->setFlash(__('Nom d\'user ou mot de passe invalide, réessayer'));
                }
            }
        } else {
            $this->Session->setFlash(__('Vous êtes déjà Connecté'), 'notif_front', array('type' => 'error'));
            $this->redirect($this->referer());
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout('/'));
    }

}
