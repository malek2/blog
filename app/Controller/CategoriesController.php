<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

    public $uses = array('Category', 'Post');
    public $components = array(
        'Paginator' => array(
            'order' => array(
                'Category.position' => 'ASC'
            )
        )
    );

    public function admin_update_pos() {
        $data = $this->request->query;
        $d = $data['element'];
        foreach ($d as $key => $value) {
            $data = explode('.', $value);
            $id = $data[0];
            $position = $data[1];
            $this->Category->id = $id;
            //$sql = "UPDATE categories SET position = '$position' WHERE id='$id'";
            if ($this->Category->saveField('position', $position)) {
                $this->Session->setFlash(__('Position mise à jour.'), 'notif');
            } else {
                $this->Session->setFlash(__('Position non mise à jour.'), 'notif', array('type' => 'error'));
            }
        }
        die();
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('sort_by_cat');
    }

    function sort_by_cat($name = null) {
        $id = $this->Category->find('first', array(
            'conditions' => array('Category.name' => $name)
        ));
        $id = current($id);
        $id = current($id);
        //debug($id); die();
        $pcat = $this->Post->find('all', array(
            'conditions' => array('Category.id' => $id)
        ));
        $this->set('postsCat', $pcat);
        $nameTrue = $this->Category->find('first', array(
            'conditions' => array('Category.id' => $id),
            'fields' => 'name'
        ));
        $nameTrue = current($nameTrue);
        $nameTrue = current($nameTrue);
        $this->set('name', $nameTrue);
        $this->set('slug', $name);
    }

    function admin_index() {
        $d = $this->Category->find('all');
        $this->set('categories', $d);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('La Catégorie a été sauvegardé'), 'notif');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La Catégorie n\'a pas été sauvegardé. Merci de réessayer.'), 'notif', array('type' => 'error'));
            }
        }
    }

    public function admin_drop() {
//        $categories = $this->Category->find('all', array(
//            'conditions' => array('Category.type' => 'drop')
//        ));
        $categories = $this->paginate('Category', array('Category.type' => 'drop'));
        $this->set(compact('categories'));
    }

    public function admin_menu() {
//        $categories = $this->Category->find('all', array(
//            'conditions' => array('Category.type' => 'menu')
//        ));
        $categories = $this->paginate('Category', array('Category.type' => 'menu'));
        $this->set(compact('categories'));
    }

    public function admin_edit($id = null) {
        if (is_int($id)) {
            if (!$this->Category->exists($id)) {
                throw new NotFoundException(__('Catégorie Invalide'));
            }
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['Category']['type'] = $id;
            $this->Category->create();
            if ($this->Category->save($data)) {
                $this->Session->setFlash(__('La Catégorie a été sauvegardé'), 'notif');
                $this->redirect(array('action' => $id));
            } else {
                $this->Session->setFlash(__('La Catégorie n\'a pas été sauvegardé. Merci de réessayer.'), 'notif', array('type' => 'error'));
            }
        }
        if ($this->request->is('put')) {
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('L\'état à été bien Modifié.'));
                $this->redirect(array('action' => $this->params['pass'][1]));
            } else {
                $this->Session->setFlash(__('L\'état  n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
        }
    }

    public function admin_delete($id = null) {
        debug($id);
        $this->Category->id = $id;
        $action = $this->Category->read();
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Catégorie Invalide.'));
        }
        if (!$this->Category->exists()) {
            $this->Session->setFlash('La Catégorie n\'a pas été Supprimé !', 'notif', array('type' => 'error'));
        }

        if ($this->Category->delete($id)) {
            $this->Session->setFlash('Catégorie Supprimé.', 'notif');
            $this->redirect(array('action' => $action['Category']['type']));
        }
//            $this->Category->id = $id;
//		if (!$this->Category->exists()) {
//			throw new NotFoundException(__('Catégorie Invalide.'));
//		}
//		$this->request->onlyAllow('post', 'delete');
//		if ($this->Category->delete()) {
//			$this->Session->setFlash(__('Catégorie Supprimé.'), $element = 'valide_msg');
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->Session->setFlash(__('La Catégorie n\'a pas été Supprimé.'), $element = 'error_msg');
//		$this->redirect(array('action' => 'index'));
    }

}