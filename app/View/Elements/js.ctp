<?php echo $this->Html->script('superfish'); ?>
<?php echo $this->Html->script('jflickrfeed.min'); ?>
<?php echo $this->Html->script('flexslider/jquery.flexslider-min'); ?>
<?php echo $this->Html->script('jquery.masonry.min'); ?>
<?php echo $this->Html->script('plugins'); ?>
<?php if ($currentUser !== null && $currentUser['Role']['name'] === 'admin'): ?>
<?php echo $this->Html->script('modernizr-2.6.2.custom.min'); ?>
<?php echo $this->Html->script('scripts.min'); ?>
<?php endif; ?>