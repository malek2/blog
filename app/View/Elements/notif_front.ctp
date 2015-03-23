<br>
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <div id="notif" class="alert-message <?php
        if (isset($type) && $type == 'error') {
            echo 'error';
        } else {
            echo 'success';
        }
        ?>">
            <i class="icon-<?php
            if (isset($type) && $type == 'error') {
                echo 'exclamation-sign';
            } else {
                echo 'ok';
            }
            ?>"></i>
            <p><span><?php echo $message; ?>
                    <button class="button red-button alignRight" onclick="$('#notif').slideUp();">x</button>
            </p>
            <br>
        </div>
    </div>
    <div class="col-md-1">

    </div>
</div>