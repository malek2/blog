<?php $this->layout = false; ?>
<p>
    <label class="required">Mot de passe<span>*</span></label>
    <?php echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Mot de passe','required'=>'required')); ?>
</p>