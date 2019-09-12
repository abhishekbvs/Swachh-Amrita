<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

       <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
       
       <?= $form->field($model, 'email_id')->textInput(['autofocus' => true]) ?>

       <?= $form->field($model, 'password')->passwordInput() ?>

       <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

       <?= $form->field($model, 'roll_no')->textInput(['autofocus' => true]) ?>

       <?= $form->field($model, 'phone_no')->textInput(['autofocus' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
