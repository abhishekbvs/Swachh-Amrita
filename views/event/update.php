<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Update Event: ' . $model->title;
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
            'model' => $model,
            'modelsTeam' => (empty($modelsTeam)) ? [new Team] : $modelsTeam,
            'modelsVolunteer' => (empty($modelsVolunteer)) ? [[new Volunteer]] : $modelsVolunteer
    ]); ?>

</div>