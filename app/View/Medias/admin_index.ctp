<?php $this->layout = 'media'; ?>

<div class="page-header">
    <h1><?php echo __('Liste des Medias'); ?></h1>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-1">
        <legend ><?php echo __('Gérer Les Medias'); ?></legend><br />
        <div class="span6 offset1">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-left"><?php echo __('id'); ?></th>
                        <th class="text-left"><?php echo __('Nom'); ?></th>
                        <th class="text-left"><?php echo __('Lien'); ?></th>
                        <th class="text-left"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($medias as $m): $m = current($m); ?>
                        <tr>
                            <td><?php echo $m['id']; ?></td>
                            <td><?php echo $m['name']; ?></td>
                            <td><?php echo $this->Html->image($m['url'], array('style' => 'max-width:150px;')); ?></td>
                            <td>
                                <?php echo $this->Html->link(__('(Original)'), array('controller' => 'medias', 'action' => 'show', $m['id']), array('class' => 'icon-download')); ?>
                                <?php echo '<br>' . $this->Html->link(__('(100x100)'), array('controller' => 'medias', 'action' => 'show', $m['id'], 's'), array('class' => 'icon-download')); ?>
                                <?php echo '<br>' . $this->Html->link(__('(400x300)'), array('controller' => 'medias', 'action' => 'show', $m['id'], 'm'), array('class' => 'icon-download')); ?>
                                <?php echo '<br>' . $this->Html->link(__('(960x600)'), array('controller' => 'medias', 'action' => 'show', $m['id'], 'l'), array('class' => 'icon-download')); ?>
                                <?php
                                echo '<br>' . $this->Html->link(
                                        __(''), array('controller' => 'medias', 'action' => 'delete',
                                    $m['id']), array('class' => 'glyphicon glyphicon-remove'), __('Voulez Vous supprimer cette Image ?'));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination offset6">
                <?php
//                echo $this->Paginator->numbers(array(
//                    'separator' => false,
//                    'tag' => 'div',
//                    'class' => 'button'
//                ));
                ?>
            </div>
        </div>
    </div>
    <br>

</div>
<div class="row">
    <div class="col-md-6 col-md-offset-1" id="addimage">
        <?php
        echo $this->Form->create('Media', array(
            'type' => 'file',
            'class' => 'form-horizontal',
            'inputDefaults' => array('label' => false, 'div' => false)
        ));
        ?>
        <div class="form-group">
            <label for="inputImage" class="col-lg-2 control-label">Image</label>
            <div class="col-lg-10">
                <?php echo $this->Form->input('file', array('type' => 'file', 'class' => 'form-control')); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputImage" class="col-lg-2 control-label">Nom</label>
            <div class="col-lg-10">
                <?php echo $this->Form->input('name', array('title' => 'Mettez le Nom de l\'image', 'placeholder' => __('Mettez le Nom de l\'image'), 'class' => 'form-control')); ?>
            </div>
        </div>
        <?php echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'image')); ?>
        <?php //echo '<br />' . $this->Form->end(__('Ajouter'),array('class'=>'icon-floppy')); ?>
        <div class="submit"><button class="btn btn-info" type="submit" >&nbsp;Ajouter une image</button></div>
    </div>
</div>
<?php
//echo $this->Paginator->numbers();
?>