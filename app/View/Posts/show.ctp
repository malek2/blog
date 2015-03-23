<?php
$this->OpenGraph->title(ucfirst($post['Post']['name']));
$this->OpenGraph->description(strip_tags($this->Text->truncate($post['Post']['content'], 200, array('html' => true))));
$this->OpenGraph->image($this->Html->url('/img/' . $post['Media'][0]['urlm'], true));
$this->set('title_for_layout', ucfirst($post['Post']['name']));
$this->set('desc', ucfirst($post['Post']['name']));
?>
<div class="prl-container">

    <div class="prl-grid prl-grid-divider">

        <?php //debug($categories);  ?>
        <section id="main" class="prl-span-9"> 
            <article id="article-single"> 
                <h1><a href="single.php"><?php echo ucfirst($post['Post']['name']); ?></a></h1>
                <hr class="prl-grid-divider">
                <div class="prl-grid">



                    <div class="prl-span-9 prl-span-flip">
                        <div class="prl-entry-content">
                            <div class="space-bot">
                                <p class="prl-thumbnail"><?php echo $post['Post']['content']; ?></p>
                            </div>



                        </div> <!-- .prl-entry-content -->
                    </div>


                    <div class="prl-span-3 prl-entry-meta">

                        <div class="prl-article-meta">
                            <span><i class="fa fa-calendar-o"></i> <?php echo $post['Post']['created']; ?></span>     
