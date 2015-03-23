<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Media
 *
 * @author RIAHI
 */
class Media extends AppModel {

    public $name = 'Media';
    public $useTable = 'medias';
    public $validate = array(
        'url' => array(
            'rule' => '/^.*\.(jpg|png|jpeg)$/',
            'allowEmpty' => true,
            'message' => 'image invalid'
        )
    );

    public function afterFind($data, $primary = FALSE) {
        parent::afterFind($data, $primary = false);
        foreach ($data as $k => $d) {
            if (isset($d['Media']['url']) && isset($d['Media']['type']) && $d['Media']['type'] == 'image') {
                $filename = implode('.', array_slice(explode('.', $d['Media']['url']), 0, -1));
                foreach (Configure::read('Media.formats') as $kk => $vv) {
                    $d['Media']['url' . $kk] = $filename . '_' . $kk . '.jpg';
                }
            }
            $data[$k] = $d;
        }
        return $data;
    }

}

?>
