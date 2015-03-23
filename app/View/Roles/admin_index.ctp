<div class="row center-block">
    <div class="page-header">
        <h2><?php echo __('Roles'); ?></h2>
        <button class="btn btn-info" onclick="document.location.href='<?php echo $this->Html->url(array('controller'=>'roles','action'=>'add','admin'=>true)); ?>';">
            <?php echo __('Ajouter un rôle'); ?>
        </button>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
<!--                <th><?php echo __('id'); ?></th>-->
                <th><?php echo __('Rôle'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($roles as $role): ?>
                <tr>
<!--                    <td id="id" ><?php echo h($role['Role']['id']); ?></td>-->
                    <td><?php echo h($role['Role']['role']); ?></td>
                    <td>
                        <i id="edit" style="cursor: pointer;" onclick='javascript:edit_role(<?php echo $role['Role']['id']; ?>)' class="glyphicon glyphicon-pencil"></i>
                        <?php echo $this->Form->postLink(null, array('action' => 'delete', 'id'=>$role['Role']['id']), array('class'=>'glyphicon glyphicon-remove'), __('Etes-vous sûr que vous voulez supprimer # %s?', $role['Role']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <p class="" id='modif'>
           
        </p>
    </div>
    <div class="col-md-2"></div>
</div>
<?php echo $this->Html->script('jquery.min'); ?>
<?php echo $this->Html->scriptStart(); ?>
function edit_role(id){
            $("#modif").load("/bloglargest/gestion-roles/modifier-" + id, function(){});
        }
    $(document).ready(function() {
        
        

    });
<?php echo $this->Html->scriptEnd(); ?>