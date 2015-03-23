<?php $this->set('title_for_layout', __('Accueil | Amira SLIM')); ?>
<?php 

//debug($posts);     ?>
<div class="grid">

    <div class="row offset1">
        <div class="grid">
            <div class="row">
                <div class="span9">
                    <?php //debug($posts); die(); ?>
                    <?php foreach ($posts as $k => $v): ?>
                        <div>
                            <a href="" class="button small danger"><?php echo $v['Category']['name']; ?></a>
                            <h4><a href="#" onclick="document.location.href = '<?php echo $this->Html->url($v['Post']['link']); ?>'"><?php echo $v['Post']['name']; ?></a></h4>
                            <small class="icon-calendar"></small><small>&nbsp;<?php echo $v['Post']['created']; ?></small>
                        </div>
                        <div class="cb"></div>
                        <?php echo $this->Text->truncate($v['Post']['content'], 700, array('exact' => false, 'html' => true)); ?>
                        <button class="icon-arrow-right-3 bg-cyan place-right" onclick="document.location.href = '<?php echo $this->Html->url($v['Post']['link']); ?>'">
                            <?php echo __('Lire la suite') ?>
                        </button>
                        <div class="cb"></div>
                    <?php endforeach; ?>
                </div>
                <div class="span3 widget ">
                    <h3  style="margin-right: 10px"><?php echo __('Catégories') ?><div class="icon-arrow-right-3" style="display: block;float: right;margin-top: 6px"></div></h3>
                    <?php //debug($categories); ?>
                    <?php foreach ($categories as $kk => $vv): ?>
                        <div>
                            <a href="<?php echo $this->Html->url($vv['Category']['link']); ?>" class="">
                                <?php echo $vv['Category']['name']; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <h3  style="margin-right: 10px"><?php echo __('Articles Populaires') ?><div class="icon-arrow-right-3" style="display: block;float: right;margin-top: 6px"></div></h3>
                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum
                    <h3  style="margin-right: 10px"><?php echo __('Sondage') ?><div class="icon-arrow-right-3" style="display: block;float: right;margin-top: 6px"></div></h3>     
                </div>
            </div>
        </div>
    </div>
    <div class="grid">
        <div class="row offset1">
            <div class="span4">

            </div>
        </div>
    </div>