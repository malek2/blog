<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContactController extends AppController {

    var $name = "Contact";
    var $uses = array("Contact");
    public $components = array('MathCaptcha' => array('timer' => 3));
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    public function index() {
        if ($this->request->is('post')) {
            App::uses('CakeEmail', 'Network/Email');
            $Email = new CakeEmail();
            if ($Email->from(array($this->request->data['Contact']['email'] => 'Pro Largestinfo'))
                            ->to('contact@largestinfo.pro')
                            ->template('')
                            ->emailFormat('html')
                            ->subject("contact prolargestinfo")
                            ->send('Nom : ' . $this->request->data['Contact']['nom'] . '<br>' .
                                    'Email :' . $this->request->data['Contact']['email'] . '<br>' .
                                    'Message :' . $this->request->data['Contact']['message'])) {
                $this->Session->setFlash('Message Envoyé!');
                $this->redirect($this->referer());
                
            }
            if (!$Email->from(array($this->request->data['Contact']['email'] => 'Pro Largestinfo'))
                            ->template('welcome', 'message')
                            ->emailFormat('html')
                            ->to('contact@largestinfo.pro')
                            ->subject("contact prolargestinfo")
                            ->send('Nom : ' . $this->request->data['Contact']['nom'] . '<br>' .
                                    'Email :' . $this->request->data['Contact']['email'] . '<br>' .
                                    'Message :' . $this->request->data['Contact']['message'])) {
                $this->Session->setFlash('Message Non Envoyé!');
                $this->redirect($this->referer());
            }
        }
    }

}

?>
