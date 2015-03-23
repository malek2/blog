<?php $this->set('title_for_layout', __('Insérer L\'image')); ?>
<?php $this->layout = 'media'; ?>
<div class="row ">
    <div class="col-md-8 col-md-offset-1">
        <h3><?php echo __('Insérer Image'); ?></h3><br />
        <div class="span6 offset1">
            <img src="<?php echo $m['url']; ?>" style="max-width:200px" >
            <br /><br />
            <?php echo $this->Form->create('Media', array(
                'inputDefaults' => array('div' => 'false', 'label' => false)));
            ?>
            <?php echo $this->Form->input('alt', array('label' => 'Description de l\'image', 'value' => $m['alt'], 'class' => 'form-control')); ?>
                <?php echo $this->Form->input('src', array('label' => 'Chemin de l\'image', 'value' => $m['url'], 'class' => 'form-control')); ?>
            
                <?php
//                echo $this->Form->input('class'
//                        , array('legend' => 'Alignement', 'options' => array(
//                        'alignLeft' => 'Left',
//                        'alignCenter' => 'Centre',
//                        'alignRight' => 'Right'
//                    ), 'type' => 'radio', 'value' => ''));
                ?>
            <label class="radio-inline">
                <input type="radio" name="data[Media][class]" id="MediaClassAlignLeft" value="alignLeft">
                <i class="glyphicon glyphicon-align-left"></i>
            </label>
            <label class="radio-inline">
               <input type="radio" name="data[Media][class]" id="MediaClassAlignCenter" value="alignCenter">
               <i class="glyphicon glyphicon-align-center"></i>
            </label>
            <label class="radio-inline">
                <input type="radio" name="data[Media][class]" id="MediaClassAlignRight" value="alignRight">
                <i class="glyphicon glyphicon-align-right"></i>
            </label>
            
            
            
            <?php echo '<br />' . $this->Form->submit(__('Insérer'), array('class' => 'btn btn-info')); ?>
<?php echo $this->Form->end(); ?>

        </div>


        </table>
    </div>
</div>