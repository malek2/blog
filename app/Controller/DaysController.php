<?php

App::uses('AppController', 'Controller');

class DaysController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function admin_edit($type = null) {
        if ($this->request->is(array('put','post'))) {
            if ($this->Day->save($this->request->data)) {
                $this->Session->setFlash(__('L\'état à été bien Modifié.'));
                $this->redirect(array('controller' => 'pages', 'action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash(__('L\'état  n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->set('type', $type);
            $options = array('conditions' => array('Day.type' => $type));
            $this->request->data = $this->Day->find('first', $options);
//            debug($this->request->data);
//            die();
        }
    }

}
