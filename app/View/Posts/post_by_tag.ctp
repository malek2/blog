<?php $this->set('title_for_layout', __('Tags') . ' | ' . $tagName); ?>

<div class="divider"></div>

<section class="container main-content">
    <div class="row">
        <div class="col-md-9">
            <div class="boxedtitle page-title"><h2><?php echo __('Articles : ') . $tagName; ?></h2></div>
            <?php foreach ($postTags as $k => $v): // debug($v); die();  ?>
                <article class="post clearfix">
                    <div class="post-inner">
                        <h2 class="post-title">
                            <span class="post-type"><i class="icon-file-alt"></i></span>
                            <a href="<?php echo $this->Html->url('/post/'.$v['Post']['slug'].'-'.$v['Post']['id']); ?>">
                                <?php echo $v['Post']['name'] ?>
                            </a>
                        </h2>
                        <div class="post-meta">
                            <span class="meta-author"><i class="icon-user"></i><a href="#">Administrator</a></span>
                            <span class="meta-date"><i class="icon-time"></i>September 30 , 2013</span>
                            <span class="meta-categories"><i class="icon-suitcase"></i><a href="#">Wordpress</a></span>
                            <span class="meta-comment"><i class="icon-comments-alt"></i><a href="#">15 comments</a></span>
                        </div>
                        <div class="post-content">
                            <p><?php echo $this->Text->truncate($v['Post']['content'], 700, array('exact' => false, 'html' => true)); ?></p>
                            <a href="<?php echo $this->Html->url('/post/'.$v['Post']['slug'].'-'.$v['Post']['id']); ?>" class="post-read-more button color small"><?php echo __('Lire la suite') ?></a>
                        </div><!-- End post-content -->
                    </div><!-- End post-inner -->
                </article>
            <?php endforeach; ?>
        </div>
        <aside class="col-md-3 sidebar">
            <div class="widget widget_tag_cloud">
                <h3 class="widget_title"><?php echo __('Tags') ?></h3>
                <?php foreach ($tags as $tag): ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'postByTag', $tag['Tag']['id'])); ?>">
                        <?php echo $tag['Tag']['name']; ?>(<?php echo $tag['Tag']['counter']; ?>)
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>
    </div>
</section>