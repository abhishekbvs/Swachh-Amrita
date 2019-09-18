<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\datetime\DateTimePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>
<div class = "row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h1><?= Html::encode($this->title) ?></h1>
<div class="event-form">

   
    <?php $form = ActiveForm::begin( ['id' => 'dynamic-form'] ); ?>
    <div class = "container-fluid">

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <div class="row">
        <div class="col-md-6">
        <?php
            date_default_timezone_set('Asia/Kolkata');
                echo $form->field($model, 'from_datetime')->widget(DateTimePicker::classname(), [
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                'options' => ['placeholder' => 'Enter Date'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd-M-yyyy hh:ii',
                    'startDate' => date('Y-m-d H:i:s')
                    ]
                ]);
        ?>
        </div>
        <div class="col-md-6">
        <?php
        date_default_timezone_set('Asia/Kolkata');
            echo $form->field($model, 'to_datetime')->widget(DateTimePicker::classname(), [
                'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
            'options' => ['placeholder' => 'Enter Date'],
                    'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-M-yyyy hh:ii',
                'startDate' => date('Y-m-d H:i:s')
                ]
            ]);
 	   ?>
        </div>
    </div>
                    </div>
   

    
    <?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-items', // required: css class selector
                                'widgetItem' => '.item', // required: css class
                                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                                'min' => 1, // 0 or 1 (default 1)
                                'insertButton' => '.add-item', // css class
                                'deleteButton' => '.remove-item', // css class
                                'model' => $modelsTeam[0],
                                'formId' => 'dynamic-form',
                                'formFields' => [
                                    'team_name',
                                    'place_name',
                                    'description',
                                    'team_size'
                                ],
    ]); ?>
    
                <div class="panel-body">
                           <div class="container-items"><!-- widgetContainer -->
                                      <?php foreach ($modelsTeam as $indexTeam => $modelTeam): ?>
                                          <div class="item panel panel-default"><!-- widgetBody -->
                                              <div class="panel-heading">
                                                  <h3 class="panel-title pull-left">Team </h3>
                                                  <div class="pull-right">
                                                      <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                                      <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                  </div>
                                                  <div class="clearfix"></div>
                                              </div>
                                              <div class="panel-body">
                                                  <?php
                                                
                                                      if (! $modelTeam->isNewRecord) {
                                                          echo Html::activeHiddenInput($modelTeam, "[{$indexTeam}]id");
                                                      }
                                                  ?>
                                                 
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <?= $form->field($modelTeam, "[{$indexTeam}]team_name")->textInput(['maxlength' => true]) ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                             <?= $form->field($modelTeam, "[{$indexTeam}]team_size")->textInput(['type' =>'number']) ?>    
                                                        </div>
                                                    </div>
                                                      
                                                  <?= $form->field($modelTeam, "[{$indexTeam}]place_name")->textInput(['maxlength' => true]) ?>
                                                  <?= $form->field($modelTeam, "[{$indexTeam}]description")->textarea(['rows' => 2]) ?>
                                                  <?= $this->render('_form-volunteer', [
                                                            'form' => $form,
                                                            'indexTeam' => $indexTeam,
                                                            'modelsVolunteer' => $modelsVolunteer[$indexTeam],
                                                        ]) ?>
                                              </div>
                                          </div>
                                    <?php endforeach; ?>
                            </div>
                 </div>
        </div>
        
        <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="col-md-2"></div>
</div>