<?php 

$page = current($page);?>
<?php $this->set('title_for_layout',  ucfirst($page['name'])); ?>
<div class="grid">
    <div class="row">
        
        <h2 class="offset2"><?php  echo __($page['name']); ?></h2><br>
        
        <div class="span9 offset3">
            <?php  echo __($page['content']); ?>
        </div>
    </div>
</div>
<div class="cb" style="clear: both;"></div>