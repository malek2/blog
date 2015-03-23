<div class="divider"></div>
<div class="row">
        <div class="col-md-12">
            <div class="contact-us">
                <div class="col-md-7">
                    <div class="page-content">
                        <h2>Contactez Nous</h2>
                        <?php echo $this->Form->create('Contact',array('inputDefaults'=>array('div'=>false,'label'=>false),'class'=>'form-style form-style-3 form-style-5')); ?>
                            <div class="form-inputs clearfix">
                                <p>
                                    <label class="required">Nom<span>*</span></label>
                                    <?php echo $this->Form->input('nom',array('required'=>'required','aria-required'=>'true','placeholder'=>'Nom')) ?>
                                </p>
                                <p>
                                    <label class="required">E-Mail<span>*</span></label>
                                    <?php echo $this->Form->input('email',array('required'=>'required','aria-required'=>'true','placeholder'=>'E-mail')) ?>
                                </p>
                            </div>
                            <div class="form-textarea">
                                <p>
                                    <label class="required">Message<span>*</span></label>
                                    <?php echo $this->Form->input('message',array('required'=>'required','cols'=>'58', 'rows'=>'7','aria-required'=>'true','placeholder'=>'Votre Message')) ?>
                                </p>
                            </div>
                            <p class="form-submit">
                                <?php echo $this->Form->submit(__('Envoyer'),array('class'=>'submit button small color')) ?>
                            </p>
                        <?php echo $this->Form->end(); ?>
                    </div><!-- End page-content -->
                </div><!-- End col-md-6 -->
                <div class="col-md-5">
                    <div class="page-content">
                        <h2>à propos</h2>
                       <div class="widget widget_contact">
                            <ul>
                                <li><i class="icon-map-marker"></i>Address :<p>IMM. DREAM CENTER croisement MOHAMED V et KHAIREDDIN PACHA 7eme étage, 1002 Tunis, Tunisie.</p></li>
                                <li><i class="icon-phone"></i>Phone number :<p>(+2)01111011110</p></li>
                                <li><i class="icon-envelope-alt"></i>E-mail :<p>contact@largestinfo.pro</p></li>
                                <li>
                                    <i class="icon-share"></i><?php echo __('Liens sociaux'); ?> :
                                    <p>
                                        <a href="https://www.facebook.com/largestinfo.m" target="_blank" original-title="Facebook" class="tooltip-n">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#3b5997" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(59, 89, 151);">
                                                    <i i_color="#FFF" class="social_icon-facebook" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="https://twitter.com/Largestinfo" target="_blank" original-title="Twitter" class="tooltip-n">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#00baf0" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(0, 186, 240);">
                                                    <i i_color="#FFF" class="social_icon-twitter" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
<!--                                        <a original-title="Youtube" class="tooltip-n" href="#">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#cc291f" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(204, 41, 31);">
                                                    <i i_color="#FFF" class="social_icon-youtube" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="#" original-title="Linkedin" class="tooltip-n">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#006599" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(0, 101, 153);">
                                                    <i i_color="#FFF" class="social_icon-linkedin" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="#" original-title="Google plus" class="tooltip-n">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#ca2c24" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(202, 44, 36);">
                                                    <i i_color="#FFF" class="social_icon-gplus" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
                                        <a original-title="RSS" class="tooltip-n" href="#">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#F18425" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(241, 132, 37);">
                                                    <i i_color="#FFF" class="icon-rss" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
                                        <a original-title="Instagram" class="tooltip-n" href="#">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#306096" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(48, 96, 150);">
                                                    <i i_color="#FFF" class="social_icon-instagram" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
                                        <a original-title="Dribbble" class="tooltip-n" href="#">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#e64281" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(230, 66, 129);">
                                                    <i i_color="#FFF" class="social_icon-dribbble" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>
                                        <a original-title="Pinterest" class="tooltip-n" href="#">
                                            <span class="icon_i">
                                                <span class="icon_square" icon_size="25" span_bg="#c7151a" span_hover="#2f3239" style="height: 25px; width: 25px; font-size: 12.5px; line-height: 25px; border-style: solid; background-color: rgb(199, 21, 26);">
                                                    <i i_color="#FFF" class="icon-pinterest" style="color: rgb(255, 255, 255);"></i>
                                                </span>
                                            </span>
                                        </a>-->
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div><!-- End page-content -->
                </div><!-- End col-md-6 -->
            </div>
        </div>
    </div>