<?php $this->set('title_for_layout','Ajout Catégorie'); ?>
<div class="grid">
    <div class="row">
        <div class="offset2">
            <legend><?php echo __('Ajouter Catégorie ');
?></legend><br />
        </div>
        <div class="span12 offset3">
            <?php echo $this->Form->create('Category'); ?>
            <?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('name', array('label' => __('Nom'), 'placeholder' => 'Mettez Le Nom de La Catégorie', 'class' => 'input-control text')) . ''; ?>
            <?php echo $this->Form->input('slug', array('label' => __('Url(Slug)'), 'placeholder' => 'Mettez L\'URL ou le Slug', 'class' => 'input-control text')) . ''; ?>
            <?php echo '<br />' . $this->Form->end(__('Ajouter')); ?>
        </div>
    </div>
</div>
<br />

<?php echo $this->Html->script('functions'); ?>

<?php echo $this->Html->scriptStart(); ?>


$('#CategoryName').keyup(function(){
    var slug = $('input#CategoryName').val();
    slug = slugMe(slug);
    $('#CategorySlug').val(slug);
});


<?php echo $this->Html->scriptEnd(); ?>
