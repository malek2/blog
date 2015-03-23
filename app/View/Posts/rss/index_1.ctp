<?php

$this->set('channel', array(
    'title' => __('Derniers Articles'),
    'link' => '',
    'description' => "Toute l'actualité sur News Largestinfo",
    'lang' => 'fr-fr'
));

foreach ($posts as $post) {
    $link = $this->Html->url($post['Post']['link'], true);
    echo $this->Rss->item(array(), array(
        'title' => $post['Post']['name'],
        'link' => $link,
        'guid' => array('url' => 'http://largestinfo.pro', 'isPermaLink' => true),
        'description' => strip_tags($this->Text->truncate($post['Post']['content'], 250, array('html' => true))),
        'pubDate' => $post['Post']['created']
    ));
}