<?php
Router::mapResources('posts');
Router::parseExtensions('rss','json');

Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
Router::connect('/LogIn', array('controller' => 'users', 'action' => 'login', 'admin' => false));
Router::connect('/creer-compte', array('controller' => 'users', 'action' => 'register', 'admin' => false));
Router::connect('/monProfil', array('controller' => 'users', 'action' => 'edit_profile', 'admin' => false));
Router::connect('/tags', array('controller' => 'pages', 'action' => 'tags', 'admin' => false));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'home'));
Router::connect('/page/:slug-:id', array('controller' => 'pages', 'action' => 'show'), array('pass' => array('id', 'slug'), 'id' => '[0-9]+', 'slug' => '[a-z0-9\-]+'));
Router::connect('/post/:slug-:id', array('controller' => 'posts', 'action' => 'show'), array('pass' => array('id', 'slug'), 'id' => '[0-9]+', 'slug' => '[a-z0-9\-]+'));
Router::connect('/categorie/:cat', array('controller' => 'posts', 'action' => 'post_cat', 'admin' => false), array('pass' => array('cat'), 'cat' => '[a-z0-9\-]+'));
Router::connect('/post/feed.rss', array('controller' => 'posts', 'action' => 'feed.rss', 'admin' => false));
//Router::connect('/post/:id/show.rss', array('controller' => 'posts', 'action' => 'show_feed', 'admin' => false), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/post/*', array('controller' => 'posts', 'action' => 'index', 'admin' => false));
Router::connect('/Tags/Tag-:id', array('controller' => 'posts', 'action' => 'postByTag', 'admin' => false), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/image-arriere-plan', array('controller' => 'medias', 'action' => 'background_image', 'admin' => true));
Router::connect('/supprimer-bg', array('controller' => 'medias', 'action' => 'delBg', 'admin' => true));
Router::connect('/largest-admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
Router::connect('/largest-admin/', array('controller' => 'users', 'action' => 'login', 'admin' => true));
Router::connect('/bye', array('controller' => 'users', 'action' => 'logout', 'admin' => false));
Router::connect('/largest-admin/profile', array('controller' => 'users', 'action' => 'profile', 'admin' => true));
Router::connect('/largest-admin/accueil', array('controller' => 'pages', 'action' => 'index', 'admin' => true));


/**
 * Routage Gestion Users
 */
Router::connect('/gestion-users', array('controller' => 'users', 'action' => 'liste_users', 'admin' => true));
Router::connect('/gestion-users/ajouter', array('controller' => 'users', 'action' => 'add', 'admin' => true));
Router::connect('/gestion-users/modifier-:id', array('controller' => 'users', 'action' => 'edit', 'admin' => true), array('pass' => array('id'), 'id' => '[a-z0-9]+'));
Router::connect('/gestion-users/supp-:id', array('controller' => 'users', 'action' => 'delete', 'admin' => true), array('pass' => array('id'), 'id' => '[a-z0-9]+'));
/**
 * Routage Gestion Categories
 */
Router::connect('/gestion-categories-drop', array('controller' => 'categories', 'action' => 'drop', 'admin' => true));

Router::connect('/gestion-categories-menu', array('controller' => 'categories', 'action' => 'menu', 'admin' => true));

Router::connect('/gestion-categories-:type/ajouter', array('controller' => 'categories', 'action' => 'edit', 'admin' => true), array('pass' => array('type'), 'type' => '[a-z0-9\-]+'));

Router::connect('/gestion-categories-:type/modifier-:id', array('controller' => 'categories', 'action' => 'edit', 'admin' => true), array('pass' => array('id', 'type'), 'id' => '[0-9]+'));

Router::connect('/gestion-categories-:type/supp-:id', array('controller' => 'categories', 'action' => 'delete', 'admin' => true), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Routage Gestion Articles
 */
Router::connect('/gestion-articles', array('controller' => 'posts', 'action' => 'index', 'admin' => true));
Router::connect('/gestion-articles/ajouter', array('controller' => 'posts', 'action' => 'add', 'admin' => true));
Router::connect('/gestion-articles/modifier-:id', array('controller' => 'posts', 'action' => 'edit', 'admin' => true), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-articles/supp-:id', array('controller' => 'posts', 'action' => 'delete', 'admin' => true), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Routage Gestion Pages
 */
Router::connect('/gestion-pages', array('controller' => 'pages', 'action' => 'pages', 'admin' => true));
Router::connect('/gestion-pages/ajouter', array('controller' => 'pages', 'action' => 'add', 'admin' => true));
Router::connect('/gestion-pages/modifier-:id', array('controller' => 'pages', 'action' => 'edit', 'admin' => true), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-pages/supp-:id', array('controller' => 'pages', 'action' => 'delete', 'admin' => true), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Routage Gestion Commentaires
 */
Router::connect('/gestion-commentaires', array('controller' => 'comments', 'action' => 'index', 'admin' => true));
Router::connect('/gestion-commentaires/en-attente', array('controller' => 'comments', 'action' => 'wait', 'admin' => true));
Router::connect('/gestion-commentaires/approuver-:id', array('controller' => 'comments', 'action' => 'approve', 'admin' => true), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-commentaires/supp-:id', array('controller' => 'comments', 'action' => 'delete', 'admin' => true), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Routage Gestion Roles
 */
Router::connect('/gestion-roles', array('controller' => 'roles', 'action' => 'index', 'admin' => true));
Router::connect('/gestion-roles/ajouter', array('controller' => 'roles', 'action' => 'add', 'admin' => true));
Router::connect('/gestion-roles/modifier-:id', array('controller' => 'roles', 'action' => 'edit', 'admin' => true), array(
    'pass' => array('id'),
    'id' => '[a-z0-9]+'
));
Router::connect('/gestion-roles/supp-:id', array('controller' => 'roles', 'action' => 'delete', 'admin' => true), array(
    'pass' => array('id'),
    'id' => '[a-z0-9]+'
));
/**
 * Routage Image & Vidéo du jour
 */
Router::connect('/gestion-DuJour-:type', array('controller' => 'days', 'action' => 'edit','admin' => true), array(
    'pass' => array('type'),
    'type' => '[a-z0-9\-]+'
));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
