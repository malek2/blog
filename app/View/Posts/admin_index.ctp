<div class="thumbnail">
    <div class="row">
        <div class="col-lg-11">
            <div class="page-header">
                <h1>
                    <?php echo __('Liste des Articles'); ?>
                </h1>
            </div>
        </div>
    </div>
    
    <button class="btn btn-info" onclick="document.location.href = '<?php echo $this->Html->url(array('controller'=>'pages','action'=>'add','admin'=>true)); ?>'">
        <?php echo __('Ajouter un Article'); ?>
    </button>
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo __('Nom'); ?></th>
                        <th><?php echo __('Etat'); ?></th>
                        <th><?php echo __('Date Création'); ?></th>
                        <th><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['Post']['name']; ?></td>
                            <td>
                                <?php if ($post['Post']['online'] == 1): ?> 
                                    <span class="label label-info"><?php echo __('En Ligne') ?></span>
                                <?php else: ?>
                                    <span class="label label-danger"><?php echo __('Hors Ligne') ?></span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: left"><?php echo date('Y-m-d (h:i:s)',$post['Post']['created']->sec); ?></td>
<!--                            
                            <td>
                                <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'edit', 'id' => $post['Post']['id'])) ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                    <?php echo $this->Form->postLink(null, array('action' => 'delete', 'id' => $post['Post']['id']), array('class' => 'glyphicon glyphicon-remove'), __('Etes-vous sûr que vous voulez supprimer # %s?', $post['Post']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 center-block">
            <div class="pagination">
                <?php echo $this->Paginator->numbers(); ?>
            </div>
        </div>
    </div>
</div>