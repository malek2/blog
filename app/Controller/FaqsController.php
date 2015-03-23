<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP FaqsController
 * @author George
 */
class FaqsController extends AppController {

    
    public function admin_index() {
//        $apiKey = Configure::read('Security.salt');
//        //$data = file_get_contents('http://local.dev/rest.api.news/faqs/index/' . $apiKey . '.json');
//        $data = file_get_contents('http://local.dev/rest.api.news/faqs.json');
//        $faqs = json_decode($data, true);
//        $this->set('faqs', $faqs);
        $var=$this->Faq->find('all');
        $this->set(compact('var'));
    }

}

