<?php $this->set('title_for_layout', $type . ' du Jour'); ?>
<div class="page-header">
    <h1><?php echo ($type === 'video') ? 'Vidéo' : $type = ucfirst($type); ?> <?php echo __('du Jour'); ?></h1>
</div>
<hr>
<?php echo $this->Form->create('Day', array('inputDefaults' => array('label' => false, 'div' => false))); ?>
<?php if(!empty($this->request->data)): ?>
<?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
<?php endif; ?>
<?php echo $this->Form->input('type',array('type'=>'hidden','value'=>  strtolower($type))); ?>
<?php if($type === ucfirst('image') || $type === 'video'): ?>
<div class="form-group">
    <label><?php echo __('Nom'); ?></label>
    <?php echo $this->Form->input('name', array('placeholder' => 'nom', 'class' => 'form-control')); ?>
</div>
<?php endif; ?>


<div class="form-group">
    <?php if ($type === 'video'): ?>
        <label><?php echo __('Code d\'intégration(width="229" height="129")'); ?></label>
        <?php echo $this->Form->input('url', array('placeholder' => 'Code', 'class' => 'form-control')); ?>
    <?php elseif($type === 'Image'): ?>
        <label><?php echo __('Url'); ?></label>
        <?php echo $this->Form->input('url', array('placeholder' => 'URL de l\'image', 'class' => 'form-control')); ?>
    <?php endif; ?>
    
</div>
<?php if ($type === 'Image'): ?>
    <div class="form-group">
        <label><?php echo __('source'); ?></label>
        <?php echo $this->Form->input('source', array('placeholder' => 'nom', 'class' => 'form-control')); ?>
    </div>
<?php endif; ?>
<?php if ($type === ucfirst('image') || $type === ucfirst('citation')): ?>
    <div class="form-group">
        <label><?php echo __('Description'); ?></label>
        <?php echo $this->Form->input('content', array('placeholder' => 'Contenu', 'class' => 'form-control')); ?>
    </div>
<?php endif; ?>
<div class="form-group">
    <?php echo $this->Form->submit(__('Mettre à jour'), array('class' => 'btn btn-info form-control')); ?>
</div>
<?php echo $this->Form->end(); ?>