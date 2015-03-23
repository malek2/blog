<style>
    .shoppingList
{
	width: 300px;
	background-color: #fff;
	border: 1px solid #395e7f;
}

.shoppingList .reponse
{
	color: 9f9;
	font-weight: bold;
	width: 200px;
	margin: 5px auto 0;
}

.shoppingList ul
{
	padding: 10px 50px;
}

.shoppingList ul li
{
	list-style: none;
}


.count, .item
{
	padding: 2px 5px;
	cursor:pointer;
}


.item:hover
{
	background-color: #93abc1;
	border: 1px solid #33f;
	color: #fff;
}

.shoppingList li.ui-sortable-helper{
	cursor:-moz-grabbing;
	opacity: 0.6;
}
</style>
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

    <button class="btn btn-info" onclick="document.location.href = '<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'edit', 'type' => 'menu', 'admin' => true)); ?>'">
        <?php echo __('Ajouter une Catégorie-Menu'); ?>
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
                    <?php foreach ($categories as $k => $p): ?>
                        <tr>
                            <td><?php echo $p['Category']['name']; ?></td>
                            <td><?php echo $p['Category']['slug']; ?></td>
                            <td>
                                <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'edit', 'type' => $p['Category']['type'], 'id' => $p['Category']['id'])) ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                <?php
                                echo $this->Form->postLink(null, array('action' => 'delete', 'type' => 'menu', 'id' => $p['Category']['id']), array('class' => 'glyphicon glyphicon-remove'), __('Etes-vous sûr que vous voulez supprimer # %s?', $p['Category']['id']));
                                ?>   
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination pagination-sm">
        <?php echo $this->Paginator->numbers(); ?>
    </div>
    <h2><?php echo __('Position'); ?></h2>
    <div class="shoppingList">
        <div class="reponse"></div>
        <ul>
            <?php foreach ($categories as $p): ?>
            <li id="element_<?php echo $p['Category']['position']; ?>.<?php echo $p['Category']['id']; ?>" data-value="<?php echo $p['Category']['id']; ?>"><?php echo $p['Category']['name']; ?></li>
            <?php endforeach; ?>		
        </ul>
    </div>
</div>
<?php echo $this->Html->script('jquery.min'); ?>
<?php echo $this->Html->script('jquery-ui-custom.min'); ?>
<?php echo $this->Html->script('jquery.shoppingList'); ?>
<script type="text/javascript">
        $(document).ready(function()
        {
            $(".shoppingList ul").shoppingList({
            });

        });
</script>