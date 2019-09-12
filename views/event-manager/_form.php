<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

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


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>