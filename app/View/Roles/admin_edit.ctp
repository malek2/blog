<?php $this->layout = false; ?>
<div id="form-role">
    <?php echo $this->Form->create('Role'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name', array('label' => false,'class'=>'form-control', 'placeholder' => 'Rôle'));
        ?>
    </fieldset>
    <br>
    <?php echo $this->Form->submit(__('Modifier'), array('class' => 'btn btn-success form-control','id'=>'submit', 'onclick' => 'javascript:submit();')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<?php echo $this->Html->scriptStart(); ?>
    function submit(){
        $("form-role").hide('slow');
    }

<?php echo $this->Html->scriptEnd(); ?>