<?php

App::uses('AppModel', 'Model');

class Contact extends AppModel {

    //var $useDbConfig = "default";
    var $name = "Contact";
    var $useTable = false;
    var $_schema = array(
        "nom" => array(
            "type" => "string",
            "length" => 30
        ),
        "email" => array(
            "type" => "email",
            "length" => 50
        ),
        "message" => array(
            "type" => "textarea"
        )
    );

}

?>
