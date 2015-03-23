<?php $this->set('title_for_layout', __('Résultats | AlgerNews')); ?>
<?php //debug($modeles);?>
<?php if (empty($modeles)): ?>
<div class="grid" style="height: 36%">
        <div class="span12 offset1">
            <h2><?php echo __('Résultats') ?></h2>

            <p class="offset1">
                    <?php echo __('Aucun résultat :('); ?>
            </p>
        </div>
    </div>

<?php endif; ?>
<?php if(!empty($modeles)): ?>
<div class="grid">
    <div class="span12 offset1">
        <h2><?php echo __('Résultats'); ?></h2>

        <?php foreach ($modeles as $k => $v): $v = current($v); /* debug($v); die(); */ ?>
            <div class="span12 ">
                <h3><a href="#" onclick="document.location.href = '<?php echo $this->Html->url($v['link']); ?>'"><?php echo $v['name'] ?></a></h3>
                <p>
                    <?php echo $this->Text->truncate($v['content'], 700, array('exact' => false, 'html' => true)); ?>
                    <button class="icon-arrow-right-3 bg-cyan place-right" onclick="document.location.href = '<?php echo $this->Html->url($v['link']); ?>'">
                        <?php echo __('Lire la suite') ?>
                    </button>
                </p>
            </div>
            <br />
            <div class="clearfix"></div>        
        <?php endforeach; ?>
    </div>
    <br><br>
    <div class="offset4">
         <p>
	<?php
	//echo $this->Paginator->numbers();
	?>	</p>
	<div class="paging">
	<?php
		//echo $this->Paginator->prev('< ' . __('Précédent'), array(), null, array('class' => 'prev disabled'));
		//echo $this->Paginator->numbers(array('separator' => ''));
		//echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
    </div>

</div>
<?php endif; ?>