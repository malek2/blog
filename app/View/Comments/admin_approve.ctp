<div class="roles form bordered span9 offset1">
    <?php //debug($app); ?>
    <?php echo $this->Form->create('Comment'); ?>
    <fieldset>
        <legend><?php echo __('Approbation de Commentaire'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('content');
        echo $this->Form->input('ip');
        ?>
        <?php if ($app['Comment']['comment_approved'] == true): ?> 
            <?php echo $this->Form->input('comment_approved',array('type'=>'hidden','value'=>0)); ?>
        <?php endif; ?>
        <?php if ($app['Comment']['comment_approved'] == false): ?> 
            <?php echo $this->Form->input('comment_approved',array('type'=>'hidden','value'=>1)); ?>
        <?php endif; ?>
    </fieldset>
    <?php if ($app['Comment']['comment_approved'] == true): ?> 
        <?php echo '<br>'.$this->Form->end(__('Désapprouvé')); ?>
    <?php endif; ?>
    <?php if ($app['Comment']['comment_approved'] == false): ?> 
        <?php echo '<br>'.$this->Form->end(__('Approuvé')); ?>
    <?php endif; ?><
/div>
