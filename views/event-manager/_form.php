<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\datetime\DateTimePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin( ['id' => 'dynamic-form'] ); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

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
    <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Teams Details</h4></div>
                <div class="panel-body">
                            <?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-items', // required: css class selector
                                'widgetItem' => '.item', // required: css class
                                'limit' => 4, // the maximum times, an element can be cloned (default 999)
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

                            <div class="container-items"><!-- widgetContainer -->
                                      <?php foreach ($modelsTeam as $i => $modelTeam): ?>
                                          <div class="item panel panel-default"><!-- widgetBody -->
                                              <div class="panel-heading">
                                                  <h3 class="panel-title pull-left">Team</h3>
                                                  <div class="pull-right">
                                                      <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                                      <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                  </div>
                                                  <div class="clearfix"></div>
                                              </div>
                                              <div class="panel-body">
                                                  <?php
                                                      // necessary for update action.
                                                      if (! $modelTeam->isNewRecord) {
                                                          echo Html::activeHiddenInput($modelTeam, "[{$i}]event_id");
                                                      }
                                                  ?>
                                                  <?= $form->field($modelTeam, "[{$i}]team_name")->textInput(['maxlength' => true]) ?>
                                                  <?= $form->field($modelTeam, "[{$i}]place_name")->textInput(['maxlength' => true]) ?>
                                                  <?= $form->field($modelTeam, "[{$i}]description")->textarea(['rows' => 2]) ?>
                                                  <?= $form->field($modelTeam, "[{$i}]team_size")->textInput(['maxlength' => true]) ?>
                                              </div>
                                          </div>
                                    <?php endforeach; ?>
                            </div>
                            <?php DynamicFormWidget::end(); ?>
                </div>
   </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>