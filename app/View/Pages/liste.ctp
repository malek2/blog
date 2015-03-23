<?php

$xml = Xml::fromArray(array('response' => $posts));
echo $xml->asXML();
?>