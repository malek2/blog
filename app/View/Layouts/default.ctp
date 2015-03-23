<?php
echo $this->Html->docType('html5');
echo $this->OpenGraph->html();
?>
<head >
    <?php echo $this->Html->charset('utf-8'); ?>
    <title>
        <?php echo $this->Breadcrumb->pageTitle('News Largest'); ?>
    </title>
    <?php
    if ($this->params['controller'] == 'pages' && $this->params['action'] == 'home') {
        echo $this->Html->meta(array('name' => 'description', 'content' => 'Toute l\'actualité en Tunisie sur Largestinfo.'));
        $this->OpenGraph->uri('http://news.largestinfo.pro/index.php');
    }
    if ($this->params['controller'] == 'posts' && $this->params['action'] == 'show') {
        echo $this->Html->meta(array('name' => 'description', 'content' => $desc));
    }
    $this->OpenGraph->name($title_for_layout);
    $this->OpenGraph->appId('506771819391722');
    $this->OpenGraph->admins('1634378085');
    $this->OpenGraph->locale('fr_FR');
    if ($this->params['controller'] == 'pages' && $this->params['action'] == 'home') {
        $this->OpenGraph->type('website');
    } else {
        $this->OpenGraph->type('article');
    }
    echo $this->OpenGraph->fetch();
    ?>
    <?php
    echo $this->Html->meta('Largestinfo', '/favicon.ico', array('rel' => 'shortcut icon'));
    echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1'));
    echo $this->Html->css('http://fonts.googleapis.com/css?family=Roboto+Slab');
    echo $this->Html->css('font-awesome.min');
    echo $this->Html->css('weather-icons.min');
    echo $this->Html->css('megafish');
    echo $this->Html->css('framework');
    echo $this->Html->css('flexslider/flexslider-alt');
    echo $this->Html->css('flexslider/flexslider-tab');
    echo $this->Html->css('style', array('media' => 'screen'));
    echo $this->Html->css('print', array('id' => 'print-style-css', 'media' => 'print'));
    echo $this->Html->css('frontcontrol');
    echo $this->Html->css('style');
    ?>
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('custom'); ?>

    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body class="site-boxed">
    <div class="site-wrapper">
        <?php echo $this->element('header'); ?>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('footer'); ?>
    </div><!-- .site-wrapper -->
    <a id="toTop" href="#"><i class="fa fa-long-arrow-up"></i></a>
    <!-- JS -->
    <?php echo $this->element('js'); ?>
    <?php echo $scripts_for_layout; ?>
    <!-- End JS -->
    <?php //echo $this->Facebook->init(); ?>
    <?php echo $this->element('sql_dump');  ?>

</body>
</html>
