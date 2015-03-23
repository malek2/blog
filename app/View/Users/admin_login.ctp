<div class="clearfix"></div>
<br>
<div class="page-header">
   <h3><span class="label label-warning">Identification</span></h3>
</div>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <?php echo $this->Html->image('logo.png', array('class' => 'center-block')); ?>
        <?php echo $this->Form->create('User'); ?>
        <div class="form-group">
            <?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Nom d\'utilisateur','autofocus')); ?>
        </div>
        <div class="form-group">        
            <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Mot de passe')); ?>
        </div>
        <?php echo $this->Form->submit('Se Connecter', array('class' => 'btn btn-primary form-control center-block')); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>