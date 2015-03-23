<?php $this->set('title_for_layout', __('Ajouter Une Page ')) ?>
<div class="thumbnail">
    <div class="row">

        <div class="col-md-10">
            <div class="page-header">
                <h2><?php echo __('Ajouter Une Page '); ?></h2>
            </div>
            <div class="col-md-offset-1">
                <?php echo $this->Form->create('Post'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('name', array('label' => false, 'placeholder' => 'Mettez Le Nom de La Page', 'class' => 'form-control')) . ''; ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('slug', array('label' => false, 'placeholder' => 'Mettez L\'URL ou le Slug', 'class' => 'form-control')) . ''; ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('category_id', array('label' => __('Catégorie'), 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('content', array('class' => 'form-control', 'type' => 'textarea', 'label' => __('Contenu'),'placeholder'=>'Votre Contenu')); ?>
                </div>
                <?php echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'page')); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('online', array('label' => __('Etat'))); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->submit(__('Ajouter'), array('class' => 'btn btn-info form-control')); ?>
                </div>

            </div>

            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

<?php $urlImage = $this->Html->url(array('controller' => 'medias', 'action' => 'index')); ?>
<?php $urlImageEdit = $this->Html->url(array('controller' => 'medias', 'action' => 'show')); ?>
<?php $Css = $this->Html->url("/css/ed.css"); ?>
<?php echo $this->Html->script('tiny_mce/tiny_mce', array('inline' => false)); ?>
<?php echo $this->Html->script('functions',array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
tinyMCE.init({
    selector : 'textarea',
    theme : 'advanced',
    plugins : 'inlinepopups,paste,image',
    theme_advanced_buttons1 : 'bold,italic,underline,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image,formatselect,code',
    theme_advanced_buttons2 : '',
    theme_advanced_buttons3 : '',
    theme_advanced_buttons4 : '',
    theme_advanced_resizing : true,
    paste_remove_styles : true,
    paste_remove_spans : true,
    paste_stip_class_attributes : 'all',
    image_explorer : '<?php echo $urlImage; ?>',
    image_edit : '<?php echo $urlImageEdit; ?>',
    relative_urls : false,
    content_css : '<?php echo $Css; ?>'
});

function send_to_editor(content){
    var ed = tinyMCE.activeEditor;
    ed.execCommand('mceInsertContent',false,content);
};

$('#PostName').keyup(function(){
    var slug = $('input#PostName').val();
    slug = slugMe(slug);
    $('#PostSlug').val(slug);
});
<?php echo $this->Html->scriptEnd(); ?>


