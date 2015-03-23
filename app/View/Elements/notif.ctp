<div class="alert alert-<?php if (isset($type) && $type == 'error') {
    echo 'warning';
} else {
    echo 'success';
} ?>">
    <a href="" class="close" onclick="$(this).parent().slideUp();">x</a>
    <?php echo $message; ?>
</div>