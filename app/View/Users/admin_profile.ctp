<div class="center-block" style="margin-top: 25px;">

    <?php echo $this->Form->create('User',array('class'=>'form')); ?>
    <fieldset class="">
        <legend><?php echo __('Modifier l\'utilisateur') . '&nbsp;<d class="bg-amber">' . ucfirst($this->request->data['User']['username'] . '</d>'); ?></legend>
        <div class="form-group">
            <?php echo $this->Form->input('id'); ?>
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo __('Nom d\'utilisateur'); ?></label>
            <?php echo $this->Form->input('username', array('class'=>'form-control','label' => false, 'placeholder' => __('Nom d\'utilisateur'))); ?>
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo __('Mot de passe'); ?></label>
            <?php echo $this->Form->input('password', array('class'=>'form-control','label' => false, 'placeholder' => __('Mot de passe'))); ?>
        </div>
        <div class="clearfix"></div>
        <div class="form-group>
            <?php echo $this->Form->submit(__('Modifier'), array('class' => 'btn btn-success')); ?>
        </div>
    </fieldset>
    <?php echo '<br><div class="offset1">' . $this->Form->end() . '</div>'; ?>
</div>