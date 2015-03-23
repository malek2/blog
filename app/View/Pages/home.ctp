<?php
    $this->OpenGraph->title('Largestinfo News');
    $this->OpenGraph->description(__("Toute l'actualité en Tunisie sur Largestinfo News"));
    $this->OpenGraph->image($this->Html->url('/img/logo.png', true));
    $this->set('title_for_layout', __('Accueil'));
    $this->set('desc', __("Toute l'actualité en Tunisie sur Largestinfo News"));
?>
<div class="prl-container">

    <div class="prl-grid prl-grid-divider">
        <section id="main" class="prl-span-9"> 
            <div id="sliderTab">
                <div id="mainFlexslider" class="slider_content flexslider" >
                    <ul class="slides">
                        <?php foreach ($posts as $post): ?>
                            <li>
                                <article> 
                                    <div class="slider_title">
                                        <h2><a href="<?php echo $this->Html->url($post['Post']['link'], true); ?>"><?php echo $post['Post']['name']; ?></a></h2>
                                    </div>
                                    <a href="<?php echo $this->Html->url($post['Post']['link'], true); ?>">
                                        <?php echo $this->Html->image($post['Media'][0]['url'], array('style' => 'height:395px;max-height:395px;', 'alt' => $post['Post']['name'])); ?>
                                    </a>
                                </article>
                            </li>
                        <?php endforeach; ?>
                    </ul>


                    <script type="text/javascript">
                        $(function() {
                            $('#mainFlexslider').flexslider({
                                animation: "fade",
                                prevText: '<i class="fa fa-angle-left icon-large"></i>',
                                nextText: '<i class="fa fa-angle-right icon-large"></i>',
                                manualControls: "#main-slider-control-nav li"
                            });
                        });
                    </script>

                </div>
                <div class="slider_tabs">
                    <ul class="tabs" id="main-slider-control-nav">
                        <?php foreach ($posts as $post): ?>
                            <li><div class="tab_content"><a href="#"><?php echo $post['Post']['name']; ?></a></div></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>            <div class="prl-panel homepage-widget-tab">

                <ul class="prl-tab" data-prl-tab="{connect:'#content1'}">
                    <li class="prl-active"><a href=""><?php echo ucfirst('À la une'); ?></a></li>
                    <li><a href=""><?php echo __('Image du Jour'); ?></a></li>
                    <li><a href=""><?php echo __('Citation du Jour'); ?></a></li>
                </ul>


                <ul id="content1" class="prl-switcher">
                    <li>
                        <div class="prl-grid prl-grid-divider">
                            <?php foreach ($alaunes as $alaune): ?>
                                <div class="prl-span-4">
                                    <article class="prl-article">
                                        <a class="prl-thumbnail" href="<?php echo $this->Html->url($alaune['Post']['link'], true); ?>">
                                            <span class="prl-overlay">
                                                <?php echo $this->Html->image($alaune['Media'][0]['urls'], array('alt' => $alaune['Post']['name'])); ?>
                                                <span class="prl-overlay-area o-video"></span>
                                            </span>
                                        </a>
                                        <h3 class="prl-article-title"><a href="<?php echo $this->Html->url($alaune['Post']['link'], true); ?>"><?php echo $alaune['Post']['name'] ?></a> <span class="prl-badge prl-badge-red"><?php echo $alaune['Category']['name']; ?></span></h3> 
                                        <div class="prl-article-meta clearfix">
                                            <i class="fa fa-calendar-o"></i> <?php echo $alaune['Post']['created']; ?>
                                        </div>    
                                        <p><?php echo strip_tags($this->Text->truncate($alaune['Post']['content'], 100, array('html' => true))); ?></p>
                                    </article>
                                </div> 
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li>

                        <div class="prl-grid prl-grid-divider">
                            <div class="prl-span-8">
                                <article class="prl-article">
                                    <a class="prl-thumbnail" href="#">
                                        <span class="prl-overlay">
                                            <img src="<?php echo $image['Day']['url']; ?>" alt="<?php echo $image['Day']['name']; ?>">
                                        </span>
                                    </a>
                                </article>
                            </div>
                            <div class="prl-span-4">
                                <article class="prl-article">  
                                    <h3 class="prl-article-title"><?php echo $image['Day']['name']; ?></h3>
                                    <p><?php echo $image['Day']['content']; ?></p>
                                    <small><a href="<?php echo $image['Day']['source']; ?>" target="_blank"><?php echo __('Source'); ?></a></small>
                                </article>
                            </div>
                        </div></li>

                    <li>
                        <div class="prl-grid prl-grid-divider">
                            <div class="prl-span-12">
                                <article class="prl-article">
                                    <h3><?php echo __('Citation :'); ?></h3>
                                    <blockquote style="color: #777;border-left: 5px solid #ddd;margin: -56px 29px 0px -10px;padding-left: 20px;">
                                        <?php echo $citation['Day']['content']; ?>
                                    </blockquote>
                                </article>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>                <div class="prl-panel">
                <h5 class="prl-block-title sienna">Divers <span class="prl-block-title-link right"><a href="">Tout les articles <i class="fa fa-caret-right"></i></a></span></h5>
                <div class="prl-grid prl-grid-divider">

                    <?php foreach ($blings as $k => $bling): ?>
                        <?php if ($k === 0): ?>
                            <div class="prl-span-8">

                                <article class="prl-article">
                                    <a class="prl-thumbnail" href="<?php echo $this->Html->url($bling['Post']['link']); ?>">
                                        <span class="prl-overlay">
                                            <?php echo $this->Html->image($bling['Media'][0]['url'], array('alt' => $bling['Post']['name'])); ?>
                                            <span class="prl-overlay-area o-video"></span>
                                        </span>
                                    </a>
                                    <h2 class="prl-article-title"><a href="<?php echo $this->Html->url($bling['Post']['link']); ?>"><?php echo $bling['Post']['name']; ?></a> <span class="prl-badge prl-badge-cyan"><?php echo $bling['Category']['name']; ?></span></h2> 
                                    <div class="prl-article-meta">
                                        <i class="fa fa-calendar-o"></i> <?php echo $bling['Post']['created']; ?>&nbsp;&nbsp;
                                    </div>    
                                    <p><?php echo strip_tags($this->Text->truncate($bling['Post']['content'], 180, array('html' => true))); ?></p>
                                </article>
                                <hr class="prl-article-divider">
                                <ul class="prl-list prl-list-line prl-list-arrow">
                                    <li>
                                        <div class="prl-panel ads-default" style="border: 1px solid #ddd">
                                            <?php echo $this->Html->image('http://www.tunisienumerique.com/wp-content/uploads/TELECOM.jpg', array('alt' => 'Groupe Tunisie Télécom', 'style' => 'width: 510px;height: 160px;')); ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="prl-span-4">
                        <?php foreach ($blings as $k => $bling): ?>
                            <?php if ($k > 0): ?>
                                <article class="prl-article prl-panel">
                                    <a class="prl-thumbnail" href="<?php echo $this->Html->url($bling['Post']['link']); ?>">
                                        <span class="prl-overlay">
                                            <?php echo $this->Html->image($bling['Media'][0]['urls'], array('alt' => $bling['Post']['name'])); ?>
                                            <span class="prl-overlay-area o-video"></span>
                                        </span>
                                    </a>
                                    <h3 class="prl-article-title"><a href="<?php echo $this->Html->url($bling['Post']['link']); ?>"><?php echo $bling['Post']['name']; ?></a> <span class="prl-badge prl-badge-red"><?php echo $bling['Category']['name']; ?></span></h3> 
                                    <div class="prl-article-meta">
                                        <i class="fa fa-calendar-o"></i> <?php echo $bling['Post']['created']; ?>&nbsp;&nbsp;
                                    </div>    
                                    <p><?php echo strip_tags($this->Text->truncate($bling['Post']['content'], 100, array('html' => true))); ?></p>
                                </article>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>                
                <?php
                $categoriesTop = $categories;
                $categoriesDown = $categories;
                unset($categoriesTop[2]);
                unset($categoriesTop[3]);
                unset($categoriesTop[4]);
                unset($categoriesDown[0]);
                unset($categoriesDown[1]);
                ?>

                <?php foreach ($categoriesTop as $ct): ?>
                    <div class="prl-panel">
                        <h5 class="prl-block-title alizarin"><?php echo ucfirst($ct['Category']['name']); ?>  <span class="prl-block-title-link right">
                                <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'post_cat', 'cat' => $ct['Category']['slug'])); ?>">
                                    <?php echo __('Tout les Articles'); ?> <i class="fa fa-caret-right"></i>
                                </a></span></h5>
                        <div class="prl-grid prl-grid-divider">
                            <div class="prl-span-12">
                                <div class="prl-grid">
                                    <div class="prl-span-3">
                                        <article class="prl-article">
                                            <a class="prl-thumbnail" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'show', 'id' => $ct['Post'][0]['id'], 'slug' => $ct['Post'][0]['slug'])); ?>">
                                                <span class="prl-overlay">
                                                    <?php
                                                    $media = new Media();
                                                    $url = $media->field('url', array('Media.post_id' => $ct['Post'][0]['id']));
                                                    ?>
                                                    <?php echo $this->Html->image($url, array('alt' => $ct['Post'][0]['name'])); ?>
                                                    <span class="prl-overlay-area o-video"></span>
                                                </span>
                                            </a>
                                        </article>
                                    </div>	
                                    <div class="prl-span-8">
                                        <article class="prl-article">
                                            <h3 class="prl-article-title"><a href=""><?php echo $ct['Post'][0]['name']; ?></a> <span class="prl-badge prl-badge-cyan"><?php echo $ct['Category']['name']; ?></span></h3> 
                                            <div class="prl-article-meta">
                                                <i class="fa fa-calendar-o"></i> <?php echo $ct['Post'][0]['created']; ?>
                                            </div>    
                                            <p><?php echo strip_tags($this->Text->truncate($ct['Post'][0]['content'], 150, array('html' => true))); ?></p>
                                        </article>
                                    </div>     
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php endforeach; ?>
                <!-- espace pub -->
                <!--                <div class="prl-panel ads-default"><div class="a90">790 x 90 </div></div> -->
                <div class="prl-panel ads-default" style="border: 1px solid #ddd"><?php echo $this->Html->image('http://www.tunipages.com/articles/wp-content/uploads/2014/02/evertek.jpg', array('alt' => 'Cellcom EVERTEK', 'style' => 'width:790px;height:120px;')) ?></div>
                <!-- end espace pub -->
                <div class="prl-panel">
                    <div class="prl-grid prl-grid-divider">
                        <?php foreach ($categoriesDown as $ct): ?>
                            <div class="prl-span-4">
                                <h5 class="prl-block-title amber">
                                    <?php echo ucfirst($ct['Category']['name']); ?>  
                                    <span class="prl-block-title-link right">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'post_cat', 'cat' => $ct['Category']['slug'])); ?>">
                                            <?php echo __('Tout les Articles'); ?> <i class="fa fa-caret-right"></i>
                                        </a>
                                    </span>
                                </h5>
                                <article class="prl-article">
                                    <a class="prl-thumbnail" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'show', 'id' => $ct['Post'][0]['id'], 'slug' => $ct['Post'][0]['slug'])); ?>">
                                        <span class="prl-overlay">
                                            <?php
                                            $media = new Media();
                                            $url = $media->field('url', array('Media.post_id' => $ct['Post'][0]['id']));
                                            ?>
                                            <?php echo $this->Html->image($url, array('alt' => $ct['Post'][0]['name'])); ?>
                                            <span class="prl-overlay-area o-video"></span>
                                        </span>
                                    </a>
                                    <h3 class="prl-article-title"><a href=""><?php echo $ct['Post'][0]['name']; ?></a> <span class="prl-badge prl-badge-red">Video</span></h3> 
                                    <div class="prl-article-meta">
                                        <i class="fa fa-calendar-o"></i> <?php echo $ct['Post'][0]['created']; ?>
                                    </div>    
                                    <p><?php echo strip_tags($this->Text->truncate($ct['Post'][0]['content'], 150, array('html' => true))); ?></p>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>                        
        </section>
        <aside id="sidebar" class="prl-span-3">

            <div class="widget prl-panel">
                <script>
                    $(function() {
                        $("#accordion").jAccordion();
                    });
                </script>
                <div id="accordion" class="prl-accordion">
                    <section>
                        <a href="#acc1" id="acc1" class="head">La Vidéo du jour</a>
                        <div class="acc-content">
                            <?php echo $video['Day']['url']; ?>
                            <h5>
                                    <?php echo $video['Day']['name']; ?>
                            </h5>
                        </div>
                    </section>
                    <section>
                        <a href="#acc2" id="acc2" class="head">Blague du jour</a>
                        <div class="acc-content">
                            <p>
                                <?php
                                echo file_get_contents('http://www.blague.info/blagues-du-jour/blagues.php');
                                ?>
                            </p>
                        </div>
                    </section>
                    <section>
                        <a href="#acc3" id="acc3" class="head">Horoscope</a>
                        <div class="acc-content">
                            <p>
                                <!--DEBUT CODE ASTROO-->
                                <!--debut code perso-->
                                <iframe width="232" height="302" marginheight="0" marginwidth="0" frameborder="0" align="center" src="http://www.astroo.com/horoscope.htm" name="astroo" allowtransparency="true">
                                <!--fin code perso-->
                                <a href="http://www.astroo.com/horoscope.php" target="_top" title="Cliquez-ici pour afficher l'horoscope quotidien"><font face="Verdana" size="2"><b>afficher l'horoscope du jour</b></font></a></iframe>
                                <noscript><a href="http://www.astroo.com/horoscope.php" target="_blank">horoscope</a></noscript>
                                <!--FIN CODE ASTROO-->

                            </p>
                        </div>
                    </section>
                </div>
            </div>    

            <div class="widget widget-recent-post prl-panel">
                <h5 class="prl-block-title">Articles Récents</h5>	

                <ul class="prl-list prl-list-line">
                    <?php foreach ($alaunes as $alaune): ?>
                        <li>
                            <article class="clearfix">
                                <a href="single.php" class="prl-thumbnail">
                                    <?php echo $this->Html->image($alaune['Media'][0]['urls'], array('width' => '60', 'height' => '60', 'alt' => $alaune['Post']['name'])); ?>
                                </a>
                                <div>
                                    <h4><a href="<?php echo $this->Html->url($alaune['Post']['link'], true); ?>" title="<?php echo $alaune['Post']['name']; ?>"><?php echo $alaune['Post']['name']; ?></a></h4>
                                    <span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> <?php echo $alaune['Post']['created']; ?></span>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>		
            <div id="social-widget-1" class="widget social-widget prl-panel">		<!-- BEGIN WIDGET -->
                <h5 class="prl-block-title amber">Social Network</h5>
                <div class="sw-wrapper">
                    <div class="sw-inner prl-clearfix">
                        <a href="https://www.facebook.com/largestinfo.m" class="fa fa-facebook" title="Facebook" data-prl-tooltip></a>
                        <a href="https://twitter.com/Largestinfo" class="fa fa-twitter" title="Twitter" data-prl-tooltip></a>
                        <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'feed.rss')); ?>" class="fa fa-rss" title="RSS Feed" data-prl-tooltip></a>
                    </div>
                </div>		
            </div>    
            <div id="tag_cloud-2" class="widget widget_tag_cloud prl-panel"><h5 class="prl-block-title">Tags</h5><div class="tagcloud">
                    <?php foreach ($tags as $tag): ?>
                        <a href='<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'postByTag', 'id' => $tag['Tag']['id'])); ?>' class='tag-link-6' title='<?php echo ($tag > 1) ? $tag['Tag']['counter'] . __(' articles') : $tag['Tag']['counter'] . __(' article'); ?>' style='font-size: 16.4pt;'><?php echo $tag['Tag']['name']; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="search-3" class="widget widget_search prl-panel">
                <h5 class="prl-block-title">Recherche</h5>
                <form role="search" method="get" id="searchform" action="#" class="prl-form" >
                    <div><label class="screen-reader-text" for="s"><?php echo __('Recherche :'); ?></label>
                        <input type="text" value="" name="s" id="s" placeholder="Recherche"/>
                        <input type="submit" id="searchsubmit" value="Search" />
                    </div>
                </form>
            </div>
            <!--            <div id="calendar-2" class="widget widget_calendar prl-panel">
                            <h5 class="prl-block-title">Calendar</h5>
                            <div id="calendar_wrap">
                                <table id="wp-calendar">
                                    <caption>May 2013</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col" title="Monday">M</th>
                                            <th scope="col" title="Tuesday">T</th>
                                            <th scope="col" title="Wednesday">W</th>
                                            <th scope="col" title="Thursday">T</th>
                                            <th scope="col" title="Friday">F</th>
                                            <th scope="col" title="Saturday">S</th>
                                            <th scope="col" title="Sunday">S</th>
                                        </tr>
                                    </thead>
            
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" id="prev"><a href="http://www.presslayer.com/?m=201207" title="View posts for July 2012">&laquo; Jul</a></td>
                                            <td class="pad">&nbsp;</td>
                                            <td colspan="3" id="next" class="pad">&nbsp;</td>
                                        </tr>
                                    </tfoot>
            
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="pad">&nbsp;</td><td id="today">1</td><td>2</td><td>3</td><td>4</td><td>5</td>
                                        </tr>
                                        <tr>
                                            <td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
                                        </tr>
                                        <tr>
                                            <td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td>
                                        </tr>
                                        <tr>
                                            <td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td>
                                        </tr>
                                        <tr>
                                            <td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                            <td class="pad" colspan="2">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
            
                            </div>
            
                        </div>	-->
            <div id="categories-3" class="widget widget_categories prl-panel"><h5 class="prl-block-title"><?php echo __('Catégories'); ?></h5>
                <ul>
                    <?php foreach ($categories as $category): ?>
                        <li class="cat-item cat-item-2">
                            <a href="<?php echo $this->Html->url($category['Category']['link'], true); ?>" title="<?php echo $category['Category']['name']; ?>"><?php echo $category['Category']['name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="facebook-like-widget-2" class="widget facebook-widget prl-panel"><h5 class="prl-block-title">Facebook</h5>
                <div class="fw-wrapper">
                    <div class="fw-inner">
                        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Flargestinfo.m&amp;width=500&amp;colorscheme=light&amp;border_color=white&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" id="facebook-iframe" ></iframe>

                    </div>
                </div>
            </div>
            <?php
            $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Tunis,tn&lang=fr');
            $data = json_decode($json, true);
            ?>
            <div id="archives-3" class="widget widget-weather prl-panel">
                <h5 class="prl-block-title">Météo</h5>
                <div class="wt_wrapper">
                    <div class="today">
                        <div class="clearfix">
                            <div class="left">
                                <h3><?php echo __('Aujourd\'hui'); ?></h3>
                                <p class="degree"><?php echo $data['main']['temp'] - 273.15; ?><i class="wi-degrees"></i></p>
                                <p><strong>Tunis</strong></p>
                            </div>
                            <div class="right"><div class="today_icon"><i class="wi-day-lightning"></i></div></div>
                        </div>
                        <ul class="info_list">
                            <li><strong><span><?php echo ucfirst($data['weather'][0]['description']); ?></span></strong> <i class="wi-thermometer"></i> <?php echo $data['main']['temp_min'] - 273.15; ?><i class="wi-degrees"></i> / <?php echo $data['main']['temp_max'] - 273.15; ?><i class="wi-degrees"></i></li>
                            <li><span><i class="fa fa-umbrella"></i> <?php echo $data['main']['humidity']; ?>%</span> <span><i class="wi-strong-wind"></i> <?php echo $data['wind']['speed'] * 3.6; ?>km/h </span></li>
                        </ul>
                    </div>	
                    <hr class="prl-divider">
                    <div class="next_days clearfix">
                        <div class="next_days_item">
                            <p><strong><?php echo __('Lever du jour'); ?></strong></p>
                            <p><i class="wi-sunrise"></i></p>
                            <?php echo date('H:i', $data['sys']['sunrise']); ?>
                        </div>
                        <div class="next_days_item">
                            <p><strong><?php echo __('Coucher du soleil'); ?></strong></p>
                            <p><i class="wi-sunset"></i></p>
                            <?php echo date('H:i', $data['sys']['sunset']); ?>
                        </div>
                        <div class="next_days_item last">
                            <p><strong><?php echo __('Pression'); ?></strong></p><br>
                            <p><i class="wi-fog"></i></p>
                            <?php echo $data['main']['pressure']; ?> hpa
                        </div>

                    </div>

                </div>    
            </div>
        </aside>
    </div><!--.prl-grid-->
</div>