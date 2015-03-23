<?php $this->set('title_for_layout', 'Ajout Article'); ?>
<div class="cb"></div>
<div class="page-header">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <h3><?php echo __('Ajouter Un Article '); ?></h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php
        echo $this->Form->create('Post', array(
            'inputDefaults' => array(
                'label' => false,
                'div' => false,
            # define error defaults for the form
//            'error' => array(
//              'wrap'  => 'span',
//              'class' => 'my-error-class'
//            )
            )
        ));
        ?>
        <div class="form-group">
            <label class="control-label"><?php echo __('Nom'); ?></label>
            <?php echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'Mettez Le Nom de La Page', 'class' => 'form-control', 'autofocus')); ?>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <label class="control-label"><?php echo __('Url(Slug)'); ?></label>
            <?php echo $this->Form->input('slug', array('label' => false, 'placeholder' => 'Mettez L\'URL ou le Slug ou vous pouvez vous en passer il sera générer automatiquement', 'class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo __('Catégorie'); ?></label>
            <?php echo $this->Form->input('category_id', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo __('Mot Clés (séparé par une virgule)'); ?></label>
            <?php echo $this->Form->input('tags', array('class' => 'form-control', 'placeholder' => 'Tags')); ?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input('content', array('type' => 'textarea', 'label' => __('Contenu'), 'placeholder' => 'Mettez Le Contenu de La Page', 'class' => 'form-control')) . ''; ?>
            <?php echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'post')); ?>
        </div>
        <div class="form-group">
            <label class="control-label"><?php echo __('Etat(enLigne/horsLigne)'); ?></label>
            <?php echo $this->Form->input('online'); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Ajouter'), array('class' => 'btn btn-info form-control')); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<?php echo $this->Html->script('tiny_mce/tinymce.min', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>

tinyMCE.init({
    selector : 'textarea',
    theme : 'modern',
    plugins : 'paste,image',
    theme_modern_buttons1 : 
    'bold,italic,underline,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image,formatselect,|,code',
    entity_encoding : 'raw',
    theme_modern_buttons2 : '',
    theme_modern_buttons3 : '',
    theme_modern_buttons4 : '',
    theme_modern_resizing : true,
    paste_remove_styles : true,
    paste_remove_spans : true,
    paste_stip_class_attributes : 'all',
    image_explorer : '<?php echo $this->Html->url(array('controller' => 'medias', 'action' => 'index')); ?>',
    image_edit : '<?php echo $this->Html->url(array('controller' => 'medias', 'action' => 'show')); ?>',
    relative_urls : false,
    content_css : '<?php echo $this->Html->url("/css/ed.css"); ?>'
});
function send_to_editor(content){
    var ed = tinyMCE.activeEditor;
    ed.execCommand('mceInsertContent',false,content);
}
<?php echo $this->Html->scriptEnd(); ?>

<?php echo $this->Html->script('functions', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>


$('#PostName').keyup(function(){
var slug = $('input#PostName').val();
//slug = slug.replace(/ /g, "-");
slug = slugMe(slug);
$('#PostSlug').val(slug);
});

<?php echo $this->Html->scriptEnd(); ?>