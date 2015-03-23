<?php $this->set('title_for_layout', __('Se Connecter')); ?>
<br>
<section class="container main-content">
    <div class="login">
        <div class="row">
            <div class="col-md-6">
                <div class="page-content">
                    <h2>Login</h2>
                    <div class="form-style form-style-3">
                        <?php echo $this->Form->create('User',array('inputDefaults'=>array('label'=>false,'div'=>false))); ?>
                            <div class="form-inputs clearfix">
                                <p class="login-text">
                                    <?php echo $this->Form->input('username',array('placeholder'=>'Nom d\'utilisateur')); ?>
                                    <i class="icon-user"></i>
                                </p>
                                <p class="login-password">
                                    <?php echo $this->Form->input('password',array('placeholder'=>'Mot de passe')); ?>
                                    <i class="icon-lock"></i>
                                    <a href="#">Mot de passe oublié ?</a>
                                </p>
                            </div>
                            <p class="form-submit login-submit">
                                <?php echo $this->Form->submit(__('Connexion'),array('class'=>'button color small login-submit submit')) ?>
                            </p>
                            <div class="rememberme">
                                <label><input type="checkbox" checked="checked"><?php echo __('Se souvenir de moi') ?></label>
                            </div>
                        </form>
                    </div>
                </div><!-- End page-content -->
            </div><!-- End col-md-6 -->
            <div class="col-md-6">
                <div class="page-content Register">
                    <h2><?php echo __('Enregistrez vous maintenant'); ?></h2>
                    <p>
                        <?php echo __('En vous enregistrant, avec votre compte vous pouvez vous exprimez vis à vis de nos articles.') ?>
                    </p>
                    <a class="button color small signup"><?php echo __('Créer un compte'); ?></a>
                </div><!-- End page-content -->
            </div><!-- End col-md-6 -->
        </div><!-- End row -->
    </div>    
</section>