<!--                            <i class="fa fa-eye"></i> 123-->
                            <?php if($currentUser !== null && $currentUser['Role']['name'] === 'admin'): ?>
                            <br>
                            <span>Admin : Nombre de Vue(<?php echo $post['Post']['view_count'] ?>)</span>				
                            <?php endif; ?>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function()
                            {

                                //bit_url function

                                //var url = '<?php echo $this->Html->url($post['Post']['link'], true); ?>';
                                var url = 'http://news.largestinfo.pro/post/la-voie-lactee-se-situe-dans-un-continent-celeste-bien-plus-vaste-que-prevu-217';
                                var username = "freezlike"; // bit.ly username
                                var key = "R_39c89ce9e4be46378125ec21b3631e1f";
                                $.ajax({
                                    url: "http://api.bit.ly/v3/shorten",
                                    data: {longUrl: url, apiKey: key, login: username},
                                    dataType: "jsonp",
                                    success: function(v)
                                    {
                                        var bit_url = v.data.url;
                                        //alert(bit_url);
                                        $(".twitter-share-button").attr("data-url", "" + bit_url + "");
                                    }
                                });

                            });
                        </script>
                        <hr class="prl-article-divider">
                        <ul class="prl-list prl-list-sharing">
                            <li class="header">Partage</li>
                            <li>
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id))
                                            return;
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=506771819391722&version=v2.0";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-share-button" data-href="<?php echo $this->Html->url($post['Post']['link'], true); ?>"></div>
                            <li>

                                <div id="twBtn">
                                    <?php
                                    //require_once VENDORS . DS . 'Bit.php';
                                    $a = $this->Html->url($post['Post']['link'], true);
                                    //$url = bitly_v3_shorten('http://news.largestinfo.pro/post/la-voie-lactee-se-situe-dans-un-continent-celeste-bien-plus-vaste-que-prevu-217', '1ec0dfe2dcff201b58beaf0ee7f14c0e228595db');
                                    $url = "http://lc.cx/api/shorten?longUrl=".$a."&apiKey=0b33fa47ab9054cb8885ecad4d7ba756_A";
                                    $_url = json_decode($url);
                                    ?>
                                    <a href='https://twitter.com/share' data-url='<?php echo $url['url'] ?>' class='twitter-share-button' data-lang='fr' data-via='Largestinfo' data-hashtags='<?php foreach ($post['Tag'] as $tag): ?> <?php echo $tag['name'] . ','; ?> <?php endforeach; ?>'>Tweet</a>
                                    <script id="scriptT">!function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (!d.getElementById(id)) {
                                                js = d.createElement(s);
                                                js.id = id;
                                                js.src = "https://platform.twitter.com/widgets.js";
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }
                                        }(document, "script", "twitter-wjs");</script>
                                </div>
                            </li>
                            <li>
                                <script src="https://apis.google.com/js/plusone.js"></script>
                            <g:plus action="share"></g:plus>
                            </li>
                           <!-- <li><a href="#"><i class="fa fa-pinterest-square"></i> Pinterest</a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i> Linkedin</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Mail this article</a></li>-->
                            <li><a href="#" onclick="window.print();" id="print-page" ><i class="fa fa-print"></i> <?php echo __('Imprimer cet article'); ?></a></li>
                        </ul>
                        <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
                        <hr class="prl-article-divider">
                        <p class="prl-article-tags"><span class="prl-article-tags-header">TAGS:</span> 
                            <?php foreach ($post['Tag'] as $tag): ?>
                                <a href='<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'postByTag', 'id' => $tag['id'])); ?>' class='tag-link-6' title='<?php echo ($tag > 1) ? $tag['counter'] . __(' articles') : $tag['counter'] . __(' article'); ?>'><?php echo $tag['name']; ?></a>
                            <?php endforeach; ?>
                        </p>


                    </div>

                </div> <!-- .prl-grid -->

            </article>
            <div class="prl-homepage-widget prl-panel">
                <h5 class="prl-block-title"><?php echo __('Articles Similaires'); ?>  <span class="prl-block-title-link right"><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index')); ?>">ALL POSTS <i class="fa fa-caret-right"></i></a></span></h5>

                <div class="prl-grid prl-grid-divider">
                    <?php if (!empty($related)): ?>
                        <?php foreach ($related as $relate): ?>
                            <div class="prl-span-4">
                                <article class="prl-article">
                                    <a class="prl-thumbnail" href="<?php echo $this->Html->url($relate['Post']['link']); ?>">
                                        <span class="prl-overlay">
                                            <?php echo $this->Html->image($relate['Media'][0]['urlm'], array('alt' => $relate['Post']['name'])); ?>
                                            <span class="prl-overlay-area o-video"></span>
                                        </span>
                                    </a>
                                    <h3 class="prl-article-title"><a href="<?php echo $this->Html->url($relate['Post']['link']); ?>"><?php echo ucfirst($relate['Post']['name']); ?></a> <span class="prl-badge prl-badge-warning"><?php echo $relate['Category']['name']; ?></span></h3> 
                                    <div class="prl-article-meta">
                                        <i class="fa fa-calendar-o"></i> <?php echo $relate['Post']['created']; ?>&nbsp;&nbsp;
                                    </div>    
                                    <p><?php echo strip_tags($this->Text->truncate($relate['Post']['content'], 100, array('html' => true))); ?></p>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="prl-span-4">
                            <article class="prl-article">
                                <p><?php echo __("Pas d'article similaire"); ?></p>
                            </article>
                        </div>

                    <?php endif; ?>
                </div>
            </div>    		   
            <div id="comment" class="prl-panel">
                <h5 class="prl-block-title"><?php echo __('Commentaires'); ?></h5>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id))
                                                return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-mobile="Auto-detected" data-href="<?php echo $this->Html->url($this->here, true); ?>" data-numposts="5" data-width="100%" data-colorscheme="light"></div>
            </div><!-- #comment -->			  
        </section>

        <aside id="sidebar" class="prl-span-3">



            <div id="social-widget-1" class="widget social-widget prl-panel">		<!-- BEGIN WIDGET -->
                <h5 class="prl-block-title amber">Social Network</h5>
                <p>Were this world an endless plain, and by sailing eastward we could for ever reach new distances</p>
                <div class="sw-wrapper">
                    <div class="sw-inner prl-clearfix">
                        <a href="#" class="fa fa-facebook" title="Facebook" data-prl-tooltip></a>
                        <a href="https://twitter.com/#" class="fa fa-twitter" title="Twitter" data-prl-tooltip></a>
                        <a href="<?php echo $this->Html->url('/posts/show_feed/' . $post['Post']['id'] . '.rss', true); ?>" class="fa fa-rss" title="RSS Feed" data-prl-tooltip></a>
                        <!--                        <a href="http://www.flickr.com/photos/#" class="fa fa-flickr" title="Flickr" data-prl-tooltip></a>
                                                <a href="http://www.youtube.com/#" class="fa fa-youtube" title="Youtube" data-prl-tooltip></a>
                                                <a href="http://vimeo.com/#" class="fa fa-vimeo-square" title="Vimeo" data-prl-tooltip></a>
                                                <a href="#" class="fa fa-linkedin" title="Linkedin" data-prl-tooltip></a>
                                                <a href="#" class="fa fa-google-plus" title="Google plus" data-prl-tooltip></a>
                                                <a href="http://pinterest.com/#" class="fa fa-pinterest" title="Pinterest" data-prl-tooltip></a>
                                                <a href="http://instagram.com/#" class="fa fa-instagram" title="Instagram" data-prl-tooltip></a>-->
                    </div>
                </div>		
            </div>
            <div id="tag_cloud-2" class="widget widget_tag_cloud prl-panel"><h5 class="prl-block-title">Tags</h5><div class="tagcloud">
                    <?php foreach ($tags as $tag): ?>
                        <a href='<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'postByTag', 'id' => $tag['Tag']['id'])); ?>' class='tag-link-6' title='<?php echo ($tag > 1) ? $tag['Tag']['counter'] . __(' articles') : $tag['Tag']['counter'] . __(' article'); ?>' style='font-size: 16.4pt;'><?php echo $tag['Tag']['name']; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <!--            <div class="widget widget_newsletter prl-panel">
                            <h5 class="prl-block-title">Newsletter</h5>
                            <p>Were this world an endless plain, and by sailing eastward we could for ever reach new distances</p>
                            <form class="prl-form">
                                <fieldset>
                                    <div class="prl-form-row prl-newsletter-email"><input type="text" placeholder="" class="prl-width-1-1"></div>
                                    <div class="prl-form-row"><button class="prl-button prl-button-newsletter" type="submit">Subscribe</button></div>
                                </fieldset>
                            </form>
                        </div>		-->
            <!--            <div id="nav_menu-2" class="widget widget_nav_menu prl-panel"><h5 class="prl-block-title">Custom menu</h5><div class="menu-navigation-container"><ul id="menu-navigation" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-1129"><a href="http://www.presslayer.com/"><i class="fa fa-home"></i> Homepage</a></li>
                                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1134"><a href="http://www.presslayer.com/?cat=3"><i class="fa  fa-flask"></i> Photography</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1131"><a href="#"><i class="fa fa-heart"></i> Heart</a>
            
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1132"><a href="#"><i class="fa fa-picture-o"></i> Photo</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1133"><a href="#"><i class="fa fa-envelope"></i> Contact us</a></li>
                                </ul></div></div>-->
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
            <?php debug($categories); ?>
            <div id="categories-3" class="widget widget_categories prl-panel"><h5 class="prl-block-title">Categories</h5><ul>
                    <li class="cat-item cat-item-2"><a href="http://www.presslayer.com/?cat=2" title="View all posts filed under Design">Design</a>
                    </li>
                    <li class="cat-item cat-item-3"><a href="http://www.presslayer.com/?cat=3" title="View all posts filed under Photography">Photography</a>
                    </li>
                    <li class="cat-item cat-item-12"><a href="http://www.presslayer.com/?cat=12" title="View all posts filed under Slider">Slider</a>
                    </li>
                    <li class="cat-item cat-item-4"><a href="http://www.presslayer.com/?cat=4" title="View all posts filed under Videos">Videos</a>
                    </li>
                    <li class="cat-item cat-item-5"><a href="http://www.presslayer.com/?cat=5" title="View all posts filed under Wordpress">Wordpress</a>
                    </li>
                    <li class="cat-item cat-item-12"><a href="http://www.presslayer.com/?cat=12" title="View all posts filed under Slider">Slider</a>
                    </li>


                </ul>
            </div>



            <div id="facebook-like-widget-2" class="widget facebook-widget prl-panel"><h5 class="prl-block-title">Facebook</h5>
                <div class="fw-wrapper">
                    <div class="fw-inner">
                        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Flargestinfo.m&amp;width=500&amp;colorscheme=light&amp;border_color=white&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" id="facebook-iframe" ></iframe>

                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>