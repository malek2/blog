<nav id="dl-menu" class="dl-menuwrapper" role="navigation">
    <button class="dl-trigger">Open Menu</button>
    <ul class="dl-menu">
        <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index', 'admin' => true), true); ?>">Dashboard</a></li>
        <li>
            <a href="#"><?php echo __('Dernier Articles Ajoutés'); ?></a>
            <ul class="dl-submenu">
                <?php foreach ($frontLastP as $flp): ?>
                    <li style="cursor: pointer" onclick="window.open('<?php echo $this->Html->url($flp['Post']['link'], true); ?>', '_blank');">
                        <?php echo $this->Html->image($flp['Media'][0]['urls'], array()); ?>
                        <h4><?php echo $flp['Post']['name']; ?></h4>
                    </li>
                <?php endforeach; ?>
                <li><a href="http://springerpe.github.io/about/">Learn More</a></li>
                <li><a href="http://springerpe.github.io/team/">Meet the team</a></li>
                <li>
                    <a href="mailto:Platform-Engineering@springer.com"><i class="icon-envelope"></i> Email</a>
                </li>
                <li>
                    <a href="http://twitter.com/springerpe"><i class="icon-twitter"></i> Twitter</a>
                </li>



                <li>
                    <a href="http://github.com/springerpe"><i class="icon-github"></i> GitHub</a>
                </li>




            </ul><!-- /.dl-submenu -->
        </li>
        <li>
            <a href="#">Posts</a>
            <ul class="dl-submenu">
                <li><a href="http://springerpe.github.io/posts/">All Posts</a></li>
                <li><a href="http://springerpe.github.io/tags/">All Tags</a></li>
            </ul>
        </li>
        <li><a href="http://spiking-the-solution.tumblr.com">Springer Devs Blog</a></li><li><a href="http://joinit.springer.com">JoinIT</a></li><li><a href="http://www.trello.com">Trello</a></li><li><a href="http://www.hipchat.com">HipChat</a></li>
    </ul><!-- /.dl-menu -->
</nav><!-- /.dl-menuwrapper -->