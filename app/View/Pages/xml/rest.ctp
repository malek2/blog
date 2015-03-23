
<?php
//debug($posts);

//echo $this->Xml->header();
//header('Content-type: text/json');
echo 'aze ';
$xml = Xml::fromArray(array('response' => $posts));
echo $xml->asXML();
?>