<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use app\models\User;

?>
<?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-volunteers', // required: css class selector
                                'widgetItem' => '.volunteer-item', // required: css class
                                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                                'min' => 1, // 0 or 1 (default 1)
                                'insertButton' => '.add-volunteer', // css class
                                'deleteButton' => '.remove-volunteer', // css class
                                'model' => $modelsVolunteer[0],
                                'formId' => 'dynamic-form',
                                'formFields' => [
                                    'user_id',
                                    'volunteer_type',
                                ],
]); ?>
                <div class="panel-body">                     
                            <div class="container-volunteers">
                                      <?php foreach ($modelsVolunteer as $indexVolunteer => $modelVolunteer): ?>
                                          <div class="volunteer-item panel panel-default">
                                              <div class="panel-heading">
                                                  <h3 class="panel-title pull-left">Volunteer</h3>
                                                  <div class="pull-right">
                                                      <button type="button" class="add-volunteer btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                                      <button type="button" class="remove-volunteer btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                  </div>
                                                  <div class="clearfix"></div>
                                              </div>
                                              <div class="panel-body">
                                                  <?php
                                                    
                                                      if (! $modelVolunteer->isNewRecord) {
                                                          echo Html::activeHiddenInput($modelVolunteer, "[{$indexTeam}][{$indexVolunteer}]id");
                                                      }
                                                  ?>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                        <?php
                                                                $userList = ArrayHelper::map(User::find(['id','name'])->all(), 'id', 'name');
                                                                    echo $form->field($modelVolunteer, "[{$indexTeam}][{$indexVolunteer}]user_id")->dropDownList($userList,
                                                                [  'prompt' => 'Choose User',
                                                                ]);
                                                            ?>
                                                        </diV>
                                                        <div class = "col-md-6">
                                                            <?php $volList = [ 1 => 'Overall Coordinator', 2 => 'Team Coordinator', 3 =>'Tools Coordinator', 4 => 'Refreshment Coordinator'];?>
                                                            <?= $form->field($modelVolunteer, "[{$indexTeam}][{$indexVolunteer}]volunteer_type")->dropDownList($volList,['prompt' => 'Choose Volunteer type'])?>
                                                        </diV>                                            
                                                    </div>
                                              </div>
                                          </div>
                                    <?php endforeach; ?>
                            </div>
                           
                </div>
                
   <?php DynamicFormWidget::end(); ?>
