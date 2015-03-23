<?php //debug($comments);   ?>

<div class="row">
    <div class="col-md-6">
        <div class="page-header">
            <h3><?php echo __('Commentaires En Attentes'); ?></h3>
        </div>
    </div>
</div>
<div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
            <th><?php echo __('Pseudo'); ?></th>
            <th><?php echo __('E-mail'); ?></th>
            <th><?php echo __('IP'); ?></th>
            <th><?php echo __('Contenu'); ?></th>
            <th><?php echo __('Date'); ?></th>
            <th><?php echo __('Article'); ?></th>
            <th><?php echo __('Actions'); ?></th>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment['Comment']['name']; ?></td>
                        <td><?php echo $comment['Comment']['mail']; ?></td>
                        <td><?php echo $comment['Comment']['ip']; ?></td>
                        <td><?php echo $comment['Comment']['content']; ?></td>
                        <td><?php echo $comment['Comment']['created']; ?></td>
                        <td><a href="<?php echo $this->Html->url($comment['Post']['link']); ?>" target="_blank"><?php echo $comment['Post']['name']; ?></a></td>
                        <td>
                            <i onclick="document.location.href='<?php echo $this->Html->url(array('controller'=>'comments','action'=>'approve','admin'=>true,$comment['Comment']['id'])); ?>'" style="cursor: pointer" title="Approuvé" class="glyphicon glyphicon-ok"></i>
                            <i onclick="document.location.href='<?php echo $this->Html->url(array('controller'=>'comments','action'=>'delete','admin'=>true,$comment['Comment']['id'])); ?>'" style="cursor: pointer" title="Supprimé" class="glyphicon glyphicon-remove"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>