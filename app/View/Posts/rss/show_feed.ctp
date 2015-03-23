<?php

$this->set('channel', array(
    'title' => $post['Post']['name'],
    'link' => $this->Html->url($post['Post']['link']),
    'description' => "Actu - ".$post['Category']['name'],
    'lang' => 'fr-fr'
));

    $link = $this->Html->url($post['Post']['link'], true);
    echo $this->Rss->item(array(), array(
        'title' => $post['Post']['name'],
        'link' => $link,
        'guid' => array('url' => 'http://largestinfo.pro', 'isPermalink' => true),
        'description' => strip_tags($post['Post']['content']),
        'pubDate' => $post['Post']['created']
    ));