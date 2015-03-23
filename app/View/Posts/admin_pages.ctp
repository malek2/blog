<div class="grid">
    <div class="row">
        <div class="offset2">
            <h2><?php echo __('Gérer Les Articles') ?></h2><br />
            
            <a href="<?php echo $this->Html->url(array('controller'=>'posts','action'=>'add',$id=null)) ?>" class="button icon-plus"><?php echo __('Ajouter un Article'); ?></a>
        </div>
        <br />
        <div class="span12 offset3">
            <table class="table bordered">
                <thead>
                    <tr>
                        <th class="text-left"><?php echo $this->Paginator->sort(__('id')); ?></th>
                        <th class="text-left"><?php echo $this->Paginator->sort(__('Nom')); ?></th>
                        <th class="text-left"><?php echo $this->Paginator->sort(__('Lien')); ?></th>
                        <th class="text-left"><?php echo $this->Paginator->sort(__('Date de création')); ?></th>
                        <th class="text-left"><?php echo $this->Paginator->sort(__('Etat')); ?></th>
                        <th class="text-left"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($posts as $p): ?>
                        <tr>
                            <td><?php echo $p['Post']['id']; ?></td>
                            <td><?php echo $p['Post']['name']; ?></td>
                            <td><?php echo $p['Post']['slug']; ?></td>
                            <td><?php echo $p['Post']['created']; ?></td>
                            <td><?php
                                if ($p['Post']['online'] == '1') {
                                    echo '<div class="button success">' . __('En Ligne') . '</div>';
                                } else {
                                    echo '<div class="button inverse">' . __('Hors Ligne') . '</div>';
                                }
                                ?></td>
                            <td>

                                <?php
                                echo $this->Html->link(
                                        __(''), array('controller' => 'posts', 'action' => 'edit',$p['Post']['id']), array('class' => 'icon-pencil')
                                );
                                ?>

                                
                                    <?php
                                    echo $this->Html->link(
                                            __(''), array('controller' => 'posts', 'action' => 'delete',
                                        $p['Post']['id']),array('class'=>'icon-cancel'), __('Voulez Vous supprimer cette Article ?'));
                                    ?>
                                

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <button class="bg-lime"><?php echo __('Liste des Articles'); ?></button><br><br>
            </table>
            <div class="pagination offset6">
                <?php
                echo $this->Paginator->numbers(array(
                    'separator' => false,
                    'tag' => 'button'
                ));
                ?>
            </div>
        </div>
    </div>
</div>


