<?php $this->set('title_for_layout', __('Articles | ') . $name); ?>


<div class="prl-container">

    <div class="prl-grid prl-grid-divider">

        <section id="main" class="prl-span-9">

            <div class="prl-homepage-widget">
                <h5 class="prl-block-title alizarin">Nos Articles</h5>

                <ul class="prl-list-category">
                    <?php foreach ($posts as $post): ?>
                        <li class="clearfix">
                            <article class="prl-article">
                                <a class="prl-thumbnail left" href="single.php">
                                    <div class="prl-overlay">
                                        <?php echo $this->Html->image($post['Media'][0]['url'], array('alt' => $post['Post']['name'], 'style' => 'width:260px;height:260px;max-width:260px;max-height:260px;')); ?>
                                        <div class="prl-overlay-area o-video"></div>
                                    </div>
                                </a>
                                <div class="prl-article-entry">
                                    <h2 class="prl-article-title"><a href="<?php echo $this->Html->url($post['Post']['link']); ?>"><?php echo ucfirst($post['Post']['name']); ?></a> <span class="prl-badge prl-badge-warning">Video</span></h2> 
                                    <div class="prl-article-meta">
                                        <i class="fa fa-calendar-o"></i> <?php echo $post['Post']['created']; ?>
                                    </div>    
                                    <p><?php echo strip_tags($this->Text->truncate($post['Post']['content'],250,array('html'=>true))); ?></p>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="pagin pagin-center" id="pagination">
                    <?php
                    
                    echo $this->Paginator->prev(__('«'), array('tag' => null), null, array('tag' => null, 'class' => 'prev-buton', 'disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => null, 'tag' => 'a', 'currentClass' => 'active', 'id' => '2'));
                    echo $this->Paginator->next(__('»'), array('tag' => null), null, array('tag' => NULL, 'disabledTag' => 'a'));
                    ?>
                </div>
                <script>
                    $.fn.hasAttr = function(name) {
                        return this.attr(name) !== undefined;
                    };
                    jQuery(document).ready(function() {
                        $('#pagination').find('a').each(function() {
                            if ($(this).hasAttr('href') || $(this).hasAttr('class')) {

                            } else {
                                $(this).remove();
                            }
                        });
                    });
                </script>
                <!--                <div class="pagin pagin-center">
                                    <a href=""><i class="fa fa-angle-double-left"></i></a>
                                    <a href="">1</a>
                                    <a href="" class="active">2</a>
                                    <a href="">3</a>
                                    <a href="">4</a>
                                    <a href="">5</a>
                                    <a href=""><i class="fa fa-angle-double-right"></i></a>	
                                </div>        -->
            </div>    
        </section>

        <aside class="prl-span-3">



            <div id="social-widget-1" class="widget social-widget prl-panel">		<!-- BEGIN WIDGET -->
                <h5 class="prl-block-title amber">Social Network</h5>
                <p>Suivez Nous</p>
                <div class="sw-wrapper">
                    <div class="sw-inner prl-clearfix">
                        <a href="#" class="fa fa-facebook" title="Facebook" data-prl-tooltip=""></a>
                        <a href="https://twitter.com/#" class="fa fa-twitter" title="Twitter" data-prl-tooltip=""></a>
                        <a href="#" class="fa fa-rss" title="RSS Feed" data-prl-tooltip=""></a>
                    </div>
                </div>		
            </div>    
            <div id="tag_cloud-2" class="widget widget_tag_cloud prl-panel"><h5 class="prl-block-title">Tags</h5>
                <div class="tagcloud">
                    <?php foreach ($tags as $tag): ?>
                        <a href='<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'postByTag', 'id' => $tag['Tag']['id'])); ?>' class='tag-link-6' title='<?php echo ($tag > 1) ? $tag['Tag']['counter'] . __(' articles') : $tag['Tag']['counter'] . __(' article'); ?>' style='font-size: 16.4pt;'><?php echo $tag['Tag']['name']; ?></a>
                    <?php endforeach; ?>
                </div>

            </div>	
            <div id="categories-3" class="widget widget_categories prl-panel">
                <h5 class="prl-block-title">Categories</h5>
                <ul>
                    <?php foreach ($categories as $category): ?>
                        <li class="cat-item cat-item-2">
                            <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'post_cat', 'cat' => $category['Category']['slug'])); ?>" title="<?php echo $category['Category']['name']; ?>"><?php echo $category['Category']['name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="facebook-like-widget-2" class="widget facebook-widget prl-panel"><h5 class="prl-block-title">Facebook</h5>
                <div class="fw-wrapper">
                    <div class="fw-inner">
                        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Flargestinfo.m&amp;width=500&amp;colorscheme=light&amp;border_color=white&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" id="facebook-iframe"></iframe>

                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
