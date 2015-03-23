<?php //echo $this->Html->script('jquery'); ?>
                                <?php
                                if ($p['Comment']['comment_approved'] == '0') {
                                    $datas = $this->Js->get('#CommentApproveForm')->serializeForm(array('isForm' => true, 'inline' => true,'cache'=>true));
                                    //debug($data);
                                    $this->Js->get('#CommentApproveForm')->event(
                                            'submit', $this->Js->request(
                                                    array('action' => 'approve'),
                                                    array(
                                                        'update' => '#commentStatus',
                                                        'data' => $datas,
                                                        'async' => true,
                                                        'dataExpression' => true,
                                                        'method' => 'POST'
                                                    )
                                            )
                                    );
                                        echo $this->Form->create('Comment', array('action' => 'approve', false ),array('id' => 'CommentApproveForm'));
                                    echo $this->Form->input('id', array('value' => $p['Comment']['id']));
                                    echo $this->Form->input('comment_approved', array('type' => 'hidden', 'value' => 1));
                                    echo $this->Form->end(__('Approuvé'));
                                    echo $this->Js->writeBuffer();
                                } else {
                                    $datas = $this->Js->get('#CommentApproveForm')->serializeForm(array('isForm' => true, 'inline' => true));
                                    //debug($datas);
                                    $this->Js->get('#CommentApproveForm')->event(
                                            'submit', $this->Js->request(
                                                    array('action' => 'approve'), array(
                                                'update' => '#commentStatus',
                                                'data' => $datas,
                                                'async' => true,
                                                'dataExpression' => true,
                                                'method' => 'POST'
                                                    )
                                            )
                                    );
                                    echo $this->Form->create('Comment', array('action' => 'approve', 'id' => 'CommentApproveForm', 'default' => false));
                                    echo $this->Form->input('id', array('value' => $p['Comment']['id']));
                                    echo $this->Form->input('comment_approved', array('type' => 'hidden', 'value' => 0));
                                    echo $this->Form->end(__('Desapprouvé'));
                                    echo $this->Js->writeBuffer();
                                }
                                ?>


                                <?php
                                echo $this->Html->link(
                                        __(''), array('controller' => 'comment', 'action' => 'delete',
                                    $p['Comment']['id']), array('class' => 'icon-cancel'), __('Voulez Vous supprimer cette Page ?'));
                                ?>

