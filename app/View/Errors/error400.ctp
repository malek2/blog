<?php $this->set('title_for_layout',__('Page Non Trouvée')); ?>
<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Erreur 404</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="<?php echo $this->Html->url('/') ?>"><?php echo __('Accueil'); ?></a>
                    <span class="crumbs-span">/</span>
                    <span class="current"><?php echo __('Erreur 404') ?></span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div>
<section class="container main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="error_404">
                <div>
                    <h2><?php echo __('404'); ?></h2>
                    <h3><?php echo __('Page non trouvée'); ?></h3>
                </div>
                <div class="clearfix"></div><br>
                <a href="<?php echo $this->Html->url('/') ?>" class="button large color margin_0"><?php echo __('Accueil'); ?></a>
            </div>
        </div><!-- End main -->
    </div><!-- End row -->
</section>