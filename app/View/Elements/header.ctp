<div class="prl-container">
    <header id="masthead" class="clearfix">
        <div class="prl-header-logo"><a href=""><?php echo $this->Html->image('logo.png', array('alt' => 'Largestinfo')); ?></a></div>

        <div class="prl-header-social">
            <a href="https://www.facebook.com/largestinfo.m" class="fa fa-facebook" title="Facebook" data-prl-tooltip=""></a>
            <a href="https://twitter.com/Largestinfo" class="fa fa-twitter" title="Twitter" data-prl-tooltip=""></a>
            <a href="http://largestinfo.pro" title="Twitter" data-prl-tooltip=""><?php echo $this->Html->image('website.png',array('style'=>'position: relative;top: -30px;width:16px')); ?></a>
            <a href="http://largestinfo.us" title="Twitter" data-prl-tooltip=""><?php echo $this->Html->image('info.png',array('style'=>'position: relative;top: -29px;width:16px')); ?></a>
        </div>
        <div class="prl-header-right">
            <span class="prl-header-custom-text"><i class="fa fa-phone-square"></i> +216 71 906 030</span>
            <span class="prl-header-time"><i class="fa fa-clock-o"></i> 
                <?php
                setlocale(LC_TIME, 'fr_FR', 'fra');
                echo ucfirst(utf8_encode(strftime("%A, %d %B %Y")));
                ?>
            </span>
        </div>	
    </header>


    <nav id="nav" class="prl-navbar" role="navigation">
        <div class="nav-wrapper"> <div class="nav-container clearfix">
                <ul class="sf-menu sf-js-enabled sf-arrows" id="sf-menu">
                    <li class="menu_item-home current">
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home', 'admin' => false)); ?>"><i class="fa fa-home"></i> <?php echo __('Accueil'); ?></a>
                    </li>
                    <li class="sf-mega-parent"><a href="#" id="mega1"  class="sf-with-ul" onclick="return false;"><i class="fa fa-flag"></i>À la une</a>
                        <div class="sf-mega" id="mega1sub" style="display: none;">
                            <div class="prl-grid prl-grid-divider">
                                <?php foreach ($widgets as $widget): ?>
                                    <div class="prl-span-3">
                                        <article class="prl-article">
                                            <a class="prl-thumbnail" href="<?php echo $this->Html->url($widget['Post']['link']); ?>">
                                                <span class="prl-overlay">
                                                    <?php echo $this->Html->image($widget['Media'][0]['urlm'], array('alt' => $widget['Post']['name'])); ?>
                                                    <span class="prl-overlay-area o-video"></span>
                                                </span>
                                            </a>
                                            <h3 class="prl-article-title"><a href="<?php echo $this->Html->url($widget['Post']['link']); ?>"><?php echo ucfirst($widget['Post']['name']); ?></a> <span class="prl-badge prl-badge-warning"><?php echo $widget['Category']['name']; ?></span></h3> 
                                            <div class="prl-article-meta">
                                                <i class="fa fa-calendar-o"></i> <?php echo $widget['Post']['created']; ?>&nbsp;&nbsp;
                                            </div>    
                                            <p><?php echo strip_tags($this->Text->truncate($widget['Post']['content'], 100, array('html' => true))); ?></p>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            </div>		
                        </div>
                    </li>

                    <?php foreach ($categoriesM as $catM): $catM = current($catM); ?>
                        <?php foreach ($catM as $categoryM): ?>
                            <li>
                                <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'post_cat', 'cat' => $categoryM['Category']['slug'])); ?>">
                                    <?php echo $categoryM['Category']['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    <li id="lul">
                        <a href="#" id="posts" class="sf-with-ul"><i class="fa fa-try"></i> Autres</a>
                        <ul class="sf-list none" id="postssub">
                            <?php foreach ($categoriesD as $catD): $catD = current($catD); ?>
                                <?php foreach ($catD as $categoryD): ?>
                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'post_cat', 'cat' => $categoryD['Category']['slug'])); ?>">
                                            <?php echo $categoryD['Category']['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <a href="#" class="prl-nav-toggle prl-nav-menu" title="Nav" data-prl-offcanvas="{target:'#offcanvas'}"></a>
                <div class="prl-nav-flip">
                    <a href="#" class="prl-nav-toggle prl-nav-toggle-search" title="Search" data-prl-offcanvas="{target:'#offcanvas-search'}"></a>
                </div>
            </div>	
        </div><!-- nav-wrapper -->
    </nav>
    <?php if($currentUser !== null && $currentUser['Role']['role'] === 'admin'): ?>
    <?php echo $this->element('front-control'); ?>
    <?php endif; ?>
    <script>
                        //$("#mega1").attr('style','aze'); $("#mega1sub").removeAttr('style');
                        jQuery(document).ready(function() {
                            $("#mega1").mouseenter(function() {
                                $("#mega1sub").removeAttr('style');
                            });
                            $("#posts").mouseenter(function() {
                                $("#postssub").css('display', 'block');
                            });
                        });
                        jQuery(document).ready(function() {
                            $("#lul").on('mouseleave', function() {
                                $("#postssub").css('display', 'none');
                            });
                        });
    </script>
    <!-- OFF CANVAS -->
    <div id="offcanvas-search" class="prl-offcanvas">
        <div class="prl-offcanvas-bar prl-offcanvas-bar-flip">
            <form class="prl-search">
                <input class="prl-search-field" type="search" placeholder="Recherche...">
            </form>
        </div>
    </div>

    <div id="offcanvas" class="prl-offcanvas">
        <div class="prl-offcanvas-bar">
            <nav class="side-nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home', true)); ?>"><?php echo __('Accueil'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-click" onclick="return false;"><?php echo __('Catégories'); ?><span class="nav-click"></span></a>
                        <ul class="nav-submenu">
                            <?php foreach ($categoriesM as $catM): $catM = current($catM); ?>
                                <?php foreach ($catM as $cM): ?>
                                    <?php // debug($cM) ?>
                                    <li class="nav-submenu-item">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'post_cat', 'cat' => $cM['Category']['slug']), true); ?>">
                                            <?php echo $cM['Category']['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-click" onclick="return false;"><?php echo __('Autres'); ?><span class="nav-click"></span></a>
                        <ul class="nav-submenu">
                            <?php foreach ($categoriesD as $catD): $catD = current($catD); ?>
                                <?php foreach ($catD as $categoryD): ?>
                                    <li class="nav-submenu-item">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'post_cat', 'cat' => $categoryD['Category']['slug']), true); ?>">
                                            <?php echo $categoryD['Category']['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>