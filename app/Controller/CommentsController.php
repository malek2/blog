<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentsController
 *
 * @author RIAHI
 */
App::uses('AppController', 'Controller');

class CommentsController extends AppController {

    public $uses = array('Comment');
    public $components = array(
        'RequestHandler',
        'Session',
        'MathCaptcha' => array('timer' => 3),
        'Paginator' => array(
            'limit' => 10,
            'paramType' => 'querystring'
    ));
    public $helpers = array('Js' => array('Jquery'));

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('comment','rep');
    }

    public function comment($id = null) {
        if ($this->request->is('post')) {

            $this->Comment->create();
            if ($this->MathCaptcha->validates($this->request->data['Comment']['captcha'])) {
                if ($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash('Commentaire Ajouté ! en attente d\'approbation !', 'notif_front');
                    //$this->redirect('/post/' . $this->request->data['Comment']['slug'] . '-' . $id);
                    $this->redirect($this->referer());
                } else {
                    $this->Session->setFlash('Commentaire Non Ajouté', 'notif_front', array('type' => 'error'));
                }
            } else {
                $this->Session->setFlash('Commentaire Non Ajouté, vérifié le captcha :(', 'notif_front', array('type' => 'error'));
            }
        }
    }

    public function rep($id = null) {

        if ($this->request->is('post')) {

            $this->Comment->create();
            if ($this->MathCaptcha->validates($this->request->data['Comment']['captcha'])) {
                if ($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash('Commentaire Ajouté ! en attente d\'approbation !', $element = 'valide_msg');
                    $this->redirect('/post/' . $this->request->data['Comment']['slug'] . '-' . $id);
                } else {
                    $this->Session->setFlash('Commentaire Non Ajouté', $element = 'error_msg');
                }
            } else {
                $this->Session->setFlash('Commentaire Non Ajouté, vérifié le captcha :(', $element = 'error_msg');
            }
        }
    }

    public function admin_index() {
        $this->set('comments', $this->paginate('Comment'));
    }

    public function admin_wait() {
        $this->set('comments', $this->paginate(array('Comment.comment_approved' => 0)));
    }

    public function admin_approve($id = null) {
        if (!$this->Comment->exists($id)) {
            throw new NotFoundException(__('Commentaire invalide'));
        }
        $this->Comment->id = $id;
        if ($this->Comment->saveField('comment_approved', 1)) {
            $this->Session->setFlash(__('Commentaire Approuvé'), 'notif');
            $this->redirect(array('controller' => 'comments', 'action' => 'wait', 'admin' => true));
        } else {
            $this->Session->setFlash(__('Commentaire Non Approuvé'), 'notif',array('type'=>'error'));
            $this->redirect(array('controller' => 'comments', 'action' => 'wait', 'admin' => true));
        }
    }

    public function admin_delete($id = null) {

        $this->Comment->id = $id;

        if ($this->Comment->delete($id, true)) {
            $this->Session->setFlash(__('Commentaire effacé.'), 'notif');
            $this->redirect(array('action' => '/'));
        }
        $this->Session->setFlash(__('Commentaire non effacé.'), 'notif',array('type'=>'error'));
        $this->redirect(array('action' => '/'));
    }

}

?>
