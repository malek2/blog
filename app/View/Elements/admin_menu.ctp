<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'index','admin'=>true)); ?>"><?php echo __('Administration') ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilisateurs <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'add','admin'=>true)); ?>">
                                Ajouter un utilisateur
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'liste_users','admin'=>true)); ?>">
                                Liste des Users
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'roles','action'=>'index','admin'=>true)); ?>">
                                Gestion des Rôles
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'add')); ?>">
                                Ajouter une Page
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'pages')); ?>">
                                Liste des Pages
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articles <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'posts','action'=>'add')); ?>">
                                Ajouter un Article
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'posts','action'=>'index')); ?>">
                                Liste des Articles
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'drop', 'admin' => true)); ?>">
                                Gestion des Catégories Drop
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'menu', 'admin' => true)); ?>">
                                Gestion des Catégories Menu
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Du Jour <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'days','action'=>'edit','type'=> 'video','admin'=>true)); ?>">
                                Vidéo
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'days','action'=>'edit','type'=>'image','admin'=>true)); ?>">
                                Image
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'days','action'=>'edit','type'=>'citation','admin'=>true)); ?>">
                                Citation
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li><a href="<?php echo $this->Html->url(array('controller'=>'medias','action'=>'background_image','admin'=>true)); ?>" ><?php echo __('Arrière Plan'); ?></a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'faqs','action'=>'admin_index')); ?>" > FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo $this->Html->url('/'); ?>" target="_blank"><?php echo __('Aperçu Journal'); ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon Compte <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'profile','admin'=>true)); ?>">
                                Mes Paramètres <i class="glyphicon glyphicon-user"></i>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout','admin'=>false)); ?>">
                                Se déconnecter <i class="glyphicon glyphicon-off"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</div>
<div class="cb"></div>