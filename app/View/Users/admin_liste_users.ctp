<div class="users liseusers span12 offset1">
    <h2><?php echo __('Liste des Users'); ?></h2>
    <table class="table table-bordered table-hover">
         <thead>
        <tr style="text-align: left;color: #00b0f6;">
            <th><?php echo __('Nom d\'utilisateur'); ?></th>
            <th><?php echo __('Rôle'); ?></th>
            <th><?php echo __('Date de Création'); ?></th>
            <th><?php echo __('Dern. Modification'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <!-- C'est ici que nous bouclons sur le tableau $posts afin d'afficher
        les informations des posts -->

         <tbody>
             <?php foreach ($users as $user): ?>
       
            <tr>
                <!--le Login -->
                <td style="text-align: left">
                    <?php echo $user['User']['username']; ?>
                </td>
                <!-- role -->
                <td style="text-align: left"><?php echo $user['Role']['name']; ?></td>
                <!-- Créer le -->
                <td style="text-align: left"><?php echo date('Y-m-d',$user['User']['created']->sec); ?></td>
                <!-- modifé le -->
                <td style="text-align: left"><?php echo date('Y-m-d (h:i:s)',$user['User']['modified']->sec); ?></td>
                <!--le Login -->
                <td class="actions"  style="text-align: left">

                    
                    <?php echo $this->Html->link(null, array('controller' => 'users', 'action' => 'edit','admin'=>true, 'id'=>$user['User']['id']), array('class' => 'glyphicon glyphicon-pencil')); ?>

                    <?php echo $this->Html->link(null, array('controller' => 'users', 'action' => 'delete','admin'=>true, 'id'=>$user['User']['id']), array('class'=>'glyphicon glyphicon-remove'), 'Etes-vous sûr ?') ?>
                </td>
            </tr>
        <?php endforeach; ?>
</tbody>
    </table>
    <div class="alignCenter">
        <ul class="pagination text-center">
            <?php
        echo $this->Paginator->prev('&laquo; ' . __('Précédent'), array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'class' => 'disabled', 'escape' => false));
        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));
        echo $this->Paginator->next(__('Suivant') . ' &raquo;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'class' => 'disabled', 'escape' => false));
        ?>
        </ul>
        <div>
            <br />

    <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'/')); ?>" class="button default large icon-arrow-left-3 place-right"></a>

        </div>
    </div>
</div>