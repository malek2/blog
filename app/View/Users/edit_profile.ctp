<?php $this->set('title_for_layout', __('Mon Profil')); ?>

<div class="breadcrumbs">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Mon Profile</h1>
            </div>
            <div class="col-md-12">
                <div class="crumbs">
                    <a href="#">Accueil</a>
                    <span class="crumbs-span">/</span>
                    <a href="#"><?php echo $currentUser['username']; ?></a>
                    <span class="crumbs-span">/</span>
                    <span class="current">Mon Profile</span>
                </div>
            </div>
        </div><!-- End row -->
    </section><!-- End container -->
</div>
<section class="container main-content">
    <div class="row">
        <div class="col-md-9">
            <div class="page-content">
                <div class="boxedtitle page-title"><h2>Mon Profile</h2></div>

                <div class="form-style form-style-4">
                    <?php
                    echo $this->Form->create('User', array(
                        'inputDefaults' => array('label' => false, 'div' => false)
                    ));
                    ?>
                    <div class="form-inputs clearfix">
                        <p>
                            <label>First Name</label>
                            <?php echo $this->Form->input('username'); ?>
                        </p>
                        <p>
                            <label>Last Name</label>
                            <input type="text">
                        </p>
                        <p>
                            <label class="required">E-Mail<span>*</span></label>
                            <input type="email">
                        </p>
                        <p>
                            <label>Website</label>
                            <input type="text">
                        </p>
                        <p>
                            <label class="required">Nom d'utilisateur<span>*</span></label>
                            <?php echo $this->Form->input('username'); ?>
                        <p>
                            <label>
                                Change Password
                            </label>
                        <div class="ul_list">
                            <ul>
                                <li>
                                    <input type="radio" name="pwd" value="oui" onclick="javascript:change_pwd(this.value);">oui
                                </li>
                                <li>
                                    <input type="radio" name="pwd" value="non" onclick="javascript:change_pwd(this.value);">non
                                </li>
                            </ul>
                        </div>
                        </p>
                        </p>
                    </div>

                    <p id="pw"></p>
                    <div class="clearfix"></div>
                    <p>
                        <label>About Yourself</label>
                        <textarea cols="58" rows="8"></textarea>
                    </p>
                </div>
                <div class="form-inputs clearfix">
                    <p>
                        <label>Facebook</label>
                        <input type="text">
                    </p>
                    <p>
                        <label>Twitter</label>
                        <input type="text">
                    </p>
                    <p>
                        <label>Linkedin</label>
                        <input type="email">
                    </p>
                    <p>
                        <label>Google plus</label>
                        <input type="text">
                    </p>
                </div>
                <p class="form-submit">
                    <?php echo $this->Form->submit(__('Modifier'), array('class' => 'button color small login-submit submit')); ?>
                </p>
                <?php echo $this->Form->end(); ?>
            </div>
        </div><!-- End page-content -->
    </div><!-- End main -->
</div><!-- End row -->
</section>
<?php echo $this->Html->script('xhr', array('inline' => false)); ?>