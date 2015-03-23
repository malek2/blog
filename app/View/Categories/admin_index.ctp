<?php //debug($posts); die();  ?>
<div class="grid">
    <div class="row">
        <div class="offset2">
            <h2><?php echo __('Gérer Les Catégories') ?></h2><br />            
            <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'add', $id = null)) ?>" class="button icon-plus"><?php echo __('Ajouter une Catégorie'); ?></a>
        </div>
        <br />
        <div class="span12 offset3">
            <table class="table bordered">
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
                                <?php
                                echo $this->Html->link(
                                        __(''), array('controller' => 'categories', 'action' => 'edit', $p['Category']['id']), array('class' => 'icon-pencil')
                                );
                                ?>


                                <?php
                                echo $this->Html->link(
                                        __(''), array('controller' => 'categories', 'action' => 'delete',
                                    $p['Category']['id']), array('class' => 'icon-cancel'), __('Voulez Vous supprimer cette Page ?'));
                                ?>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <button class="bg-lime"><?php echo __('Liste des Catégories'); ?></button><br><br>
            </table>

        </div>
    </div>
</div>


