<?php $this->set('title_for_layout',__('Image Arrière Plan')); ?>
<div class="thumbnail">
    <div class="row">
        <div class="col-lg-3">
            <div class="page-header">
                <h3><?php echo __('Gestion Image Arrière Plan'); ?></h3>
            </div>
        </div>
    </div>
    <div class="cb"></div>
    <div class="row">
        <div class="col-md-6">
            <h4><?php echo __('Image de Fond actuelle'); ?></h4>
            <?php if(fileExistsInPath('/img/bg.jpg')): ?>
            <img class="thumbnail alignLeft" src="<?php echo $this->Html->url('/img/bg.jpg') ?>" style="max-width: 40%" />
            <p>
                <button class="btn btn-danger" onclick="document.location.href='<?php echo $this->Html->url(array('controller'=>'medias','action'=>'delBg','admin'=>true)) ?>'">
                    <?php echo __('Supprimer cette Image') ?>
                </button>
            </p>
            <?php else: ?>
            <p><?php echo __('Pas d\'image de fond en ce moment.'); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <?php if(fileExistsInPath('/img/bg.jpg')): ?>
            <h4><?php echo __('Modifier l\'image de fond existante.') ?></h4>
            <?php echo $this->Form->create('Media',array(
                'inputDefaults'=>array('div'=>false,'label'=>false),
                'type'=>'file'
            )); ?>
            <div class="form-group">
                <label class="label label-info"><?php echo __('Choisir une image'); ?></label><br><br>
                <?php echo $this->Form->file('file',array('placeholder'=>'Choisir une image')); ?>
            </div>    
            <div class="form-group">
                <?php echo $this->Form->submit(__('Modifier'),array('class'=>'btn btn-success')); ?>
            </div>  
            <?php echo $this->Form->end(); ?>
            <?php else: ?>
            <h4><?php echo __('Ajouter l\'image de fond.') ?></h4><div class="cb"></div>
            <?php echo $this->Form->create('Media',array(
                'inputDefaults'=>array('div'=>false,'label'=>false),
                'type'=>'file'
            )); ?>
            <div class="form-group">
                <label class="label label-info">&nbsp;<?php echo __('Choisir une image'); ?>&nbsp;</label><br><br>
                <?php echo $this->Form->file('file',array('placeholder'=>'Choisir une image')); ?>
            </div>    
            <div class="form-group">
                <?php echo $this->Form->submit(__('Ajouter'),array('class'=>'btn btn-success')); ?>
            </div>  
            <?php echo $this->Form->end(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>