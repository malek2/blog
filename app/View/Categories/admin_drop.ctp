<div class="thumbnail">
    <div class="row">
        <div class="col-lg-11">
            <div class="page-header">
                <h1>
                    <?php echo __('Gérer Les Catégories') ?>
                </h1>
            </div>
        </div>
    </div>
    
    <button class="btn btn-info" onclick="document.location.href = '<?php echo $this->Html->url(array('controller'=>'categories','action'=>'edit','type'=>'drop','admin'=>true)); ?>'">
        <?php echo __('Ajouter une Catégorie-Drop'); ?>
    </button>
        <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th class="text-left"><?php echo __('Nom'); ?></th>
                        <th class="text-left"><?php echo __('Lien'); ?></th>
                        <th class="text-left"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($categories as $p): ?>
                        <tr>

                            <td><?php echo $p['Category']['name']; ?></td>
                            <td><?php echo $p['Category']['slug']; ?></td>

                            <td>
                                <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'edit', 'type'=>$p['Category']['type'] ,'id' => $p['Category']['id'])) ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                    <?php echo $this->Form->postLink(null, array('action' => 'delete', 'type'=>'drop' , 'id' => $p['Category']['id']), array('class' => 'glyphicon glyphicon-remove'), __('Etes-vous sûr que vous voulez supprimer # %s?', $p['Category']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


