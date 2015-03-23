<?php $this->set('title_for_layout', 'Edition Catégorie'); ?>
<div class="grid">
    <div class="row">
        <div class="offset2">
            <legend><?php echo __('Editer Catégorie ');
?></legend><br />
        </div>
        <div class="span12 offset3">
            <?php echo $this->Form->create('Category'); ?>
            <?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('name', array('label' => __('Nom'), 'placeholder' => 'Mettez Le Nom de La Catégorie', 'class' => 'form-control')) . ''; ?>
            <?php echo $this->Form->input('slug', array('label' => __('Url(Slug)'), 'placeholder' => 'Mettez L\'URL ou le Slug', 'class' => 'form-control')) . ''; ?>
            <div class="cb"></div>
            <?php echo $this->Form->submit(__('Modifier'), array('class' => 'btn btn-success form-control')); ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<br />

<?php echo $this->Html->script('functions',array('inline'=>false)); ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
$('#CategoryName').keyup(function(){
    var slug = $('input#CategoryName').val();
    slug = slugMe(slug);
    $('#CategorySlug').val(slug);
});
<?php echo $this->Html->scriptEnd(); ?>