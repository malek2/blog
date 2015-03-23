<?php

App::uses('AppController', 'Controller');

class MediasController extends AppController {

//    public function beforeFilter() {
//        parent::beforeFilter();
//        //$this->layout = 'window_default';
//    }
    public $uses = array('Media', 'Post');
    public $components = array('Img', 'Paginator');

    public function admin_background_image() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dir = IMAGES;
            debug($data);
            $filename = 'bg.jpg';
            $success = $this->Media->save(array(
                'name' => $filename,
                'url' => $dir . DS . $filename,
                'post_id' => 0,
                'type' => 'image_bg'
            ));
            if ($success) {
                move_uploaded_file($data['Media']['file']['tmp_name'], $dir . DS . $filename);
                $this->Session->setFlash(__('L\'image a bien été insérée'), 'notif');
                $this->redirect(array('controller' => 'medias', 'action' => 'background_image', 'admin' => true));
            } else {
                $this->Session->setFlash(__('L\'image n\'est pas au bon format'), 'notif', array('type' => 'error'));
            }
        }
    }

    public function admin_delBg() {
        $img = $this->Media->find('first', array(
            'conditions' => array('Media.name' => 'bg.jpg')
        ));
        $img = $img['Media']['url'];
        if (unlink($img)) {
            $this->Session->setFlash(__('Image de Fond supprimée'), 'notif');
            $this->redirect(array('controller' => 'medias', 'action' => 'background_image', 'admin' => true));
        } else {
            $this->Session->setFlash(__('Image Introuvable'), 'notif', array('type' => 'error'));
            $this->redirect(array('controller' => 'medias', 'action' => 'background_image', 'admin' => true));
        }
    }

    public function admin_index($post_id = null) {
        if ($post_id == null) {
            $LastPostID = $this->Post->find('first', array(
                'order' => array('Post.created DESC'),
                'fields' => 'Post.id'
            ));

            $post_id = $LastPostID['Post']['id'] + 1;
        }
        //debug($post_id);
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $dir = IMAGES . date('Y');
            if (!file_exists($dir))
                mkdir($dir, 0777);
            $dir .= DS . date('m');
            if (!file_exists($dir))
                mkdir($dir, 0777);
            $f = explode('.', $data['Media']['file']['name']);
            $ext = '.' . end($f);
            $filename = Inflector::slug(implode('.', array_slice($f, 0, -1)), '-');
            //Save in BDD
            $success = $this->Media->save(array(
                'name' => $data['Media']['name'],
                'url' => date('Y') . '/' . date('m') . '/' . $filename . $ext,
                'post_id' => $post_id,
                'type' => 'image'
            ));
            if ($success) {
                move_uploaded_file($data['Media']['file']['tmp_name'], $dir . DS . $filename . $ext);
                foreach (Configure::read('Media.formats') as $k => $v) {
                    $prefix = substr($k, 0, 1);
                    $size = explode('x', $v);
                    $this->Img->crop($dir . DS . $filename . $ext, $dir . DS . $filename . '_' . $prefix . $ext, $size[0], $size[1]);
                }
                $this->Session->setFlash(__('L\'image a bien été insérée'), 'notif');
            } else {
                $this->Session->setFlash(__('L\'image n\'est pas au bon format'), 'notif', array('type' => 'error'));
            }
        }
//        $d['medias'] = $this->Media->find('all',array(
//            'conditions'=> array('post_id'=> $post_id)
//        ));

        $this->Media->recursive = 0;
        $medias = $this->Media->find('all', array(
            'conditions' => array('Media.post_id' => $post_id)
        ));
        $formats = Configure::read('Media.formats');
        //$this->set('d',);
        $this->set(compact('medias', 'formats'));
    }

    public function admin_show($id = null, $format = '') {

        if ($this->request->is('post')) {

            $this->set('m', $this->request->data);
            $this->layout = false;
            $this->render(false);
            $this->render('tiny');
            return;
        }
        if ($id) {

            $this->Media->id = $id;
            $media = current($this->Media->read(null, $id));
            $d['url'] = Router::url('/img/' . $media['url' . $format]);
            $d['alt'] = $media['name'];
            $d['class'] = 'alignLeft';
        } else {

            $d = $this->request->query;
        }
        $this->set('m', $d);
    }

    public function admin_delete($id = null) {

        $this->Media->id = $id;
        $file = $this->Media->field('url');
        $f = explode('.', $file);
        $ext = '.' . end($f);
        $filename = implode('.', array_slice($f, 0, -1));
        //debug($filename);


        if (!$this->Media->exists()) {
            $this->Session->setFlash('Cette Image n\'pas pu être Supprimée !', 'notif',array('type'=>'error'));
            $this->redirect(array('controller' => 'medias', 'action' => 'index'));
        }

        if (unlink(IMAGES . DS . $file)) {
            foreach (glob(IMAGES . DS . $filename . '_*.jpg') as $v) {
                unlink($v);
            };
            if ($this->Media->delete($id)) {

                $this->Session->setFlash('Image Supprimée avec Succes.', 'notif');
                $this->redirect(array('controller' => 'medias', 'action' => 'index'));
            } elseif (!unlink(IMAGES . DS . $file)) {
                $this->Session->setFlash('Cette Image n\'pas pu être Supprimée !', 'notif',array('type'=>'error'));
                $this->redirect(array('controller' => 'medias', 'action' => 'index'));
            }
        }
    }

}