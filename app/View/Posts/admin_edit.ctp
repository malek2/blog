<?php $this->set('title_for_layout', 'Edition Article'); ?>
<div class="container thumbnail">
    <div class="page-header">
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <h3><?php echo __('Modifier Un Article '); ?></h3>
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
            ?><?php echo $this->Form->input('id'); ?>

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
                <?php echo $this->Form->input('tags', array('type'=>'text','class' => 'form-control', 'placeholder' => 'Tags')); ?>
            </div>
            <?php if(!empty($tags)): ?>
            <div class="form-group">
                <label class="control-label"><?php echo __('Mot Clés (existants)'); ?></label>
                <?php foreach ($tags as $k => $v): ?>
                <span class="label label-info"><?php echo $v['Tag']['name']; ?> [<?php echo $this->Html->link('x',array('controller'=>'posts','action'=>'delTag',$v['PostTag']['id'])); ?>] </span>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="form-group">
                <span class="label label-info"><?php echo __('Pas de Tags'); ?></span>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <?php echo $this->Form->input('content', array('type' => 'textarea', 'label' => __('Contenu'), 'placeholder' => 'Mettez Le Contenu de La Page', 'class' => 'form-control')) . ''; ?>
                <?php echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'post')); ?>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo __('Etat(enLigne/horsLigne)'); ?></label>
                <?php echo '<br />' . $this->Form->input('online'); ?>
            </div>
            <div class="form-group">
                <?php echo '<br />' . $this->Form->submit(__('Modifier'), array('class' => 'btn btn-info form-control')); ?>
            </div>
            <?php echo '<br />' . $this->Form->end(); ?>
        </div>

    </div>
</div>
<br />
<?php echo $this->Html->script('functions', array('inline' => false)); ?>
<?php echo $this->Html->script('tiny_mce/tiny_mce', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
tinyMCE.init({
    selector : 'textarea',
    theme : 'advanced',
    plugins : 'inlinepopups,paste,image',
    theme_advanced_buttons1 : 
    'bold,italic,underline,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image,formatselect,code',
    entity_encoding : 'raw',
    theme_advanced_buttons2 : '',
    theme_advanced_buttons3 : '',
    theme_advanced_buttons4 : '',
    theme_advanced_resizing : true,
    paste_remove_styles : true,
    paste_remove_spans : true,
    paste_stip_class_attributes : "all",
    image_explorer : '<?php echo $this->Html->url(array('controller' => 'medias', 'action' => 'index', $this->request->data['Post']['id'])); ?>',
    image_edit : '<?php echo $this->Html->url(array('controller' => 'medias', 'action' => 'show')); ?>',
    relative_urls : false,
    content_css : '<?php echo $this->Html->url("/css/ed.css"); ?>'
});
function send_to_editor(content){
        var ed = tinyMCE.activeEditor;
        ed.execCommand('mceInsertContent',false,content);
}
$('#PostName').keyup(function(){
    var slug = $('input#PostName').val();
    //slug = slug.replace(/ /g, "-");
    slug = slugMe(slug);
    $('#PostSlug').val(slug);
});
<?php echo $this->Html->scriptEnd(); ?>