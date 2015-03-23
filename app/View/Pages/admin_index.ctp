<?php $this->set('title_for_layout', 'BlogLargest | Admin'); ?>

<?php
//debug($posts);
//debug($pages);
//debug($comments);
//debug($categories);
?>

<div class="row center-block">
    <div class="col-md-3 thumbnail">
        <h3 class="label label-success center-block"><?php echo __('Catégories'); ?></h3>
        <p>
        <h1><small style="margin-bottom: 25px;">Nombre : </small><i class="label label-success" style="font-size: 12px;"><?php echo $categories; ?></i></h1> 
        </p>
        <p>
        <h1><small style="margin-bottom: 25px;"><?php echo __('Dernières Catégories'); ?> : </small></h1>
        <ul>
            <?php foreach ($categoriesp as $category): ?>
                <li><?php echo $category['Category']['name']; ?></li>
            <?php endforeach; ?>
        </ul>
        </p>
    </div>
    <div class="col-md-3 thumbnail">
        <h3 class="label label-success center-block"><?php echo __('Articles'); ?></h3>
        <p>
        <h1><small style="margin-bottom: 25px;"><?php echo __('Nombre'); ?> : </small><i class="label label-success" style="font-size: 12px;"><?php echo $posts; ?></i></h1> 
        </p>
        <p>
        <h1><small style="margin-bottom: 25px;"><?php echo __('Derniers Articles'); ?> : </small></h1>
        <ul>
            <?php foreach ($postsp as $post): ?>
            <li>
                <?php $post['Post']['link']['admin'] = false; ?>
                <?php echo $post['Post']['name']; ?> &nbsp; 
                <i class="glyphicon glyphicon-edit" onclick="document.location.href = '<?php echo $this->Html->url(array('controller'=>'posts','action'=>'edit','id'=>$post['Post']['id'],'admin'=>true)); ?>';"></i>
                <i class="glyphicon glyphicon-eye-open" onclick="window.open('<?php echo $this->Html->url($post['Post']['link']); ?>','_blank');"></i>
            </li>
            <?php endforeach; ?>
        </ul>
        </p>
    </div>
    <div class="col-md-3 thumbnail">
        <h3 class="label label-success center-block"><?php echo __('Commentaires'); ?></h3>
        <p>
        <h1><small style="margin-bottom: 25px;">Nombre : </small><i class="label label-success" style="font-size: 12px;"><?php echo $comments; ?></i></h1> 
        </p>
        <p>
        <h1><small style="margin-bottom: 25px;"><?php echo __('Derniers Commentaires'); ?> : </small></h1>
        </p>
    </div>
    <div class="col-md-3 thumbnail">
        <h3 class="label label-success center-block"><?php echo __('Pages'); ?></h3>
        <p>
        <h1><small style="margin-bottom: 25px;">Nombre : </small><i class="label label-success" style="font-size: 12px;"><?php echo $pages; ?></i></h1> 
        </p>
        <p>
        <h1><small style="margin-bottom: 25px;"><?php echo __('Derniers Pages'); ?> : </small></h1>
        </p>
    </div>
</div>