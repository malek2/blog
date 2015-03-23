<footer id="footer" role="contentinfo">
    <div class="footer-widget">
        <div class="prl-container">
            <div class="prl-grid prl-grid-divider">
                <div class="prl-span-3">
                    <div class="widget widget-recent-post prl-panel">
                        <h5 class="prl-block-title"><?php echo __('Qui sommes nous ?'); ?></h5>	
                        <p>Largestinfo est une S.A qui a pour but de fournir du service en tout genre, et ceci est son Blog d'info.</p>
                        <div class="widget widget_text prl-panel">
                            <h5 class="prl-block-title"><?php echo __('Adresse'); ?></h5>
                            <p>
                                IMM. DREAM CENTER croisement MOHAMED V et KHAIREDDIN PACHA 7eme étage, 1002 Tunis, Tunisie.
                            </p>
                            <p>
                                <span>Support :</span>Lien Support : <a href="<?php echo $this->Html->url('http://support.largestinfo.pro'); ?>">Par ici</a>
                            </p>
                            <p>
                                Contact : contact@largestinfo.pro
                            </p>
                        </div>
                    </div>	
                </div>
                <div class="prl-span-3">
                    <div class="widget widget-recent-post prl-panel">
                        <h5 class="prl-block-title"><?php echo __('Derniers Articles'); ?></h5>	
                        <ul class="prl-list prl-list-line">

                            <?php foreach ($pop_post as $post): ?>
                                <li>
                                    <article class="prl-clearfix">
                                        <a href="single.php" class="prl-thumbnail">
                                            <?php echo $this->Html->image($post['Media'][0]['urls'], array('alt' => $post['Post']['name'], 'width' => '60', 'height' => '60')); ?>
                                        </a>
                                        <div>
                                            <h4><a href="single.php" title=""><?php echo $post['Post']['name']; ?></a></h4>

                                        </div>
                                    </article>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>						
                </div>
                <div class="prl-span-3">
                    <div id="social-widget-2" class="widget social-widget prl-panel">		<!-- BEGIN WIDGET -->
                        <h5 class="prl-block-title carot"><?php echo __('Réseaux Sociaux'); ?></h5>
                        <div class="sw-wrapper">
                            <div class="sw-inner prl-clearfix">
                                <a href="#" class="fa fa-facebook" title="Facebook" data-prl-tooltip></a>
                                <a href="https://twitter.com/#" class="fa fa-twitter" title="Twitter" data-prl-tooltip></a>
                                <a href="#" class="fa fa-rss" title="RSS Feed" data-prl-tooltip></a>
                            </div></div></div>						<div class="widget widget_newsletter prl-panel">
                        <h5 class="prl-block-title">Newsletter</h5>
                        <p>Were this world an endless plain, and by sailing eastward we could for ever reach new distances</p>
                        <form class="prl-form">
                            <fieldset>
                                <div class="prl-form-row prl-newsletter-email"><input type="text" placeholder="" class="prl-width-1-1"></div>
                                <div class="prl-form-row"><button class="prl-button prl-button-newsletter" type="submit">Subscribe</button></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="prl-span-3">
                    <div id="tweets-widget-2" class="widget twitter_widget prl-panel">
                        <h5 class="prl-block-title">Tweets from @Largestinfo</h5>
                        <a class="twitter-timeline" data-dnt="true" height='300' href="https://twitter.com/Largestinfo" data-widget-id="393364363706241026">Tweets de @Largestinfo</a>


                        <div class="tw_btn">
                            <a href="https://twitter.com/Largestinfo" class="twitter-follow-button" data-show-count="false">Follow @Largestinfo</a>
                            <script>!function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = p + '://platform.twitter.com/widgets.js';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'twitter-wjs');</script>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="prl-container">
            <div class="left">
                &copy; 2014 by <a href="http://largestinfo.pro" target="_blank">Largestinfo</a>
            </div>
        </div>
    </div><!-- .copyright -->
</footer><!-- #footer -->
