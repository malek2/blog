<br><br>
<div class="cb"></div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="widget widget_tag_cloud">
            <h3 class="widget_title"><?php echo __('Tags'); ?></h3>
            <?php foreach ($tags as $tag): ?>
                <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'postByTag', 'id' => $tag['Tag']['id'])); ?>">
                    <?php echo $tag['Tag']['name']; ?>(<?php echo $tag['Tag']['counter']; ?>)
                </a>
            <?php endforeach; ?>
            <br><br>
            <div class="cb"></div>

            <?php
            $this->Paginator->afterLayout('ajax');
            $this->Paginator->options(array(
                'update' => '#pag',
                'before' => $this->Js->get('#loader')->effect('fadeIn', array('buffer' => true)),
                'complete' => $this->Js->get('#loader')->effect('fadeOut', array('buffer' => true))
            ));
            ?>

            <div class="pagination">
                <?php
                //echo $this->Paginator->prev('<', array('class' => 'prev-button', 'tag' => false), null, array('class' => 'disabled', 'tag' => 'span'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentClass' => 'current', 'currentTag' => 'a', 'tag' => FALSE));
                //echo $this->Paginator->next('>', array('class' => 'next-button', 'tag' => false), null, array('class' => 'disabled myclass', 'tag' => 'span'));
                ?>
            </div>
            <div class="cb"></div>
        </div>
    </div>
    <div class="col-lg-1"></div>   
</div>
<br><br>