<?php  echo $this->Html->script('tiny_mce/tiny_mce_popup'); ?>
<?php //debug($m); ?>
<script type="text/javascript">
    var win = window.dialogArguments || opener || parent || top;
    win.send_to_editor('<img src="<?php echo $m['Media']['src']; ?>" alt="<?php echo $m['Media']['alt']; ?>" class="<?php echo $m['Media']['class']; ?>"><div class="cb"></div>');
    tinyMCEPopup.close();
</script>